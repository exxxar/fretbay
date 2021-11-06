<template>
    <div class="main-body mt-3">
        <div class="row" v-if="documents.company_info">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row w-100 mx-auto align-items-center">
                            <div class="col-12 p-0 d-block d-md-none">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.company_info.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Approved">
                                    <span class="text-uppercase"> {{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="!documents.company_info.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Not approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 p-0">
                                <h2 class="tab-title">{{$trans('profile.documents.h2_1')}}</h2>
                            </div>
                            <div class="col-12 col-sm-4 p-0 d-none d-md-block">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.company_info.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto  align-items-center justify-content-end"
                                     v-if="!documents.company_info.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                        </div>

                        <h4 class="tab-subtitle tab-subtitle-left">{{$trans('profile.documents.h4_1')}}</h4>
                        <div class="row w-100 mx-auto" v-if="!editCompanyInfoMode&& documents.company_info">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_1')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.manager_first_name" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_2')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.manager_last_name" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_3')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.id_number" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_4')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.creation_date" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_5')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.company_name" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_6')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.address" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_7')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.city" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_8')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.postal_code" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">{{$trans('profile.documents.label_9')}}</label>
                                    <input type="text" class="form-control-empty form-control"
                                           v-model="documents.company_info.country" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>{{$trans('profile.documents.h4_2')}}</h4>
                                <div class="row w-100 m-auto row-cols-2 row-cols-md-3"
                                     v-if="documents.company_info.document_images.length>0">
                                    <div v-for="(file, key) in documents.company_info.document_images"
                                         class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                        <div class="card">
                                            <div class="card-body px-md-2 text-center">
                                                <img class="preview mx-auto" v-lazy="file"
                                                     style="width:100%; height:150px; object-fit: cover;" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row w-100 m-auto" v-if="documents.company_info.document_images.length===0">
                                    <div class="col-6 p-1 text-center">
                                        <img class="mx-auto" v-lazy="'/images/profile/id_card_front.png'"
                                             style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                             alt="">
                                    </div>
                                    <div class="col-6 p-1 text-center">
                                        <img class="mx-auto" v-lazy="'/images/profile/id_card_back.png'"
                                             style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row" v-if="editCompanyInfoMode">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_1')}}</label>
                                        <ValidationProvider name="First name" rules="required|alpha"
                                                            v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.manager_first_name">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_2')}}</label>
                                        <ValidationProvider name="Last name" rules="required|alpha" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.manager_last_name">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_3')}}</label>
                                        <ValidationProvider name="Trade register ID number" rules="required"
                                                            v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.id_number">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_4')}}</label>
                                        <ValidationProvider name="Date of creation" rules="required"
                                                            v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.creation_date" v-mask="'##/##/####'">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_5')}}</label>
                                        <ValidationProvider name="" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.company_name">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_6')}}</label>
                                        <ValidationProvider name="" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.address">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_7')}}</label>
                                        <ValidationProvider name="" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.city">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_8')}}</label>
                                        <ValidationProvider name="" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.postal_code">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_9')}}</label>
                                        <ValidationProvider name="" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_company_info.country">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_3')}}</h4>
                                    <!--                                    <div class="row w-100 m-auto">-->
                                    <!--                                        <div v-for="(file, key) in edit_company_info.document_images" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">-->
                                    <!--                                            <div class="card">-->
                                    <!--                                                <div class="card-body px-md-2 text-center">-->
                                    <!--                                                        <img class="preview mx-auto" v-lazy="file"-->
                                    <!--                                                            style="width:100%; height:150px; object-fit: cover;" alt="">-->
                                    <!--                                                    <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key, 1)">Remove</button>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <multi-upload-files ref="lg" :files="edit_company_info.new_images">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload('lg')">
                                                {{$trans('profile.documents.button_1')}}
                                            </button>
                                        </template>
                                        <template v-slot:filesListAdditional>
                                            <div v-for="(file, key) in edit_company_info.document_images"
                                                 class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                                <div class="card my-2">
                                                    <img class="card-img-top preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                    <div class="card-body px-md-2 text-center">
                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100"
                                                                v-on:click="removeFile(key, 1)">Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </multi-upload-files>
                                    <!--                                    <div class="row">-->
                                    <!--                                        <div class="col-6">-->
                                    <!--                                            <upload-file v-model="edit_company_info.front_image"></upload-file>-->
                                    <!--                                        </div>-->
                                    <!--                                        <div class="col-6">-->
                                    <!--                                            <upload-file v-model="edit_company_info.back_image"></upload-file>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                    <multi-upload-files :files="edit_company_info.document_images"></multi-upload-files>-->
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_4')}}</h4>
                                    <ValidationProvider name="Comment" rules="required" v-slot="{ errors }">
                                        <textarea class="w-100 form-control-empty form-control" name="comment"
                                                  cols="30" rows="6" v-model="edit_company_info.comment">
                                        </textarea>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <!--                        <div class="col-12">-->
                            <div class="row mx-auto mt-2 w-100 justify-content-end">
                                <button class="btn btn-outline-blue mx-1" v-if="!editCompanyInfoMode"
                                        @click="editCompanyInfo">{{$trans('profile.documents.button_2')}}
                                </button>
                                <button class="btn btn-outline-blue mx-1" v-if="editCompanyInfoMode"
                                        :disabled="loadingCompanyInfo" @click="editCompanyInfoMode=false">
                                    {{$trans('profile.documents.button_3')}}
                                </button>
                                <button class="btn btn-primary px-4 mx-1" v-if="editCompanyInfoMode"
                                        :disabled="invalid||loadingCompanyInfo" @click="confirm(1)">
                                    <span v-if="loadingCompanyInfo" class="spinner-border spinner-border-sm"
                                          role="status" aria-hidden="true">
                                    </span>
                                    {{$trans('profile.documents.button_4')}}
                                </button>
                            </div>
                        </ValidationObserver>
                        <!--                        </div>-->
                        <!--                        <div class="text-center">-->
                        <!--                            <button class="btn btn-standard text-uppercase btn-success">confirm</button>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="documents.manager_card">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row w-100 mx-auto align-items-center">
                            <div class="col-12 p-0 d-block d-md-none">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.manager_card.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="!documents.manager_card.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Not approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 p-0">
                                <h2 class="tab-title">{{$trans('profile.documents.h2_2')}}</h2>
                            </div>
                            <div class="col-12 col-sm-4 p-0 d-none d-md-block">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.manager_card.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto  align-items-center justify-content-end"
                                     v-if="!documents.manager_card.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="tab-subtitle tab-subtitle-left">{{$trans('profile.documents.h2_2')}}</h4>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row" v-if="!editManagerCardMode">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_10')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.manager_card.id_card_number" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_11')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.manager_card.issue_date" v-mask="'##/##/####'"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_12')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.manager_card.expiry_date" v-mask="'##/##/####'"
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_5')}}</h4>
                                    <div class="row w-100 m-auto row-cols-2 row-cols-md-3"
                                         v-if="documents.manager_card.document_images.length>0">
                                        <div v-for="(file, key) in documents.manager_card.document_images"
                                             class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                            <div class="card">
                                                <div class="card-body px-md-2 text-center">
                                                    <img class="preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row w-100 m-auto"
                                         v-if="documents.manager_card.document_images.length===0">
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_front.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                                 alt="">
                                        </div>
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_back.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                                 alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="editManagerCardMode">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <ValidationProvider name="ID card number" rules="required" v-slot="{ errors }">
                                            <label for=""
                                                   class="text-lg">{{$trans('profile.documents.label_10')}}</label>
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_manager_card.id_card_number"
                                                   placeholder="ID card number">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <ValidationProvider name="Issue date" rules="required" v-slot="{ errors }">
                                            <label for=""
                                                   class="text-lg">{{$trans('profile.documents.label_11')}}</label>
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_manager_card.issue_date" v-mask="'##/##/####'">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <ValidationProvider name="Expiry date" rules="required" v-slot="{ errors }">
                                            <label for=""
                                                   class="text-lg">{{$trans('profile.documents.label_12')}}</label>
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_manager_card.expiry_date" v-mask="'##/##/####'">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_6')}}</h4>
                                    <!--                                    <div class="row w-100 m-auto row-cols-2 row-cols-md-3">-->
                                    <!--                                        <div v-for="(file, key) in edit_manager_card.document_images" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">-->
                                    <!--                                            <div class="card">-->
                                    <!--                                                <div class="card-body px-md-2 text-center">-->
                                    <!--                                                        <img class="preview mx-auto" v-lazy="file"-->
                                    <!--                                                            style="width:100%; height:150px; object-fit: cover;" alt="">-->
                                    <!--                                                    <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key, 2)">Remove</button>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                    <multi-upload-files :files="edit_manager_card.new_images"></multi-upload-files>-->
                                    <multi-upload-files ref="mn" :files="edit_manager_card.new_images">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload('mn')">
                                                {{$trans('profile.documents.button_1')}}
                                            </button>
                                        </template>
                                        <template v-slot:filesListAdditional>
                                            <div v-for="(file, key) in edit_manager_card.document_images"
                                                 class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                                <div class="card my-2">
                                                    <img class="card-img-top preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                    <div class="card-body px-md-2 text-center">
                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100"
                                                                v-on:click="removeFile(key, 2)">
                                                            {{$trans('profile.documents.button_5')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </multi-upload-files>
                                    <!--                                    <multi-upload-files :files="edit_manager_card.document_images"></multi-upload-files>-->
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_7')}}</h4>
                                    <ValidationProvider name="Comment" rules="required" v-slot="{ errors }">
                                        <textarea class="w-100 form-control-empty form-control" name="comment" cols="30"
                                                  rows="6" v-model="edit_manager_card.comment"></textarea>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="row mx-auto mt-2 w-100 justify-content-end">
                                <button class="btn btn-outline-blue mx-1" v-if="!editManagerCardMode"
                                        @click="editManagerCard">{{$trans('profile.documents.button_2')}}
                                </button>
                                <button class="btn btn-outline-blue mx-1" v-if="editManagerCardMode"
                                        :disabled="loadingManagerCard" @click="editManagerCardMode=false">
                                    {{$trans('profile.documents.button_3')}}
                                </button>
                                <button class="btn btn-primary px-4 mx-1" v-if="editManagerCardMode"
                                        :disabled="invalid||loadingManagerCard" @click="confirm(2)">
                                    <span v-if="loadingManagerCard" class="spinner-border spinner-border-sm"
                                          role="status" aria-hidden="true">
                                    </span>
                                    {{$trans('profile.documents.button_4')}}
                                </button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="documents.transport_license">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row w-100 mx-auto align-items-center">
                            <div class="col-12 p-0 d-block d-md-none">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.transport_license.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="!documents.transport_license.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Not approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 p-0">
                                <h2 class="tab-title">{{$trans('profile.documents.h2_3')}}</h2>
                            </div>
                            <div class="col-12 col-sm-4 p-0 d-none d-md-block">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.transport_license.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto  align-items-center justify-content-end"
                                     v-if="!documents.transport_license.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="tab-subtitle tab-subtitle-left">{{$trans('profile.documents.h4_8')}}</h4>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row" v-if="!editTransportLicenseMode">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_13')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.transport_license.license_number" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_14')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.transport_license.issue_date" v-mask="'##/##/####'"
                                               placeholder="jj/mm/aaaa" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_15')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.transport_license.expiry_date" v-mask="'##/##/####'"
                                               placeholder="jj/mm/aaaa" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_9')}}</h4>
                                    <div class="row w-100 m-auto row-cols-2 row-cols-md-3"
                                         v-if="documents.transport_license.document_images.length>0">
                                        <div v-for="(file, key) in documents.transport_license.document_images"
                                             class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                            <div class="card">
                                                <div class="card-body px-md-2 text-center">
                                                    <img class="preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row w-100 m-auto"
                                         v-if="documents.transport_license.document_images.length===0">
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_front.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                                 alt="">
                                        </div>
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_back.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                                 alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="editTransportLicenseMode">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_13')}}</label>
                                        <ValidationProvider name="License number" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_transport_license.license_number">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_14')}}</label>
                                        <ValidationProvider name="Issue date" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_transport_license.issue_date" v-mask="'##/##/####'"
                                                   placeholder="jj/mm/aaaa">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_15')}}</label>
                                        <ValidationProvider name="Expiry date" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_transport_license.expiry_date" v-mask="'##/##/####'"
                                                   placeholder="jj/mm/aaaa">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_10')}}</h4>
                                    <!--                                    <div class="row w-100 m-auto row-cols-2 row-cols-md-3">-->
                                    <!--                                        <div v-for="(file, key) in edit_transport_license.document_images" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">-->
                                    <!--                                            <div class="card">-->
                                    <!--                                                <div class="card-body px-md-2 text-center">-->
                                    <!--                                                        <img class="preview mx-auto" v-lazy="file"-->
                                    <!--                                                            style="width:100%; height:150px; object-fit: cover;" alt="">-->
                                    <!--                                                    <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key, 3)">Remove</button>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                    <multi-upload-files :files="edit_transport_license.new_images"></multi-upload-files>-->
                                    <multi-upload-files ref="tl" :files="edit_transport_license.new_images">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload('tl')">
                                                {{$trans('profile.documents.button_1')}}
                                            </button>
                                        </template>
                                        <template v-slot:filesListAdditional>
                                            <div v-for="(file, key) in edit_transport_license.document_images"
                                                 class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                                <div class="card my-2">
                                                    <img class="card-img-top preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                    <div class="card-body px-md-2 text-center">
                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100"
                                                                v-on:click="removeFile(key, 3)">
                                                            {{$trans('profile.documents.button_5')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </multi-upload-files>
                                    <!--                                    <multi-upload-files :files="edit_transport_license.document_images"></multi-upload-files>-->
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_11')}}</h4>
                                    <ValidationProvider name="Comment" rules="required" v-slot="{ errors }">
                                        <textarea class="w-100 form-control-empty form-control" name="comment" cols="30"
                                                  rows="6" v-model="edit_transport_license.comment"></textarea>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="row mx-auto mt-2 w-100 justify-content-end">
                                <button class="btn btn-outline-blue mx-1" v-if="!editTransportLicenseMode"
                                        @click="editTransportLicense">{{$trans('profile.documents.button_2')}}
                                </button>
                                <button class="btn btn-outline-blue mx-1" v-if="editTransportLicenseMode"
                                        :disabled="loadingTransportLicense" @click="editTransportLicenseMode=false">
                                    {{$trans('profile.documents.button_3')}}
                                </button>
                                <button class="btn btn-primary px-4 mx-1" v-if="editTransportLicenseMode"
                                        :disabled="invalid||loadingTransportLicense" @click="confirm(3)">
                                     <span v-if="loadingTransportLicense" class="spinner-border spinner-border-sm"
                                           role="status" aria-hidden="true">
                                     </span>
                                    {{$trans('profile.documents.button_4')}}
                                </button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3" v-if="documents.certificate_insurance">
                    <div class="card-body">
                        <div class="row w-100 mx-auto align-items-center">
                            <div class="col-12 p-0 d-block d-md-none">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.certificate_insurance.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="!documents.certificate_insurance.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="Not approved">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 p-0">
                                <h2 class="tab-title">{{$trans('profile.documents.h2_4')}}</h2>
                            </div>
                            <div class="col-12 col-sm-4 p-0 d-none d-md-block">
                                <div class="row w-100 mx-auto align-items-center justify-content-end"
                                     v-if="documents.certificate_insurance.is_approved">
                                    <img src="/images/profile/approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.approved')}}</span>
                                </div>
                                <div class="row w-100 mx-auto  align-items-center justify-content-end"
                                     v-if="!documents.certificate_insurance.is_approved">
                                    <img src="/images/profile/not_approved.png" class="mx-1"
                                         style="width: 25px; height: 25px" alt="">
                                    <span class="text-uppercase">{{$trans('profile.documents.not_approved')}}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="tab-subtitle tab-subtitle-left">{{$trans('profile.documents.h4_12')}}</h4>
                        <ValidationObserver v-slot="{invalid}">
                            <div class="row" v-if="!editCertificateInsuranceMode">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_16')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.certificate_insurance.insurance_company" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_17')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.certificate_insurance.amount_insured" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_18')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.certificate_insurance.start_date"
                                               v-mask="'##/##/####'" placeholder="jj/mm/aaaa" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_19')}}</label>
                                        <input type="text" class="form-control-empty form-control"
                                               v-model="documents.certificate_insurance.end_date" v-mask="'##/##/####'"
                                               placeholder="jj/mm/aaaa" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_13')}}</h4>
                                    <div class="row w-100 m-auto row-cols-2 row-cols-md-3"
                                         v-if="documents.certificate_insurance.document_images.length>0">
                                        <div v-for="(file, key) in documents.certificate_insurance.document_images"
                                             class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                            <div class="card">
                                                <div class="card-body px-md-2 text-center">
                                                    <img class="preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row w-100 m-auto"
                                         v-if="documents.certificate_insurance.document_images.length===0">
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_front.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                                 alt="">
                                        </div>
                                        <div class="col-6 p-1 text-center">
                                            <img class="mx-auto" v-lazy="'/images/profile/id_card_back.png'"
                                                 style="width: 100%; height: auto; object-fit: cover; max-width: 150px;"
                                                 alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="editCertificateInsuranceMode">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_16')}}</label>
                                        <ValidationProvider name="Insurance company" rules="required"
                                                            v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.insurance_company"
                                                   placeholder="">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_17')}}</label>
                                        <ValidationProvider name="Amount insured" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.amount_insured" placeholder="">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_18')}}</label>
                                        <ValidationProvider name="Start date" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.start_date"
                                                   v-mask="'##/##/####'" placeholder="jj/mm/aaaa">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="text-lg">{{$trans('profile.documents.label_19')}}</label>
                                        <ValidationProvider name="End date" rules="required" v-slot="{ errors }">
                                            <input type="text" class="form-control-empty form-control"
                                                   v-model="edit_certificate_insurance.end_date"
                                                   v-mask="'##/##/####'" placeholder="jj/mm/aaaa">
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_14')}}</h4>
                                    <!--                                    <div class="row w-100 m-auto row-cols-2 row-cols-md-3">-->
                                    <!--                                        <div v-for="(file, key) in edit_certificate_insurance.document_images" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">-->
                                    <!--                                            <div class="card">-->
                                    <!--                                                <div class="card-body px-md-2 text-center">-->
                                    <!--                                                        <img class="preview mx-auto" v-lazy="file"-->
                                    <!--                                                            style="width:100%; height:150px; object-fit: cover;" alt="">-->
                                    <!--                                                    <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile(key, 4)">Remove</button>-->
                                    <!--                                                </div>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                    <multi-upload-files :files="edit_certificate_insurance.new_images"></multi-upload-files>-->
                                    <multi-upload-files ref="ci" :files="edit_certificate_insurance.new_images">
                                        <template v-slot:uploadButton>
                                            <button class="btn btn-primary w-100" @click="startUpload('ci')">
                                                {{$trans('profile.documents.button_1')}}
                                            </button>
                                        </template>
                                        <template v-slot:filesListAdditional>
                                            <div v-for="(file, key) in edit_certificate_insurance.document_images"
                                                 class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                                                <div class="card my-2">
                                                    <img class="card-img-top preview mx-auto" v-lazy="file"
                                                         style="width:100%; height:150px; object-fit: cover;" alt="">
                                                    <div class="card-body px-md-2 text-center">
                                                        <button class="btn btn-outline-blue mt-2 mx-auto w-100"
                                                                v-on:click="removeFile(key, 4)">
                                                            {{$trans('profile.documents.button_5')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </multi-upload-files>
                                    <!--                                    <multi-upload-files :files="edit_certificate_insurance.document_images"></multi-upload-files>-->
                                </div>
                                <div class="col-12">
                                    <h4>{{$trans('profile.documents.h4_15')}}</h4>
                                    <ValidationProvider name="Comment" rules="required" v-slot="{ errors }">
                                        <textarea class="w-100 form-control-empty form-control" name="comment" cols="30"
                                                  rows="6" v-model="edit_certificate_insurance.comment"></textarea>
                                    </ValidationProvider>
                                </div>
                            </div>
                            <div class="row mx-auto mt-2 w-100 justify-content-end">
                                <button class="btn btn-outline-blue mx-1" v-if="!editCertificateInsuranceMode"
                                        @click="editCertificateInsurance">
                                    {{$trans('profile.documents.button_2')}}
                                </button>
                                <button class="btn btn-outline-blue mx-1" v-if="editCertificateInsuranceMode"
                                        :disabled="loadingCertificateInsurance"
                                        @click="editCertificateInsuranceMode=false">
                                    {{$trans('profile.documents.button_3')}}
                                </button>
                                <button class="btn btn-primary px-4 mx-1" v-if="editCertificateInsuranceMode"
                                        :disabled="invalid||loadingCertificateInsurance" @click="confirm(4)">
                                    <span v-if="loadingCertificateInsurance" class="spinner-border spinner-border-sm"
                                          role="status" aria-hidden="true">
                                    </span>
                                    {{$trans('profile.documents.button_4')}}
                                </button>
                            </div>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import MultiUploadFiles from "../../../components/MultiUploadFiles";
    import {mask} from 'vue-the-mask';
    import UploadFile from "../../../components/UploadFile";

    export default {
        props: {
            reload: {
                type: Boolean,
                default: true,
            }
        },
        components: {UploadFile, MultiUploadFiles},
        data() {
            return {
                edit_company_info: {
                    manager_first_name: '',
                    manager_last_name: '',
                    id_number: '',
                    creation_date: '',
                    company_name: '',
                    address: '',
                    city: '',
                    postal_code: '',
                    country: '',
                    document_images: [],
                    comment: '',
                    new_images: [],
                    deleted_images: [],
                    front_image: '',
                    back_image: ''
                },
                edit_manager_card: {
                    id_card_number: '',
                    issue_date: '',
                    expiry_date: '',
                    document_images: [],
                    comment: '',
                    new_images: [],
                    deleted_images: [],
                },
                edit_transport_license: {
                    license_number: '',
                    issue_date: '',
                    expiry_date: '',
                    document_images: [],
                    comment: '',
                    new_images: [],
                    deleted_images: [],
                },
                edit_certificate_insurance: {
                    insurance_company: '',
                    amount_insured: '',
                    start_date: '',
                    end_date: '',
                    document_images: [],
                    comment: '',
                    new_images: [],
                    deleted_images: [],
                },
                editCompanyInfoMode: false,
                editManagerCardMode: false,
                editTransportLicenseMode: false,
                editCertificateInsuranceMode: false,
                loadingCompanyInfo: false,
                loadingManagerCard: false,
                loadingTransportLicense: false,
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
            // legal_documents() {
            //     if(!this.profile.legal_documents.legal_documents)
            //     {
            //         this.profile.legal_documents.legal_documents = {
            //             manager_first_name:'',
            //             manager_last_name:'',
            //             id_number:'',
            //             creation_date:'',
            //             company_name:'',
            //             address:'',
            //             city:'',
            //             postal_code:'',
            //             country:'',
            //             document_images:[],
            //             comment:'',
            //             new_images:[],
            //             deleted_images:[],
            //             front_image:'',
            //             back_image:'',
            //             is_created: false
            //         };
            //     }
            //     else {
            //         this.profile.legal_documents.legal_documents.is_created = true;
            //     }
            //     return this.profile.legal_documents.legal_documents
            // },
            // manager_card() {
            //     if(!this.profile.legal_documents.manager_card)
            //     {
            //         this.profile.legal_documents.manager_card = {
            //             id_card_number:'',
            //             issue_date:'',
            //             expiry_date:'',
            //             document_images:[],
            //             comment:'',
            //             new_images:[],
            //             deleted_images:[],
            //             is_created: false
            //         }
            //     }
            //     else {
            //         this.profile.legal_documents.manager_card.is_created = true;
            //     }
            //     return this.profile.legal_documents.manager_card
            // },
            // transport_license() {
            //     if(!this.profile.legal_documents.transport_license)
            //     {
            //         this.profile.legal_documents.transport_license = {
            //             license_number:'',
            //             issue_date:'',
            //             expiry_date:'',
            //             document_images:[],
            //             comment:'',
            //             new_images:[],
            //             deleted_images:[],
            //             is_created: false
            //         }
            //     }
            //     else {
            //         this.profile.legal_documents.transport_license.is_created = true;
            //     }
            //     return this.profile.legal_documents.transport_license
            // },
            // certificate_insurance() {
            //     if(!this.profile.legal_documents.certificate_insurance) {
            //         this.profile.legal_documents.certificate_insurance = {
            //             insurance_company:'',
            //             amount_insured:'',
            //             start_date:'',
            //             end_date:'',
            //             document_images:[],
            //             comment:'',
            //             new_images:[],
            //             deleted_images:[],
            //             is_created: false
            //         }
            //     }
            //     else {
            //         this.profile.legal_documents.certificate_insurance.is_created = true;
            //     }
            //     return this.profile.legal_documents.certificate_insurance
            // },
        },
        methods: {
            editCompanyInfo() {
                this.edit_company_info.id = this.documents.company_info.id;
                this.edit_company_info.manager_first_name = this.documents.company_info.manager_first_name;
                this.edit_company_info.manager_last_name = this.documents.company_info.manager_last_name;
                this.edit_company_info.id_number = this.documents.company_info.id_number;
                this.edit_company_info.creation_date = this.documents.company_info.creation_date;
                this.edit_company_info.company_name = this.documents.company_info.company_name;
                this.edit_company_info.address = this.documents.company_info.address;
                this.edit_company_info.city = this.documents.company_info.city;
                this.edit_company_info.postal_code = this.documents.company_info.postal_code;
                this.edit_company_info.country = this.documents.company_info.country;
                this.edit_company_info.document_images = this.documents.company_info.document_images;
                this.edit_company_info.is_created = this.documents.company_info.is_created;
                this.editCompanyInfoMode = true;
            },
            editManagerCard() {
                this.edit_manager_card.id = this.documents.manager_card.id;
                this.edit_manager_card.id_card_number = this.documents.manager_card.id_card_number;
                this.edit_manager_card.issue_date = this.documents.manager_card.issue_date;
                this.edit_manager_card.expiry_date = this.documents.manager_card.expiry_date;
                this.edit_manager_card.document_images = this.documents.manager_card.document_images;
                this.edit_manager_card.is_created = this.documents.manager_card.is_created;
                this.editManagerCardMode = true;
            },
            editTransportLicense() {
                this.edit_transport_license.id = this.documents.transport_license.id;
                this.edit_transport_license.license_number = this.documents.transport_license.license_number;
                this.edit_transport_license.issue_date = this.documents.transport_license.issue_date;
                this.edit_transport_license.expiry_date = this.documents.transport_license.expiry_date;
                this.edit_transport_license.document_images = this.documents.transport_license.document_images;
                this.edit_transport_license.is_created = this.documents.transport_license.is_created;
                this.editTransportLicenseMode = true;
            },
            editCertificateInsurance() {
                this.edit_certificate_insurance.id = this.documents.certificate_insurance.id;
                this.edit_certificate_insurance.insurance_company = this.documents.certificate_insurance.insurance_company;
                this.edit_certificate_insurance.amount_insured = this.documents.certificate_insurance.amount_insured;
                this.edit_certificate_insurance.start_date = this.documents.certificate_insurance.start_date;
                this.edit_certificate_insurance.end_date = this.documents.certificate_insurance.end_date;
                this.edit_certificate_insurance.document_images = this.documents.certificate_insurance.document_images;
                this.edit_certificate_insurance.is_created = this.documents.certificate_insurance.is_created;
                this.editCertificateInsuranceMode = true;
            },
            async confirm(type) {
                let formData = new FormData();
                // let payload = {
                //     type: type,
                //     is_approved: false,
                //     document:'',
                //     profile_id: this.profile.id
                // };
                let document = '';
                if (type == 1) {
                    this.loadingCompanyInfo = true;
                    document = this.edit_company_info;
                }
                if (type == 2) {
                    this.loadingManagerCard = true;
                    document = this.edit_manager_card;
                }
                if (type == 3) {
                    this.loadingTransportLicense = true;
                    document = this.edit_transport_license;
                }
                if (type == 4) {
                    this.loadingCertificateInsurance = true;
                    document = this.edit_certificate_insurance;
                }
                // formData.append('legal_document', JSON.stringify(payload));
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
                if (document.is_created === false) {
                    path = '/transporter/profile/document/create'
                }

                await axios.post(path, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(resp => {
                    // this.profile.company_info = resp.data.documents;
                    this.$store.commit('setProfile', resp.data.profile);
                    this.$store.commit('setDocuments', resp.data.profile.documents);
                    if (type == 1) {
                        this.loadingCompanyInfo = false;
                        this.editCompanyInfoMode = false;
                    }
                    if (type == 2) {
                        this.loadingManagerCard = false;
                        this.editManagerCardMode = false;
                    }
                    if (type == 3) {
                        this.loadingTransportLicense = false;
                        this.editTransportLicenseMode = false;
                    }
                    if (type == 4) {
                        this.loadingCertificateInsurance = false;
                        this.editCertificateInsuranceMode = false;
                    }
                }).catch(error => {
                    console.log(error);
                    if (type == 1) {
                        this.loadingCompanyInfo = false;
                        this.editCompanyInfoMode = false;
                    }
                    if (type == 2) {
                        this.loadingManagerCard = false;
                        this.editManagerCardMode = false;
                    }
                    if (type == 3) {
                        this.loadingTransportLicense = false;
                        this.editTransportLicenseMode = false;
                    }
                    if (type == 4) {
                        this.loadingCertificateInsurance = false;
                        this.editCertificateInsuranceMode = false;
                    }
                });
            },
            removeFile(key, type) {
                if (type == 1) {
                    this.edit_company_info.deleted_images.push(this.edit_company_info.document_images[key]);
                    this.edit_company_info.splice(key, 1);
                }
                if (type == 2) {
                    this.edit_manager_card.deleted_images.push(this.edit_manager_card.document_images[key]);
                    this.edit_manager_card.splice(key, 1);
                }
                if (type == 3) {
                    this.edit_transport_license.deleted_images.push(this.edit_transport_license.document_images[key]);
                    this.edit_transport_license.splice(key, 1);
                }
                if (type == 4) {
                    this.edit_certificate_insurance.deleted_images.push(this.edit_certificate_insurance.document_images[key]);
                    this.edit_certificate_insurance.splice(key, 1);
                }
            },
            startUpload(ref) {
                this.$refs[ref].startUpload();
            },
        },
        directives: {mask},
        mounted() {


                this.$store.dispatch('getUser');

        }
    }
</script>
