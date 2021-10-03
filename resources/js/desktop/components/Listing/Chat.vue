<template>
    <div class="messaging">
        <div class="inbox_msg">

            <div class="mesgs w-100 ">
                <div class="msg_history" v-if="user">
                    <div v-for="message in filteredMessages">
                        <div class="outgoing_msg "
                             style="padding:5px;"

                             v-if="message.sender_id===user.id&&(user.is_transporter||user.is_customer)">
                            <div class="sent_msg w-100 w-md-45 ">
                                <p
                                    v-bind:class="{'bg-danger':message.deleted_at||message.id==null}"
                                    class="d-flex justify-content-between">{{message.message}}
                                 <!--   <a href="#remove" @click="selected_message_id=message.id">
                                        <i class="fas fa-times"></i>
                                    </a>-->
                                </p>

                                <span class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>

                                <div class="row d-flex justify-content-center" v-if="selected_message_id===message.id">
                                    <div class="col-6">
                                        <button class="btn btn-danger w-100" @click="removeMessage">
                                            Remove
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button data-dismiss="modal" @click="selected_message_id=null"
                                                class="btn btn-secondary w-100">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="incoming_msg"
                             style="padding:5px;"
                             v-else>
                            <div class="incoming_msg_img"><img v-if="message.sender"
                                                               v-lazy="message.sender.avatar" alt="sunil">
                            </div>
                            <div class="received_msg ">
                                <div class="received_withd_msg w-100 w-md-55 ">
                                    <h6>#{{message.sender.id}} {{message.sender.name}}</h6>
                                    <p>{{message.message}}</p>
                                    <span
                                        class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>
                                    <span class="badge badge-info" v-if="user.id===message.recipient_id">For you</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex p-5 justify-content-center" v-if="filteredMessages.length===0">
                        <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                             style="max-width:300px;">
                    </div>

                </div>
                <div class="bottom-controls">
                    <div class="control_row mt-2 mb-2 d-flex align-items-end">



                        <!--<span class="badge badge-primary mr-2 ml-2 cursor-pointer" data-dismiss="modal" aria-label="Close">
                        <strong>Close</strong>
                    </span>-->
                        <span class="badge mr-2 ml-2 cursor-pointer"
                              v-if="user.is_transporter"
                              v-bind:class="{'badge-secondary':!forMe,'badge-purple':forMe}"
                              @click="forMe = !forMe"
                        >

                        <strong v-if="forMe">Any</strong>
                        <strong v-if="!forMe">Only for me</strong>
                    </span>

                        <span class="badge mr-2 cursor-pointer"
                              v-bind:class="{'badge-secondary':!searchMode,'badge-purple':searchMode}"
                              @click="searchMode=!searchMode"
                        >
                           <strong v-if="searchMode">Message</strong>
                           <strong v-if="!searchMode">Search</strong>
                        </span>
                        <span class="badge badge-danger mr-2" v-if="isPhone" @click="reset">Remove number!</span>
                        <span class="input_type_counter mr-2" style="color: lightgrey;" v-if="message"><small>{{message.length}}/255</small>
                    </span>

                    </div>
                    <div class="type_msg">

                        <div class="input_msg_write">

                            <div class="row">
                                <div class="col-10">
                                    <input type="text" class="write_msg p-2" placeholder="Type a message"
                                           v-model="message"
                                           v-if="!searchMode"
                                           maxlength="255"
                                           v-on:keypress.enter="sendMessage"
                                    />

                                    <input type="search" class="write_msg p-2" placeholder="Search" v-if="searchMode"
                                           v-model="search">

                                </div>
                                <div class="col-2">
                                    <div class="btn-group w-100">

                                        <button class="btn" type="button"
                                                :disabled="isPhone"
                                                v-bind:class="{'btn-danger':isPhone,'btn-primary':!isPhone}"
                                                @click="sendMessage"
                                        >
                                            <i class="far fa-envelope"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</template>
<script>

    import {parsePhoneNumber, findPhoneNumbersInText} from 'libphonenumber-js'

    export default {
        props: ["listing"],
        data() {
            return {
                forMe: false,
                isPhone: false,
                message: '',
                searchMode: false,
                selected_message_id: null,
                messages: [],
                search: '',

            }
        },

        mounted() {

            this.loadMessages()
            setInterval(() => {
                this.loadMessages();
            }, 5000)
        },
        computed: {
            filteredMessages() {
                if (!this.listing)
                    return [];

                if (this.forMe === true)
                    return this.messages.filter(item => item.message.toLowerCase().indexOf(this.search.toLowerCase()) != -1 && item.recipient_id === this.user.id)

                return this.messages.filter(item => item.message.toLowerCase().indexOf(this.search.toLowerCase()) != -1)
            },
            user() {
                return window.user
            }
        },
        watch: {
            message: function () {

                if (this.message === null) {
                    this.isPhone = false;
                    return;
                }

                let tmp = this.message.split('')

                let counter = 0;

                let hasNum = false;
                tmp.forEach(item => {
                    if (!!parseInt(item))
                        counter++;

                    if (counter >= 5)
                        hasNum = true;
                })

                this.isPhone = findPhoneNumbersInText(this.message).length > 0 || parseInt(this.message) || hasNum

            }
        },
        methods: {
            reset() {
                let tmp = this.message.split('')

                let counter = 0;

                let message = '';

                tmp.forEach(item => {
                    if (!parseInt(item))
                        message += item


                })

                this.message = message
            },
            loadMessages() {

                axios.get("/listing/messages/" + this.listing.id).then(resp => {
                    this.messages = resp.data.messages
                })

            },
            removeMessage() {
                if (!this.selected_message_id)
                    return;

                this.messages.find(item => {
                    if (item.id === this.selected_message_id) {
                        item.deleted_at = new Date();
                    }
                })

                axios.delete("/listing/messages/remove/" + this.selected_message_id).then(resp => {

                })

                this.selected_message_id = null

            },
            sendMessage() {

                if (this.isPhone)
                    return;



                let messageIndex = (this.messages.push({
                    "id": null,
                    "message": this.message,
                    "sender_id": this.user.id,
                    "recipient_id": this.listing.user_id,
                    "created_at": new Date(),
                })) - 1;



                this.$nextTick(() => {
                    document.querySelector('.msg_history').scrollTo(0, document.querySelector('.msg_history').scrollHeight);
                })

                axios.post("/listing/messages/send", {
                    "message": this.message,
                    "listing_id": this.listing.id,
                    'recipient_id': this.listing.user_id,
                    'user_id': this.user.id
                }).then(resp => {

                    ///this.messages[messageIndex].temporary = false;
                    this.messages[messageIndex].id = resp.data.id
                    this.loadMessages();

                })

                this.message = null
            }
        }
    }
</script>
<style lang="scss">
    .received_withd_msg,
    .sent_msg {
        word-break: break-all;
    }

    .inbox_msg {
        border: none !important;
    }

    .type_msg {
        border: none !important;
    }

    .messaging {
        padding: 0px !important;
        border: none !important;
    }

    .mesgs {
        padding: 0 0 0 0 !important;
    }

    .outgoing_msg {
        margin: 5px 0 5px !important;
    }

    .inbox_msg {
        border: none;
    }

    .msg_history {
        height: 75vh !important;

    }

    .msg_send_btn {
        border-radius: 0 !important;
        height: 50px !important;
        right: 0 !important;
        top: 0 !important;
        width: 50px !important;
    }


    .bottom-controls {
        position: fixed;
        bottom: 0px;
        width: 100%;
        height: 105px;
        left: 0;
        background: white;
        border-top: 2px #00a600 solid;
    }
</style>
