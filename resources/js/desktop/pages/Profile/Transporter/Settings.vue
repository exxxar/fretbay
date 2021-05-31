<template>
    <div class="tab-content col-md-8">
        <div class="tab1_1 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="tab-title">Notifications</h2>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                <div class="checkbox-list checkbox-list-notifications">
                                    <label for="">
                                        <span class="label-text">Email</span>
                                        <span class="custom-checkbox">
                                                    <input type="checkbox">
                                                    <span>&nbsp;</span>
                                                </span>
                                    </label>
                                    <label for="">
                                        <span class="label-text">Text message</span>
                                        <span class="custom-checkbox">
                                                    <input type="checkbox">
                                                    <span>&nbsp;</span>
                                                </span>
                                    </label>
                                    <label for="">
                                        <span class="label-text">Newsletter</span>
                                        <span class="custom-checkbox">
                                                    <input type="checkbox">
                                                    <span>&nbsp;</span>
                                                </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="tab1_2 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="tab-title">Password</h2>
                    <form action="">
                        <div class="form-group">
                            <label for="" class="text-lg">Old password</label>
                            <input type="password" class="form-control form-control-empty input-lg">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-lg">New</label>
                            <input type="password" class="form-control form-control-empty input-lg">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-lg">Confirm</label>
                            <input type="password" class="form-control form-control-empty input-lg">
                        </div>
                        <div class="form-group text-center"><a href="#" class="btn btn-success btn-standard">Confirm</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>
