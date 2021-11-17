<template>
    <div class="card mb-2"
         v-bind:class="{
                        'border-danger':item.type===0,
                        'border-warning':item.type===1,
                        'border-primary':item.type===2,
                    }"
    >

        <div class="card-body pt-0 pb-0">


            <div class="row">
                <div class="col-12 col-sm-2 d-flex justify-content-center align-item-center  font-size-32">
                    <span
                        data-toggle="popover"
                        title="Emoji help"
                        data-content="And here's some amazing content. It's very engaging. Right?"
                        class="p-2 font-size-28"
                        v-bind:class="{
                                            'text-danger':item.type===0,
                                            'text-warning':item.type===1,
                                            'text-primary':item.type===2,
                                        }"
                        v-html="prepareReviewType(item.type).data">
                                </span>
                </div>
                <div class="col-12 col-sm-4 p-2  text-center">
                    <p class="m-0">{{item.title}}</p>
                    <small>{{item.transporter.profile.company_name}}</small>
                    <br>
                    <small>{{item.created_at | moment("DD-MM-yyyy H:mm") }}</small>

                </div>
                <div class="col-12 col-sm-6 p-2 ">
                    <p class="text-center">{{item.text}}</p>


                </div>

                <div class="col-12" v-if="item.review">

                    <h6> {{$trans('profile.reviews.h6_3')}}:</h6>
                    <p><em>{{item.review.text}}</em></p>

                </div>


            </div>


        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-2 col-12 mb-2">
                    <div class="btn-group w-100">
                        <button class="btn btn-outline-danger" v-if="user.is_customer"
                                data-toggle="modal" :data-target="'#removeReviewModal-'+item.id+modalPrefix"
                               ><i
                            class="fas fa-trash-alt"></i>
                        </button>
                        <button class="btn btn-outline-primary"
                                type="button"
                                data-toggle="popover"
                                title="Review help"
                                data-trigger="focus"
                                data-content="And here's some amazing content. It's very engaging. Right?"
                                v-if="user.is_transporter"><i
                            class="fas fa-question"></i></button>
                    </div>
                </div>
                <div class="col-sm-10" v-if="!item.review&&user.is_transporter">

                    <form class="input-group" v-on:submit.prevent="attachReview">
                        <input type="text" class="form-control"
                               v-model="message"
                               placeholder="Short answer" aria-label="Recipient's username"
                               aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">{{$trans('profile.reviews.button_2')}}</button>
                        </div>
                    </form>


                </div>

            </div>

        </div>



        <div class="modal fade" :id="'removeReviewModal-'+item.id+modalPrefix" data-backdrop="static" data-keyboard="false" tabindex="-1" :aria-labelledby="'removeReviewModal-'+item.id" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="quoteModalHeader">{{$trans('profile.reviews.h5_1')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-6"><button class="btn btn-danger w-100" data-dismiss="modal"  @click="removeReview">{{$trans('profile.reviews.button_3')}}</button></div>
                            <div class="col-6"><button data-dismiss="modal" aria-label="Close" class="btn btn-secondary w-100">{{$trans('profile.reviews.button_4')}}</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import { v4 as uuidv4 } from 'uuid';

    export default {
        props: ["item"],
        computed: {

            user: function () {
                return window.user;
            },
        },
        mounted() {
            $('[data-toggle="popover"]').popover({

                placement:'bottom'
            })
        },
        created(){
            this.modalPrefix = uuidv4()


        },
        data() {
            return {
                message: null,
                modalPrefix: null,
                review_types: [
                    {
                        id: 0,
                        data: '<i class="far fa-angry"></i>',
                        description: 'You were dissatisfied with the work of the carrier'
                    },
                    {
                        id: 1,
                        data: '<i class="far fa-meh"></i>',
                        description: 'You are neutral about the work of the carrier'
                    },
                    {
                        id: 2,
                        data: '<i class="far fa-smile"></i>',
                        description: 'You liked the quality of the carrier\'s services'
                    }
                ],
            }
        },
        methods: {
            removeReview() {
                axios.delete('/reviews/remove/' + this.item.id).then(resp => {
                    /*  setTimeout(() => {
                          window.location.reload();
                      }, 1000)*/
                })
            },
            prepareReviewType(type) {
                return this.review_types.find(item => item.id === type)
            },
            attachReview() {
                axios.post('/reviews/attach', {
                    review_id: this.item.id,
                    message: this.message

                }).then(resp => {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000)
                })
            }
        }
    }
</script>
