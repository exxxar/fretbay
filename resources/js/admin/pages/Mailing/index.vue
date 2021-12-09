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

                <div class="col-sm-12 mt-2">
                    <button class="btn btn-primary">Отправить всем</button>

                </div>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            title: null,
            message: null,
            send_for: 'all'
        }
    },
    methods: {
        submit() {
            axios.post('/mailing', {
                title: this.title,
                message: this.message,
                for: this.send_for
            }).then(() => {
                this.title = null
                this.message = null
            })
        }
    }
}
</script>

<style scoped>

</style>
