<template>
    <ValidationObserver v-slot="{ invalid }">
        <b-modal id="create-language" scrollable title="Создать язык" no-close-on-backdrop>
            <ValidationProvider name="'Название языка'" rules="required" v-slot="{ errors }">
                <b-form-group label="Название языка" class="mb-0"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-input
                        v-model="new_language.name"
                        placeholder="Введите название языка" trim
                        :state="errors.length>0 ? false : null"
                    >
                    </b-form-input>
                </b-form-group>
            </ValidationProvider>
            <ValidationProvider name="'Алиас языка'" rules="required" v-slot="{ errors }">
                <b-form-group label="Алиас языка" class="mb-0"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-input
                        v-model="new_language.locale_name"
                        placeholder="Введите алиас языка" trim
                        :state="errors.length>0 ? false : null"
                    >
                    </b-form-input>
                </b-form-group>
            </ValidationProvider>
            <b-form-group class="mb-2" label="Активность">
                <b-row class="w-100 mx-auto align-items-center">
                    <b-col sm="2">
                        <b-form-checkbox
                            id="is_active"
                            v-model="new_language.is_active"
                            name="check-button"
                            switch
                        >
                        </b-form-checkbox>
                    </b-col>
                    <b-col sm="10">
                        <label for="is_active">Язык<span v-if="!new_language.is_active"> не</span> активен</label>
                    </b-col>
                </b-row>
            </b-form-group>
            <template v-slot:modal-footer>
                <div class="w-100">
                    <b-button
                        variant="primary"
                        class="float-right"
                        @click="create"
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
        name: "Create",
        data: function() {
            return {
                loading: false,
                new_language: {
                    name: '',
                    locale_name: '',
                    is_active: true
                }
            }
        },
        methods: {
            create() {
                this.loading = true;
                this.$store.dispatch('addLanguage', this.new_language)
                    .then(resp => {
                        console.log('resp.data', resp.data)
                        this.$store.commit('addLanguage', resp.data.language);
                        this.sendMessage(resp.data.message);
                        this.new_language= {
                            name: '',
                            locale_name: '',
                            is_active: true
                        };
                        this.loading = false;
                        console.log('resp.data1', resp.data)
                        this.cancel();
                    })
                    .catch(error => {
                        console.log(error)
                        this.loading = false;
                        this.sendMessage('Произошла ошибка', 'error');
                    })
            },
            cancel() {
                this.new_language= {
                    name: '',
                    locale_name: '',
                    is_active: true
                };
                this.$bvModal.hide("create-language");
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
