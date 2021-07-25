<template>
    <div>
        <div class="container-fluid">
            <div class="row d-flex flex-column flex-lg-row justify-content-center  bg-white py-4">
                <div class="col-auto d-flex justify-content-lg-center align-items-center my-2">
                    <div class="bg-info  rounded-circle d-flex align-items-center mr-2">
                        <h2 style="padding: 0px; margin:0px" class="px-3 py-2 text-white font-weight-bold">1</h2>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="my-auto text-bold">FIND CUSTOMERS</p>
                        <p class="my-auto">To optimize your tours.</p>
                    </div>
                </div>
                <div class="col-auto d-flex justify-content-lg-center  align-items-center my-2">
                    <div class="bg-info  rounded-circle d-flex align-items-center mr-2">
                        <h2 style="padding: 0px; margin:0px" class="px-3 py-2 text-white font-weight-bold">2</h2>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="my-auto text-bold">SUBMIT YOUR QUOTE</p>
                        <p class="my-auto">To optimize your tours.</p>
                    </div>
                </div>
                <div class="col-auto d-flex justify-content-lg-center align-items-center my-2">
                <div class="bg-info  rounded-circle d-flex align-items-center mr-2">
                        <h2 style="padding: 0px; margin:0px" class="px-3 py-2 text-white font-weight-bold">3</h2>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="my-auto text-bold">INCREASE YOUR SALES REVENUE</p>
                        <p class="my-auto">To optimize your tours.</p>
                    </div>
            </div>
            </div>
            <div class="row w-100 mx-auto align-items-start">
                <div class="col-12 col-lg-2 col-xl-2 bg-white p-0">
                    <div class="sliding-filter-inner p-0 m-0 py-2">
                        <form action="#" class="sliding-filter-inner__form my-3 px-0 ml-4">
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
                    <div class="">
                        <div class="m-3 ml-4">
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
                    </div>
                </div>
                <div class="col-12 col-sm-10 mt-3">
                    <div class="row mx-auto my-2 w-100 listing-item" v-for="listing in listings">
                        <div class="card w-100" style="border: none; border-radius: 20px">
                            <div class="card-body">
<!--                                <div class="card-subtitle mb-2 text-muted">-->
<!--                                    <div class="bg-success rounded d-flex align-items-center mr-2">-->
<!--                                        <span style="padding: 0px; margin:0px" class="px-3 py-2 text-white font-weight-bold">{{listing.category.title}}</span>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="row mx-auto mb-2 w-100 align-items-center">
                                    <div class="col-12 col-sm-9">
                                        <h5 class="card-title mb-0">{{listing.category.title}}
                                            <span v-if="listing.category.mode ==='calculator'">
                                                  {{listing.summary_volume}}  <em class="volume-unit text-bold">m<sup>3</sup></em>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="row mx-auto mb-2 w-100 align-items-end justify-content-between justify-content-sm-end" style="font-size:1.85rem">
                                            <div class="mx-1">{{listing.messages.length}} <i class="fas fa-envelope"></i></div>
<!--                                            {{listing.quotes.length}}-->
                                           <div class="mx-1"> 0 <i class="fas fa-gavel"></i></div>
                                            <div class="mx-1">
                                                <i class="far fa-heart" style="color: #0fb15d"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto mb-2 w-100 align-items-start">
                                    <div class="col-12">
                                        <div class="row w-100 mx-auto my-2">
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);">{{listing.category.title}}</div>
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                                                 v-if="listing.category.mode ==='calculator'"
                                            >
                                                {{listing.summary_volume}}  <em class="volume-unit text-bold">m<sup>3</sup></em>
                                            </div>
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                                                 v-if="listing.category.mode ==='article' && listing.articles.length>1"
                                            >
                                                {{listing.articles.length}} articles
                                            </div>
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                                                 v-if="listing.category.mode ==='article' && listing.articles.length===1"
                                            >
                                                {{listing.articles[0].title}}
                                            </div>
