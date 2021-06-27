<template>
    <div class="main-body mt-3">

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Password</h2>
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
                            <div class="form-group text-center"><a href="#"
                                                                   class="btn btn-success btn-standard">Save</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>Notifications</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Email</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Text message</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Newsletter</label>
                                    </div>

                                    <div class="form-group text-center">
                                        <a href="#"
                                           class="btn btn-success btn-standard">Save</a>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {}
</script>
