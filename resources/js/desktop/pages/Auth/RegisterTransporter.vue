<template>
    <section id="form-user">
        <div class="container">
            <div class="form-user">
                <div class="etape-box-user">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2 class="ebu__title">
                                Join the largest network of professional transporters in Europe!
                            </h2>
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="images/port-img1.png">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/port-img2.png">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/port-img3.png">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/port-img4.png">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/port-img5.png">
                                </div>
                                <div class="col-sm-4">
                                    <img src="images/port-img6.png">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="register-transporter__form">
                                <h3 class="ebu__title">
                                    Get started - it's free.
                                    <span>
                              The registration process takes no more than a minute.
                           </span>
                                </h3>
                                <form action="#" id="signUpForm1" @submit.prevent="submit">
                                    <div class="signUpForm1-inputs">
                                        <input type="text" class="signUpForm1__input signUpForm1__input-first"
                                               v-model="company_name" placeholder="Name of your company">
                                        <input type="text" class="signUpForm1__input" v-model="name" placeholder="Name">
                                        <input type="email" class="signUpForm1__input" v-model="email" placeholder="Email">
                                        <input type="tel" class="signUpForm1__input" v-mask="'+ ### ### #######'"  v-model="phone" placeholder="Telephone number">
                                        <input type="tel" class="signUpForm1__input" v-mask="'+ ### ### #######'" v-model="mobile" placeholder="Mobile phone">


                                        <div class="size-container">
                                            <select id="country" v-model="country_id" v-on:change="selectCountry(country_id);">
                                                <option value="" disabled selected>Country</option>
                                                <option v-for="country in countries" :label="country.title">{{country.id}}</option>
                                            </select>
                                        </div>

                                        <input type="text" class="signUpForm1__input" v-model="postal" placeholder="Postal Code or City">

                                        <div class="size-container">
                                            <select id="region" v-model="region_id" name="region" >
                                                <option value="" disabled selected>Region</option>
                                                <option v-bind=region v-for="region in regions" :label="region.title">{{region.id}}</option>
                                            </select>
                                        </div>
                                        <!-- <div class="size-container size-container-expertise"> -->
                                            <div class="size-container size-container-expertise">
                                            <select id="area_of_expertise" name="area_of_expertise" v-model="area_of_expertise">
                                                <option value="" disabled selected>Your area of expertise</option>
                                                <option value="Home equipment">Home equipment</option>
                                                <option value="Moving">Moving</option>
                                                <option value="Vehicle">Vehicle</option>
                                            </select>
                                        </div>
                                        <!-- </div> -->




                                        <input type="text" class="signUpForm1__input" v-model="username"  placeholder="Username">
                                        <input type="password" class="signUpForm1__input" v-model="password" placeholder="Password" v-on:change="pass_validate();">
                                        <input type="password" class="signUpForm1__input"  v-model="password_confimation" placeholder="Confirm password" v-on:change="pass_validate();">
                                        <p v-if="!password_correct" style="opacity: 0.7;" class="font-weight-bold text-danger">Пароли не совпадают.</p>
                                        <p v-if="password_correct" style="opacity: 0.7;" class="font-weight-bold text-success">Пароли совпадают.</p>
 
                                    </div>

                                    <div class="form-text">
                                        By clicking on register, I accept the <a href="#">General conditions</a> of FretBay.com.
                                    </div>
                                    <button type="submit" class="signUpForm1-button" >
                                        Register
                                    </button>
                                </form>
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
                countries: [],
                country_id: "",
                regions: [],
                company_name: "",
                name:"",
                email:"",
                phone:"",
                mobile:"",
                postal:"",
                region_id:"",
                area_of_expertise:"",
                username:"",
                password:"",
                password_confimation:"",
                password_correct: false
            }
            },
        created: function () {
            axios
                .get('locations/countries')
                .then(response => {
                    this.countries = response.data;
                    
                });
        },
        methods: {
            selectCountry: function (id) {
                console.log(this.country);
                axios
                .get('/locations/cities/'+id)
                .then(response => {
                    this.regions = response.data;
                    
                });
            },
             pass_validate: function () {
                if(this.password != this.password_confimation){
                    this.password_correct = false;
                }else{
                     this.password_correct = true;
                }
             },
            submit: function () {
                if(this.password_correct){
                axios
                    .post('register',{
                        name : this.name,
                        email : this.email,
                        password : this.password,
                        mobile_number : this.mobile,
                        company_name : this.company_name,
                        telephone_number : this.phone,
                        country : this.country_id,
                        city : this.postal,
                        region : this.region_id,
                        areas_of_expertise : this.area_of_expertise,
                        role_id: "5"
                    }) //почему то отправляет на /api/desktop/v1/registerTransporter/, надо будет либо разобраться либо как костыль просто изменить route в api.php))0
                    .then(response => {
                        console.log(response);
                    });
                }
            }
        }
    }
</script>
