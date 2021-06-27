<template>
    <div class="main-body mt-3">


        <!-- Modal -->
        <div class="modal fade" id="add-vehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label for="" class="text-lg">Type</label>
                                    <div class="custom-select-menu">
                                        <div class="form-group">
                                            <div class="dropdown">
                                                <a href="#"
                                                   class="dropdown-toggle form-control form-control-empty">...</a>
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
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label for="" class="text-lg">Brand</label>
                                    <input type="text" class="form-control form-control-empty input-lg">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label for="" class="text-lg">Model</label>
                                    <input type="text" class="form-control form-control-empty input-lg">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label for="" class="text-lg">Plate number</label>
                                    <input type="text" class="form-control form-control-empty input-lg">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label for="" class="text-lg">Cubing</label>
                                    <input type="text" class="form-control form-control-empty input-lg">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="from-group">
                                    <label for="" class="text-lg">Total laden weight</label>
                                    <input type="text" class="form-control form-control-empty input-lg">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="from-group">
                                    <label for="" class="text-lg">Sheeted</label>
                                    <div class="custom-select-menu">
                                        <div class="form-group form-group-lg">
                                            <div class="dropdown w-100">
                                                <button class="btn btn-outline-primary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dropdown button
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row upload-block">
                            <div class="col-sm-6">
                                <label for="" class="document-upload">
                                    <input type="file" style="display: none;" accept=".jpg,.jpeg,.png,.pdf">
                                    <span>
                                        <img
                                            src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg"
                                            alt="" class="upload-icon w-100">
                                        <span class="upload-text">Upload</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="document-upload">
                                    <input type="file"  style="display: none;" accept=".jpg,.jpeg,.png,.pdf">
                                    <span>
                                        <img
                                            src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg"
                                            alt="" class="upload-icon w-100">
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
        </div>



        <div class="row pb-3 pt-3">
            <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">

                <h2>Your vehicles</h2>
                <a  data-toggle="modal" data-target="#add-vehicle" style="width: 200px;" href="#">
                    <img class="add-vehicle-icon"
                         src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/add-vehicle.svg" alt="">
                </a>
                <a data-toggle="modal" data-target="#add-vehicle"
                   class="text-center btn btn-primary mt-3" href="#">Add a
                    vehicle</a>
            </div>


            <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                <h2>Drivers</h2>
                <a class="text-center" style="width: 200px;" href="#"><img class="add-vehicle-icon"
                                                                           src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/driver-icon.svg"
                                                                           alt=""></a>
                <div class="text-center mt-3">
                    <label class="label-inline">Number of drivers</label>
                    <input type="text" class="form-control w-100">
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data() {
            return {
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
