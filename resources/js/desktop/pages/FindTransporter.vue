<template>
    <div>
        <steps :step="0"/>

        <div class="container">

            <div class="row">
                <div class="col-lg-9 col-md-6 col-12 mt-2">
                    <div class="panel-left">
                        <type-selector v-on:select-type="selectType"/>


                        <div class="row mt-2">
                            <div class="col-sm-6">
                                <div class="form-fields-wrap content-box-gray content-box-padding">
                                    <div class="form-group ">
                                        <input type="text" class="form-control"
                                               placeholder="3-seater Sofa, chairs, desks...">
                                    </div>

                                    <form v-on:submit.prevent="submit" class="content-box-gray">


                                        <h6>Information about your equipment <span
                                            class="text-primary d-inline">(required)</span></h6>

                                        <div class="row row-narrow">
                                            <div class="col-sm-12 form-group ">
                                                <input type="text" required="" class="form-control "
                                                       placeholder="Article name">
                                            </div>
                                        </div>
                                        <div class="row row-narrow">
                                            <div class="col-sm-4">
                                                <div class="form-group ">
                                                    <div class="input-has-icon-right">
                                                        <input type="hidden" class="form-control" placeholder=""
                                                               autocomplete="off">
                                                        <input type="text" class="form-control"
                                                               placeholder="Length (cm)" required="">
                                                        <span class="rel-icon rel-icon-square"><img
                                                            src="/images/common/icons/units/longeur.svg"
                                                            alt=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
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
                                            <div class="col-sm-4">
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
                                        </div>
                                        <div class="row row-narrow">
                                            <div class="col-sm-6">
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
                                            <div class="col-sm-6">
                                                <div class="form-group">
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
                                        <div class="article-overlay-btns">
                                            <button type="submit" class="btn btn-primary" :disabled="true">Add article
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
                                                            <a  class="article-delete">
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

                        </div>

                    </div>


                </div>

                <div class="col-lg-3 col-md-6 col-12 mt-2">
                    <div class="panel-right ">
                        <h4> Publish your listing</h4>
                        <p> Our system matches your move with those of our other Fretbay users.</p>


                        <h4>Compare the quotes</h4>
                        <p> Grouped quotes at low prices are offered by our network of professional carriers.
                        </p>

                        <h4> Select a quote</h4>
                        <p> Establish your transportation terms by contacting the carrier of your choice.
                        </p>

                        <h4> Evaluate the service</h4>

                        <p> Following the move, give your opinion on the mover's service and the quality of the
                            grouped
                            transport of your goods.</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Steps from '../components/FindTransporter/Steps'
    import TypeSelector from '../components/FindTransporter/TypeSelector'

    export default {
        components: {
            Steps, TypeSelector
        },
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

    .articles-list {
        li {
            padding: 10px;
            background: #f3f4f8;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;

            .article-header {
                width: 100%;
                display: flex;
            }

            .list-group {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;

                .list-group-item {
                    position: relative;
                    background-color: #fff;
                    border: 1px solid rgba(0, 0, 0, 0.125);
                    display: inline;
                    padding: 5px;
                    font-size: 10px;
                    border-radius: 10px;
                    margin-left: 5px;
                    margin-top: 5px;
                }
            }
        }
    }
    .panel-left {
        padding: 20px;
        background: white;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0 3px 1px 0 rgb(0 0 0 / 6%);
    }

    .panel-right {
        padding: 20px;
        background: lightgray;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .transport-category {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;


        &.active {


            &:after {
                content: '';
                background: url(/images/common/icons/general/circle-check.svg) no-repeat center center;
                width: 30px;
                height: 30px;
                position: absolute;
                left: 15px;
                top: 15px;
            }

            label {
                border: 2px #0083fe solid;
                background-color: #008bdb17;

            }
        }

        label {

            min-height: 170px;
            width: 100%;
            padding: 14px 20px;
            cursor: pointer;
            border-radius: 10px;
            transition: .3s;
            text-align: center;

            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px transparent solid;

            &:hover {
                background-color: #008bdb17;
                border: 2px #0083fe solid;
            }

            span.category-label-inner {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                flex-direction: column;

            }
        }
    }


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
                right: 0px;
                top: 0px;

                img {
                    width: 30px;
                    height: 30px;
                }
            }
        }
    }
</style>

