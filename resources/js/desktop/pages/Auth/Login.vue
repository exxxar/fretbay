<template>
    <section id="login">
        <div class="container">
            <div class="form-login">
                <div class="etape-box-user">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2 class="ebu__title">
                                Log into your FretBay account.
                            </h2>
                            <p class="ebu__subtitle">
                                Enter your email address or username and password to access all FretBay services.
                            </p>
                            <img src="images/conecLogImg.png" class="img-responsive fix-img">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="login__form">
                                <h2 class="ebu__title">
                                    FretBay Identification
                                </h2>
                                <form action="#" id="signUpForm1">
                                    <div class="signUpForm1-inputs">
                                        <div class="log-row input-row">
                                            <i class="glyphicon glyphicon-user"></i>
                                            <span id="wp-pseudo2">
                                    <input type="text" class="signUpForm1__input signUpForm1__input-first" v-model="login" placeholder="Login or Email">
                                 </span>
                                        </div>
                                        <div class="pass-row input-row">
                                            <i class="glyphicon glyphicon-user"></i>
                                            <span id="wp-pseudo2">
                                    <input type="password" class="signUpForm1__input" v-model="pass" placeholder="Password">
                                 </span>
                                        </div>
                                        <!-- <input type="text" class="signUpForm1__input signUpForm1__input-first" placeholder="Login or Email">
                                        <input type="text" class="signUpForm1__input" placeholder="Password"> -->
                                    </div>
                                    <button type="submit" class="signUpForm1-button">
                                        Sign in
                                    </button>
                                    <div class="form-text">
                                        Forgotten password? <a href="/register">Sign up here</a>
                                    </div>
                                </form>
                            </div>
                            <div class="ebu__txt">
                                Not yet registered on FretBay? <a href="/register">Sign up here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</template>
<script>
    export default {
        data() {
            return {
                login: "",
                pass: "",
                isPro: false
            }
            },
        methods: {
            submit: function () {
                axios
                    .post('login',{
                        username : this.login,
                        password : this.password,
                    })
                    .then(response => {
                        console.log(response);
                    });
            }
        }
    }
</script>
<style lang="scss" scoped>
    h1 {
        margin-top:0px;
    }

    p.h1 {
        font-size:20px;
    }
</style>
