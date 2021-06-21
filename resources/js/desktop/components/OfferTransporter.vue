<template>
    <li>
        <div class="profile-info text-left">
            <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/truck-colored.svg" alt="">
            <a href="#" target="_blank" class="btn-link username">Fasstcaab</a>
            <div class="rating-wrapper">
                                                <span class="rating-bar ng-isolate-scope">
                                                    <span class="star filled"></span>
                                                    <span class="star filled"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                    <span class="star"></span>
                                                </span>
            </div>
        </div>
        <div class="td-price">
            <span class="price">380€</span>
            <a class="text-small" href="#">See details</a>
        </div>
        <div class="td-last text-center">
            <span class="text-danger text-small">Expired</span>
        </div>
    </li>
</template>

<script>
    export default {
        name: "OfferTransporter"
    }
</script>
