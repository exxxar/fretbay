<template>
    <section id="profile-wizard" style="min-height:100vh;display:flex;">

        <div class="row w-100 m-auto h-100 text-center justify-content-center align-items-center">

            <div class="col-12 col-lg-7 col-md-7">
                <img src="/images/profile/profile2.jpg" style="max-height: 350px; width: 100%; max-width:350px" alt="">

                <h2 class="step-title" style="color:#21c87a; font-weight: 700">{{$trans('profile.wizard.start.h2_1')}}</h2>
                <p v-html="$trans('profile.wizard.start.p_1')">
                </p>
                <a href="/transporter/profile/transporter-wizard/step-1" class="btn btn-success text-white w-100"
                   style="max-width: 300px;">{{$trans('profile.wizard.start.a_1')}}</a>
            </div>

        </div>

    </section>
</template>
<script>
    export default {
        data() {
            return {}
        },
        computed: {
            user() {
                return this.$store.getters.user
            }
        },
        created() {
            if (this.user === '') {
                this.$store.dispatch('getUser');
            }
        },
        mounted() {

        }
    }
</script>
