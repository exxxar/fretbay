<template>
    <section id="profile-wizard2" style="min-height:90vh; display: flex;">
        <div class="row w-100 mx-auto mt-2 mt-sm-3 h-100 text-center justify-content-center">
            <div class="col-12 col-md-6">


                <img src="/images/profile/profile1.png" style="max-height: 350px; width: 100%; max-width:350px" alt="">
                <h2 class="step-title" style="color:#21c87a; font-weight: 700">{{   $trans('profile.wizard.step_1.h2_1')}}</h2>
                <p class="info-box" v-html=" $trans('profile.wizard.step_1.p_1')"> </p>
                <a href="/transporter/profile/transporter-wizard/step-2" class="btn btn-success w-100 mb-3" style="max-width: 300px;">{{ $trans('profile.wizard.step_1.a_1')}}</a>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="tab-subtitle tab-subtitle-left">{{$trans('profile.wizard.step_1.h4_1')}}</h4>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <ValidationProvider name="ID card number" rules="required" v-slot="{ errors }">
                                            <label for="" class="text-lg">{{$trans('profile.wizard.step_1.label_1')}}</label>
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_manager_card.id_card_number" :placeholder="$trans('profile.wizard.step_1.input_placeholder_1')">
                                            <span style="color:red; font-size:11px">{{errors[0]}}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <ValidationProvider name="Issue date" rules="required" v-slot="{ errors }">
                                            <label for="" class="text-lg">{{$trans('profile.wizard.step_1.label_2')}}</label>
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_manager_card.issue_date" v-mask="'##/##/####'">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <ValidationProvider name="Expiry date" rules="required" v-slot="{ errors }">
                                            <label for="" class="text-lg">{{$trans('profile.wizard.step_1.label_3')}}</label>
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_manager_card.expiry_date" v-mask="'##/##/####'">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.wizard.step_1.h4_2')}}</h4>
                                    <multi-upload-files ref="mn" :files="edit_manager_card.new_images">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload('mn')">{{$trans('profile.wizard.step_1.button_1')}}</button>
                                        </template>
                                        <template v-slot:filesListAdditional>
                                            <div v-for="(file, key) in edit_manager_card.document_images" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                                <div class="card my-2">
                                                    <img class="card-img-top preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                    <div class="card-body px-md-2 text-center">
                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key, 2)">{{$trans('profile.wizard.step_1.button_2')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </multi-upload-files>
                                    <div class="row w-100 m-auto" v-if="edit_manager_card.new_images.length===0 && edit_manager_card.document_images===0">
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_front.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;" alt="">
                                        </div>
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_back.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto mt-2 w-100 justify-content-end">
                                <button class="btn btn-primary px-4 mx-1" :disabled="invalid||loadingManagerCard" @click="confirm">
                                    <span v-if="loadingManagerCard" class="spinner-border spinner-border-sm"
                                          role="status" aria-hidden="true">
                                    </span>
                                    {{$trans('profile.wizard.step_1.button_3')}}
                                </button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import MultiUploadFiles from "../../../components/MultiUploadFiles";
    import {mask} from 'vue-the-mask';

    export default {
        components: {MultiUploadFiles},
        data() {
            return {
                edit_manager_card: {
                    id:'',
                    id_card_number:'',
                    issue_date:'',
                    expiry_date:'',
                    document_images:[],
                    comment:'',
                    new_images:[],
                    deleted_images:[],
                    is_created:false,
                },
                loadingManagerCard: false,
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            profile() {
                return this.$store.getters.profile
            },
            documents() {
                return this.$store.getters.documents;
            }
        },
        created() {
            if(this.user=='')
            {
                this.$store.dispatch('getUser').then(resp=>{
                    this.editManagerCard();
                });
            }
        },
        // mounted() {
        //     this.editManagerCard();
        // },
        methods: {
            editManagerCard() {
                if(this.documents.manager_card) {
                    this.edit_manager_card.id = this.documents.manager_card.id;
                    this.edit_manager_card.id_card_number = this.documents.manager_card.id_card_number;
                    this.edit_manager_card.issue_date = this.documents.manager_card.issue_date;
                    this.edit_manager_card.expiry_date = this.documents.manager_card.expiry_date;
                    this.edit_manager_card.document_images = this.documents.manager_card.document_images;
                    this.edit_manager_card.is_created = this.documents.manager_card.is_created;
                }
            },
            async confirm() {
                let formData = new FormData();
                this.loadingManagerCard = true;
                let  document = this.edit_manager_card;

                formData.append('id', this.documents.manager_card.id);
                formData.append('profile_id', this.profile.id);
                formData.append('is_approved', 0);
                formData.append('type', 2);
                for (var i = 0; i < document.new_images.length; i++) {
                    let file = document.new_images[i];
                    formData.append('new_files[' + i + ']', file);
                }
                formData.append('deleted_files', JSON.stringify(document.deleted_images));
                document.deleted_images = [];
                document.new_images = [];
                formData.append('document', JSON.stringify(document));
                let path = '/transporter/profile/document/edit';
                if (this.edit_manager_card.is_created === false){
                    path = '/transporter/profile/document/create'
                }

                await axios.post( path, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(resp => {
                    this.$store.dispatch('setProfile', resp.data.profile);
                    this.$store.dispatch('setDocuments', resp.data.profile.documents);
                    this.loadingManagerCard = false;
                    this.$store.dispatch('setStep', {key:'step1', value:true });
                    window.location = '/transporter/profile/transporter-wizard/step-2'
                }).catch(error => {
                    console.log(error);
                    this.loadingManagerCard = false;
                });
            },
            removeFile(key, type) {
                if(type == 2)
                {
                    this.edit_manager_card.deleted_images.push(this.edit_manager_card.document_images[key]);
                    this.edit_manager_card.splice(key, 1);
                }
            },
            startUpload(ref) {
                this.$refs[ref].startUpload();
            },
        },
        directives: {mask}
    }
</script>
