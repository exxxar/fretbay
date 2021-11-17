<template>
    <div class="row pb-5 d-flex justify-content-center" v-if="user&&listing">

        <div class="col-12">
            <button class="btn btn-link" @click="onlyActual = !onlyActual">
                <span v-if="onlyActual"><i class="fas fa-sort-down"></i> {{$trans('profile.quotes.span_1')}} ({{filteredQuotes.length}})</span>
                <span v-if="!onlyActual"><i class="fas fa-sort-up"></i> {{$trans('profile.quotes.span_2')}} ({{filteredQuotes.length}})</span>
            </button>
        </div>
        <div class="col-12 mb-lg-0 quote-list"
             v-bind:class="{'col-lg-6 mb-9':user.is_transporter}"
             v-if="filteredQuotes.length>0">

            <div class="card mb-2" v-for="(item,index) in filteredQuotes"
                 @click="form.quote = item"
                 v-bind:class="{'border-primary':user.id===item.user_id}">
                <div class="card-body pt-0 pb-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p class="text-left">
                                <small>{{$trans('profile.quotes.p_1')}} {{item.created_at | moment("from", "now", true)
                                    }}</small>
                            </p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p class="text-right">
                                <small>{{$trans('profile.quotes.p_2')}} {{item.valid_until_date | moment("from", "now",
                                    true) }}</small>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4"><a class="w-100 text-center d-block"
                                                        target="_blank"
                                                        v-if="item.user"
                                                        :href="'/profile/'+item.user_id">
                            {{item.user.profile.company_name || "Company name"}}</a>
                            <p class="text-center text-uppercase m-0 p-0">
                                <small><strong>{{preparedQuoteTypeOfTransport(item.type_of_transport)}}</strong></small>
                            </p>

                            <p class="prepared-formula-text">{{prepareFormula(item.formula)}}</p>
                        </div>
                        <div class="col-12 col-sm-4">
                            <p class="text-center text-uppercase m-0 p-0">
                                <small><strong>{{$trans('profile.quotes.p_3')}}</strong></small>
                            </p>
                            <p class="text-center m-0"><i class="fas fa-gavel ml-2"></i> {{item.price}}
                                {{item.currency}}</p>
                        </div>
                        <div class="col-12 col-sm-4 pb-2">
                            <p class="text-center m-0"><em><small>{{preparedQuoteStatus(item.status)}}</small></em></p>
                            <a href="#" class="w-100 btn btn-primary m-0 p-0 d-block"
                               v-if="user.id===item.user_id&&item.status===0"
                               @click="removeQuote(item.id)"
                            ><small>{{$trans('profile.quotes.a_1')}}</small></a>


                        </div>
                    </div>

                </div>
                <div class="card-footer" v-if="user.id===listing.user_id">
                    <button class="btn btn-primary" @click="acceptQuote(item.id)">
                        {{$trans('profile.quotes.button_1')}}
                    </button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#declineMessage">
                        {{$trans('profile.quotes.button_2')}}
                    </button>
                    <button class="btn btn-outline-primary" @click="fastMessage = !fastMessage">
                        <i class="fas fa-envelope"></i>
                    </button>
                    <hr>

                    <form v-on:submit.prevent="sendMessage"
                          v-if="form.quote&&fastMessage">
                        <h6>{{$trans('profile.quotes.h6_1')}}</h6>
                        <div v-if="form.quote.id===item.id" class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control"
                                       :placeholder="$trans('profile.quotes.input_placeholder_1')"
                                       maxlength="255"
                                       v-model="form.message"
                                       minlength="10" required>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary w-100">{{$trans('profile.quotes.button_3')}}</button>
                            </div>
                        </div>

                    </form>

                    </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 mb-9 mb-lg-0" v-else>
            <div class="d-flex p-5 justify-content-center">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                     style="max-width:300px;">
            </div>
            <h4 class="text-center">{{$trans('profile.page.no_quotes')}}</h4>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 mb-9 mb-lg-0" v-if="filteredQuotes&&user.is_transporter">
            <div class="card">
                <div class="card-body">

                    <form v-on:submit.prevent="submit">
                        <div class="form-group row">

                            <div class="input-group p-2">
                                <input type="number" class="form-control"
                                       v-model="bidPrice"
                                       :placeholder="'Your bid price 1000 '+currentCurrency"
                                       aria-label="Text input with segmented dropdown button" required>

                                <div class="input-group-append">
                                    <span class="input-group-text text-primary">{{currentCurrency}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="m-0"><small>{{$trans('profile.quotes.p_4')}}: {{getProfit()}}
                                    {{currentCurrency}}</small> <a
                                    data-toggle="popover"
                                    title="Quote help" data-content="And here's some amazing content. It's very engaging. Right?"
                                    href="#info"><i class="far fa-question-circle"></i></a>

                                  </p>

                                 </div>
                        </div>
                        <hr>
                        <h6 class="text-center">{{$trans('profile.quotes.h6_2')}}</h6>
                        <div class="form-group row d-flex justify-content-center">
                            <button class="btn ml-2 mb-2"
                                    type="button"
                                    v-bind:class="{'btn-primary':quote_validity===item.id,'btn-outline-primary':quote_validity!==item.id}"
                                    :key="item.id" v-for="item in quote_validity_list"
                                    @click="quote_validity = item.id">
                                {{item.title}}
                            </button>
                        </div>
                        <h6 class="text-center">{{$trans('profile.quotes.h6_3')}}</h6>
                        <div class="form-group row d-flex justify-content-center">
                            <button class="btn ml-2 mb-2"
                                    type="button"
                                    v-bind:class="{'btn-primary':type_of_transport===item.id,'btn-outline-primary':type_of_transport!==item.id}"
                                    :key="item.id" v-for="item in type_of_transport_list"
                                    @click="type_of_transport = item.id">
                                {{item.title}}
                            </button>
                        </div>
                        <h6 class="text-center"><span class="badge badge-danger mr-2"
                                                      v-if="selected_formula.length===0">Required</span>What working
                            service is this?</h6>
                        <div class="form-group row d-flex justify-content-center">

                            <div class="col-12 col-sm-6 " :key="item.id" v-for="item in formula_list">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" :id="'formula-'+item.id"
                                           class="custom-control-input"
                                           :value="item.id"
                                           v-model="selected_formula">
                                    <label :for="'formula-'+item.id" class="custom-control-label">
                                        {{item.title}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-sm-6">
                                <button class="btn btn-primary w-100" :disabled="selected_formula.length===0">
                                    {{$trans('profile.quotes.button_4')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="declineMessage" tabindex="-1" role="dialog" aria-labelledby="declineMessageLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declineMessageLabel">{{$trans('profile.quotes.h5_1')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control" name="" id="" v-model="declineMessage">
                            <option :value="message" v-for="message in declineMessages">{{message}}</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{$trans('profile.quotes.button_5')}}
                        </button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="declineQuote()">
                            {{$trans('profile.quotes.button_6')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>
<script>
    export default {
        props: ["listing"],
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
                onlyActual: true,
                bidPrice: null,
                currentCurrency: '€',
                quote_validity: 2,
                type_of_transport: 2,
                selected_formula: [],
                quote_validity_list: [
                    {
                        id: 2,
                        title: '12 hours'
                    },
                    {
                        id: 3,
                        title: '24 hours (1 day)'
                    },
                    {
                        id: 4,
                        title: '48 hours (2 day)'
                    },

                    {
                        id: 5,
                        title: '96 hours (4 day)'
                    }
                    ,
                    {
                        id: 6,
                        title: '144 hours (6 day)'
                    }
                ],
                type_of_transport_list: [

                    {
                        id: 1,
                        title: 'Grouping'
                    },
                    {
                        id: 2,
                        title: 'One way'
                    }
                    /*,
                    {
                        id: 3,
                        title: 'Custom'
                    }*/
                ],

                formula_list: [
                    {
                        id: 1,
                        title: "The Economic package"
                    },
                    {
                        id: 2,
                        title: "Truck with Driver package"
                    },
                    {
                        id: 3,
                        title: "The Standard package"
                    },
                    {
                        id: 4,
                        title: "The Complete package"
                    }

                ],

                quote_list: []
            }
        },

        mounted() {
            this.bidPrice = Math.max(this.minBid, 0);

            $('[data-toggle="popover"]').popover()

            if (this.user)
                pusher.subscribe('notification-event-channel-' + this.user.id)
                    .bind('notification-quote-event', (data) => {
                        /*this.sendMessage("Quote update")*/
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000)
                    })
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
            submit() {

                axios.post('/transporter/listing/quotes/add', {
                    price: this.bidPrice,
                    type_of_transport: this.type_of_transport,
                    quote_validity: this.quote_validity,
                    status: 0,
                    currency: this.currentCurrency,
                    listing_id: this.listing.id,
                    user_id: this.user.id,
                    formula: this.selected_formula
                }).then(resp => {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000)
                })
            },
            sendMessage(index) {
                axios.post("/listing/messages/send", {
                    "message": this.form.message,
                    "listing_id": this.listing.id,
                    'recipient_id': this.form.quote.user_id,
                    'user_id': this.user.id
                }).then(resp => {

                    this.listing.messages.push({
                        created_at: new Date(),
                        id: 1,
                        listing_id: this.listing.id,
                        message: this.form.message,
                        recipient_id: this.listing.user_id,
                        sender: this.user,
                        sender_id: this.user.id
                    })
                    this.form.message = null;
                })
            },
            acceptQuote(id) {
                ///customer/listing/quotes/accept
                axios.post('/orders/accept', {
                    listing_id: this.listing.id,
                    quote_id: id
                }).then(resp => {
                    window.location.href = '/stripe/' + resp.data.payment_id;
                }).catch(() => {
                    setTimeout(() => {

                    }, 1000)
                })
            },
            declineQuote() {
                let id = this.form.quote.id
                axios.post('/customer/listing/quotes/decline', {
                    listing_id: this.listing.id,
                    quote_id: id
                }).then(resp => {
                    /*           setTimeout(() => {
                                   window.location.reload();
                               }, 1000)*/
                })

                axios.post("/listing/messages/send", {
                    "message": this.declineMessage,
                    "listing_id": this.listing.id,
                    'recipient_id': this.form.quote.user_id,
                    'user_id': this.user.id
                });
            },
            removeQuote(id) {
                axios.post('/transporter/listing/quotes/remove', {
                    listing_id: this.listing.id,
                    quote_id: id
                }).then(resp => {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000)
                })
            },
            getProfit() {
                //todo: коэффициент коррелирует со страной
                return this.bidPrice - this.bidPrice * ((this.user.tax || 15) / 100)
            }
        }


    }
</script>
<style lang="scss">
    .quote-list {
        max-height: 500px;
        overflow-y: auto;
    }

    .btn-custom-checker {
        font-size: 8px;
        padding: 5px 11px;
        border-radius: 5px;
        margin: 5px;
    }

    .prepared-formula-text {
        text-overflow: ellipsis;
        word-break: break-all;
        font-size: 10px;
    }
</style>
