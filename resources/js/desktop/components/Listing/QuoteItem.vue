<template>
    <div class="card mb-2"
         @click="form.quote = item"
         v-bind:class="{'border-primary':user.id===item.user_id}">
        <div class="card-body pt-0 pb-0">
            <div class="row">
                <div class="col-12 mt-3" v-if="error_message">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ error_message }}
                        <button type="button" class="close" @click="error_message=null">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="text-left">
                        <small>{{ $trans('profile.quotes.p_1') }} {{
                                item.created_at | moment("from", "now", true)
                            }}</small>
                    </p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="text-right">
                        <small>{{ $trans('profile.quotes.p_2') }} {{
                                item.valid_until_date | moment("from", "now",
                                    true)
                            }}</small>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4"><a class="w-100 text-center d-block"
                                                v-if="item.user"
                                                :href="'/profile/'+item.user_id">
                    {{ item.user.profile.company_name || "Company name" }}</a>
                    <p class="text-center text-uppercase m-0 p-0">
                        <small><strong>{{
                                preparedQuoteTypeOfTransport(item.type_of_transport)
                            }}</strong></small>
                    </p>

                    <p class="prepared-formula-text">{{ prepareFormula(item.formula) }}</p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="text-center text-uppercase m-0 p-0">
                        <small><strong>{{ $trans('profile.quotes.p_3') }}</strong></small>
                    </p>
                    <p class="text-center m-0"><i class="fas fa-gavel ml-2"></i> {{ item.price }}
                        {{ item.currency }}</p>
                </div>
                <div class="col-12 col-sm-4 pb-2">
                    <p class="text-center m-0"><em><small>{{ preparedQuoteStatus(item.status) }}</small></em>
                    </p>
                    <a href="#" class="w-100 btn btn-primary m-0 p-0 d-block"
                       v-if="user.id===item.user_id&&item.status===0"
                       @click="removeQuote(item.id)"
                    ><small>{{ $trans('profile.quotes.a_1') }}</small></a>


                </div>
            </div>

        </div>
        <div class="card-footer" v-if="is_owner">
            <button class="btn btn-primary" @click="acceptQuote(item.id)" :disabled="loading">
                 <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                       aria-hidden="true"></span>
                <span v-else>
                      {{ $trans('profile.quotes.button_1') }}
                </span>

            </button>
            <button class="btn btn-danger" data-toggle="modal" :data-target="'#declineMessage-quote-'+item.id" :disabled="loading">
                 <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                       aria-hidden="true"></span>
                <span v-else>
                     {{ $trans('profile.quotes.button_2') }}
                </span>

            </button>
            <button class="btn btn-outline-primary" @click="fastMessage = !fastMessage">
                <i class="fas fa-envelope"></i>
            </button>
            <hr>

            <form v-on:submit.prevent="sendMessage"
                  v-if="form.quote&&fastMessage">
                <h6>{{ $trans('profile.quotes.h6_1') }}</h6>
                <div v-if="form.quote.id===item.id" class="row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                               :placeholder="$trans('profile.quotes.input_placeholder_1')"
                               maxlength="255"
                               v-model="form.message"
                               minlength="10" required>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary w-100">{{ $trans('profile.quotes.button_3') }}</button>
                    </div>
                </div>

            </form>

            <!-- Modal -->
            <div class="modal fade" :id="'declineMessage-quote-'+item.id" tabindex="-1" role="dialog" aria-labelledby="declineMessageLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="declineMessageLabel">{{ $trans('profile.quotes.h5_1') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="form-control" name="" id="" v-model="declineMessage">
                                <option :value="message" v-for="message in declineMessages">{{ message }}</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                {{ $trans('profile.quotes.button_5') }}
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="declineQuote()">
                                {{ $trans('profile.quotes.button_6') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>
<script>

export default {
    props: ["item", "is_owner"],
    computed: {
        minBid() {
            if (!this.filteredQuotes[0])
                return 0;

            let min = this.filteredQuotes[0].price || 0;

            this.quotes.forEach(item => {
                if (min > item.price && item.status === 0)
                    min = item.price
            });

            return min;
        },
        maxBid() {
            if (!this.filteredQuotes[0])
                return 0;

            let max = this.filteredQuotes[0].price || 0;

            this.quotes.forEach(item => {
                if (item.price > max)
                    max = item.price
            });

            return max;
        },
        user: function () {
            return window.user;
        },
        filteredQuotes: function () {
            return this.onlyActual ?
                this.quotes.filter(item => item.status === 0) :
                this.quotes
        },
        quotes: function () {
            return [...this.listing.quotes, ...this.quote_list].sort((a, b) => {
                if (a.quote_validity < b.quote_validity)
                    return 1;
                if (a.quote_validity > b.quote_validity)
                    return -1;
                return 0;
            })
        }
    },
    data() {
        return {
            loading: false,
            error_message: null,
            fastMessage: false,
            declineMessage: '',
            declineMessages: [
                "Message 1",
                "Message 2",
                "Message 3",
                "Message 4"
            ],
            form: {
                quote: null,
                message: '',
            },

        }
    },

    mounted() {
        console.log(this.item)
    }
    ,
    methods: {

        prepareFormula(formula) {
            if (!formula)
                return "";

            let tmp = "";
            formula.forEach(i => {
                tmp += ["The Economic package", "Truck with Driver package", "The Standard package", "The Complete package"][i - 1] + ", "
            })
            return tmp
        },
        preparedQuoteTypeOfTransport(index) {
            return ["Grouping", "One way", "Custom"] [index - 1]
        },
        preparedQuoteStatus(index) {
            return ["New bid", "Expired", "Accepted", "Declined"] [index]
        },

        sendMessage(index) {
            this.loading = true;
            axios.post("/listing/messages/send", {
                "message": this.form.message,
                "listing_id": this.item.listing_id,
                'recipient_id': this.form.quote.user_id,
                'user_id': this.user.id
            }).then(resp => {

                this.listing.messages.push({
                    created_at: new Date(),
                    id: 1,
                    listing_id: this.item.listing_id,
                    message: this.form.message,
                    recipient_id: this.item.user_id,
                    sender: this.user,
                    sender_id: this.user.id
                })
                this.form.message = null;

                this.loading = false;
            }).catch((error) => {

                this.error_message = error.response.data.message;

            })
        },
        acceptQuote(id) {
            this.loading = true;
            ///customer/listing/quotes/accept
            axios.post('/orders/accept', {
                listing_id: this.item.listing_id,
                quote_id: id
            }).then(resp => {
                this.loading = false;
                window.location.href = '/stripe/' + resp.data.payment_id;
            }).catch((error) => {
                this.loading = false;
                this.error_message = error.response.data.message;

            })
        },
        declineQuote() {
            this.loading = true;
            let id = this.form.quote.id
            axios.post('/customer/listing/quotes/decline', {
                listing_id: this.item.listing_id,
                quote_id: id
            }).then(resp => {

                this.loading = false;
                /*           setTimeout(() => {
                               window.location.reload();
                           }, 1000)*/
            }).catch((error) => {
                this.loading = false;
                this.error_message = error.response.data.message;

            })

            axios.post("/listing/messages/send", {
                "message": this.declineMessage,
                "listing_id": this.item.listing_id,
                'recipient_id': this.form.quote.user_id,
                'user_id': this.user.id
            });
        },
        removeQuote(id) {
            this.loading = true;
            axios.post('/transporter/listing/quotes/remove', {
                listing_id: this.item.listing_id,
                quote_id: id
            }).then(resp => {
                this.loading = false;
                setTimeout(() => {
                    window.location.reload();
                }, 1000)
            }).catch((error) => {
                this.loading = false;
                this.error_message = error.response.data.message;

            })
        }
    }


}
</script>
