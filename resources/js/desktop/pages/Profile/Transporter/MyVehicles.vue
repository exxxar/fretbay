<template>
    <div class="main-body mt-3">

        <!-- Modal -->
        <div class="modal fade" id="add-vehicle" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="newVehicleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label class="text-lg">{{$trans('profile.vehicles.label_1')}}</label>
                                        <div class="custom-select-menu">
                                            <div class="form-group">
                                                <!--                                                <div class="dropdown">-->
                                                <!--                                                    <a href="#" class="dropdown-toggle form-control form-control-empty">-->
                                                <!--                                                        ...-->
                                                <!--                                                    </a>-->
                                                <!--                                                    <ul class="list-stripped dropdown-menu">-->
                                                <!--                                                        <li>-->
                                                <!--                                                            <label for="car" class="vcheck vradio">-->
                                                <!--                                                                <input type="radio" name="truckTypes" id="car" value="1">-->
                                                <!--                                                                <span>Car</span>-->
                                                <!--                                                            </label>-->
                                                <!--                                                        </li>-->
                                                <!--                                                        <li>-->
                                                <!--                                                            <label for="van" class="vcheck vradio">-->
                                                <!--                                                                <input type="radio" name="truckTypes" id="van" value="2">-->
                                                <!--                                                                <span>Van</span>-->
                                                <!--                                                            </label>-->
                                                <!--                                                        </li>-->
                                                <!--                                                        <li>-->
                                                <!--                                                            <label for="truck_without_tailgate" class="vcheck vradio">-->
                                                <!--                                                                <input type="radio" name="truckTypes" id="truck_without_tailgate" value="3">-->
                                                <!--                                                                <span>Truck without tailgate</span>-->
                                                <!--                                                            </label>-->
                                                <!--                                                        </li>-->
                                                <!--                                                        <li>-->
                                                <!--                                                            <label for="truck_with_tailgate" class="vcheck vradio">-->
                                                <!--                                                                <input type="radio" name="truckTypes" id="truck_with_tailgate" value="4">-->
                                                <!--                                                                <span>Truck with tailgate</span>-->
                                                <!--                                                            </label>-->
                                                <!--                                                        </li>-->
                                                <!--                                                        <li>-->
                                                <!--                                                            <label for="5T_truck" class="vcheck vradio">-->
                                                <!--                                                                <input type="radio" name="truckTypes" id="5T_truck" value="5">-->
                                                <!--                                                                <span>5T Truck</span>-->
                                                <!--                                                            </label>-->
                                                <!--                                                        </li>-->
                                                <!--                                                    </ul>-->
                                                <!--                                                </div>-->
                                                <select class="form-select form-control form-control-empty input-lg" aria-label="Type select" v-model="new_vehicle.type">
                                                    <option value="Car" selected>{{$trans('profile.vehicles.select_option_1')}}</option>
                                                    <option value="Van">{{$trans('profile.vehicles.select_option_2')}}</option>
                                                    <option value="Truck without tailgate">{{$trans('profile.vehicles.select_option_3')}}</option>
                                                    <option value="Truck with tailgate">{{$trans('profile.vehicles.select_option_4')}}</option>
                                                    <option value="5T Truck">{{$trans('profile.vehicles.select_option_5')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label for="brand" class="text-lg">{{$trans('profile.vehicles.label_2')}}</label>
                                        <ValidationProvider name="Brand" rules="required" v-slot="{ errors }">
                                            <input id="brand" type="text" placeholder="Car brand"
                                                   v-model="new_vehicle.brand" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label for="model" class="text-lg">{{$trans('profile.vehicles.label_3')}}</label>
                                        <ValidationProvider name="Model" rules="required" v-slot="{ errors }">
                                            <input id="model" type="text" placeholder="Car model"
                                                   v-model="new_vehicle.model" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label for="plate_number" class="text-lg">{{$trans('profile.vehicles.label_4')}}</label>
                                        <ValidationProvider name="Plate number" rules="required" v-slot="{ errors }">
                                            <input id="plate_number" type="text" placeholder="Car plate number"
                                                   v-model="new_vehicle.plate_number" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label for="cubing" class="text-lg">{{$trans('profile.vehicles.label_5')}}</label>
                                        <ValidationProvider name="Cubing" rules="required|numeric" v-slot="{ errors }">
                                            <input id="cubing" type="number"
                                                   v-model="new_vehicle.cubing" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label for="total_laden_weight" class="text-lg">{{$trans('profile.vehicles.label_6')}}</label>
                                        <ValidationProvider name="Plate number" rules="required|numeric" v-slot="{ errors }">
                                            <input id="total_laden_weight" type="number" placeholder="Car weight"
                                                   v-model="new_vehicle.total_laden_weight" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!--                                    <upload-file v-model="image"></upload-file>-->
                                    <label class="text-lg">{{$trans('profile.vehicles.label_7')}}</label>
                                    <!--                                    todo: rule to check number of files-->
                                    <ValidationProvider name="Images" rules="required" v-slot="{ errors }">
                                        <multi-upload-files ref="new_upload" :files="new_vehicle.images" >
                                            <template v-slot:uploadButton>
                                                <button class="btn btn-primary w-100" @click="startNewUpload">{{$trans('profile.vehicles.button_1')}}</button>
                                            </template>
                                        </multi-upload-files>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-blue" data-dismiss="modal" :disabled="loading">{{$trans('profile.vehicles.button_2')}}</button>
                                <button class="btn btn-primary vehicle-save-button" :disabled="invalid||loading" @click="createVehicle">
                                    <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{$trans('profile.vehicles.button_3')}}
                                </button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit-vehicle" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editVehicleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label class="text-lg">{{$trans('profile.vehicles.label_1')}}</label>
                                        <div class="custom-select-menu">
                                            <div class="form-group">
                                                <select class="form-select form-control form-control-empty input-lg" aria-label="Type select" v-model="edit_vehicle.type">
                                                    <option value="Car">{{$trans('profile.vehicles.select_option_1')}}</option>
                                                    <option value="Van">{{$trans('profile.vehicles.select_option_2')}}</option>
                                                    <option value="Truck without tailgate">{{$trans('profile.vehicles.select_option_3')}}</option>
                                                    <option value="Truck with tailgate">{{$trans('profile.vehicles.select_option_4')}}</option>
                                                    <option value="5T Truck">{{$trans('profile.vehicles.select_option_5')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label for="edit_brand" class="text-lg">{{$trans('profile.vehicles.label_2')}}</label>
                                        <ValidationProvider name="Brand" rules="required" v-slot="{ errors }">
                                            <input id="edit_brand" type="text"
                                                   v-model="edit_vehicle.brand" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label for="edit_model" class="text-lg">{{$trans('profile.vehicles.label_3')}}</label>
                                        <ValidationProvider name="Model" rules="required" v-slot="{ errors }">
                                            <input id="edit_model" type="text"
                                                   v-model="edit_vehicle.model" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="from-group">
                                        <label for="edit_plate_number" class="text-lg">{{$trans('profile.vehicles.label_4')}}</label>
                                        <ValidationProvider name="Plate number" rules="required" v-slot="{ errors }">
                                            <input id="edit_plate_number" type="text"
                                                   v-model="edit_vehicle.plate_number" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label for="edit_cubing" class="text-lg">{{$trans('profile.vehicles.label_5')}}</label>
                                        <ValidationProvider name="Cubing" rules="required|numeric" v-slot="{ errors }">
                                            <input id="edit_cubing" type="text"
                                                   v-model="edit_vehicle.cubing" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="from-group">
                                        <label for="edit_total_laden_weight" class="text-lg">{{$trans('profile.vehicles.label_6')}}</label>
                                        <ValidationProvider name="Plate number" rules="required|numeric" v-slot="{ errors }">
                                            <input id="edit_total_laden_weight" type="text"
                                                   v-model="edit_vehicle.total_laden_weight" class="form-control form-control-empty input-lg">
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label class="text-lg">{{$trans('profile.vehicles.label_7')}}</label>
                                    <ValidationProvider name="Images" rules="required" v-slot="{ errors }">
                                        <div class="row w-100 mx-auto mb-2">

<!--                                            <div v-for="(file, key) in edit_vehicle.images" class="col-md-4 col-sm-6 col-12">-->
<!--                                                <div class="card">-->
<!--                                                    <div class="card-body px-md-2 text-center">-->
<!--                                                        <img class="preview mx-auto" v-lazy="file"-->
<!--                                                             style="width:100%; max-height:300px; object-fit: cover;" alt="">-->
<!--                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key)">Remove</button>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <multi-upload-files ref="edit_upload" :files="new_images">
                                                <template v-slot:uploadButton>
                                                    <button class="btn btn-primary w-100" @click="startUpload">{{$trans('profile.vehicles.button_1')}}</button>
                                                </template>
                                                <template v-slot:filesListAdditional>
                                                    <div v-for="(file, key) in edit_vehicle.images" class="col-12" v-if="edit_vehicle.images.length>0">
                                                        <div class="card w-100">
                                                            <img class="card-img-top preview mx-auto" v-lazy="file"
                                                                 style="width:100%; height:150px; object-fit: cover;" alt="">
                                                            <div class="card-body px-md-2 text-center">
                                                                <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key)">{{$trans('profile.vehicles.button_4')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </multi-upload-files>
                                        </div>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-blue" data-dismiss="modal" :disabled="loading">{{$trans('profile.vehicles.button_2')}}</button>
                                <button class="btn btn-primary vehicle-save-button" :disabled="invalid||loading" @click="saveVehicle">
                                    <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{$trans('profile.vehicles.button_3')}}
                                </button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-3 pt-3">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                <h2>{{$trans('profile.vehicles.h2_1')}}s</h2>
                <a  data-toggle="modal" data-target="#add-vehicle" style="width: 200px;" href="#">
                    <img class="add-vehicle-icon"
                         src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/add-vehicle.svg" alt="">
                </a>
                <button data-toggle="modal" data-target="#add-vehicle" class="text-center btn btn-primary mt-3">
                    {{$trans('profile.vehicles.button_5')}}
                </button>
            </div>
            <div class="col-12 justify-content-center align-items-center">
                <div class="row mx-auto w-100" v-for="(vehicle, index) in vehicles">
                    <div class="card w-100 h-100 my-2">
                        <div class="card-body">
                            <div class="row mx-auto w-100 align-items-center text-center">
                                <div class="col-12 col-sm-6 col-md-2 px-0 px-sm-1 px-md-2">
                                    <img v-if="vehicle.images[0]" v-lazy="vehicle.images[0]" alt="Vehicle" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover">
                                    <img v-else v-lazy="" alt="Vehicle" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover">
                                </div>
                                <div class="col-12 col-sm-6 col-md-2 px-0 px-sm-1 px-md-2">
                                    <p class="d-flex inform-box mb-0 justify-content-center">{{$trans('profile.vehicles.label_1')}}</p>
                                    {{vehicle.brand}}
                                </div>
                                <div class="col-6 col-md-1 px-0 px-sm-1 px-md-2">
                                    <p class="d-flex inform-box mb-0 justify-content-center">{{$trans('profile.vehicles.label_2')}}</p>
                                    {{vehicle.model}}
                                </div>
                                <div class="col-6 col-md-2 px-0 px-sm-1 px-md-2">
                                    <p class="d-flex inform-box mb-0 justify-content-center">{{$trans('profile.vehicles.label_3')}}</p>
                                    {{vehicle.plate_number}}
                                </div>
                                <div class="col-6 col-md-2 px-0 px-sm-1 px-md-2">
                                    <p class="d-flex inform-box mb-0 justify-content-center">{{$trans('profile.vehicles.label_4')}}</p>
                                    {{vehicle.total_laden_weight}}
                                </div>
                                <div class="col-6 col-md-1 px-0 px-sm-1 px-md-2">
                                    <p class="d-flex inform-box mb-0 justify-content-center">{{$trans('profile.vehicles.label_5')}}</p>
                                    {{vehicle.cubing}}
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="row w-100 mx-auto mt-2 justify-content-center">
<!--                                        data-toggle="modal" data-target="#edit-vehicle"-->
                                        <button class="btn btn-outline-blue m-1" @click="editVehicle(vehicle.id)"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-outline-blue m-1" @click="deleteVehicle(vehicle.id)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">-->
