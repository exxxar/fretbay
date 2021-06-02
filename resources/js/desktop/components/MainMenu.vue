<template>
    <div id="mm_logo">
        <div class="container">
            <div class="logo__body">
                <nav class="logo__menu">
                    <ul class="logo__list row">
                        <div class="col-md-9 col-sm-11">
                            <li>
                                <a href="/"><img src="/images/logo.svg" class="main-logo" alt="Logo"></a>
                            </li>
                            <li class="first-btn">
                                <a class="first-link" href="/find-transporter">Request a quote</a>
                            </li>
                            <li>
                                <a href="/find-loads">Find loads</a>
                            </li>
                            <li>
                                <a href="/how-it-works">How it works</a>
                            </li>
                        </div>
                        <div class="col-md-3  logo__list-aut" v-if="!auth">
                            <li>
                                <a href="/register">Register</a>
                            </li>
                            <li>
                                <a href="/login">Log in</a>
                            </li>
                        </div>
                        <div class="col-md-3  logo__list-aut" v-else>
                            <li>
                                <a href="/transporter/profile-my-account">Profile</a>
                            </li>
                        </div>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:["auth"],
        mounted(){
            console.log("auth=>",this.auth)
        }
    }
</script>
