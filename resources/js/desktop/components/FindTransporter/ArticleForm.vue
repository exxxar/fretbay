<template>
    <div class="row mt-2">
        <div class="col-sm-6">
            <div class="form-fields-wrap content-box-gray content-box-padding">


                <form v-on:submit.prevent="submit" class="content-box-gray">
                    <div class="form-group ">
                        <input type="text" class="form-control"
                               placeholder="3-seater Sofa, chairs, desks...">
                    </div>

                    <h6>Information about your equipment <span
                        class="text-primary d-inline">(required)</span></h6>

                    <div class="form-group">
                        <input type="text" required="" class="form-control "
                               placeholder="Article name">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text" class="form-control"
                                           placeholder="Length (cm)" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/longeur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text" class="form-control" placeholder="Width (cm)"
                                           required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/largeur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text" class="form-control"
                                           placeholder="Height (cm)" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/hauteur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text" class="form-control" placeholder="Weight"
                                           required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/poids.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Quantity" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/quantity.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="input-has-icon-right">
                                <input type="text" class="form-control" placeholder="Make" required="">

                                <span class="rel-icon rel-icon-square"><img
                                    src="/images/common/icons/units/hauteur.svg"
                                    alt=""></span>
                            </div>


                        </div>
                        <div class="col-6">
                            <div class="input-has-icon-right">
                                <input type="text" class="form-control" placeholder="Model" required="">


                                <span class="rel-icon rel-icon-square"><img
                                    src="/images/common/icons/units/hauteur.svg"
                                    alt=""></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 p-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="accept_conveyors">
                                <label class="custom-control-label" for="accept_conveyors">I accept conveyors</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 p-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="fragile_goods">
                                <label class="custom-control-label" for="fragile_goods">Fragile goods</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="input-has-icon-right">
                                <input type="text" class="form-control" placeholder="Estimated value" required="">
                                <span class="rel-icon rel-icon-square">
                                    <img src="/images/common/icons/units/euro.svg" alt="">
                                </span>
                            </div>

                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="input-has-icon-right">
                                <input type="text" class="form-control" placeholder="Animal bread" required="">
                            </div>

                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="input-has-icon-right">
                                <input type="text" class="form-control" placeholder="Special needs" required="">
                                <span class="rel-icon rel-icon-square">
                                    <img src="https://fretbay.com/en/assets/images/common/icons/units/need.svg" alt="">
                                </span>
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="input-has-icon-right">
                                <input type="text" class="form-control" placeholder="Are the vaccinations up to date?"
                                       required="">
                                <span class="rel-icon rel-icon-square">
                                    <img src="https://fretbay.com/en/assets/images/common/icons/units/vaccine.svg"
                                         alt="">
                                </span>
                            </div>

                        </div>
                    </div>

                    <h6>Cage (optional)</h6>

                    <div class="row mb-2">
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text" class="form-control"
                                           placeholder="Cage length (cm)" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/longeur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text" class="form-control" placeholder="Cage width (cm)"
                                           required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/largeur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group ">
                                <div class="input-has-icon-right">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Cage height" required="">
                                    <span class="rel-icon rel-icon-square"><img
                                        src="/images/common/icons/units/hauteur.svg"
                                        alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn btn-custom-white" :disabled="true">Add article
                        </button>
                    </div>

                </form>

            </div>
        </div>
        <div class="col-sm-6 bg-gray-xs">
            <div class="article-section">

                <div class="articles-list-scroll">

                    <ul class="articles-list">
                        <li>
                            <div class="article-header">
                                <div class="article-controls">
                                    <a class="article-edit">
                                        edit-icon
                                    </a>
                                    <a class="article-delete">
                                        delete-icon
                                    </a>
                                </div>
                                <h4 class="article-title">asdasd</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>

                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>

                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>


                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>


                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>


                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>


                                <li class="list-group-item">
                                    <span class="article-unit-text">Height (cm)</span>


                                    <span class="badge">123232</span>
                                </li>


                            </ul>
                        </li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="row d-flex justify-content-end mt-2 w-100">
            <div class="col-2">
                <button class="btn btn-custom-danger">Back</button>
            </div>
            <div class="col-3">

                <button class="btn btn-custom-white">Next</button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                type: null,
            }
        },
        methods: {
            selectType(type) {
                this.type = type
            },
            submit() {

            }
        }
    }
</script>
<style lang="scss">
    .content-box-gray {
        background: #f3f4f8;
        border-radius: 12px;
        padding: 10px;
        box-sizing: border-box;

        .input-has-icon-right {
            position: relative;

            input {
                font-size: 12px;
            }

            .rel-icon {
                position: absolute;
                right: 6px;
                left: auto;
                top: -3px;

                img {
                    width: 30px;
                    height: 30px;
                }
            }
        }
    }

    .form-control {
        padding: 10px 34px 10px 10px;
    }


</style>
