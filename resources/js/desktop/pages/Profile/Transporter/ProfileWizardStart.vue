<template>
    <section id="profile-wizard" style="min-height:90vh;display:flex;">
<!--        <div class="container">-->
<!--            <div class="row w-100 m-auto" style="height: 100vh">-->
<!--                <div class="col-lg-10 col-md-10">-->
<!--                    <div class="profile-wizard">-->
                        <div class="row w-100 m-auto h-100 text-center justify-content-center align-items-center">
<!--                            <div class="progress">-->
<!--                                <div class="progress-bar progress-bar-success"></div>-->
<!--                            </div>-->
<!--                            <div class="content-box">-->
<!--                                <div class="row w-100 mx-auto">-->
                                    <div class="col-12 col-lg-7 col-md-7">
                                        <img src="/images/profile/profile2.jpg" style="max-height: 350px; width: 100%; max-width:350px" alt="">
<!--                                        <img src="/assets/img/logo.png" style="height: 80px" alt="">-->
<!--                                        <h4 style="color:#50b848; font-weight: 700">Get started on AlloTrans!</h4>-->
                                        <h2 class="step-title" style="color:#21c87a; font-weight: 700">Complete your profile</h2>
                                        <p>AlloTrans allows you to post your quotes free of charge on the platform and
                                            <strong>increase your sales revenue</strong>.
                                            <strong>Create a profile here quickly and free of charge</strong> so that it can be validated by our team.
                                        </p>
                                        <a href="/transporter/profile/transporter-wizard/step-1" class="btn btn-success w-100" style="max-width: 300px;">Start</a>
                                    </div>
<!--                                </div>-->
<!--                            </div>-->
                        </div>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </section>
</template>
<script>
    export default {
        data(){
            return {
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            }
        },
        created() {
            if(this.user=='')
            {
                this.$store.dispatch('getUser');
            }
        },
        mounted() {

        }
    }
</script>
