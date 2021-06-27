<template>
    <header>
        <div class="navbar-fixed-top navbar navbar-default col-xs-center col-sm-center header-customer-profile">
            <span class="nav-overlay">&nbsp;</span>
            <div class="container">
                <div class="navbar-header-wrapper">
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
                                <div class="notification-menu-body ng-scope">
                                    <div class="p10 text-center text-mute ng-binding ng-scope">
                                        Notifications unavailable
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="hidden-lg hidden-xs request-quote "><a href="#">Request a quote</a></li>
                    </ul>
                </div>

                <div id="navbar-main" class="collapse show">
                    <ul class="nav navbar-nav">
                        <li class="link-primary"><a href="#">To be confirmed <span class="badge">2</span></a></li>
                        <li class="link-danger"><a href="#">Expired <span class="badge">0</span></a></li>
                        <li class="link-success"><a href="#">Validated <span class="badge">0</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">More <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Services</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
                <ul class="nav navbar-nav navbar-right visible-lg mr-0">
                    <li class="request-quote "><a href="#">Request a quote</a></li>
                    <li class="notification-menu-toggle">
                        <a href="#" class="dropdown-toggle">
							<span>
								<strong class="red-dot-badge hide"></strong>
								<span class="notification-icon"></span>
							</span>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <div class="notification-menu-body ng-scope">

                                <div class="p10 text-center text-mute ng-binding ng-scope">
                                    Notifications unavailable
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-profile">
                        <a href="#" class="dropdown-toggle">
                            <img class="header-user-img" src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/shipper.svg" alt="">

                        </a>
                    </li>
                </ul>
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
