<template>
    <section id="profile-page-content">
        <div class="container profile-block">
            <div class="content-overlay-outer">
                <div class="banner">
                    <a href="#" class="logout">
                        <img src="images/dest/logout.svg" alt="Logout" widht="24" height="24">
                        Log out
                    </a>
                </div>
                <div class="avatar-wrapper">
                    <label class="avatar-label">
                     <span>
                        <input type="file" image-uploader name="image" class="hide">
                        <img class="photo-avatar" src="#" alt="">
                         <!-- <a class="remove-photo" href="#">Delete</a> -->
                     </span>
                    </label>
                </div>
                <div class="username-wrapper">
                    <h3>
                        Liza2020
                    </h3>
                    <p>
                        Member since
                        <span class="text-small">
                        15/04/2021
                     </span>
                    </p>
                </div>
                <ul class="jobs-detail">
                    <li>To be confirmed <strong class="job-count">0</strong></li>
                    <li>Expired <strong class="job-count">0</strong></li>
                    <li>Validated <strong class="job-count">0</strong></li>
                </ul>
            </div>
            <div class="notification-section">
               <span class="notification-title">
                  Notification Center
               </span>
                <label class="notification-vcheck">
                    <input type="checkbox">
                    <span>
                     <em></em>Email
                  </span>
                </label>

                <label class="notification-vcheck">
                    <input type="checkbox">
                    <span>
                     <em></em>SMS
                  </span>
                </label>

                <label class="notification-vcheck">
                    <input type="checkbox">
                    <span>
                     <em></em>Facebook
                  </span>
                </label>

                <label class="notification-vcheck">
                    <input type="checkbox">
                    <span>
                     <em></em>Newsletter
                  </span>
                </label>
            </div>
            <!-- <div class="content-overlay">
               <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                     <h3 class="overlay-title">Don't miss unbeatable prices, use facebook alerts.</h3>
                     <p>You will be informed as soon as a message or a quote is posted on your request</p>
                     <p class="text-mute">You no longer need to come back to our website, you can manage everything from facebook (exchange, reservation, access to quotes)</p>
                     <ul class="btns list-inline">
                        <li>
                           <button type="button" class="btn-standard">Close</button>
                        </li>
                        <li>
                           <button type="button" class="btn-primary">Connect with Facebook</button>
                        </li>
                     </ul>
                  </div>
               </div>
            </div> -->
            <div class="profile-form">
                <div class="separate-content">
                    <h5>My account</h5>
                    <div class="btn-groups">
                     <span class="btn-group">
                        <label class="account-type-label">
                           <input type="radio" name="pro">
                           <span>Individual</span>
                        </label>
                        <label class="account-type-label">
                           <input type="radio" name="pro">
                           <span>Professional</span>
                        </label>
                     </span>
                    </div>
                </div>
                <div class="row form-group-lg">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-lg">
                            <div class="custom-phone-menu-wrapper">
                                <div class="custom-phone-menu">
                                    <div class="dropdown">
											<span class="flag">
                                    <p>
                                       33
                                    </p>
                                 </span>
                                        <span class="caret"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-field gray-form" placeholder="Phone">
                            </div>
                            <!-- <div class="custom-phone-menu-wrapper">
                               <div class="custom-phone-menu">
                                  <span placeholder="Search">
                                     <span class="flag"></span>
                                     <span class="number"></span>
                                     <span class="caret"></span>
                                  </span>
                               </div>
                               <input type="text" class="form-control phone-field" placeholder="Phone">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-lg">
                            <div class="custom-phone-menu-wrapper">
                                <div class="custom-phone-menu">
                                    <div class="dropdown">
											<span class="flag">
                                    <p>
                                       33
                                    </p>
                                 </span>
                                        <span class="caret"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-field">
                            </div>
                            <!-- <div class="custom-phone-menu-wrapper">
                                        <div class="custom-phone-menu">
                                            <div class="dropdown">
                                                <div placeholder="Search">
                                        <span class="flag">
                                        </span>
                                     </div>
                                                <span>
                                                   <div>
                                           <span class="flag"></span>
                                           <span></span>
                                        </div>
                                                </span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-field" placeholder="Phone number">
                                    </div> -->
                            <!-- <div class="custom-phone-menu-wrapper">
                               <div class="custom-phone-menu">
                                  <span placeholder="Search">
                                     <span class="flag"></span>
                                     <span class="number"></span>
                                     <span class="caret"></span>
                                  </span>
                               </div>
                               <input type="text" class="form-control phone-field" placeholder="Phone">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group email-group">
                            <input type="text" class="form-control email-form gray-form" disabled=""
                                   value="grazion.elizaveta@gmail.com">
                            <span class="rel-icon"><img src="images/dest/email.svg" width="30px" height="30px"
                                                        alt=""></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="delete-account" href="#">Delete my account</a>
                </div>
                <div class="col-sm-6 primary-block">

                    <a href="#" class="reset-password">Change password</a>
                    <button class="btn-primary">Save</button>
                </div>

            </div>
        </div>

    </section>
</template>

<script>
    export default {}
</script>
<style lang="scss">

</style>
