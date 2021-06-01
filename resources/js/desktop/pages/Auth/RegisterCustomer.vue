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
                                Get started - it's free. 1
                                <span>
                           The registration takes no more than a minute...
                        </span>
                            </h2>
                            <slot name="any-error"></slot>
                            <form action="/register-customer" method="post">
                                <slot name="csrf"></slot>
                                <div class="signUpForm1-radio">
                                    <input type="radio" name="type" class="suf1-radio" id="radioBox01" value="individual" selected>
                                    <label for="radioBox01">You are an individual</label>
                                    <input type="radio" name="type" class="suf1-radio" id="radioBox02" value="professional">
                                    <label for="radioBox02">You are a professional</label>
                                </div>
                                <div class="signUpForm1-inputs">
                                    <input type="text" class="signUpForm1__input signUpForm1__input-first" name="company_name" placeholder="Name of your company">
                                    <input type="email" class="signUpForm1__input signUpForm1__input-first" name="email"  placeholder="Your email" v-on:change="email_validate();">
                                    <input type="email" class="signUpForm1__input" name="email_confirmation"  placeholder="Confirm your email" v-on:change="email_validate();">
                                    <slot name="error-email"></slot>
                                    <input type="password" class="signUpForm1__input"name="password"  placeholder="Your password" v-on:change="pass_validate();">
                                    <input type="password" class="signUpForm1__input" name="password_confirmation"  placeholder="Confirm your password" v-on:change="pass_validate();">
                                    <slot name="error-password"></slot>
                                    <input type="text" class="signUpForm1__input" name="name"  placeholder="Your Username">
                                    <input type="tel" class="signUpForm1__input" v-mask="'+ ### ### #######'"  name="telephone_number_1"  placeholder="Your phone">
                                    <input type="tel" class="signUpForm1__input"  v-mask="'+ ### ### #######'" name="telephone_number_2"  placeholder="Your mobile number">
                                    <slot name="error-phone"></slot>
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
