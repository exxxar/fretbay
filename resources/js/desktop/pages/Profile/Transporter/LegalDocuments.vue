<template>
    <div class="tab-content col-md-12 col-lg-8">
        <div class="tab1_1 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="tab-title">Legal documents</h2>
                        <h4 class="tab-subtitle tab-subtitle-left">Legal informations of your company</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Name of the manager</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">First name of the manager</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Trade register ID number</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Date of creation</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Company name</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Address</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">City</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Postal code</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Country</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <h4>Document prouvant l'existance réelle de votre société</h4>
                        <div class="row upload-block">
                            <div class="col-sm-6">
                                <label for="" class="document-upload">
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                    <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Recto</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="document-upload">
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                    <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Verso</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-standard text-uppercase btn-success">confirm</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="tab1_2 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                        <h4 class="tab-subtitle tab-subtitle-left">Manager's ID card</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="" class="text-lg">ID card number</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Issue date</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="jj/mm/aaaa">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="text-lg">Expiry date</label>
                                    <input type="text" class="form-control-empty form-control" placeholder="jj/mm/aaaa">
                                </div>
                            </div>
                        </div>
                        <h4>Document officiel de la pièce d'identité du gérant</h4>
                        <div class="row upload-block">
                            <div class="col-sm-6">
                                <label for="" class="document-upload">
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                    <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Recto</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="document-upload">
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                    <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Verso</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-standard text-uppercase btn-success">confirm</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="tab1_3 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h4 class="tab-subtitle tab-subtitle-left">Transport license</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="text-lg">License number</label>
                                <input type="text" class="form-control-empty form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="text-lg">Issue date</label>
                                <input type="text" class="form-control-empty form-control" placeholder="jj/mm/aaaa">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="text-lg">Expiry date</label>
                                <input type="text" class="form-control-empty form-control" placeholder="jj/mm/aaaa">
                            </div>
                        </div>
                    </div>
                    <h4>Document officiel de la licence de transport</h4>
                    <div class="row upload-block">
                        <div class="col-sm-6">
                            <label for="" class="document-upload">
                                <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Recto</span>
                                    </span>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="document-upload">
                                <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Verso</span>
                                    </span>
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-standard text-uppercase btn-success">confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab1_4 tab">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h4 class="tab-subtitle tab-subtitle-left">Certificate of pro. insurance</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="text-lg">Insurance company</label>
                                <input type="text" class="form-control-empty form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="text-lg">Amount insured</label>
                                <input type="text" class="form-control-empty form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="text-lg">Start date</label>
                                <input type="text" class="form-control-empty form-control" placeholder="jj/mm/aaaa">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="text-lg">End date</label>
                                <input type="text" class="form-control-empty form-control" placeholder="jj/mm/aaaa">
                            </div>
                        </div>
                    </div>
                    <h4>Document officiel de l'attestation d'assurance pro.</h4>
                    <div class="row upload-block">
                        <div class="col-sm-6">
                            <label for="" class="document-upload">
                                <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Recto</span>
                                    </span>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="document-upload">
                                <input type="file" accept=".jpg,.jpeg,.png,.pdf">
                                <span>
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/upload-icon-primary.svg" alt="" class="upload-icon">
                                        <span class="upload-text">Verso</span>
                                    </span>
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-standard text-uppercase btn-success">confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

    }
</script>
