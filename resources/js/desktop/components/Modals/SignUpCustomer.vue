<template>
    <div class="modal fade" id="signUp-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body p-5 mt-5">
                    <customer-registration-form-component/>
                </div>

                <button type="button" class="close position-absolute-top-right-0 mt-4 mr-4" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true"><i class="svg-icon svg-icon-xs text-muted"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18"
                                                                                                   y2="18"></line></svg></i></span>
                </button>
            </div>
        </div>
    </div>

</template>
<script>
    export default {

    }
</script>

