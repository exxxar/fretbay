<template>
    <div class="container" style="padding-top: 130px;">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img v-lazy="user.avatar" alt="Admin" class="rounded-circle avatar-img" width="150">
                                <div class="mt-3">
                                    <h4>{{user.name}}</h4>
                                    <p class="text-secondary mb-1">{{user.created_at}}</p>
                                    <p class="text-muted font-size-sm">{{fullAddress}}</p>
                                    <p class="text-muted font-size-sm" v-if="profile.company_name.length>0">
                                        {{profile.company_name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <slot name="any-error"></slot>

                    <div class="card mb-3" v-if="!editMode">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{fullName}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{user.email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone number 1</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{profile.telephone_number_1}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone number 2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{profile.telephone_number_2}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{fullAddress}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " v-if="!editMode" @click="editMode=true" href="#">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="card  mb-3" v-if="editMode" action="/customer/profile/update" method="post" enctype="multipart/form-data">

                        <input name="_method" type="hidden" value="PUT">



                        <slot name="csrf"></slot>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Avatar</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="avatar" class="form-control">
                                    <p class="small"><strong>Old:</strong> {{user.avatar}}</p>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="first_name" class="form-control"
                                           :value="profile.first_name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Second name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="second_name" class="form-control"
                                           :value="profile.second_name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" :value="user.email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone number 1</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="tel" name="telephone_number_1" class="form-control" :value="profile.telephone_number_1">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone number 2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="tel" name="telephone_number_2" class="form-control" :value="profile.telephone_number_2">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" class="form-control" :value="profile.address">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Region</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="region" class="form-control" :value="profile.region">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="city" class="form-control" :value="profile.city">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Postal</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="postal" class="form-control" :value="profile.postal">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                   <button class="btn btn-outline-blue" @click="editMode=false">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editMode: false
            }
        },
        computed: {
            fullAddress() {
                return this.profile.country + ","
                    + this.profile.region + ","
                    + this.profile.address;

            },

            fullName() {
                return this.profile.first_name + " "
                    + this.profile.second_name;

            },

            profile() {
                return this.user.profile
            },
            user() {
                return window.user
            }
        },
    }
</script>

<style lang="scss" scoped>
    .avatar-img {
        min-height: 200px;
        object-fit: contain;
    }
</style>
