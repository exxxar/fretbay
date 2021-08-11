<template>
    <div class="main-body mt-3">
        <div class="row gutters-sm">
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img v-lazy="user.avatar" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{user.name}}</h4>
                                <p class="text-secondary mb-1">{{user.created_at | moment("DD.MM.YYYY")}}</p>
                                <p class="text-muted font-size-sm">{{fullAddress}}</p>
                                <p class="text-muted font-size-sm" v-if="profile.company_name.length>0">
                                    {{profile.company_name}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
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
                                <button class="btn btn-outline-blue float-right" v-if="!editMode" @click="edit">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" v-if="editMode">
                    <ValidationObserver v-slot="{invalid}">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Avatar</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <upload-file v-model="edit_profile.new_avatar" ref="avatar">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload">Click to upload</button>
                                        </template>
                                        <template v-slot:filePlaceAdditional>
                                            <div class="row w-100 mt-2 mx-auto" v-if="avatar_is_removed == false && edit_profile.avatar !== 'users/default.png' && edit_profile.new_avatar==''">
                                                <div class="col-12 p-0">
                                                    <img class="preview" :src="edit_profile.avatar" style="width:100%; max-height:300px; object-fit: cover;" alt="">
                                                </div>
                                                <div class="col-12 p-0">
                                                    <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile">Remove</button>
                                                </div>
                                            </div>
                                        </template>
                                    </upload-file>
<!--                                    <input type="file" name="avatar" class="form-control" :disabled="loading">-->
<!--                                    <p class="small"><strong>Old:</strong> {{user.avatar}}</p>-->
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="First name" rules="required|alpha" v-slot="{ errors }">
                                        <input type="text" name="first_name" class="form-control"
                                               v-model="edit_profile.first_name" required>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Last name" rules="required|alpha" v-slot="{ errors }">
                                        <input type="text" name="second_name" class="form-control"
                                               v-model="edit_profile.second_name" required :disabled="loading">
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Email" rules="email" v-slot="{ errors }">
                                        <input type="email" name="email" class="form-control"
                                               v-model="edit_profile.email" :disabled="loading">
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone number 1</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Phone number 1" rules="numeric" v-slot="{ errors }">
                                        <input type="tel" name="telephone_number_1" class="form-control"
                                               v-model="edit_profile.telephone_number_1" :disabled="loading">
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone number 2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Phone number 2" rules="numeric" v-slot="{ errors }">
                                        <input type="tel" name="telephone_number_2" class="form-control"
                                               v-model="edit_profile.telephone_number_2" :disabled="loading">
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="js-form-message mb-3">
                                <div class="js-focus-state form">
                                    <!--                                <input type="text" class="form-control form__input" name="city"-->
                                    <!--                                       placeholder="Your city" required>-->
                                    <ValidationProvider name="City" rules="required" v-slot="{ errors }">
                                        <multiselect
                                            :disabled="cities.length===0"
                                            id="city" name="city"
                                            v-model="edit_profile.city"
                                            :options="cities"
                                            :option-height="25"
                                            placeholder="Your city"
                                            :show-labels="false"
                                            :maxHeight="200"
                                            label="title"
                                            track-by="id"
                                            :allow-empty="false"
                                            :searchable="true"
                                            :show-no-results="false"
                                            :internal-search="true"
                                            @search-change="getCities"
                                            :clear-on-select="false"
                                        >
                                            <template slot="option" slot-scope="props">
                                                <span class="option__title">{{ props.option.title }}</span>
                                                <div class="option__desc" style="font-size: 10px;">
                                                    <span class="option__title" v-if="props.option.area">{{ props.option.area }}</span>
                                                    <span v-if="props.option.area&&props.option.region">, </span>
                                                    <span class="option__small" v-if="props.option.region">{{ props.option.region }}</span>
                                                </div>
                                            </template>
                                        </multiselect>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Country" rules="" v-slot="{ errors }">
<!--                                        <input type="text" name="country" class="form-control"-->
<!--                                               v-model="edit_profile.country" :disabled="loading">-->
                                        <multiselect
                                            :disabled="countries.length==0||loading"
                                            v-model="edit_profile.country"
                                            :options="countries"
                                            :option-height="25"
                                            placeholder="Country"
                                            :show-labels="false"
                                            :maxHeight="200"
                                            label="title"
                                            track-by="id"
                                            :allow-empty="false"
                                            :searchable="true"
                                            :loading="countries_loading"
                                            @input="getRegions"
                                        >
                                        </multiselect>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Region</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Region" rules="" v-slot="{ errors }">
<!--                                        <input type="text" name="region" class="form-control"-->
<!--                                               v-model="edit_profile.region" :disabled="loading">-->
                                        <input v-if="regionInputMode" type="text" class="form-control" name="region"
                                               placeholder="Your region" v-model="edit_profile.region.title" required>
                                        <multiselect
                                            v-if="!regionInputMode"
                                            :disabled="regions.length==0||loading"
                                            v-model="edit_profile.region"
                                            :options="regions"
                                            :option-height="25"
                                            placeholder="Region"
                                            :show-labels="false"
                                            :maxHeight="200"
                                            label="title"
                                            track-by="id"
                                            :allow-empty="false"
                                            :searchable="true"
                                            :loading="regions_loading"
                                            @input="chooseRegion"
                                        >
                                        </multiselect>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="City" rules="alpha" v-slot="{ errors }">
                                        <input type="text" name="city" class="form-control"
                                               v-model="edit_profile.city" :disabled="loading">
                                        <multiselect
                                            :disabled="cities.length===0"
                                            v-model="edit_profile.city"
                                            :options="cities"
                                            :option-height="25"
                                            placeholder="Your city"
                                            :show-labels="false"
                                            :maxHeight="200"
                                            label="title"
                                            track-by="id"
                                            :allow-empty="false"
                                            :searchable="true"
                                            :show-no-results="false"
                                            :internal-search="true"
                                            @search-change="getCities"
                                            :clear-on-select="false"
                                        >
                                            <template slot="option" slot-scope="props">
                                                <span class="option__title">{{ props.option.title }}</span>
                                                <div class="option__desc" style="font-size: 10px;">
                                                    <span class="option__title" v-if="props.option.area">{{ props.option.area }}</span>
                                                    <span v-if="props.option.area&&props.option.region">, </span>
                                                    <span class="option__small" v-if="props.option.region">{{ props.option.region }}</span>
                                                </div>
                                            </template>
                                        </multiselect>
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Postal</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <ValidationProvider name="Postal" rules="" v-slot="{ errors }">
                                        <input type="text" name="postal" class="form-control"
                                               v-model="edit_profile.postal" :disabled="loading">
                                        <p class="mb-0" style="color:red;font-size:11px">{{errors[0]}}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 text-secondary">
                                    <div class="row w-100 mx-auto justify-content-end">
                                        <button class="btn btn-outline-blue mx-1" :disabled="loading" @click="editMode=false">Cancel</button>
                                        <button class="btn btn-primary px-4 mx-1" :disabled="invalid||loading" @click="update">
                                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ValidationObserver>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UploadFile from "../../../components/UploadFile";
    export default {
        components: {UploadFile},
        data(){
          return {
              editMode:false,
              edit_profile:{
                  new_avatar:'',
                  deleted_avatar:'',
                  first_name:'',
                  second_name:'',
                  email:'',
                  telephone_number_1:'',
                  telephone_number_2:'',
                  country:'',
                  region:'',
                  city:'',
                  postal:'',
              },
              loading:false,
              avatar_is_removed:false,
              countries: [],
              regions: [],
              cities:[],
              countries_loading: false,
              regions_loading: false,
              cities_loading: false,
              regionInputMode: false
          }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            profile() {
                return this.$store.getters.profile
            },
            fullAddress() {
                if(!this.profile.country || this.profile.country==='' || this.profile.country.title==='')
                {
                    return ''
                }
                return this.profile.country.title + ","
                    + this.profile.region.title + ","
                    + this.profile.city.title + ","
                    + this.profile.postal;
            },
            fullName() {
                return this.profile.first_name + " "
                    + this.profile.second_name;
            },
        },
        mounted() {

        },
        methods: {
            edit() {
                this.edit_profile.new_avatar = '';
                this.edit_profile.deleted_avatar = '';
                this.edit_profile.avatar = this.user.avatar;
                this.edit_profile.first_name = this.profile.first_name;
                this.edit_profile.second_name = this.profile.second_name;
                this.edit_profile.email = this.user.email;
                this.edit_profile.telephone_number_1 = this.profile.telephone_number_1;
                this.edit_profile.telephone_number_2 = this.profile.telephone_number_2;
                // this.edit_profile.address = this.profile.address;
                this.edit_profile.country = this.profile.country;
                this.edit_profile.region = this.profile.region;
                this.edit_profile.city = this.profile.city;
                this.edit_profile.postal = this.profile.postal;
                this.editMode = true;
                this.avatar_is_removed = false;
            },
            async update() {
                this.loading = true;
                let formData = new FormData();
                // formData.append('id', this.user.id);
                // let key;
                // for (key in this.edit_profile) {
                //     formData.append(key, this.edit_profile[key]);
                // }
                // formData.append("profile", JSON.stringify(this.edit_profile));
                formData.append("profile_id", this.profile.id);
                formData.append("new_avatar", this.edit_profile.new_avatar);
                formData.append("avatar", this.edit_profile.avatar);
                formData.append("deleted_avatar", this.edit_profile.deleted_avatar);
                formData.append("first_name", this.edit_profile.first_name);
                formData.append("second_name", this.edit_profile.second_name);
                formData.append("email", this.edit_profile.email);
                formData.append("telephone_number_1", this.edit_profile.telephone_number_1);
                formData.append("telephone_number_2", this.edit_profile.telephone_number_2);
                formData.append("country", this.edit_profile.country);
                formData.append("region", this.edit_profile.region);
                formData.append("city", this.edit_profile.city);
                formData.append("postal", this.edit_profile.postal);

                await axios.post('/transporter/profile/edit', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(resp => {
                    this.$store.commit('setUser', resp.data.user);
                    this.editMode = false;
                    this.loading = false;
                }).catch(error => {
                    console.log(error);
                    this.loading = false;
                    this.editMode = false;
                });
            },
            removeFile() {
                this.edit_profile.deleted_avatar = this.edit_profile.avatar;
                this.edit_profile.avatar = '';
                this.avatar_is_removed = true;
            },
            startUpload() {
                this.$refs.avatar.startUpload();
            },
            chooseRegion() {
                this.edit_profile.city = null;
                this.getCities()
            },
            async getCities(query='null'){
                if(typeof query === 'object') {
                    query='null';
                }
                this.cities_loading = true;
                let locale = localStorage.getItem('locale') || 'en';
                if(query==='null')
                {
                    await axios.get("/api/locations/cities/"+this.edit_profile.country.id+'/'+this.edit_profile.region.id+'/'+locale+'/'+query).then(resp=>{
                        this.cities = resp.data;
                        this.cities_loading = false;
                    })
                }
                else {
                    if(query!=='' && query.length>2){
                        await axios.get("/api/locations/cities/"+this.edit_profile.country.id+'/'+this.edit_profile.region.id+'/'+locale+'/'+query).then(resp=>{
                            this.cities = resp.data;
                            this.cities_loading = false;
                        })
                    }
                }
            },
            async getRegions(){
                this.regions_loading = true;
                let locale = localStorage.getItem('locale') || 'en';
                this.edit_profile.region = null;
                this.edit_profile.city = null;
                await axios.get("/api/locations/regions/"+this.edit_profile.country.id+'/'+locale).then(resp=>{
                    this.regions = resp.data;
                    this.regionInputMode = false;
                    if (this.regions.length === 0) {
                        this.regionInputMode = true;
                        this.edit_profile.region = {id:'null', title:''};
                        this.getCities('null');
                    }
                    this.regions_loading = false;
                })
            },
            async getCountries(){
                this.countries_loading = true;
                let locale = localStorage.getItem('locale') || 'en';
                await axios.get("/api/locations/countries/"+locale).then(resp=>{
                    this.countries = resp.data;
                    this.countries_loading = false;
                })
            },
        }
    }
</script>
