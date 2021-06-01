<template>
        <div class="tab-content col-md-8">

            <div v-show="visible" id="add-vehicle" class="modal add-vehicle-active" >
                <div class="modal-dialog modal-lg">
                    <div class="text-center">
                        <img src="https://fretbay.com/fr/frv2/assets/images/public/truck.png" alt="" class="truck-img">
                    </div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">New vehicle</h4>
                        </div>
                        <div class="modal-body text-left">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Type</label>
                                        <div class="custom-select-menu">
                                            <div class="form-group">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle form-control form-control-empty">...</a>
                                                    <ul class="list-stripped dropdown-menu">
                                                        <li>
                                                            <label for="" class="vcheck vradio">
                                                                <input type="radio" name="truckTypes" value="1">
                                                                <span>Car</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label for="" class="vcheck vradio">
                                                                <input type="radio" name="truckTypes" value="2">
                                                                <span>Van</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label for="" class="vcheck vradio">
                                                                <input type="radio" name="truckTypes" value="3">
                                                                <span>Truck without tailgate</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label for="" class="vcheck vradio">
                                                                <input type="radio" name="truckTypes" value="4">
                                                                <span>Truck with tailgate</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label for="" class="vcheck vradio">
                                                                <input type="radio" name="truckTypes" value="5">
                                                                <span>5T Truck</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Brand</label>
                                        <input type="text" class="form-control form-control-empty input-lg">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Model</label>
                                        <input type="text" class="form-control form-control-empty input-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Plate number</label>
                                        <input type="text" class="form-control form-control-empty input-lg">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Cubing</label>
                                        <input type="text" class="form-control form-control-empty input-lg">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Total laden weight</label>
                                        <input type="text" class="form-control form-control-empty input-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="from-group">
                                        <label for="" class="text-lg">Sheeted</label>
                                        <div class="custom-select-menu">
                                            <div class="form-group form-group-lg">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle form-control form-control-empty">...</a>
                                                    <ul class="list-striped dropdown-menu">
                                                        <li><label for="" class="vcheck vradio">
                                                            <input type="radio" class="ng-pristine ng-untoched ng-valid ng-empty">
                                                            <span>Yes</span>
                                                        </label>
                                                        </li>
                                                        <li><label for="" class="vcheck vradio">
                                                            <input type="radio" class="ng-pristine ng-untoched ng-valid ng-empty">
                                                            <span>No</span>
                                                        </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row upload-block">
                                <div class="col-sm-6">
                                    <label for="" class="document-upload">
                                        <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                        <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Upload</span>
                                    </span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="document-upload">
                                        <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                        <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Upload</span>
                                    </span>
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary vehicle-save-button">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-backdrop" @click="close"></div>
            </div>


            <div class="tab1_1 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">Your vehicles</h2>
                        <a @click="visible = true" class="text-center" href="#"><img class="add-vehicle-icon" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/add-vehicle.svg" alt=""></a>
                        <div class="row">
                            <a @click="visible = true" class="text-center add-vehicle-btn btn btn-primary btn-standard text-bold text-lg" href="#">Add a vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab1_2 tab">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="tab-title">Drivers</h2>
                        <a class="text-center" href="#"><img class="add-vehicle-icon" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/driver-icon.svg" alt=""></a>
                        <div class="text-center">
                            <label class="label-inline">Number of drivers</label>
                            <input type="text" class="number-of-drivers col-sm-3 form-control form-control-empty">
                        </div>
                    </div>
                </div>
            </div>

        </div>
</template>

<script>
    export default {
        data() {
            return{
                visible: false,
            }
        },
        methods: {
            close: function () {
                this.visible = !this.visible;
            }
        }
    }
</script>
