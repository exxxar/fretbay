<template>
    <div>
        <notifications position="top right" :group="'main'">
            <template slot="body" slot-scope="props">

                <div class="notification-box show" :data-id="props.id">
                    <div class="notification-dialog ios-style">
                        <div class="notification-header">
                            <div class="in">
                                <img src="/img/travel/logo-1.png" alt="image" class="imaged w24 rounded">
                                <strong>Travel Club</strong>
                                <span class="ml-1">сейчас</span>
                            </div>
                            <a href="#" class="close-button" @click="props.close">
                                <i class="fas fa-times-circle"></i>
                            </a>
                        </div>
                        <div class="notification-content">
                            <div class="in">
                                <h3 class="subtitle"> {{props.item.title}}</h3>
                                <div class="text" v-html="props.item.text">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </template>
        </notifications>
    </div>
</template>
<style lang="scss">
    .vue-notification-group {
        width: 100% !important;
        z-index: 9999999999;
    }

    .notification-dialog.ios-style {
        margin: 5px 10px 0px 10px !important;
    }
</style>
