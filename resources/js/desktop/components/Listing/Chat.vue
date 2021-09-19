<template>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people w-100 w-md-40" v-if="showUsers">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search">
                            <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span></div>
                    </div>
                </div>
                <div class="inbox_chat p-2">
                    <div class="chat_list active_chat cursor-pointer" style="border:1px transparent solid;"
                         v-for="chat in chatList"
                         v-bind:class="{'border-primary':selected_chat_id===chat.id}">
                        <div class="chat_people" @click="selectChat(chat)">
                            <div class="chat_img"><img
                                v-lazy="chat.avatar"
                                alt="sunil">
                            </div>
                            <div class="chat_ib">
                                <h5>{{chat.profile.company_name || "Some company"}}<span class="chat_date">{{chat.last_message| moment("from", "now", true)}}</span>
                                </h5>
                                <p>{{chat.profile.about_company||'Some company description'}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mesgs w-100 " v-bind:class="{'w-100':!showUsers,'w-md-60':showUsers}">
                <div class="msg_history">
                    <div v-for="message in filteredMessages">
                        <div class="card">

                            <div class="card-body">
                                <p> {{message.message}} </p>
                                <span class="badge badge-purple" v-if="message.sender_id===user.id">Your sender</span>
                                <span class="badge badge-primary" v-if="message.recipient_id===selected_chat_id">Your recipient</span>
                            </div>


                        </div>
                    </div>





                   <!-- <div class="incoming_msg" v-else-if="message.sender_id===selected_chat_id">
                        <div class="incoming_msg_img"><img
                            v-lazy="'https://ptetutorials.com/images/user-profile.png'" alt="sunil">
                        </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>{{message.message}}</p>
                                <span
                                    class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>

                            </div>
                        </div>
                    </div>



                    <div class="incoming_msg" v-else-if="message.recipient_id===selected_chat_id">
                        <div class="incoming_msg_img"><img
                            v-lazy="'https://ptetutorials.com/images/user-profile.png'" alt="sunil">
                        </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>{{message.message}}</p>
                                <span
                                    class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>

                            </div>
                        </div>
                    </div>

                    <div class="outgoing_msg " v-else>
                        <div class="sent_msg w-100 w-md-45">
                            <p>{{message.message}}</p>
                            <span class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>

                            <span>chat_id {{selected_chat_id}}</span>
                            <span>sender {{message.sender_id}}</span>
                            <span>recipient {{message.recipient_id}}</span>
                        </div>
                    </div>-->

                    <div class="d-flex p-5 justify-content-center" v-if="filteredMessages.length===0">
                        <img v-lazy="'/images/empty.png'" alt="" class="w-100 w-sm-auto"
                             style="max-width:300px;">
                    </div>

                </div>
                <div class="control_row mt-2 mb-2 d-flex align-items-end">
                    <button class="btn btn-outline-primary"
                            v-bind:class="{'active':showUsers}"
                            @click="showUsersBlock"><i class="fas fa-users"></i>
                    </button>

                    <span class="input_type_counter ml-2" style="color: lightgrey;" v-if="message"><small>{{message.length}}/255</small>
                    </span>

                </div>
                <div class="type_msg" v-if="selected_chat_id">

                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message"
                               v-model="message"
                               maxlength="255"
                               v-on:keypress.enter="sendMessage"
                        />
                        <button class="msg_send_btn" type="button"
                                v-if="message"
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
                isPhone: false,
                selected_chat_id: null,
                message: '',
                messages: [],
                showUsers: true,
            }
        },
        computed: {
            filteredMessages() {
                if (!this.selected_chat_id)
                    return [];

                return this.prepareMessages.filter(item => item.recipient_id === this.selected_chat_id || item.sender_id === this.selected_chat_id)
            },
            prepareMessages() {
                return this.listing.messages
            },

            chatList() {
                let tmp = [];

                let tmp_users = [];

                this.listing.quotes.forEach(item => {
                    if (!tmp.includes(item.user_id)&&user.id!==item.user_id ) {
                        tmp.push(item.user_id);
                        let sender = item.user
                        sender.last_message = item.created_at || new Date()
                        tmp_users.push(sender)
                    }
                })

                this.prepareMessages.forEach(item => {
                    if (!tmp.includes(item.sender_id)&&user.id!==item.sender_id ) {
                        tmp.push(item.sender_id);
                        let sender = item.sender
                        sender.last_message = item.created_at || new Date()
                        tmp_users.push(sender)
                    }
                })


                return tmp_users;
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
            isOwnMessage(message){
              return this.user.id === message.sender_id||this.user.id === message.recipient_id
            },
            showUsersBlock() {
                this.showUsers = !this.showUsers

                if (this.showUsers)
                    window.scrollTo(0, 0);
            },
            selectChat(chat) {

                this.selected_chat_id = chat.id



                this.$nextTick(() => {
                    document.querySelector('.msg_history').scrollTo(0, document.querySelector('.msg_history').scrollHeight);
                })

                console.log(this.filteredMessages)


            },
            sendMessage() {
                axios.post("/listing/messages/send", {
                    "message": this.message,
                    "listing_id": this.listing.id
                }).then(resp => {

                    this.listing.messages.push({
                        "message": this.message,
                        "sender_id": this.user.id,
                        "recipient_id": this.listing.user_id,
                        "created_at": new Date()
                    })
                    this.message = null;

                    this.$nextTick(() => {
                        document.querySelector('.msg_history').scrollTo(0, document.querySelector('.msg_history').scrollHeight);
                    })

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
