<template>
    <ValidationObserver v-slot="{ invalid }">
        <b-modal id="edit-translation" scrollable title="Редактировать перевод" no-close-on-backdrop>
            <ValidationProvider name="'Перевод'" rules="required" v-slot="{ errors }">
                <b-form-group :label="'Перевод по ключу ' + edit_translation.key" class="mb-0"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-textarea
                        v-model="edit_translation.value"
                        placeholder="Введите перевод" trim
                        :state="errors.length>0 ? false : null"
                    >
                    </b-form-textarea>
                </b-form-group>
            </ValidationProvider>
            <template v-slot:modal-footer>
                <div class="w-100">
                    <b-button
                        variant="primary"
                        class="float-right"
                        @click="edit"
                        :disabled="loading||invalid"
                    >
                        <div class="row w-100 mx-auto align-items-center justify-content-center">
                            <span v-if="loading" small role="status" aria-hidden="true" class="spinner-border spinner-border-sm mx-2"></span>
                            Сохранить
                        </div>
                    </b-button>
                    <b-button variant="primary" class="float-right mr-2" :disabled="loading" @click="cancel">
                        Отмена
                    </b-button>
                </div>
            </template>
        </b-modal>
    </ValidationObserver>
</template>

<script>
    export default {
        name: "Edit",
        props: ['translation'],
        data: function() {
            return {
                loading: false,
                edit_translation: {
                    language: '',
                    group: '',
                    key: '',
                    value: ''
                }
            }
        },
        mounted() {
            this.edit_translation = JSON.parse(JSON.stringify(this.translation));
        },
        watch: {
            translation: function(newVal, oldVal) {
                this.edit_translation = JSON.parse(JSON.stringify(this.translation));
            }
        },
        methods: {
            edit() {
                this.loading = true;
                this.$store.dispatch('updateTranslation', this.edit_translation)
                    .then((resp) => {
                        this.$store.commit('saveTranslation', this.edit_translation);
                        this.sendMessage(resp.data.message);
                        this.loading = false;
                        this.cancel();
                    })
                    .catch((error) => {
                        this.sendMessage('Произошла ошибка', 'error');
                        this.loading = false;
                    })
            },
            cancel() {
                this.edit_translation = JSON.parse(JSON.stringify(this.translation));
                this.$bvModal.hide("edit-translation");
            },
            sendMessage(message, type='success') {
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Перевод',
                    text: message
                });
            },
        }
    }
</script>

<style scoped>

</style>
