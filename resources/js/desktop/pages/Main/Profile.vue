<template>
<!--    <div class="container">-->
    <div>
        <div class="container">
            <div class="row w-100 mx-auto my-5" style="min-height:100vh;">
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-body px-1 px-sm-3">
                            <div class="row w-100 mx-auto">
                                <div class="col-md-8 col-sm-8">
                                    <h2 class="card-title mb-2"><strong>{{fullName}}</strong></h2>
                                    <div class="row w-100 mx-auto mb-3 align-items-center">
                                        <div class="col-12 p-0 ">
                                            <div class="row w-100 mx-auto align-items-center" v-if="info.is_approved">
                                                <img src="/images/profile/approved.png" class="mr-1" style="width: 25px; height: 25px" alt="Approved">
                                                <span class="text-uppercase" style="font-size:14px">Profile verified and certified by AlloTrans</span>
                                            </div>
                                            <div class="row w-100 mx-auto align-items-center" v-if="!info.is_approved">
                                                <img src="/images/profile/not_approved.png" class="mr-1" style="width: 25px; height: 25px" alt="Not approved">
                                                <span class="text-uppercase" style="font-size:14px">Profile is not verified</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px"><strong>Member since</strong></p>
                                    <p class="mb-1 text-dark">{{info.created_at | moment("DD.MM.YYYY")}}</p>
                                    <p class="mb-1 text-dark">  <star-rating v-model="user.computed_rating" :show-rating="false" :read-only="true"/></p>
                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px" v-if="info.payment_methods.length>0"><strong>Accepted payment methods</strong></p>
                                    <div class="row w-100 m-auto" v-if="info.payment_methods.length>0">
                                        <span class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2" v-for="pay in info.payment_methods">
                                            {{pay}}
                                        </span>
                                    </div>
                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px" v-if="info.transport_specialities&&info.transport_specialities.length>0"><strong>Transport specialties</strong></p>
                                    <div class="row w-100 m-auto" v-if="info.transport_specialities&&info.transport_specialities.length>0">
                                        <span class="u-label u-label--xs u-label--primary text-uppercase letter-spacing-0_06 mr-2 mb-2" v-for="category in info.transport_specialities">
                                            {{category.title}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <img class="btn-md" v-lazy="info.avatar"
                                         alt="" style="border-radius:50%; width:200px; height:200px; object-fit:contain">
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 text-center">
                                    <h2 class="mb-0 mt-2" style="line-height:1;"><strong>{{info.vehicles_count}}</strong></h2>
                                    <p><small>Vehicles</small></p>
<!--                                    <button class="btn btn-primary btn-block btn-md"><span class="fa fa-facebook-square"></span> Like  </button>-->
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 text-center">
                                    <h2 class="mb-0 mt-2" style="line-height:1;"><strong>1.4K</strong></h2>
                                    <p><small>Reviews</small></p>
<!--                                    <button class="btn btn-success btn-block btn-md"><span class="fa fa-twitter-square"></span> Tweet </button>-->
                                </div>
                                <div class="col-4 col-md-4 col-sm-4 text-center">
                                    <h2 class="mb-0 mt-2" style="line-height:1;"><strong>3.8K</strong></h2>
                                    <p><small>Orders</small></p>
<!--                                    <button type="button" class="btn btn-danger btn-block btn-md"><span class="fa fa-google-plus-square"></span> Follow </button>-->
                                </div>
                                <div class="col-12">
                                    <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link btn btn-outline-primary w-100 active" id="pills-company-tab" data-toggle="pill"
                                                    data-target="#pills-company" type="button" role="tab"
                                                    aria-controls="pills-company" aria-selected="true"
                                            >
                                                Company
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link btn btn-outline-primary w-100" id="pills-vehicles-tab" data-toggle="pill"
                                                    data-target="#pills-vehicles" type="button" role="tab"
                                                    aria-controls="pills-vehicles" aria-selected="true"
                                            >
                                                Vehicles
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link btn btn-outline-primary w-100" id="pills-reviews-tab" data-toggle="pill"
                                                    data-target="#pills-reviews" type="button" role="tab"
                                                    aria-controls="pills-reviews" aria-selected="false"
                                            >
                                                Reviews
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
                                            <div class="card my-2">
                                                <div class="card-body">
                                                    <div class="row m-auto w-100">
                                                        <div class="col-sm-12 px-0 px-sm-2">
                                                            <div class="form-group">
                                                                <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px"><strong>Company name</strong></p>
                                                                <span>{{info.company_name}}</span>
                                                                <p class="mb-0" v-if="info.company_name===''">This user has not specified company name yet.</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px"><strong>About my company</strong></p>
                                                                <span> {{info.about_company}}</span>
                                                                <p class="mb-0" v-if="info.about_company===''">This user has not specified information about the company yet.</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px"><strong>Additional services</strong></p>
                                                                <span>
                                                                    {{info.additional_service}}
                                                                </span>
                                                                <p class="mb-0" v-if="info.additional_service === ''">
                                                                    This user has not specified additional services yet.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-vehicles" role="tabpanel" aria-labelledby="pills-vehicles-tab">
                                            <div class="row w-100 m-auto align-items-center justify-content-center"
                                                 style="min-height: 100px"
                                                 v-if="info.vehicles.length===0"
                                            >
                                                <p class="mb-0">This user has not specified vehicles yet.</p>
                                            </div>
                                            <div class="row mx-auto w-100" v-for="(vehicle, index) in info.vehicles" v-if="info.vehicles.length>0">
                                                <div class="card w-100 h-100 my-2">
                                                    <div class="card-body">
                                                        <div class="row mx-auto w-100 align-items-center text-center">
                                                            <div class="col-12 col-md-2 px-0 px-sm-1 px-md-2">
                                                                <img v-if="vehicle.images[0]" v-lazy="vehicle.images[0]" alt="Vehicle" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover">
                                                                <img v-else v-lazy="" alt="Vehicle" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover">
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-md-3 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">Brand</p>
                                                                {{vehicle.brand}}
                                                            </div>
                                                            <div class="col-6 col-md-2 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">Model</p>
                                                                {{vehicle.model}}
                                                            </div>
                                                            <div class="col-6 col-md-2 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">Cubing</p>
                                                                {{vehicle.cubing}}
                                                            </div>
                                                            <div class="col-12 col-md-3 px-0 px-sm-1 px-md-2">
                                                                <p class="d-flex inform-box mb-0 justify-content-center">Total laden weight</p>
                                                                {{vehicle.total_laden_weight}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                            <transporter-reviews-component/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <section class="main-body" style="min-height:100vh; margin-top:100px">-->
<!--            <div class="row w-100 mx-auto mt-8 h-100 gutters-sm">-->
<!--                <div class="col-12 col-md-4 mb-3">-->
<!--                    <div class="card">-->
<!--                        <div class="card-body">-->
<!--                            <div class="d-flex flex-column align-items-center">-->
<!--                                <img v-lazy="info.avatar" alt="Admin" class="rounded-circle text-center" width="150">-->
<!--                                <div class="mt-3">-->
<!--                                    <h4 class="text-center">{{info.name}}</h4>-->
<!--                                    <div class="row w-100 mx-auto my-1 align-items-center">-->
<!--                                        <div class="col-12 p-0 ">-->
<!--                                            <div class="row w-100 mx-auto align-items-center justify-content-center" v-if="info.is_approved">-->
<!--                                                <img src="/images/profile/approved.png" class="mx-1" style="width: 25px; height: 25px" alt="Approved">-->
<!--                                                <span class="text-uppercase" style="font-size:12px">Profile verified and certified by AlloTrans</span>-->
<!--                                            </div>-->
<!--                                            <div class="row w-100 mx-auto align-items-center justify-content-center" v-if="!info.is_approved">-->
<!--                                                <img src="/images/profile/not_approved.png" class="mx-1" style="width: 25px; height: 25px" alt="Not approved">-->
<!--                                                <span class="text-uppercase" style="font-size:14px">Profile is not verified</span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px">Member since</p>-->
<!--                                    <p class="mb-1">{{info.created_at | moment("DD.MM.YYYY")}}</p>-->
<!--                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px">Languages spoken</p>-->
<!--                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px" v-if="info.payment_methods.length>0">Accepted payment methods</p>-->
<!--                                    <div class="row w-100 m-auto" v-if="info.payment_methods.length>0">-->
<!--                                        <span class="u-label u-label&#45;&#45;xs u-label&#45;&#45;primary text-uppercase letter-spacing-0_06 mr-2 mb-2" v-for="pay in info.payment_methods">-->
<!--                                            {{pay}}-->
<!--                                        </span>-->
<!--                                    </div>-->
<!--                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px" v-if="info.transport_specialities&&info.transport_specialities.length>0">Transport specialties</p>-->
<!--                                    <div class="row w-100 m-auto" v-if="info.transport_specialities&&info.transport_specialities.length>0">-->
<!--                                        <span class="u-label u-label&#45;&#45;xs u-label&#45;&#45;primary text-uppercase letter-spacing-0_06 mr-2 mb-2" v-for="category in info.transport_specialities">-->
<!--                                            {{category.title}}-->
<!--                                        </span>-->
<!--                                    </div>-->

<!--                                    <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px">Address</p>-->
<!--                                    <p class="font-size-sm">{{fullAddress}}</p>-->

<!--                                    &lt;!&ndash;                                    <p class="text-muted font-size-sm" v-if="profile.company_name.length>0">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        {{profile.company_name}}&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    </p>&ndash;&gt;-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="col-12 col-md-8">-->
<!--                    <div class="card mb-3">-->
<!--                        <div class="card-body">-->
<!--                            &lt;!&ndash;                            <h2>Company introduction</h2>&ndash;&gt;-->
<!--                            <div class="row m-auto w-100">-->
<!--                                <div class="col-sm-12 px-0 px-sm-2">-->
<!--                                    <div class="form-group">-->
<!--                                        &lt;!&ndash;                                        <h6 class="text-lg">Company name</h6>&ndash;&gt;-->
<!--                                        <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px">Company name</p>-->
<!--                                        {{info.company_name}}-->
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                        <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px">About my company</p>-->
<!--                                        &lt;!&ndash;                                        <h6 class="text-lg">About my company</h6>&ndash;&gt;-->
<!--                                        {{info.about_company}}-->
<!--                                        &lt;!&ndash;                                        <textarea class="form-control"&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                                  rows="4" v-model="profile.about_company"&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                                  disabled>&ndash;&gt;-->

<!--                                        &lt;!&ndash;                                        </textarea>&ndash;&gt;-->
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                        &lt;!&ndash;                                        <h6 class="text-lg">Additional services</h6>&ndash;&gt;-->
<!--                                        <p class="text-secondary mb-1 text-uppercase letter-spacing-0_06" style="font-size: 10px">Additional services</p>-->

<!--                                        {{info.additional_service}}-->
<!--                                        &lt;!&ndash;                                        <textarea class="form-control"&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                                  rows="4"&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                                  v-model="profile.additional_service"&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                                  disabled&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                        >&ndash;&gt;-->
<!--                                        &lt;!&ndash;                                        </textarea>&ndash;&gt;-->
<!--                                    </div>-->
<!--                                    &lt;!&ndash;                                    <div class="form-group row">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    <label for="" class="col-sm-6 text-lg lh-40">Insurance company</label>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    <div class="col-sm-6">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <input type="text" :value="profile.insurance_company"&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                               class="form-control-empty form-control" placeholder="1234567890" disabled>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    <div class="form-group row">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <label for="" class="col-sm-6 text-lg">Cargo insurance amount</label>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        <div class="col-sm-6 input-has-icon-right position-relative">&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <input type="text" class="form-control-empty form-control"&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                                   :value="profile.cargo_insurance_amount" placeholder="0" disabled>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                            <span class="price-symbol position-absolute" style="top: 25%;right: 5%;">€</span>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            &lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <h6 class="mb-0">Full Name</h6>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-9 text-secondary">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    {{fullName}}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <hr>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <h6 class="mb-0">Email</h6>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-9 text-secondary">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    {{user.email}}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <hr>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <h6 class="mb-0">Phone number</h6>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-9 text-secondary">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    {{profile.telephone_number_1}}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <hr>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <div class="row" v-if="profile.telephone_number_2 !=='' || profile.telephone_number_2 !==null">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <h6 class="mb-0">Phone number 2</h6>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-9 text-secondary">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    {{profile.telephone_number_2}}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <hr>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            <div class="row">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-3">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    <h6 class="mb-0">Address</h6>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                                <div class="col-sm-9 text-secondary">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                    {{fullAddress}}&ndash;&gt;-->
<!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            &lt;!&ndash;                    <div class="row">&ndash;&gt;-->
<!--            &lt;!&ndash;                        <div class="col-md-12">&ndash;&gt;-->
<!--            &lt;!&ndash;                            <div class="card mb-3">&ndash;&gt;-->
<!--            &lt;!&ndash;                                <div class="card-body">&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <h2>Company details</h2>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <div class="row m-auto w-100">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <div class="col-sm-12 px-0 px-sm-2">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <div class="form-group">&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <label for="" class="text-lg">Company name</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <input type="text" :value="user.profile.company_name"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                       class="form-control form-control-img-lock" placeholder="company" disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <div class="form-group">&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <label for="" class="text-lg">Address</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <input type="text" :value="user.profile.address"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                       class="form-control-empty form-control" placeholder="address" disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <div class="form-group">&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <label for="" class="text-lg">Phone number</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <input type="text" :value="user.profile.telephone_number_1"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                       class="form-control form-control-img-lock" placeholder="1234567890" disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <div class="form-group">&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <label for="" class="text-lg">Mobile phone number</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <input type="text" :value="user.profile.telephone_number_2"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                       class="form-control form-control-img-lock"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                       placeholder="1234567890" disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            <div class="row">&ndash;&gt;-->
<!--            &lt;!&ndash;                <div class="col-md-12">&ndash;&gt;-->
<!--            &lt;!&ndash;                    <div class="card mb-3">&ndash;&gt;-->
<!--            &lt;!&ndash;                        <div class="card-body">&ndash;&gt;-->
<!--            &lt;!&ndash;                            <h2>Company introduction</h2>&ndash;&gt;-->
<!--            &lt;!&ndash;                            <div class="row m-auto w-100">&ndash;&gt;-->
<!--            &lt;!&ndash;                                <div class="col-sm-12 px-0 px-sm-2">&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <label for="" class="text-lg">About my company</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <textarea class="form-control"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                  rows="4" v-model="profile.about_company"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                  disabled>&ndash;&gt;-->

<!--            &lt;!&ndash;                                        </textarea>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <div class="form-group">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <label for="" class="text-lg">Additional services</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <textarea class="form-control"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                  rows="4"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                  v-model="profile.additional_service"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                  disabled&ndash;&gt;-->
<!--            &lt;!&ndash;                                        >&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </textarea>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                    <div class="form-group row">&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                    <label for="" class="col-sm-6 text-lg lh-40">Insurance company</label>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                    <div class="col-sm-6">&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                        <input type="text" :value="profile.insurance_company"&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                               class="form-control-empty form-control" placeholder="1234567890" disabled>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                    </div>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                </div>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                    <div class="form-group row">&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                        <label for="" class="col-sm-6 text-lg">Cargo insurance amount</label>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                        <div class="col-sm-6 input-has-icon-right position-relative">&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                            <input type="text" class="form-control-empty form-control"&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                                   :value="profile.cargo_insurance_amount" placeholder="0" disabled>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                            <span class="price-symbol position-absolute" style="top: 25%;right: 5%;">€</span>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                        </div>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;&lt;!&ndash;                                    </div>&ndash;&gt;&ndash;&gt;-->
<!--            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            <div class="row">&ndash;&gt;-->
<!--            &lt;!&ndash;                <div class="col-md-12">&ndash;&gt;-->
<!--            &lt;!&ndash;                    <div class="card mb-3">&ndash;&gt;-->
<!--            &lt;!&ndash;                        <div class="card-body">&ndash;&gt;-->
<!--            &lt;!&ndash;                            <h2>Accepted payment method(s)</h2>&ndash;&gt;-->
<!--            &lt;!&ndash;                            <div class="row w-100 mx-auto">&ndash;&gt;-->
<!--            &lt;!&ndash;                                <div class="col-12 col-lg-8 col-md-12 px-0 px-sm-2">&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <div class="checkbox-list">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <input type="checkbox" id="credit_card"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   class="custom-control-input"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   :checked="check('payment_methods', 'credit_card')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   disabled&ndash;&gt;-->
<!--            &lt;!&ndash;                                            >&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <label class="custom-control-label" for="credit_card">Credit card</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->

<!--            &lt;!&ndash;                                        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <input type="checkbox" id="cashier_cheque"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   class="custom-control-input"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   :checked="check('payment_methods', 'cashier_cheque')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   disabled&ndash;&gt;-->
<!--            &lt;!&ndash;                                            >&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <label class="custom-control-label" for="cashier_cheque">Cashier's cheque</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <input type="checkbox" id="cheque"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   class="custom-control-input"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   :checked="check('payment_methods', 'cheque')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   disabled&ndash;&gt;-->
<!--            &lt;!&ndash;                                            >&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <label class="custom-control-label" for="cheque">Cheque</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <input type="checkbox" id="cash"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   class="custom-control-input"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   :checked="check('payment_methods', 'cash')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   disabled&ndash;&gt;-->
<!--            &lt;!&ndash;                                            >&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <label class="custom-control-label" for="cash">Cash</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <input type="checkbox" id="paypal"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   class="custom-control-input"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   :checked="check('payment_methods', 'paypal')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                   disabled&ndash;&gt;-->
<!--            &lt;!&ndash;                                            >&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <label class="custom-control-label" for="paypal">Paypal</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            <div class="row">&ndash;&gt;-->
<!--            &lt;!&ndash;                <div class="col-md-12">&ndash;&gt;-->
<!--            &lt;!&ndash;                    <div class="card mb-3">&ndash;&gt;-->
<!--            &lt;!&ndash;                        <div class="card-body">&ndash;&gt;-->
<!--            &lt;!&ndash;                            <h2>Spoken languages</h2>&ndash;&gt;-->

<!--            &lt;!&ndash;                            <div class="row w-100 mx-auto">&ndash;&gt;-->
<!--            &lt;!&ndash;                                <div class="col-12 col-lg-8 col-md-12 px-0 px-sm-2">&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <input type="checkbox" class="custom-control-input" id="english-lang"&ndash;&gt;-->
<!--            &lt;!&ndash;                                               :checked="check('spoken_languages', 'en')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                               disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <label class="custom-control-label" for="english-lang">English</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--            &lt;!&ndash;                                    <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <input type="checkbox" class="custom-control-input" id="german-lang"&ndash;&gt;-->
<!--            &lt;!&ndash;                                               :checked="check('spoken_languages', 'de')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                               disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <label class="custom-control-label" for="german-lang">German</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->

<!--            &lt;!&ndash;                                    <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <input type="checkbox" class="custom-control-input" id="franch-lang"&ndash;&gt;-->
<!--            &lt;!&ndash;                                               :checked="check('spoken_languages', 'fr')"&ndash;&gt;-->
<!--            &lt;!&ndash;                                               disabled>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <label class="custom-control-label" for="franch-lang">Francai</label>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            <div class="row">&ndash;&gt;-->
<!--            &lt;!&ndash;                <div class="col-md-12">&ndash;&gt;-->
<!--            &lt;!&ndash;                    <div class="card mb-3">&ndash;&gt;-->
<!--            &lt;!&ndash;                        <div class="card-body">&ndash;&gt;-->
<!--            &lt;!&ndash;                            <h2>Transport specialties</h2>&ndash;&gt;-->
<!--            &lt;!&ndash;                            <div class="list-transport-categories">&ndash;&gt;-->
<!--            &lt;!&ndash;                                <div class="row w-100 mx-auto">&ndash;&gt;-->
<!--            &lt;!&ndash;                                    <div class="col-12 col-sm-6 col-md-3 mb-2 px-0 px-sm-2" v-for="category in categories" v-if="check('transport_specialities', category.id)">&ndash;&gt;-->
<!--            &lt;!&ndash;                                        <div class="card text-dark">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <img alt="Card image" class="card-img" v-lazy="category.image"&ndash;&gt;-->
<!--            &lt;!&ndash;                                                 style="padding: 20px;">&ndash;&gt;-->
<!--            &lt;!&ndash;                                            <div class="card-img-overlay">&ndash;&gt;-->
<!--            &lt;!&ndash;                                                <h6 class="card-title">{{category.title}}</h6>&ndash;&gt;-->
<!--            &lt;!&ndash;                                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                            </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                        </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            &lt;!&ndash;                </div>&ndash;&gt;-->
<!--            &lt;!&ndash;            </div>&ndash;&gt;-->

<!--        </section>-->
    </div>

<!--    </div>-->

</template>
<script>

    import StarRating from "vue-star-rating";

    export default {

        props:['info'],
        components: { StarRating},
        data() {
            return {
                // section: 1
            }
        },
        created() {
            this.$store.dispatch('getUser').then(reps=>{
                console.log("USER=>",this.user)
            })


        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            fullAddress() {
                if(!this.info.country || this.info.country=='')
                {
                    return ''
                }
                return this.info.country + ","
                    + this.info.region;
            },
            fullName() {
                return this.info.first_name + " "
                    + this.info.second_name;
            },
        },
        methods: {
            // change(section) {
            //     console.log("section")
            //     this.section = section
            //     console.log(section)
            // },
            check(field_name, value) {
                if(this.info[field_name] == null) {
                    this.info[field_name] = [];
                }
                if(this.info[field_name] != null) {
                    let array = this.info[field_name];
                    let index = array.findIndex(item => item === value);
                    return index > -1;
                }
                return false;
            },
        }
    }
</script>
<style scoped>
    .btn{
        border-radius: 0;
    }
    .btn-md {
        border-width: 0;
        outline: none;
        border-radius: 0;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, .6);
        cursor: pointer;
    }
</style>
