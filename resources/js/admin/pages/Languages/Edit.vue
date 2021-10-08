<template>
    <ValidationObserver v-slot="{ invalid }">
        <b-modal id="edit-language" scrollable title="Редактировать язык" v-if="edit_language" no-close-on-backdrop>
            <ValidationProvider name="'Название языка'" rules="required" v-slot="{ errors }">
                <b-form-group label="Название языка" class="mb-0"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-input
                        v-model="edit_language.name"
                        placeholder="Введите название языка" trim
                        :state="errors.length>0 ? false : null"
                    >
                    </b-form-input>
                </b-form-group>
            </ValidationProvider>
<!--            <ValidationProvider name="'Алиас языка'" rules="required" v-slot="{ errors }">-->
<!--                <b-form-group label="Алиас языка" class="mb-0"-->
<!--                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">-->
<!--                    <b-form-input-->
<!--                        v-model="edit_language.locale_name"-->
<!--                        placeholder="Введите алиас языка" trim-->
<!--                    >-->
<!--                    </b-form-input>-->
<!--                </b-form-group>-->
<!--            </ValidationProvider>-->
            <b-form-group class="mb-2" label="Активность">
                <b-row class="w-100 mx-auto align-items-center">
                    <b-col sm="2">
                        <b-form-checkbox
                            id="is_active"
                            v-model="edit_language.is_active"
                            name="check-button"
                            switch
                        >
                        </b-form-checkbox>
                    </b-col>
                    <b-col sm="10">
                        <label for="is_active">Язык<span v-if="!edit_language.is_active"> не</span> активен</label>
                    </b-col>
                </b-row>
            </b-form-group>
            <template v-slot:modal-footer>
                <div class="w-100">
                    <b-button
                        variant="primary"
                        class="float-right"
                        @click="edit"
                        :disabled="loading||invalid"
                    >
                        <div class="row w-100 mx-auto align-items-center justify-content-center">
                            <span v-if="loading" role="status" aria-hidden="true"
                                  class="spinner-border spinner-border-sm mx-2">

                            </span>
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
        props: ['language'],
        data: function() {
            return {
                loading: false,
                edit_language: {
                    id:'',
                    name: '',
                    locale_name: '',
                    is_active: true,
                }
            }
        },
        mounted() {
            this.edit_language = JSON.parse(JSON.stringify(this.language));
        },
        watch: {
            language: function(newVal, oldVal) {
                this.edit_language = JSON.parse(JSON.stringify(this.language));
            }
        },
        methods: {
            edit() {
                this.loading = true;
                this.$store.dispatch('updateLanguage', this.edit_language)
                    .then((resp) => {
                        this.loading = false;
                        this.$store.commit('saveLanguage', resp.data.language);
                        this.sendMessage(resp.data.message);
                        this.cancel();
                    })
                    .catch((error) => {
                        this.loading = false;
                        this.sendMessage('Произошла ошибка', 'error');
                    })
            },
            cancel() {
                this.edit_language = JSON.parse(JSON.stringify(this.language));
                this.$bvModal.hide("edit-language");
            },
            sendMessage(message, type='success') {
                this.$notify({
                    group: 'info',
                    type: type,
                    title: 'Языки',
                    text: message
                });
            },
        }
    }
</script>

<style>
    #is_active {
        width: 32px;
        z-index: 1;
    }
</style>
