<template>
    <div class="row pb-5 d-flex justify-content-center" v-if="user&&listing">

        <div class="col-12" v-if="error_message">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ error_message }}
                <button type="button" class="close" @click="error_message=null">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-link" @click="onlyActual = !onlyActual">
                <span v-if="onlyActual"><i
                    class="fas fa-sort-down"></i> {{ $trans('profile.quotes.span_1') }} ({{
                        filteredQuotes.length
                    }})</span>
                <span v-if="!onlyActual"><i
                    class="fas fa-sort-up"></i> {{ $trans('profile.quotes.span_2') }} ({{
                        filteredQuotes.length
                    }})</span>
            </button>
        </div>
        <div class="col-12 mb-lg-0 quote-list"
             v-bind:class="{'col-lg-6 mb-9':user.is_transporter}"
             v-if="filteredQuotes.length>0">

            <quote-item-component :key="index" :is_owner="user.id===listing.user_id" :item="item"
                                  v-for="(item,index) in filteredQuotes"/>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 mb-9 mb-lg-0" v-else>
            <div class="d-flex p-5 justify-content-center">
                <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                     style="max-width:300px;">
            </div>
            <h4 class="text-center">{{ $trans('profile.page.no_quotes') }}</h4>
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
                                    <span class="input-group-text text-primary">{{ currentCurrency }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="m-0"><small>{{ $trans('profile.quotes.p_4') }}: {{ getProfit() }}
                                    {{ currentCurrency }}</small> <a
                                    data-toggle="popover"
                                    data-placement="bottom"
                                    title="Quote help"
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    href="#info"><i class="far fa-question-circle"></i></a>

                                </p>

                            </div>
                        </div>
                        <hr>
                        <h6 class="text-center">{{ $trans('profile.quotes.h6_2') }}</h6>
                        <div class="form-group row d-flex justify-content-center">
                            <button class="btn ml-2 mb-2"
                                    type="button"
                                    v-bind:class="{'btn-primary':quote_validity===item.id,'btn-outline-primary':quote_validity!==item.id}"
                                    :key="item.id" v-for="item in quote_validity_list"
                                    @click="quote_validity = item.id">
                                {{ item.title }}
                            </button>
                        </div>
                        <h6 class="text-center">{{ $trans('profile.quotes.h6_3') }}</h6>
                        <div class="form-group row d-flex justify-content-center">
                            <button class="btn ml-2 mb-2"
                                    type="button"
                                    v-bind:class="{'btn-primary':type_of_transport===item.id,'btn-outline-primary':type_of_transport!==item.id}"
                                    :key="item.id" v-for="item in type_of_transport_list"
                                    @click="type_of_transport = item.id">
                                {{ item.title }}
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
                                        {{ item.title }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-sm-6">
                                <button class="btn btn-primary w-100" :disabled="selected_formula.length===0||loading">
                                      <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    <span v-else>
                                    {{ $trans('profile.quotes.button_4') }}
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
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
            error_message: null,
            loading: false,
            onlyActual: false,
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
            this.loading = true
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
                this.loading = false
                setTimeout(() => {
                    window.location.reload();
                }, 1000)
            }).catch((error) => {
                this.loading = false
                this.error_message = error.response.data.message;

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
