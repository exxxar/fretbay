<template>

    <div class="card mb-3">
        <form @submit="sendRequest" class="card-body">
            <h5 class="card-title">{{dialog_titles[type]}}</h5>
            <div class="row d-flex justify-content-center flex-wrap">
                <div class="col-12 col-md-6 mb-2">
                    <input type="text" name="name" class="form-control" v-model="name" placeholder="Your name"
                           required>
                </div>

                <div class="col-12 col-md-6 mb-2">
                    <input type="text" name="phone" class="form-control" v-model="phone"
                           maxlength="19"
                           placeholder="Your phone" required>
                </div>

                <div class="col-12 mb-2">
                    <select name="question-type" v-model="type" class="form-control" required>
                        <option v-for="(option,index) in question_types" :value="index">
                            {{option}}
                        </option>
                    </select>
                </div>

                <div class="col-12 mb-2">
                       <textarea name="message" v-model="message" class="form-control"
                                 placeholder="Message"></textarea>
                </div>

                <div class="col-12 mb-2">
                    <h6 class="text-center">Choose messanger for answer</h6>
                    <ul class="messagers">
                        <li>

                            <input type="checkbox" id="telegram-check" name="answer-check" v-model="socials"
                                   value="telegram">
                            <label for="telegram-check">
                                <i class="fab fa-telegram-plane"></i>
                            </label>
                        </li>
                        <li>

                            <input type="checkbox" id="viber-check" name="answer-check" value="viber" v-model="socials">
                            <label for="viber-check">
                                <i class="fab fa-viber"></i>
                            </label>

                        </li>
                        <li>

                            <input type="checkbox" id="whatsapp-check" name="answer-check" value="whatsapp"
                                   v-model="socials">
                            <label for="whatsapp-check">
                                <i class="fab fa-whatsapp"></i>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 mb-2">
                    <voice-callback-form-component :phone="phone" :name="name" :cansend="cansend"/>
                </div>
            </div>


            <div class="row d-flex justify-content-center mb-2">

                <div class="col-sm-6 col-12">
                    <button type="submit"
                            class="btn btn-outline-primary p-3 text-uppercase font-weight-bold mr-1 mb-1 w-100">
                        <i class="icon ion-md-mail"></i>
                        Send
                    </button>
                </div>

            </div>

        </form>
    </div>

</template>
<script>


    export default {
        props: {
            selected_type: {
                type: Number,
                default: function () {
                    return 0;
                }
            },
        },
        mounted() {
            this.type = this.selected_type
        },
        data() {
            return {
                socials: [],
                name: '',
                phone: '',
                type: 0,
                message: '',
                address: '',
                cansend: false,
                question_types: [
                    "Bug report",
                    "Contact us",
                    "Ask about find transporter",
                    "Ask about find loads",
                    "ADs questions",
                    "Other questions"
                ],
                dialog_titles: [
                    "Bug report",
                    "Contact us",
                    "Ask about find transporter",
                    "Ask about find loads",
                    "ADs questions",
                    "Other questions"
                ]
            };
        },
        methods: {
            sendRequest: function (e) {
                e.preventDefault();
                this.cansend = true;
                axios
                    .post('/send/message', {
                        from: this.name,
                        phone: this.phone,
                        address: this.address,
                        message: "<b>" + this.question_types[this.type] + "</b>:\n" + this.message
                    })
                    .then(response => {
                        this.sendMessage("Сообщение успешно отправлено");
                        $('#contactModalBox').modal('hide')
                        this.name = "";
                        this.phone = "";
                        this.message = "";
                        this.cansend = false;
                    })
            },
            sendMessage(message) {
                this.$notify({
                    group: 'info',
                    type: 'success',
                    title: 'Send message',
                    text: message
                });
            },
        },

    }
</script>

<style lang="scss">
    .messagers {
        display: flex;
        justify-content: center;
        padding: 0;
        margin: 0;
        li {
            list-style: none;
            padding: 10px;
            label {
                width: 70px;
                height: 70px;
                background: #fff;
                border: 3px solid #d3d3d3;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #d3d3d3;
                font-size: 28px;
            }
            input {
                display: none;
            }
            input:checked ~ label {
                border: 3px #21c87a solid;
                color: #21c87a;
            }
        }
    }
</style>
