<template>
    <ValidationObserver v-slot="{ invalid }">
        <b-modal id="create-translation" scrollable title="Добавить новый перевод" no-close-on-backdrop>
            <ValidationProvider name="'Группа'" rules="required" v-slot="{ errors }">
                <b-form-group label="Группа" class="mb-0 core"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-input
                        v-model="new_translation.group"
                        placeholder="Введите группу" trim
                        :state="errors.length>0 ? false : null"
                    >
                    </b-form-input>
                </b-form-group>
            </ValidationProvider>
            <ValidationProvider name="'Ключ'" rules="required" v-slot="{ errors }">
                <b-form-group label="Ключ" class="mb-0 core"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-input
                        v-model="new_translation.key"
                        placeholder="Введите ключ" trim
                        :state="errors.length>0 ? false : null"
                    >
                    </b-form-input>
                </b-form-group>
            </ValidationProvider>
            <ValidationProvider name="'Перевод'" rules="required" v-slot="{ errors }">
                <b-form-group label="Перевод по ключу" class="mb-0 core"
                              :invalid-feedback="errors[0]" :state="errors.length>0 ? false : null">
                    <b-form-textarea
                        v-model="new_translation.value"
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
                        @click="create"
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
        name: "Create",
        props:['language'],
        data: function() {
            return {
                loading: false,
                new_translation: {
                    // namespace:'',
                    language: this.language,
                    group: '',
                    key: '',
                    value: ''
                }
            }
        },
        computed: {
            languages() {
                return this.$store.getters.languages;
            },
        },
        methods: {
            create() {
                this.loading=true;
                this.$store.dispatch('addTranslation',  this.new_translation)
                    .then(resp => {
                        let item = {
                            group: this.new_translation.group,
                            key: this.new_translation.key,
                            value:this.new_translation.value
                        };
                        this.languages.forEach(lang => {
                            item[lang.locale_name] = '';
                            if(lang.locale_name === this.language)
                            {
                                item[this.language] = this.new_translation.value;
                            }
                        });
                        this.$store.commit('addTranslation', item);
                        this.sendMessage(resp.data.message);
                        this.loading=false;
                        this.cancel();
                }).catch( error => {
                    this.loading=false;
                    this.sendMessage('Произошла ошибка', 'error');
                })
            },
            cancel() {
                this.new_translation = JSON.parse(JSON.stringify({
                    // namespace:'',
                    language: this.language,
                    group: '',
                    key: '',
                    value: ''
                }));
                this.$bvModal.hide("create-translation");
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
