<template>
    <div class="page-content profile-page-content">
        <div class="container px-xs-0">
            <div class="content-box-padding">
                <div class="content-overlay-outer">
                    <div class="banner text-center">
                        <div class="avatar-wrapper">

                            <label for="" class="avatar-label">
                                <span class="img-placeholder">
                                     <img v-lazy="" alt="">
                                  <!--  <input type="file" class="hide">-->
                                </span>
                            </label>
                        </div>
                        <div class="username-wrapper">
                            <h3 class="username">{{user.name}}</h3>
                            <p class="member-since">Member since <span class="text-small">{{user.created_at}}</span></p>
                        </div>
                        <ul class="jobs-detail">
                            <li>To be confimerd <span class="job-count">0</span></li>
                            <li>Expired <span class="job-count">0</span></li>
                            <li>Validated <span class="job-count">0</span></li>
                        </ul>
                        <a href="/logout" class="logout">
                            <img src="https://fretbay.com/en/assets/images/common/icons/general/logout.svg" alt="">
                            <span>Log out</span>
                        </a>
                    </div>
                    <div class="notification-section">
                        <span class="h5 section-title">Notification Center</span>
                        <label for="" class="vcheck vswitch">
                            <input type="checkbox" class="ng-pristine ng-untouched ng-valid ng-not-empty" checked>
                            <span>Email <em></em></span>
                        </label>
                        <label for="" class="vcheck vswitch">
                            <input type="checkbox">
                            <span>SMS <em></em></span>
                        </label>
                        <label for="" class="vcheck vswitch">
                            <input type="checkbox">
                            <span>Facebook <em></em></span>
                        </label>
                        <label for="" class="vcheck vswitch">
                            <input type="checkbox">
                            <span>Newsletter <em></em></span>
                        </label>
                    </div>
                </div>
                <div class="profile-form">
                    <div class="clearfix text-xs-center">
                        <div class="pull-sm-left">
                            <h5 class="section-title">My account</h5>
                        </div>
                        <div class="pull-sm-right">
                            <span class="btn-group bg-white account-type-label active">
                                <label for="" class="vcheck active">
                                    <input type="radio">
                                    <span>Individual</span>
                                </label>
                                <label for="" class="vcheck">
                                    <input type="radio">
                                    <span>Professional</span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="row form-group-lg">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" :value="user.profile.second_name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group"><input type="text" class="form-control" placeholder="First name" :value="user.profile.first_name"></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-lg">
                                <div class="custom-phone-menu-wrapper">
                                    <div class="custom-phone-menu">
                                        <div class="dropdown">
                                            <div class="ui-select-match">
                                                <span class="btn btn-default form-control ui-select-toggle" disabled="disabled">
                                                    <span class="ui-select-placeholder text-muted">Search</span>
                                                    <span class="ui-select-match-text pull-left">
                                                        <span class="flag flag-fr"></span>
                                                        33
                                                    </span>
                                                    <i class="caret pull-right"></i>
                                                    <a href="" class="btn btn-xs btn-link pull-right"></a>
                                                </span>
                                            </div>
                                            <span class="glyphicon"></span>
                                            <input type="search" placeholder="Search" class="from-control ng-hide">
                                            <ui class="ui-select-choices ui-select-dropdown dropdown-menu">
                                                <li class="ui-select-choices-group"></li>
                                            </ui>
                                        </div>
                                        <input type="text" class="form-control phone-field" placeholder="Phone" disabled="disabled" maxlength="10" :value="user.profile.telephone_number_1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-lg">
                                <div class="custom-phone-menu-wrapper">
                                    <div class="custom-phone-menu">
                                        <div class="dropdown">
                                            <div class="ui-select-match">
                                                <span class="btn btn-default form-control ui-select-toggle">
                                                    <span class="ui-select-placeholder text-muted">Search</span>
                                                    <span class="ui-select-match-text pull-left">
                                                        <span class="flag flag-fr"></span>
                                                        33
                                                    </span>
                                                    <i class="caret pull-right"></i>
                                                    <a href="" class="btn btn-xs btn-link pull-right"></a>
                                                </span>
                                            </div>
                                            <span class="glyphicon"></span>
                                            <input type="search" placeholder="Search" class="from-control ng-hide">
                                            <ui class="ui-select-choices ui-select-dropdown dropdown-menu">
                                                <li class="ui-select-choices-group"></li>
                                            </ui>
                                        </div>
                                        <input type="text" class="form-control phone-field" placeholder="Phone" maxlength="10" :value="user.profile.telephone_number_2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-has-icon-left">
                                    <input type="email" class="form-control" disabled value="test@email.com">
                                    <span class="rel-icon">
                                        <img src="https://fretbay.com/en/assets/images/common/icons/general/email.svg" alt="">
                                    </span>
                                </div>
                            </div></div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address" :value="user.profile.address"></div>
                        </div>
                    </div>
                </div>
                <div class="row text-xs-center">
                    <div class="col-sm-6 col-sm-pull-6">
                        <a href="#" class="delete-account">Delete my account</a>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                        <a href="#" class="btn btn-link reset-password">Change password</a>
                        <button class="btn btn-primary btn-lg">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            user() {
                return JSON.parse(window.user)
            }
        },
    }
</script>

<style lang="scss">
    .img-placeholder {
        display: flex !important;
    }

</style>
