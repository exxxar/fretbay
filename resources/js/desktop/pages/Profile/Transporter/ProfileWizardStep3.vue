<template>
    <div>
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
                                        <h2 class="text-bold step-title">Your vehicles</h2>
                                        <div class="wrapper">
                                            <div class="lock-padding logo__link">
                                                <a href="#popup" class="popup-link popup__link">
                                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/add-vehicle.svg" alt="" width="110px" height="110px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="vehicles-list">
                                    <li class="vtable-sm">
                                        <div class="cell cell-img">
                                            <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/truck-colored.svg" alt="">
                                        </div>
                                        <div class="cell">
                                            <small>
                                                Type
                                            </small>
                                            <strong>
                                                Car
                                            </strong>
                                        </div>
                                        <div class="cell">
                                            <small>
                                                Mark
                                            </small>
                                            <strong>
                                                ???
                                            </strong>
                                        </div>
                                        <div class="cell">
                                            <small>
                                                Model
                                            </small>
                                            <strong>
                                                ???
                                            </strong>
                                        </div>
                                        <div class="cell">
                                            <small>
                                                Gross weight
                                            </small>
                                            <strong>
                                                ???
                                            </strong>
                                        </div>
                                        <div class="cell">
                                            <small>
                                                Gross weight
                                            </small>
                                            <strong>
                                                ???
                                            </strong>
                                        </div>
                                        <div class="cell">
                                            <small>
                                                Cubing in m <sup>3</sup></small>
                                            <strong>
                                                ???
                                            </strong>
                                        </div>
                                        <div class="cell">
                                            <a class="icon-remove" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 118.86 151.34"><path d="M59.43,0A13.81,13.81,0,0,1,73,11.14h-27A13.8,13.8,0,0,1,59.43,0Z"/><path d="M118.86,31.53a10.2,10.2,0,0,1-10.19,10.19H10.19A10.2,10.2,0,0,1,0,31.53v-1a10.21,10.21,0,0,1,10.19-10.2h98.48a10.21,10.21,0,0,1,10.19,10.2v1Z"/><path d="M12.25,50.92v90.22a10.22,10.22,0,0,0,10.2,10.2h74a10.22,10.22,0,0,0,10.2-10.2V50.92ZM39.38,135a4.6,4.6,0,1,1-9.2,0V83.21a4.6,4.6,0,0,1,9.2,0ZM64,135a4.6,4.6,0,1,1-9.2,0V83.21a4.6,4.6,0,0,1,9.2,0Zm24.65,0a4.6,4.6,0,0,1-9.2,0V83.21a4.6,4.6,0,0,1,9.2,0Z"/></svg></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="content-box row">
                                    <div class="col-lg-10">
                                        <a href="#" class="btn-darkgray">Add vehicle</a>
                                        <h2 class="text-bold step-title">Drivers</h2>
                                        <form class="text-left">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group group-form-inline">
                                                        <label class="wizard-text">Number of drivers</label>
                                                        <input type="text" class="form-control wizard-input">
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
        <!--todo: вынести в компонент-->
        <div id="popup" class="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <!-- <a href="#popup" class="popup__close close-popup"></a> -->


                    <h4>New vehicle</h4>
                    <div class="form">
                        <form action="#">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="label-popup">Type</label>
                                        <input type="text" class="form-control wizard-input">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="label-popup">Mark</label>
                                        <input type="text" class="form-control wizard-input">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="label-popup">Model</label>
                                        <input type="text" class="form-control wizard-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="label-popup">Numberplate</label>
                                        <input type="text" class="form-control wizard-input">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="label-popup">Cubing in m <sup>3</sup></label>
                                        <input type="text" class="form-control wizard-input">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="label-popup">Gross weight</label>
                                        <input type="text" class="form-control wizard-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="label-popup">Covered?</label>
                                        <a type="text" class="form-control wizard-input wizard-link">
                                            To choose
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center document-upload-block">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="document-upload">
                                            <input class="hide" type="file" accept=".jpg,.jpeg,.png,.pdf">
                                            <span class="d-block" ng-if="!companyDoc.file1">
                                 <img class="upload-icon" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="">
                                 <span class="upload-text">Download</span>
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
                                 <span class="upload-text">Download</span>
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
                                <div class="modal-footer">
                                    <button id="companyDocsButton" type="button" class="btn-dlue">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
