<template>
    <div class="tab-content col-md-offset-4 col-lg-8 col-md-12">
        <div class="tab1_1 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="tab-title">My identity</h2>
                    <p class="inform-box">
                        You wish to change your informations?
                        <br>
                        Please contact us at <a href="#">transporteur@fretbay.com</a> to make the request.</p>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="form-group"><label for="" class="text-lg">Name</label><input type="text"
                                                                                                         class="form-control form-control-img-lock"
                                                                                                         placeholder="name"
                                                                                                         :value="user.profile.second_name"
                                                                                                         disabled></div>
                                <div class="form-group"><label for="" class="text-lg">First name</label><input
                                    type="text" class="form-control form-control-img-lock" placeholder="name"
                                    :value="user.profile.first_name" disabled>
                                </div>
                                <div class="form-group"><label for="" class="text-lg">Phone number</label><input
                                    type="text" class="form-control form-control-img-lock" :value="user.phone"
                                    placeholder="1234567890"
                                    disabled></div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="transporter-img">
                                    <img
                                        v-lazy="user.profile.image"
                                        alt="">
                                </div>

                                <label class="btn-upload-pic"><input type="file" accept="image/*">Change profile picture</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab1_2 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="tab-title">Email</h2>
                    <p class="inform-box">
                        You want to change your email?
                        <br>
                        Please contact <a href="#">transporteur@fretbay.com</a> to make the request.
                    </p>
                    <form action="">
                        <div class="form-group">
                            <label for="" class="text-lg">Email</label><input type="text"
                                                                              class="form-control form-control-img-lock"
                                                                              placeholder="test@email.ru"
                                                                              :value="user.email" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            user() {
                return JSON.parse(window.user)
            }
        },
        mounted() {
            console.log(this.user)
        }
    }
</script>
