<template>
    <div class="p-2 mt-5">
        <h2>
            Information on loading and delivery addresses move
        </h2>

        <div class="row">
            <div class="col-6">
                <p><img src="https://fretbay.com/en/assets/images/common/icons/general/icon-loading.svg" alt="">Place of loading</p>
                <choose-place-form/>
            </div>
            <div class="col-6">
                <p><img src="https://fretbay.com/en/assets/images/common/icons/general/icon-delivery.svg" alt="">Place of delivery</p>
                <choose-place-form/>
            </div>
        </div>


        <h4>Additional information <em>(recomended)</em></h4>

        <div class="row">
            <div class="col-6">
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-6">
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

        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary">Upload</button>
            </div>
            <div class="col-8">
                <p>This information can often be found on the Internet. Approximate measures will already allow carriers to offer you a suitable offer.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
            <div class="custom-control custom-switch"><input type="checkbox" id="accept_conveyors" class="custom-control-input"> <label for="accept_conveyors" class="custom-control-label">I accept conveyors</label></div>
        </div>

            <div class="col-12">
                <div class="custom-control custom-switch"><input type="checkbox" id="accept_conveyors" class="custom-control-input"> <label for="accept_conveyors" class="custom-control-label">I accept conveyors</label></div>
            </div>

        </div>

        <p>This information can often be found on the Internet. </p>
        <p>Approximate measures will already allow carriers to offer you a suitable offer.</p>
    </div>
</template>

<script>
    import ChoosePlaceForm from "./ChoosePlaceForm";

    export default {
        components:{
            ChoosePlaceForm
        }
    }
</script>
<style lang="scss">


</style>
