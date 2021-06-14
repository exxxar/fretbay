<template>
    <header>
        <div class="navbar-transporter navbar-fixed-top navbar navbar-default col-xs-center col-sm-center">
            <span class="nav-overlay">&nbsp;</span>
            <div class="container-fluid">
                <div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle custom-nav-btn collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="https://fretbay.com/fr/frv2/assets/images/common/logos/logo-header.svg?v=0.0.0" alt="">
                        </a>

                        <ul class="nav navbar-nav navbar-right hidden-lg">
                            <li class="dropdown dropdown-profile">
                                <a href="#" class="dropdown-toggle">
                                    <img class="header-user-img" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/shipper.svg" alt="">
                                </a>
                            </li>
                            <li class="notification-menu-toggle">
                                <a href="#" class="dropdown-toggle">
							<span>
								<strong class="red-dot-badge hide"></strong>
								<span class="notification-icon"></span>
							</span>
                                </a>
                                <div class="dropdown-menu notification-menu">
                                    <div class="notification-menu-body ">
                                        <div class="p10 text-center text-mute  ">
                                            Notifications unavailable
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="hidden-lg hidden-xs request-quote "><a href="#">Request a quote</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <ul class="right-navigation-menu nav navbar-nav navbar-right">
                        <li class=""><a href="#">My company</a></li>
                        <li class=""><a href="#">Find loads</a></li>
                        <li class=""><a href="#">My quotes</a></li>
                        <li class=""><a href="#">My messages</a></li>
                        <li class=""><a href="#">My loadings</a></li>
                        <li class=""><a href="#">My evaluations</a></li>
                        <li class="notification-menu-toggle">
                            <a href="#" class="dropdown-toggle">
					        <span>
					            <strong class="red-dot-badge hide"></strong>
					            <span title="Notifications" class="notification-icon"></span>
					        </span>
                            </a>

                            <div class="dropdown-menu notification-menu">
                                <div class="notification-menu-body">
                               <div class="p10 text-center text-mute ">
                                Notifications unavailable
                            </div>
                            </div>
                            </div>
                        </li>

                        <li class="btn-dropdown dropdown dropdown-profile">
                            <a href="#" class="dropdown-toggle">
                                <span class="user-avatar user-n">&nbsp;</span>
                                <img class="arrow-down" src="https://fretbay.com/en/assets/images/common/icons/general/arrow-down-select.svg" alt="">
                            </a>
                            <ul class="dropdown-menu text-lg">
                                <li class="active"><a href="#">Account settings</a></li>
                                <li><a href="#">Sign out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
    export default {

    }
</script>
<style lang="scss">

</style>
