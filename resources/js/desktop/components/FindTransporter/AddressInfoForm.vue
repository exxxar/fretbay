<template>
    <div class="container p-2 mt-5">
        <ValidationObserver v-slot="{ invalid }">
            <h2>
                Information on loading and delivery addresses move
            </h2>

            <div class="row w-100 m-auto">
                <div class="col-12 col-md-6">
                    <h4 class="mt-0 form-group section-title address-title title-loading">Place of loading</h4>
                    <choose-place-form :date1="'shipping_date_from'" :date2="'shipping_date_to'"/>
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="mt-0 form-group section-title address-title title-delivery">Place of delivery</h4>
                    <choose-place-form :date1="'unshipping_date_from'" :date2="'unshipping_date_to'"/>
                </div>
            </div>

            <h6>Additional information <em>(recomended)</em></h6>

            <div class="row w-100 m-auto">
                <div class="col-12 col-md-6">
                    <textarea class="w-100" v-model="additional_info" @blur="saveAdditionalInfo" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-12 col-md-6" style="font-size: 14px">
                    <p class="alert-danger">
                        This information is public, NEVER give your contact details to preserve your privacy
                    </p>
                    <h4>Be as specific as possible about:</h4>
                    <p>- Loading and delivery conditions. </p>

                    <p> Ex: narrow street, window loading, 2 people to help at the start,...</p>

                    <p>- The list of elements to be dismantled.</p>

                    <p> Ex: 4-door cabinet, buffet,...</p>

                    <p> - The list of your main items to be transported.</p>

                    <p> Ex: 1 large table of 3mx2m, ...</p>
                </div>
            </div>

            <h4>Increase your chances of being solicited, insert a photo!</h4>

    <!--        <div class="row">-->
    <!--            <div class="col-4">-->
    <!--                <button class="btn btn-primary">Upload</button>-->
    <!--            </div>-->
    <!--            <div class="col-8">-->
    <!--                <p>This information can often be found on the Internet. Approximate measures will already allow carriers to offer you a suitable offer.</p>-->
    <!--            </div>-->
    <!--        </div>-->
            <upload-files></upload-files>
            <div class="row w-100 m-auto">
                <div class="col-12">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" id="commercial" class="custom-control-input">
                        <label for="commercial" class="custom-control-label">I agree to receive commercial offers from AlloTrans and its partners</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" id="terms" class="custom-control-input">
                        <label for="terms" class="custom-control-label">I accept AlloTrans's Terms of Use </label>
                    </div>
                </div>

            </div>

            <p>This information can often be found on the Internet. </p>
            <p>Approximate measures will already allow carriers to offer you a suitable offer.</p>

            <div class="row mx-auto d-flex justify-content-end mt-2 w-100">
                <div class="col-12 col-sm-2">
                    <button class="btn btn-custom-danger" @click="prevStep">Back</button>
                </div>
                <div class="col-12 col-sm-3">
                    <button class="btn btn-custom-white" @click="nextStep" :disabled="invalid">Next</button>
                </div>
            </div>
        </ValidationObserver>
    </div>
</template>

<script>
    import ChoosePlaceForm from "../AddressInfoForm/ChoosePlaceForm";
    import UploadFiles from "../AddressInfoForm/UploadFiles";
    export default {
        components:{
            ChoosePlaceForm, UploadFiles
        },
        data() {
            return {
                additional_info:''
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
                if(window.user) {
                    let user = JSON.parse(window.user)
                    this.$store.dispatch('editNewListing', {key:'user_id', value:user.id});
                    // this.$store.dispatch('editNewListing', {key:'articles', value:this.articles});
                    let formData = new FormData();
                    Object.keys(this.listing).forEach(key => {
                        if ( key !== 'images' && key !=='place_of_loading' && key !=='place_of_delivery' &&  key !=='articles') {
                            formData.append(key, this.listing[key]);
                        }
                    });
                    formData.append('place_of_loading', JSON.stringify(this.listing.place_of_loading));
                    formData.append('place_of_delivery', JSON.stringify(this.listing.place_of_delivery));
                    formData.append('articles', JSON.stringify(this.listing.articles));
                    for( let i = 0; i < this.listing.images.length; i++ ) {
                        formData.append('images[' + i + ']', this.listing.images[i]);
                    }
                    this.$store.dispatch('addListing', formData).then( resp => {
                        this.$store.commit('addListing', resp.data.listing);
                        window.location = '/find-loads'
                    })
                }
                else {
                    this.$store.dispatch('setStep', 3)
                }
            },
            prevStep() {
                this.$store.dispatch('setStep', 1)
            },
            saveAdditionalInfo() {
                this.$store.dispatch('editNewListing', {key:'additional_info', value: this.additional_info})
            }
        }
    }
</script>
<style lang="scss">

</style>
