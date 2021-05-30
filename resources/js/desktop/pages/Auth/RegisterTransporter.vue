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
                                <form action="#" id="signUpForm1">
                                    <div class="signUpForm1-inputs">
                                        <input type="text" class="signUpForm1__input signUpForm1__input-first"
                                               v-model="company_name" placeholder="Name of your company">
                                        <input type="text" class="signUpForm1__input" v-model="first_name" placeholder="First name">
                                        <input type="text" class="signUpForm1__input" v-model="name" placeholder="Name">
                                        <input type="text" class="signUpForm1__input" v-model="email" placeholder="Email">
                                        <input type="text" class="signUpForm1__input" v-model="phone" placeholder="Telephone number">
                                        <input type="text" class="signUpForm1__input" v-model="mobile" placeholder="Mobile phone">


                                        <div class="size-container">
                                            <select id="country" name="country" placeholder="Country" v-model="country_id" v-on:change="selectCountry(country_id);">
                                                <option v-for="country in countries" :label="country.title">{{country.id}}</option>
                                            </select>
                                        </div>

                                        <input type="text" class="signUpForm1__input" v-model="postal" placeholder="Postal Code or City">

                                        <div class="size-container">
                                            <select id="region" v-model="region_id" name="region" >
                                                <option v-bind=region v-for="region in regions" :label="region.title">{{region.id}}</option>
                                            </select>
                                        </div>
                                        <div class="size-container size-container-expertise">
                                            <button type="button" class="btn-default">
                                    <span>
                                       Your areas of expertise
                                    </span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="close-ddrop">x</a>
                                                <ul class="dropdown-list">
                                                    <li class="dropdown-item">
                                                        <a href="#">
                                                            <span class="glyphicon equipment"></span>
                                                            <span class="text">
                                                Home equipment
                                             </span>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">
                                                            <span class="glyphicon demenagement"></span>
                                                            <span class="text">
                                                Moving
                                             </span>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">
                                                            <span class="glyphicon vehicle"></span>
                                                            <span class="text">
                                                Vehicle
                                             </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>




                                        <input type="text" class="signUpForm1__input" v-model="username"  placeholder="Username">
                                        <input type="text" class="signUpForm1__input" v-model="password" placeholder="Password">
                                        <input type="text" class="signUpForm1__input"  v-model="password_confimation" placeholder="Confirm password">
                                    </div>

                                    <div class="form-text">
                                        By clicking on register, I accept the <a href="#">General conditions</a> of FretBay.com.
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
        </div>
    </section>
</template> 
<script>
    export default {
        data() {
            return {
                countries: [],
                country_id: 0,
                regions: [],
                company_name: "",
                first_name:"",
                name:"",
                email:"",
                phone:"",
                mobile:"",
                postal:"",
                region_id:"",
                area_of_expertise:"",
                username:"",
                password:"",
                password_confimation:""
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
            }
        }
    }
</script>
