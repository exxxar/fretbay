<template>
    <div class="container p-2 mt-1">
        <ValidationObserver v-slot="{ invalid }">


            <div class="card  mb-2">
                <div class="card-header">
                    <h4>
                        Information on loading and delivery addresses move
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h6 class="mt-0 form-group section-title address-title title-loading"><img
                                src="https://fretbay.com/en/assets/images/common/icons/general/icon-loading.svg" alt=""
                                style="width: 20px;">Place of loading</h6>
                            <choose-place-form :date1="'shipping_date_from'" :date2="'shipping_date_to'"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6 class="mt-0 form-group section-title address-title title-delivery"><img
                                src="https://fretbay.com/en/assets/images/common/icons/general/icon-delivery.svg" alt=""
                                style="width: 20px;">Place of
                                delivery</h6>
                            <choose-place-form :date1="'unshipping_date_from'" :date2="'unshipping_date_to'"/>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card mb-2">
                <div class="card-header">
                    <h4>Additional information <em>(recomended)</em></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                            <textarea class="form-control w-100" style="height:350px;" v-model="additional_info"
                                      @blur="saveAdditionalInfo"></textarea>
                        </div>
                        <div class="col-12 col-md-6 mt-2" style="font-size: 14px">
                            <p class="alert-danger p-2">
                                This information is public, NEVER give your contact details to preserve your privacy
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
                                                - Loading and delivery conditions.

                                                <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" aria-labelledby="basicsHeadingOne"
                                         data-parent="#basicsAccordion">
                                        <div class="card-body card-collapse__body px-0">
                                            Ex: narrow street, window loading, 2 people to help at the start,...
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
                                                - The list of elements to be dismantled.

                                                <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                                         data-parent="#basicsAccordion">
                                        <div class="card-body card-collapse__body px-0">
                                            Ex: 4-door cabinet, buffet,...
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
                                                - The list of your main items to be transported.

                                                <span class="card-collapse__btn-arrow">
                      <i class="fa fa-arrow-down small"></i>
                    </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                                         data-parent="#basicsAccordion">
                                        <div class="card-body card-collapse__body px-0">
                                            Ex: 1 large table of 3mx2m, ...
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
                    <h4>Increase your chances of being solicited, insert a photo!</h4>
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
                                <input type="checkbox" id="commercial" class="custom-control-input"  @change="isOffers=!isOffers">
                                <label for="commercial" class="custom-control-label" >I agree to receive commercial offers from
                                    AlloTrans and its partners</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" id="terms" class="custom-control-input" @change="isTerms=!isTerms">
                                <label for="terms" class="custom-control-label" >I accept AlloTrans's Terms of Use </label>
                            </div>
                        </div>

                    </div>

                    <p>This information can often be found on the Internet. </p>
                    <p>Approximate measures will already allow carriers to offer you a suitable offer.</p>

                </div>
            </div>


            <div class="row d-flex justify-content-end mt-2 p-3 m-0">
                <div class="col-12 mb-1 mb-sm-0 col-sm-2">
                    <button class="btn btn-outline-blue  w-100" @click="prevStep">Back</button>
                </div>
                <div class="col-12 col-sm-3" v-if="isOffers&&isTerms">
                    <button class="btn btn-outline-primary  w-100" @click="nextStep" :disabled="invalid">Next</button>
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
