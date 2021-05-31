<template>
    <section id="form-user">
        <div class="container">
            <div class="form-user">
                <div class="etape-box-user">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2 class="ebu__title">
                                Looking for professional carriers?
                            </h2>
                            <div class="col-sm-12">
                                <img src="images/shipperSignPimage.png" class="img-responsive fix-img">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h2 class="ebu__title">
                                Get started - it's free.
                                <span>
                           The registration takes no more than a minute...
                        </span>
                            </h2>
                            <form action="#" id="signUpForm1" @submit.prevent="submit">
                                <div class="signUpForm1-radio">
                                    <input type="radio" class="suf1-radio" id="radioBox01" selected>
                                    <label for="radioBox01">You are an individual</label>
                                    <input type="radio" class="suf1-radio" id="radioBox02" v-model="is_pro">
                                    <label for="radioBox02">You are a professional</label>
                                </div>
                                <div class="signUpForm1-inputs">
                                    <input type="text" class="signUpForm1__input signUpForm1__input-first" v-model="company_name" placeholder="Name of your company">
                                    <input type="email" class="signUpForm1__input signUpForm1__input-first" v-model="email" placeholder="Your email" v-on:change="email_validate();">
                                    <input type="email" class="signUpForm1__input" v-model="email_confimation" placeholder="Confirm your email" v-on:change="email_validate();">
                                    <p v-if="!email_correct" style="opacity: 0.7;" class="font-weight-bold text-danger">Почты не совпадают.</p>
                                    <p v-if="email_correct" style="opacity: 0.7;" class="font-weight-bold text-success">Почты совпадают.</p>
                                    <input type="password" class="signUpForm1__input" v-model="password" placeholder="Your password" v-on:change="pass_validate();">
                                    <input type="password" class="signUpForm1__input" v-model="password_confimation" placeholder="Confirm your password" v-on:change="pass_validate();">
                                    <p v-if="!password_correct" style="opacity: 0.7;" class="font-weight-bold text-danger">Пароли не совпадают.</p>
                                    <p v-if="password_correct" style="opacity: 0.7;" class="font-weight-bold text-success">Пароли совпадают.</p>
                                    <input type="text" class="signUpForm1__input" v-model="username" placeholder="Your Username">
                                    <input type="tel" class="signUpForm1__input" v-mask="'+ ### ### #######'"  v-model="phone" placeholder="Your phone">
                                    <input type="tel" class="signUpForm1__input"  v-mask="'+ ### ### #######'" v-model="mobile" placeholder="Your mobile number">
                                </div>
                                <div class="signUpForm1-checkbox">
                                    <input type="checkbox" class="suf1-checkbox" id="checkBox01">
                                    <label for="checkBox01">I agree to receive commercial offers from FretBay and its partners.</label>
                                </div>
                                <div class="form-text">
                                    By clicking on register, I accept the <a href="#">General Terms and Conditions</a>  of FretBay.com.
                                </div>
                                <button type="submit" class="signUpForm1-button">
                                   Register
                                </button>
                            </form>
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
                company_name: "",
                name:"",
                email:"",
                email_confimation:"",
                phone:"",
                mobile:"",
                username:"",
                password:"",
                password_confimation:"",         
                password_correct: false,
                email_correct: false,
                is_pro: false
            }
            },
        methods: {
             pass_validate: function () {
                if(this.password != this.password_confimation){
                    this.password_correct = false;
                }else{
                     this.password_correct = true;
                }
             },
              email_validate: function () {
                if(this.email != this.email_confimation){
                    this.email_correct = false;
                }else{
                     this.email_correct = true;
                }
             },
            submit: function () {
                if(this.password_correct && this.email_correct){
                    axios
                    .post('register',{
                        name : this.name,
                        email : this.email,
                        password : this.password,
                        mobile_number : this.mobile,
                        company_name : this.company_name,
                        telephone_number : this.phone,
                        country : "",
                        city : "",
                        region : "",
                        areas_of_expertise : "",
                        role_id: "4"
                    }) //почему то отправляет на /api/desktop/v1/registerTransporter/, надо будет либо разобраться либо как костыль просто изменить route в api.php))0
                    .then(response => {
                        console.log(response);
                    });
                }
            }
        }
    }
</script>