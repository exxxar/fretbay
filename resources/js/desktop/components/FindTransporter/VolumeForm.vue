<template>
    <div class="p-2 mt-5">


        <h2 class="text-uppercase text-black text-center">The volume of your
            move</h2>
        <div class="volume-step-box-wrap text-center">
            <div class="row">
                <div class="col-sm-6">

                    <h3 class="box-title text-center">I know my volume</h3>
                    <div class="volume-step-box box-top">
                        <h4>I know my volume to move. It is correct and I would like to inform it.</h4>
                        <div class="volume-field">

                            <div class="volume-field-wrap">
                                <input type="text" class="form-control input-lg text-center text-black"
                                       placeholder="Your volume" autofocus="">
                                <em class="volume-unit text-bold">m<sup>3</sup></em>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <h3 class="box-title text-center">I don’t know my volume</h3>
                    <div class="volume-step-box">
                        <h4>I don't know my volume to move. I would like to carry out my inventory online.</h4>
                        <div class="form-group">
                            <a class="btn btn-custom-success">Online inventory</a>
                        </div>
                    </div>
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
<style lang="scss">

    .volume-step-box-wrap {
        &:after {
            content: 'Or';
            margin-top: -166px;
            position: absolute;
            background: white;
            padding: 16px;
            text-transform: uppercase;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            font-weight: 900;
            margin-left: -35px;
            line-height: 200%;
        }
    }


    .volume-field-wrap {
        position: relative;

        input {
            background:white;
        }

        .volume-unit {
            position: absolute;
            top: 10px;
            right: 14px;
        }
    }
    .volume-step-box {
        position: relative;
        background: #f3f4f8;
        min-height: 254px;
        padding: 40px 20%;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;



        h4 {
            font-size:14px;

        }
    }

    .box-title {
        color: #5b6981;
        font-size: 20px;
        font-weight:400;

    }
</style>
