<template>
    <section id="profile-wizard2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="profile-wizard">
                        <div class="step">
                            <div class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                            <div class="content-box row">
                                <div class="col-lg-10">
                                    <span>Get started on FretBay!</span>
                                    <h2 class="text-bold step-title">Pro insurance certificate.</h2>
                                    <p class="info-box"><strong>Requires</strong> : Insurance certificate <strong>showing</strong> the name of your business</p>
                                    <form class="text-left">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="wizard-text">Insurance company</label>
                                                    <input type="text" class="form-control wizard-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="wizard-text">Insured amount</label>
                                                    <input type="text" class="form-control wizard-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="wizard-text">Start date</label>
                                                    <input type="text" class="form-control wizard-input" placeholder="dd / mm / yyyy">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="wizard-text">End date</label>
                                                    <input type="text" class="form-control wizard-input" placeholder="dd / mm / yyyy">
                                                </div>
                                            </div>
                                        </div>

                                        <h5> Official document of the manager's identity document</h5>
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="document-upload">
                                                        <input class="hide" type="file" accept=".jpg,.jpeg,.png,.pdf">
                                                        <span class="d-block" ng-if="!companyDoc.file1">
                                             <img class="upload-icon" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="">
                                             <span class="upload-text">Front</span>
                                          </span>
                                                        <!-- <span ng-if="companyDoc.file1" class="custom-hide" ng-class="{'custom-active' : companyDoc.file1}">
                                                           <a class="remove-doc" href="javascript:void(0);" ng-click="setFileNull('companyDoc', 'file1');"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/cross.svg" alt="Remove Image"></a>
                                                           <span class="d-block text-left">{{companyDoc.file1.name | limitTo:28}}</span>

                                                           <span class="uploaded-doc-wrap">

                                                              <img ng-if="companyDoc.file1.ext == 'jpg' || companyDoc.file1.ext == 'jpeg' || companyDoc.file1.ext == 'png'" class="uploaded-doc" ng-src="data:{{companyDoc.file1.type}};base64,{{companyDoc.file1.base64}}" alt="{{companyDoc.file1.name}}">

                                                              <img ng-if="companyDoc.file1.ext == 'pdf'" class="uploaded-doc pdf" ng-src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/pdf-icon.svg" alt="{{companyDoc.file1.name}}">
                                                           </span>
                                                        </span> -->
                                                    </label>
                                                    <!-- <p class="custom-hide">La taille du fichier est limitée à 5Mb</p> -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="document-upload">
                                                        <input class="hide" type="file" accept=".jpg,.jpeg,.png,.pdf">
                                                        <span class="d-block" ng-if="!companyDoc.file1">
                                             <img class="upload-icon" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="">
                                             <span class="upload-text">Back</span>
                                          </span>
                                                        <!-- <span ng-if="companyDoc.file1" class="custom-hide" ng-class="{'custom-active' : companyDoc.file1}">
                                                           <a class="remove-doc" href="javascript:void(0);" ng-click="setFileNull('companyDoc', 'file1');"><img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/cross.svg" alt="Remove Image"></a>
                                                           <span class="d-block text-left">{{companyDoc.file1.name | limitTo:28}}</span>

                                                           <span class="uploaded-doc-wrap">

                                                              <img ng-if="companyDoc.file1.ext == 'jpg' || companyDoc.file1.ext == 'jpeg' || companyDoc.file1.ext == 'png'" class="uploaded-doc" ng-src="data:{{companyDoc.file1.type}};base64,{{companyDoc.file1.base64}}" alt="{{companyDoc.file1.name}}">

                                                              <img ng-if="companyDoc.file1.ext == 'pdf'" class="uploaded-doc pdf" ng-src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/pdf-icon.svg" alt="{{companyDoc.file1.name}}">
                                                           </span>
                                                        </span> -->
                                                    </label>
                                                    <!-- <p class="custom-hide">La taille du fichier est limitée à 5Mb</p> -->
                                                </div>

                                            </div>

                                            <button id="companyDocsButton" type="button" class="btn-success">following</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
