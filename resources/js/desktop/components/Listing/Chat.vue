<template>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people w-100 w-md-60">
                <div class="headind_srch row">

                    <div class="col-12"
                         v-bind:class="{'col-md-6':user.is_transporter}"
                         v-if="user.is_transporter">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" id="forMe" class="custom-control-input">
                            <label for="forMe" class="custom-control-label" @click="forMe = !forMe">
                                Only for me
                            </label>
                        </div>
                    </div>
                    <div class="col-12 srch_bar"
                         v-bind:class="{'col-md-6':user.is_transporter}"
                    >
                        <div class="stylish-input-group w-100">
                            <input type="text" class="search-bar w-100" placeholder="Search" v-model="search">
                            <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span></div>
                    </div>


                </div>

            </div>
            <div class="mesgs w-100 ">
                <div class="msg_history" v-if="user">
                    <div v-for="message in filteredMessages">


                        <div class="outgoing_msg "
                             style="padding:5px;"

                             v-if="message.sender_id===user.id&&(user.is_transporter||user.is_customer)">
                            <div class="sent_msg w-100 w-md-45 ">
                                <p
                                    v-bind:class="{'bg-danger':message.deleted_at||message.temporary}"
                                    class="d-flex justify-content-between">{{message.message}} <a href="#remove"
                                                                                                  @click="removeMessage(message.id)"><i
                                    class="fas fa-times"></i></a></p>

                                <span class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>

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
                <div class="control_row mt-2 mb-2 d-flex align-items-end">

                    <span class="input_type_counter ml-2" style="color: lightgrey;" v-if="message"><small>{{message.length}}/255</small>
                    </span>

                </div>
                <div class="type_msg">

                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message"
                               v-model="message"
                               maxlength="255"
                               v-on:keypress.enter="sendMessage"
                        />
                        <button class="msg_send_btn" type="button"
                                @click="sendMessage"
                        >
                            <i class="far fa-envelope"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>
<script>

    import parsePhoneNumber from 'libphonenumber-js'

    export default {
        props: ["listing"],
        data() {
            return {
                forMe: false,
                isPhone: false,
                message: '',

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
                const phoneNumber = parsePhoneNumber(this.message, window.locale)
                this.isPhone = !!phoneNumber
            }
        },
        methods: {
            loadMessages() {

                axios.get("/listing/messages/" + this.listing.id).then(resp => {
                    this.messages = resp.data.messages
                })

            },
            removeMessage(id) {
                axios.delete("/listing/messages/remove/" + id).then(resp => {
                    this.messages.find(item => {
                        if (item.id === id) {
                            item.deleted_at = new Date();

                        }
                    })
                })


            },
            sendMessage() {

                let messageIndex = (this.messages.push({
                    "id": null,
                    "message": this.message,
                    "sender_id": this.user.id,
                    "recipient_id": this.listing.user_id,
                    "created_at": new Date(),
                    "temporary": true
                })) - 1;

                let message = this.message
                this.message = null;

                this.$nextTick(() => {
                    document.querySelector('.msg_history').scrollTo(0, document.querySelector('.msg_history').scrollHeight);
                })

                axios.post("/listing/messages/send", {
                    "message": message,
                    "listing_id": this.listing.id,
                    'recipient_id': this.listing.user_id,
                    'user_id': this.user.id
                }).then(resp => {

                    this.messages[messageIndex].temporary = false;
                    this.messages[messageIndex].id = resp.data.id
                    this.loadMessages();


                })
            }
        }
    }
</script>
<style lang="scss">
    .received_withd_msg,
    .sent_msg {
        word-break: break-all;
    }


</style>
