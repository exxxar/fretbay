<template>
<div>
    <section id="steps-wrap">
        <div class="container">
            <ul class="steps__list row">
                <div class="col-md-4">
                    <li>
                        <span class="step-num-find">
                            1
                        </span>
                        <p>
                            <span>
                                FIND CUSTOMERS
                            </span>
                            To optimize your tours.
                        </p>
                    </li>
                </div>
                <div class="col-md-4">
                    <li>
                        <span class="step-num-find">
                            2
                        </span>
                        <p>
                            <span>
                                SUBMIT YOUR QUOTE
                            </span>
                            To optimize your tours.
                        </p>
                    </li>
                </div>
                <div class="col-md-4">
                    <li>
                        <span class="step-num-find">
                            3
                        </span>
                        <p>
                            <span>
                                INCREASE YOUR SALES REVENUE
                            </span>
                            To optimize your tours.
                        </p>
                    </li>
                </div>
            </ul>
        </div>
    </section>
    <section id="contents">
        <div class="clearfix">
            <div class="content">
                <div class="sliding-filter">
                    <div class="sliding-filter-inner">
                        <form action="#" class="sliding-filter-inner__form">
                            <div class="sfi-inputs">
                                <div class="input-has-icon-left">
                                    <span class="rel-icon-square">
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/marker-loading.svg">
                                    </span>
                                    <input class="form-control form-sfi-control" type="text" placeholder="City, Postal code, Region, Country">
                                </div>
                                <div class="input-has-icon-left">
                                    <span class="rel-icon-square">
                                        <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/marker-delivery.svg">
                                    </span>
                                    <input class="form-control form-sfi-control" type="text" placeholder="City, Postal code, Region, Country">
                                </div>
                            </div>
                            <div class="sfi-img">
                                <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/shuffle.svg" widht="20" height="20">
                            </div>
                        </form>
                    </div>
                    <div class="row-narrow">
                        <div class="date-field">
                            <input class="date-input" type="text" placeholder="Dates" id="loadingDatePicker">
                            <label for="loadingDatePicker">
                                <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/general/calendar-transparent.svg">
                            </label>
                        </div>
                        <ul class="list-unstyled">
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp1">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/1.svg?v=0.0.4">
                                    <input type="checkbox" id="inp1" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Household equipment
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp2">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/2.svg?v=0.0.4">
                                    <input type="checkbox" id="inp2" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Moving
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp3">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/3.svg?v=0.0.4">
                                    <input type="checkbox" id="inp3" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Vehicle
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp4">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/5.svg?v=0.0.4">
                                    <input type="checkbox" id="inp4" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Boats & voluminous
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp5">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/6.svg?v=0.0.4">
                                    <input type="checkbox" id="inp5" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Miscellaneous
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp6">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/9.svg?v=0.0.4">
                                    <input type="checkbox" id="inp6" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Commercial goods
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp7">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/11.svg?v=0.0.4">
                                    <input type="checkbox" id="inp7" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Animals
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp8">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/13.svg?v=0.0.4">
                                    <input type="checkbox" id="inp8" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Fragile goods
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp9">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/14.svg?v=0.0.4">
                                    <input type="checkbox" id="inp9" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Agri-food
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp10">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/17.svg?v=0.0.4">
                                    <input type="checkbox" id="inp10" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Motorcycles and sports vehicles
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp11">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/18.svg?v=0.0.4">
                                    <input type="checkbox" id="inp11" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Package/Fold
                                    </span>
                                </label>
                            </li>
                            <li class="category-item">
                                <label class="vcheck on-right" for="inp12">
                                    <img src="https://fretbay.com/fr/frv2/assets/images/common/icons/category/dark/19.svg?v=0.0.4">
                                    <input type="checkbox" id="inp12" name="categories[]">
                                    <span class="ng-binding">
                                        <em></em>
                                        Pallet
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="reference-block">
                        <h5 class="align-middle">
                            Reference
                        </h5>
                        <input type="text" class="form-control ref" placeholder="Ex : 345765">
                    </div>
                </div>
                <div class="main-content">
                    <ul class="listing-header">
                        <li>
                            Name
                        </li>
                        <li>
                            Activity
                        </li>
                        <li>
                            Loading
                        </li>
                        <li>
                            Delivery
                        </li>
                        <li>
                            Distance
                        </li>
                        <li>
                            Expiration
                        </li>
                    </ul>
                    <div class="promoted-listings">
                        <div class="promoted-listings-item">
                            <div class="td-publication">
                                <span>
                                    Since
                                </span>
                                <strong>
                                    17 days
                                </strong>
                            </div>
                            <div class="td-nom">
                                <a href="#" class="category category-2">
                                    <span>
                                        Déménagement 17.35m
                                    </span>
                                </a>
                                <span class="listing-status">
                                    Priority listing
                                </span>
                                <div class="tags-wrapper">
                                    <span>
                                        Economique
                                    </span>
                                    <span>
                                        12 m
                                        <sup>3</sup>
                                    </span>
                                </div>
                            </div>
                            <div class="td-activity">
                                <div class="bid-info">
                                    <strong>
                                        2
                                    </strong>
                                    <em>
                                        (
                                    </em>
                                    <strong>
                                        4
                                    </strong>
                                    <span>
                                        in progress
                                    </span>
                                    <em>
                                        )
                                    </em>
                                </div>
                                <div class="msg-info">
                                    <strong>
                                        1
                                    </strong>
                                    <em>
                                        message
                                    </em>
                                </div>
                            </div>
                            <div class="td-loading">
                                <strong>
                                    Auvergne-Rhone-Alpes (63000)
                                </strong>
                                <br>
                                <small>
                                    <span>
                                        Between
                                    </span>
                                    <strong>
                                        26/04
                                    </strong>
                                    <span>
                                        and
                                    </span>
                                    <strong>
                                        01/05
                                    </strong>
                                </small>
                            </div>
                            <div class="td-delivery">
                                <strong>
                                    Auvergne-Rhone-Alpes (63000)
                                </strong>
                                <br>
                                <small>
                                    <span>
                                        Between
                                    </span>
                                    <strong>
                                        26/04
                                    </strong>
                                    <span>
                                        and
                                    </span>
                                    <strong>
                                        01/05
                                    </strong>
                                </small>
                            </div>
                            <div class="td-distance">
                                <div class="title">
                                    <strong>
                                        1,35
                                    </strong>
                                    <span>
                                        km
                                    </span>
                                </div>
                                <div class="ng-binding">
                                    0h6
                                </div>
                            </div>
                            <div class="td-expiration">
                                <span>
                                    in
                                </span>
                                <div>
                                    <strong>
                                        1
                                    </strong>
                                    month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
</template>

<script>
export default {
    data() {
        return {
        }
    },

}
</script>