<!--                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"-->
<!--                                                 v-if="listing.category.mode ==='article' && listing.articles[0] && listing.articles.length===1"-->
<!--                                            >-->
<!--                                                <div  v-for="(property, propertyName, index ) in listing.articles[0].properties" :key="index">-->
<!--                                                     {{propertyName}}:{{property.value}}-->
<!--                                                </div>-->

<!--                                            </div>-->
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                                                 v-if="listing.category.mode ==='article' && listing.articles.length===1"
                                                 v-for="property in listing.category.properties"
                                            >
                                                  {{property.title}}: {{listing.articles[0].properties[property.slug].value}}
                                            </div>
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                                                 v-if="listing.category.mode ==='grid'"
                                            >
                                                {{listing.subcategory.title}}
                                            </div>
                                            <div class="badge rounded-pill px-3 py-2 mx-1" style="background:rgba(15,177,93,0.48);"
                                                 v-if="listing.category.mode ==='grid'"
                                            >
                                                {{listing.thing.title}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <p class="mb-0" style="font-size: 12px; color: #8e949a">Publication time</p>
                                        Since {{listing.updated_at | moment("from", "now", true)}}
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <p class="mb-0" style="font-size: 12px; color: #8e949a">Place of loading</p>
                                        <strong>
                                            {{listing.place_of_loading.place_name}}
                                        </strong>
                                        <p class="mb-0">
                                            <small> Between
                                                <strong style="color: #0fb15d">
                                                    {{listing.shipping_date_from | moment('DD.MM')}}
                                                </strong>

                                                and

                                                <strong style="color: #0fb15d">
                                                    {{listing.shipping_date_to | moment('DD.MM')}}
                                                </strong>
                                            </small>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <p class="mb-0" style="font-size: 12px; color: #8e949a">Place of delivery</p>
                                        <strong>
                                            {{listing.place_of_delivery.place_name}}
                                        </strong>
                                        <p class="mb-0">
                                           <small> Between
                                               <strong style="color: #0fb15d">
                                                   {{listing.unshipping_date_from | moment('DD.MM')}}
                                               </strong> and
                                               <strong style="color: #0fb15d">
                                                   {{listing.unshipping_date_to | moment('DD.MM')}}
                                               </strong>
                                           </small>
                                       </p>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <p class="mb-0" style="font-size: 12px; color: #8e949a">Expiration</p>
                                        {{ listing.shipping_date_to | moment("from", "now")}}
                                        <!--                                       in {{ listing.expiration_date| duration('asDays')}} days-->
                                    </div>
                                </div>
                                <div class="row mx-auto w-100 justify-content-end">
                                    <button class="btn float-right listing-item-btn">
                                        More
                                    </button>
                                </div>
<!--                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="container-fluid align-items ">-->
<!--         <div class="table-responsive d-none d-lg-flex">-->
<!--             <table class="table table-light">-->
<!--                 <thead class="thead">-->
<!--                     <tr>-->
<!--                        <th scope="col">Name</th>-->
<!--                        <th scope="col">Activity</th>-->
<!--                        <th scope="col">Loading</th>-->
<!--                        <th scope="col">Delivery</th>-->
<!--                        <th scope="col">Distance</th>-->
<!--                        <th scope="col">Expiration</th>-->
<!--                     </tr>-->
<!--                 </thead>-->
<!--                 <tbody class="tbody">-->
<!--                    <tr v-for="listing in listings"> &lt;!&ndash; тут по идее v-for пихать &ndash;&gt;-->
<!--                        <td>-->
<!--                            <div class="d-flex align-items-center text-center">-->
<!--                              <div>-->
<!--                                <span>-->
<!--                                    Since-->
<!--                                </span>-->
<!--                                <strong>-->
<!--&lt;!&ndash;                                    17 days&ndash;&gt;-->
<!--                                    {{listing.updated_at | moment("from", "now", true)}}-->
<!--                                </strong>-->
<!--                            </div>-->
<!--                            <div class="td-nom">-->
<!--                                <a href="#" class="category category-2">-->
<!--                                    <span>-->
<!--                                        {{listing.title}}-->
<!--                                    </span>-->
<!--                                </a>-->
<!--                                <span class="listing-status">-->
<!--                                    Priority listing-->
<!--                                </span>-->
<!--                                <div>-->
<!--                                    <div class="bg-success rounded d-flex align-items-center mr-2">-->
<!--                                        <span style="padding: 0px; margin:0px" class="px-3 py-2 text-white font-weight-bold">{{listing.category.title}}</span>-->
<!--                                    </div>-->
<!--                                    <span>-->
<!--                                        12 m-->
<!--                                        <sup>3</sup>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <div class="td-activity">-->
<!--                                <div class="bid-info">-->
<!--                                    <strong>-->
<!--                                        2-->
<!--                                    </strong>-->
<!--                                    <em>-->
<!--                                        (-->
<!--                                    </em>-->
<!--                                    <strong>-->
<!--                                        4-->
<!--                                    </strong>-->
<!--                                    <span>-->
<!--                                        in progress-->
<!--                                    </span>-->
<!--                                    <em>-->
<!--                                        )-->
<!--                                    </em>-->
<!--                                </div>-->
<!--                                <div class="msg-info">-->
<!--                                    <strong>-->
<!--                                        {{listing.messages.length}}-->
<!--                                    </strong>-->
<!--                                    <em>-->
<!--                                        message-->
<!--                                    </em>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <div class="td-loading">-->
<!--                                <strong>-->
<!--                                   {{listing.place_of_loading.place_name}}-->
<!--                                </strong>-->
<!--                                <br>-->
<!--                                <small>-->
<!--                                    <span>-->
<!--                                        Between-->
<!--                                    </span>-->
<!--                                    <strong>-->
<!--                                        {{listing.shipping_date_from | moment('DD.MM')}}-->
<!--                                    </strong>-->
<!--                                    <span>-->
<!--                                        and-->
<!--                                    </span>-->
<!--                                    <strong>-->
<!--                                        {{listing.shipping_date_to | moment('DD.MM')}}-->
<!--                                    </strong>-->
<!--                                </small>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <div class="td-delivery">-->
<!--                                <strong>-->
<!--                                    {{listing.place_of_delivery.place_name}}-->
<!--                                </strong>-->
<!--                                <br>-->
<!--                                <small>-->
<!--                                    <span>-->
<!--                                        Between-->
<!--                                    </span>-->
<!--                                    <strong>-->
<!--                                        {{listing.unshipping_date_from | moment('DD.MM')}}-->
<!--                                    </strong>-->
<!--                                    <span>-->
<!--                                        and-->
<!--                                    </span>-->
<!--                                    <strong>-->
<!--                                        {{listing.shipping_date_to | moment('DD.MM')}}-->
<!--                                    </strong>-->
<!--                                </small>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <div class="td-distance">-->
<!--                                <div class="title">-->
<!--                                    <strong>-->
<!--                                        1,35-->
<!--                                    </strong>-->
<!--                                    <span>-->
<!--                                        km-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                                <div class="ng-binding">-->
<!--                                    0h6-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <div class="td-expiration">-->
<!--                                <span>-->
<!--                                    in-->
<!--                                </span>-->
<!--                                <div>-->
<!--                                    <strong>-->
<!--                                        {{ listing.expiration_date| duration('asDays')}}-->
<!--                                    </strong>-->
<!--                                    days-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--         </div>-->
<!--        </div>-->
    </div>
</template>

<script>
// import './resources/sass/desktop/find-loads.module.scss'
export default {
    data() {
        return {
        }
    },
    computed:{
        listings: function () {
            return this.$store.getters.listings;
        },
    },
    mounted() {
        this.$store.dispatch('getListings');
    }

}
</script>

<style scoped>

</style>
