<template>
    <div class="container-fluid">
        <h3>Рассылка писем</h3>
        <form v-on:submit.prevent="submit">
            <div class="row">
                <div class="col-sm-12 mt-2">
                    <input type="text" class="form-control" maxlength="255" v-model="title" placeholder="Заголовок"
                           required>
                </div>

                <div class="col-sm-12 mt-2">
                    <select v-model="send_for" class="form-control" required>
                        <option value="all" selected>Всем</option>
                        <option value="verified">Верифицированным</option>
                        <option value="notverified">Не Верифицированным</option>
                    </select>
                </div>

                <div class="col-sm-12 mt-2">
                    <textarea name="message" class="form-control"
                              placeholder="Текст сообщения"
                              v-model="message" required></textarea>

                </div>

                <div class="col-sm-12 mt-2" v-if="result_message">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <div v-html="result_message"></div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="col-sm-12 mt-2">
                    
                    <button class="btn btn-primary" :disabled="loading">
                     <span v-if="loading" class="spinner-border spinner-border-sm" role="status"
                           aria-hidden="true"></span>
                        <span v-else> Отправить всем</span>
                    </button>

                </div>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            loading: false,
            title: null,
            message: null,
            result_message: null,
            send_for: 'all'
        }
    },
    methods: {
        submit() {
            this.loading = true
            axios.post('/mailing', {
                title: this.title,
                message: this.message,
                for: this.send_for
            }).then(() => {
                this.title = null
                this.message = null

                this.loading = true

                this.result_message = "Успешно отправлено!"
            }).catch(() => {
                this.result_message = "Ошибка отправки!"
            })
        }
    }
}
</script>

<style scoped>

</style>
