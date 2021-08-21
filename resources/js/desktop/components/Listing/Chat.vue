<template>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
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
                <div class="inbox_chat">
                    <div class="chat_list active_chat" v-for="chat in chatList">
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
            <div class="mesgs">
                <div class="msg_history">
                    <div v-for="message in filteredMessages">

                        <div class="outgoing_msg" v-if="message.sender_id===user.id">
                            <div class="sent_msg">
                                <p>{{message.message}}</p>
                                <span class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>
                            </div>
                        </div>

                        <div class="incoming_msg" v-else>
                            <div class="incoming_msg_img"><img
                                v-lazy="'https://ptetutorials.com/images/user-profile.png'" alt="sunil">
                            </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{message.message}}</p>
                                    <span class="time_date"> {{message.created_at| moment("from", "now", true)}}</span>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message"
                               v-model="message"
                               v-on:keypress.enter="sendMessage"
                        />
                        <button class="msg_send_btn" type="button"
                                @click="sendMessage"
                        ><i
                            :disabled="isPhone"
                            class="fa fa-paper-plane-o"
                            aria-hidden="true"></i></button>
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
                messages: []
            }
        },
        computed: {
            filteredMessages() {
                if (!this.selected_chat_id)
                    return [];

                return this.prepareMessages.filter(item => item.recipient_id === this.selected_chat_id)
            },
            prepareMessages() {

                return [...this.listing.messages || [], ...this.messages];


            },

            chatList() {
                let tmp = [];

                let tmp_users = [];

                console.log("prepared=>", this.prepareMessages)
                this.listing.quotes.forEach(item => {
                    if (!tmp.includes(item.user_id)) {
                        tmp.push(item.user_id);
                        let sender = item.user
                        sender.last_message = item.created_at || new Date()
                        tmp_users.push(item.user)
                    }
                })

                console.log("tmp_users=>", tmp_users)
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
            selectChat(chat) {

                this.selected_chat_id = chat.id

            },
            sendMessage() {
                axios.post("/listing/messages/send", {
                    "message": this.message,
                    "listing_id": this.listing.id
                }).then(resp => {

                    this.messages.push({
                        "message": this.message,
                        "sender_id": this.user.id,
                        "recipient_id": this.listing.user_id,
                        "created_at": new Date()
                    })
                    this.message = null;
                })
            }
        }
    }
</script>
