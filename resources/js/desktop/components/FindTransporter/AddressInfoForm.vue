<template>
    <div class="container p-2 mt-1">
        <ValidationObserver v-slot="{ invalid }" tag="form" @submit.prevent="nextStep">


            <div class="card  mb-2">
                <div class="card-header">
                    <h4>
                        {{$trans('request_a_quote.section_5.h4_1')}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h6 class="mt-0 form-group section-title address-title title-loading"><img
                                src="https://fretbay.com/en/assets/images/common/icons/general/icon-loading.svg" alt=""
                                style="width: 20px;">   {{$trans('request_a_quote.section_5.h6_1')}}</h6>
                            <choose-place-form :date1="'shipping_date_from'" :date2="'shipping_date_to'"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6 class="mt-0 form-group section-title address-title title-delivery"><img
                                src="https://fretbay.com/en/assets/images/common/icons/general/icon-delivery.svg" alt=""
                                style="width: 20px;">   {{$trans('request_a_quote.section_5.h6_2')}}</h6>
                            <choose-place-form :date1="'unshipping_date_from'" :date2="'unshipping_date_to'"/>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card mb-2">
                <div class="card-header">
                    <h4 v-html="$trans('request_a_quote.section_5.h4_2')"></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                            <textarea class="form-control w-100" style="height:350px;" v-model="additional_info"
                                      @blur="saveAdditionalInfo"></textarea>
                        </div>
                        <div class="col-12 col-md-6 mt-2" style="font-size: 14px">
                            <p class="alert-danger p-2">
                                {{$trans('request_a_quote.section_5.p_1')}}
                            </p>

                            <div id="basicsAccordion">
                                <div class="card border-0 mb-3">
                                    <div class="card-header card-collapse__header" id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn"
                                                data-toggle="collapse" data-target="#basicsCollapseOne"
                                                aria-expanded="true"
                                                aria-controls="basicsCollapseOne">
                                                {{$trans('request_a_quote.section_5.button_1')}}

                                                <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" aria-labelledby="basicsHeadingOne"
                                         data-parent="#basicsAccordion">
                                        <div class="card-body card-collapse__body px-0">
                                            {{$trans('request_a_quote.section_5.div_1')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 mb-3">
                                    <div class="card-header card-collapse__header" id="basicsHeadingTwo">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                                data-toggle="collapse" data-target="#basicsCollapseTwo"
                                                aria-expanded="false"
                                                aria-controls="basicsCollapseTwo">
                                                {{$trans('request_a_quote.section_5.button_2')}}

                                                <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                                         data-parent="#basicsAccordion">
                                        <div class="card-body card-collapse__body px-0">
                                            {{$trans('request_a_quote.section_5.div_2')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 mb-3">
                                    <div class="card-header card-collapse__header" id="basicsHeadingThree">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block font-weight-medium d-flex justify-content-between card-collapse__btn collapsed"
                                                data-toggle="collapse" data-target="#basicsCollapseThree"
                                                aria-expanded="false"
                                                aria-controls="basicsCollapseThree">
                                                {{$trans('request_a_quote.section_5.button_3')}}

                                                <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                                         data-parent="#basicsAccordion">
                                        <div class="card-body card-collapse__body px-0">
                                            {{$trans('request_a_quote.section_5.div_3')}}
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="card  mb-2">
                <div class="card-header">
                    <h4>   {{$trans('request_a_quote.section_5.h4_3')}}</h4>
                </div>
                <div class="card-body">
                    <upload-files/>
                </div>
            </div>


            <div class="card mb-2">
                <div class="card-body">
                    <div class="row w-100 m-auto">
                        <div class="col-12">
                            <div class="custom-control custom-switch">
                                <ValidationProvider name="isOffers" rules="required" v-slot="{ errors }">
                                <input type="checkbox" id="commercial" class="custom-control-input"  @change="isOffers=!isOffers" required>
                                <label for="commercial" class="custom-control-label" >   {{$trans('request_a_quote.section_5.label_1')}}</label>
                                </ValidationProvider>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="custom-control custom-switch">
                                <ValidationProvider name="isTerms" rules="required" v-slot="{ errors }">
                                <input type="checkbox" id="terms" class="custom-control-input" @change="isTerms=!isTerms" required>
                                <label for="terms" class="custom-control-label" >   {{$trans('request_a_quote.section_5.label_2')}} </label>
                                </ValidationProvider>
                            </div>
                        </div>

                    </div>

                    <p>   {{$trans('request_a_quote.section_5.p_3')}}</p>
                    <p>   {{$trans('request_a_quote.section_5.p_4')}}</p>

                </div>
            </div>


            <div class="row d-flex justify-content-end mt-2 p-3 m-0">
                <div class="col-12 mb-1 mb-sm-0 col-sm-2">
                    <button class="btn btn-outline-blue  w-100" @click="prevStep">   {{$trans('request_a_quote.global.button_prev')}}</button>
                </div>
                <div class="col-12 col-sm-3">
                    <button class="btn  w-100"
                            type="submit"
                            v-bind:class="{'btn-danger':invalid||!isOffers||!isTerms, 'btn-outline-primary':!invalid&&isOffers&&isTerms}"
                            >   {{$trans('request_a_quote.global.button_send')}}</button>
                </div>
            </div>
        </ValidationObserver>
    </div>
</template>

<script>
    import ChoosePlaceForm from "../AddressInfoForm/ChoosePlaceForm";
    import UploadFiles from "../AddressInfoForm/UploadFiles";

    export default {
        components: {
            ChoosePlaceForm, UploadFiles
        },
        data() {
            return {
                isOffers: false,
                isTerms: false,
                additional_info: ''
            }
        },
        computed: {
            listing() {
                return this.$store.getters.listing;
            },
            articles() {
                return this.$store.getters.articleCart;
            },
        },
        methods: {
            nextStep() {
                if (window.user) {
                    let user = window.user
                    this.$store.dispatch('editNewListing', {key: 'user_id', value: user.id});
                    // this.$store.dispatch('editNewListing', {key:'articles', value:this.articles});
                    let formData = new FormData();
                    Object.keys(this.listing).forEach(key => {
                        if (key !== 'images' && key !== 'place_of_loading' && key !== 'place_of_delivery' && key !== 'articles') {
                            formData.append(key, this.listing[key]);
                        }
                    });
                    formData.append('place_of_loading', JSON.stringify(this.listing.place_of_loading));
                    formData.append('place_of_delivery', JSON.stringify(this.listing.place_of_delivery));
                    formData.append('articles', JSON.stringify(this.listing.articles));
                    for (let i = 0; i < this.listing.images.length; i++) {
                        formData.append('images[' + i + ']', this.listing.images[i]);
                    }
                    this.$store.dispatch('addListing', formData).then(resp => {
                        this.$store.commit('addListing', resp.data.listing);
                        window.location = '/customer/profile'
                    })
                } else {
                    this.$store.dispatch('setStep', 3)
                }

                window.scrollTo(0, 0);
            },
            prevStep() {
                this.$store.dispatch('setStep', 1)

                window.scrollTo(0, 0);
            },
            saveAdditionalInfo() {
                this.$store.dispatch('editNewListing', {key: 'additional_info', value: this.additional_info})
            }
        }
    }
</script>
<style lang="scss">

</style>
