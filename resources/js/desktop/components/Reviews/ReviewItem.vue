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
                <div class="col-2 d-flex justify-content-center align-item-center  font-size-32">
                    <span
                        class="p-2 font-size-28"
                        v-bind:class="{
                                            'text-danger':item.type===0,
                                            'text-warning':item.type===1,
                                            'text-primary':item.type===2,
                                        }"
                        v-html="prepareReviewType(item.type).data">
                                </span>
                </div>
                <div class="col-4 p-2">
                    <p class="m-0">{{item.title}}</p>
                    <small>{{item.transporter.profile.company_name}}</small>
                    <br>
                    <small>{{item.created_at | moment("DD-MM-yyyy H:mm") }}</small>
                </div>
                <div class="col-6 p-2">
                    <p>{{item.text}}</p>
                </div>

            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-outline-danger" v-if="user.is_customer"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-outline-primary" v-if="user.is_transporter"><i class="fas fa-question"></i></button>
        </div>
    </div>
</template>
<script>
    export default {
        props:["item"],
        computed: {

            user: function () {
                return window.user;
            },
        },
        data(){
          return {
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
        methods:{
            prepareReviewType(type) {
                return this.review_types.find(item => item.id === type)
            },
        }
    }
</script>