<!--                <h2>Drivers</h2>-->
<!--                <a class="text-center" style="width: 200px;" href="#">-->
<!--                    <img class="add-vehicle-icon"-->
<!--                         src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/driver-icon.svg"-->
<!--                         alt="">-->
<!--                </a>-->
<!--                <div class="text-center mt-3">-->
<!--                    <label class="label-inline">Number of drivers</label>-->
<!--                    <input type="text" class="form-control w-100"-->
<!--                           v-model="profile.number_of_drivers"-->
<!--                           @blur="save('number_of_drivers', profile.number_of_drivers)"-->
<!--                    >-->
<!--                </div>-->
<!--            </div>-->
        </div>

    </div>
</template>

<script>
    import UploadFile from "../../../components/UploadFile";
    import MultiUploadFiles from "../../../components/MultiUploadFiles";
    export default {
        components: {MultiUploadFiles, UploadFile},
        data() {
            return {
                new_vehicle : {
                    type:'Car',
                    brand:'',
                    model:'',
                    plate_number:'',
                    total_laden_weight:'',
                    cubing:'',
                    images:[],
                },
                edit_vehicle : {
                    type:'',
                    brand:'',
                    model:'',
                    plate_number:'',
                    total_laden_weight:'',
                    cubing:'',
                    images:[],
                },
                // vehicles:[
                //     {
                //         brand:'45sdf',
                //         model:'sdfsd',
                //         plate_number:'75674fdgds',
                //         total_laden_weight:'85645',
                //         cubing:'45366',
                //     }
                // ],
                new_images:[],
                deleted_images:[],
                loading: false
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            vehicles() {
                return this.$store.getters.vehicles;
            },
            profile() {
                return this.$store.getters.profile
            },
        },

        mounted() {
            // this.getVehicles();
        },
        methods: {
            async save(key, value) {
                await axios.post("/profile/save", {id:this.profile.id, key: key, value: value})
                    .then(resp => {
                        // window.user.profile = resp.data.profile;
                        // window.user.profile = JSON.stringify(resp.data.profile);
                        // this.profile = resp.data.profile;
                        this.$store.dispatch('setProfile', resp.data.profile);
                    }).catch(function (error) {
                        console.log(error);
                    });
            },
            async getVehicles() {
              await axios.get('/transporter/vehicles/get').then(resp => {
                  this.$store.dispatch('setProfile', resp.data.profile);
                  // this.profile = resp.data.profile;
                  // window.user.profile.vehicles = resp.data.vehicles;
              }).catch(function (error) {
                  console.log(error);
              });
            },
            async createVehicle() {
                this.loading=true;
                let formData = new FormData();
                formData.append('profile_id', this.profile.id);
                let key;
                for (key in this.new_vehicle) {
                    if(key !== 'images') {
                        formData.append(key, this.new_vehicle[key]);
                    }
                    else {
                        for (var i = 0; i < this.new_vehicle.images.length; i++) {
                            formData.append('files[' + i + ']', this.new_vehicle.images[i]);
                        }
                    }
                }

                await axios.post("/transporter/profile/vehicle/create", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(resp => {
                        // this.profile = resp.data.profile;
                        // window.user.profile = resp.data.profile;
                        // this.profile.vehicles.push(resp.data.vehicle);
                        // window.user.profile.vehicles.push(resp.data.vehicle);
                        this.$store.dispatch('addVehicle', resp.data.vehicle)
                        $("#add-vehicle").modal("hide");
                        this.loading = false;
                        this.new_vehicle = {
                            type:'',
                            brand:'',
                            model:'',
                            plate_number:'',
                            total_laden_weight:'',
                            cubing:'',
                            images:[],
                        };
                    }).catch(error => {
                        console.log(error);
                    });
            },
            async saveVehicle() {
                this.loading = true;
                let formData = new FormData();
                formData.append('id', this.edit_vehicle.id);
                formData.append('vehicle', JSON.stringify(this.edit_vehicle));
                for (var i = 0; i < this.new_images.length; i++) {
                    let file = this.new_images[i];
                    formData.append('new_files[' + i + ']', file);
                }
                formData.append('deleted_files', JSON.stringify(this.deleted_images));
                await axios.post("/transporter/profile/vehicle/edit", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(resp => {
                            // this.$nextTick(function () {
                                this.$store.dispatch('setVehicle', resp.data.vehicle);
                            // });
                        console.log('this.vehicles', this.vehicles)
                        // let index = this.vehicles.findIndex(item => item.id === id);
                        // this.vehicles[index] = resp.data.vehicle;
                        this.loading = false;
                        this.edit_vehicle = {
                            type:'',
                            brand:'',
                            model:'',
                            plate_number:'',
                            total_laden_weight:'',
                            cubing:'',
                            images:[],
                        };
                        $("#edit-vehicle").modal("hide");
                    }).catch(error => {
                        console.log(error);
                        this.loading = false;
                    });
            },
            editVehicle(id) {
                let index = this.vehicles.findIndex(item => item.id === id);
                this.edit_vehicle.id = id;
                this.edit_vehicle.type = this.vehicles[index].type;
                this.edit_vehicle.brand = this.vehicles[index].brand;
                this.edit_vehicle.model = this.vehicles[index].model;
                this.edit_vehicle.plate_number = this.vehicles[index].plate_number;
                this.edit_vehicle.total_laden_weight = this.vehicles[index].total_laden_weight;
                this.edit_vehicle.cubing = this.vehicles[index].cubing;
                this.edit_vehicle.images = [];
                this.new_images=[];
                this.deleted_images=[];
                this.vehicles[index].images.forEach( item =>{
                    this.edit_vehicle.images.push(item);
                })
                console.log('this.edit_vehicle', this.edit_vehicle)
                $("#edit-vehicle").modal("show");
                // this.edit_vehicle.images = this.vehicles[index].images;
            },
            async deleteVehicle(id) {
                this.loading = true;
                // let index = this.vehicles.findIndex(item => item.id === id);
                await axios.delete("/transporter/profile/vehicle/delete/"+id)
                    .then(resp => {
                        this.$store.dispatch('removeVehicle', id);
                        // this.vehicles.splice(index, 1);
                        // this.profile.vehicles = resp.data.vehicles;
                        this.loading = false;
                    }).catch(error => {
                        console.log(error);
                        this.loading = false;
                    });
            },
            removeFile(key) {
                this.deleted_images.push(this.edit_vehicle.images[key]);
                this.edit_vehicle.images.splice(key, 1)
            },
            startUpload() {
                this.$refs.edit_upload.startUpload();
            },
            startNewUpload() {
                this.$refs.new_upload.startUpload();
            }
        }
    }
</script>
