<template>
    <section id="profile-wizard2" style="min-height:90vh; display: flex;">
        <div class="row w-100 m-auto mt-2 mt-sm-3 h-100 text-center justify-content-center">
            <div class="col-12 col-md-6">
                <img src="/images/profile/profile1.png" style="max-height: 350px; width: 100%; max-width:350px" alt="">
                <h2 class="step-title" style="color:#21c87a; font-weight: 700">Pro insurance certificate</h2>
                <p class="info-box"><strong>Requires</strong> : Insurance certificate <strong>showing</strong> the name of your business</p>
                <a href="/transporter/profile/transporter-wizard/step-3" class="btn btn-success w-100 mb-3" style="max-width: 300px;">Skip</a>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="tab-subtitle tab-subtitle-left">Certificate of pro. insurance</h4>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row w-100 mx-auto">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">Insurance company</label>
                                        <ValidationProvider name="Insurance company" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.insurance_company" placeholder="">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">Amount insured</label>
                                        <ValidationProvider name="Amount insured" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.amount_insured" placeholder="">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">Start date</label>
                                        <ValidationProvider name="Start date" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.start_date"
                                                   v-mask="'##/##/####'" placeholder="jj/mm/aaaa">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">End date</label>
                                        <ValidationProvider name="End date" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.end_date"
                                                   v-mask="'##/##/####'" placeholder="jj/mm/aaaa">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>Document officiel de l'attestation d'assurance pro.</h4>
                                    <multi-upload-files ref="ci" :files="edit_certificate_insurance.new_images">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload('ci')">Click to upload</button>
                                        </template>
                                        <template v-slot:filesListAdditional>
                                            <div v-for="(file, key) in edit_certificate_insurance.document_images" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                                <div class="card my-2">
                                                    <img class="card-img-top preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                    <div class="card-body px-md-2 text-center">
                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key, 4)">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </multi-upload-files>
                                    <div class="row w-100 m-auto" v-if="edit_certificate_insurance.new_images.length===0 && edit_certificate_insurance.document_images===0">
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
                                <button class="btn btn-primary px-4 mx-1"
                                        :disabled="invalid||loadingCertificateInsurance" @click="confirm(4)">
                                    <span v-if="loadingCertificateInsurance" class="spinner-border spinner-border-sm"
                                          role="status" aria-hidden="true">
                                    </span>
                                    Confirm
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
                edit_certificate_insurance: {
                    insurance_company:'',
                    amount_insured:'',
                    start_date:'',
                    end_date:'',
                    document_images:[],
                    comment:'',
                    new_images:[],
                    deleted_images:[],
                },
                loadingCertificateInsurance: false,
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
                    this.editCertificateInsurance();
                });
            }
        },
        // mounted() {
        //     this.editCertificateInsurance();
        // },
        methods: {
            editCertificateInsurance() {
                this.edit_certificate_insurance.id = this.documents.certificate_insurance.id;
                this.edit_certificate_insurance.insurance_company = this.documents.certificate_insurance.insurance_company;
                this.edit_certificate_insurance.amount_insured = this.documents.certificate_insurance.amount_insured;
                this.edit_certificate_insurance.start_date = this.documents.certificate_insurance.start_date;
                this.edit_certificate_insurance.end_date = this.documents.certificate_insurance.end_date;
                this.edit_certificate_insurance.document_images = this.documents.certificate_insurance.document_images;
                this.edit_certificate_insurance.is_created = this.documents.certificate_insurance.is_created;
            },
            async confirm(type) {
                let formData = new FormData();
                this.loadingCertificateInsurance = true;
                let document = this.edit_certificate_insurance;

                formData.append('id', document.id);
                formData.append('profile_id', this.profile.id);
                formData.append('is_approved', 0);
                formData.append('type', type);
                for (var i = 0; i < document.new_images.length; i++) {
                    let file = document.new_images[i];
                    formData.append('new_files[' + i + ']', file);
                }
                formData.append('deleted_files', JSON.stringify(document.deleted_images));
                document.deleted_images = [];
                document.new_images = [];
                formData.append('document', JSON.stringify(document));
                let path = '/transporter/profile/document/edit';
                if (document.is_created === false){
                    path = '/transporter/profile/document/create'
                }

                await axios.post( path, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(resp => {
                    this.$store.commit('setProfile', resp.data.profile);
                    this.$store.commit('setDocuments', resp.data.profile.documents);
                    this.$store.dispatch('setStep', {key:'step2', value:true });
                    this.loadingCertificateInsurance = false;
                    window.location = '/transporter/profile/transporter-wizard/step-3'
                }).catch(error => {
                    console.log(error);
                    this.loadingCertificateInsurance = false;
                });
            },
            removeFile(key, type) {
                if(type == 4)
                {
                    this.edit_certificate_insurance.deleted_images.push(this.edit_certificate_insurance.document_images[key]);
                    this.edit_certificate_insurance.splice(key, 1);
                }
            },
            startUpload(ref) {
                this.$refs[ref].startUpload();
            },
        },
        directives: {mask}
    }
</script>
