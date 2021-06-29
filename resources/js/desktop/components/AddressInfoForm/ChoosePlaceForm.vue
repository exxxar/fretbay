<template>
    <form>
        <div class="form-group">
<!--            <input type="text" class="form-control" aria-describedby="address" placeholder="Address">-->
            <ValidationProvider :name="address" rules="required" v-slot="{ errors }">
                <address-input v-model="listing[address]" v-on:selected="selectAddress" :disabled="false" placeholder="Address"></address-input>
            </ValidationProvider>
        </div>

        <div class="form-row">
            <div class="form-group col-12 col-sm-6">
                <ValidationProvider :name="date1" rules="required" v-slot="{ errors }">
                    <b-form-datepicker v-model="listing[date1]" :min="min1" @input="changeDate" placeholder=""
                                       :date-format-options="{ day: '2-digit', month: '2-digit', year: 'numeric'}"
                    ></b-form-datepicker>
                </ValidationProvider>
            </div>
            <div class="form-group col-12 col-md-6">
                <ValidationProvider :name="date2" rules="required" v-slot="{ errors }">
                    <b-form-datepicker v-model="listing[date2]" :min="min2" @input="changeDate" placeholder=""
                                       :date-format-options="{ day: '2-digit', month: '2-digit', year: 'numeric'}"
                    ></b-form-datepicker>
                </ValidationProvider>
            </div>
        </div>

<!--        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">-->
<!--            <option selected>Choose...</option>-->
<!--            <option value="1">One</option>-->
<!--            <option value="2">Two</option>-->
<!--            <option value="3">Three</option>-->
<!--        </select>-->


<!--        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">-->
<!--            <option selected>Choose...</option>-->
<!--            <option value="1">One</option>-->
<!--            <option value="2">Two</option>-->
<!--            <option value="3">Three</option>-->
<!--        </select>-->

    </form>
</template>
<script>
    import moment from 'moment'
    import AddressInput from "./AddressInput";
    export default {
        props:['date1', 'date2'],
        components:{
            AddressInput
        },
        data() {
            return {
                address: '',
                date_from:'',
                date_to:''
            }
        },
        computed:{
            listing() {
                return this.$store.getters.listing
            },
            min1() {
                if(this.listing['shipping_date_from'] !=='')
                {
                    if(this.date1 === 'unshipping_date_from')
                    {
                        return moment(this.listing['shipping_date_from']).toDate();
                    }
                }
                return moment().toDate()
            },
            min2() {
                if(this.listing[this.date1] !=='')
                {
                    return moment(this.listing[this.date1]).toDate();
                }
                return moment().toDate()
            }
        },
        mounted() {
            if(this.date1 === 'unshipping_date_from')
            {
                this.address = 'place_of_delivery'
            }
            else {
                this.address = 'place_of_loading'
            }
        },
        methods:{
            // changeDateFrom(date) {
            //     this.date_from = date;
            //     if(this.date_to =='')
            //     {
            //         this.date_to = date;
            //     }
            //     let d1 = new Date(this.date_from);
            //     let d2 = new Date(this.date_to);
            //     if(d1 > d2)
            //     {
            //         this.date_to = this.date_from;
            //     }
            //     this.$store.dispatch('editNewListing', {key:this.date2, value: this.date_to});
            //     this.$store.dispatch('editNewListing', {key:this.date1, value: date});
            //
            //     if( this.date1 == 'shipping_date_from'){
            //         let d = new Date(this.listing['unshipping_date_from']);
            //         let d0 = new Date(this.listing['unshipping_date_to']);
            //         if(d < d1)
            //         {
            //             this.$store.dispatch('editNewListing', {key:'unshipping_date_from', value: this.date_from});
            //             if(d0 < d1)
            //             {
            //                 this.$store.dispatch('editNewListing', {key:'unshipping_date_to', value: this.date_from});
            //             }
            //         }
            //     }
            // },
            changeDate(date) {

                this.$store.dispatch('editNewListing', {key:this.date1, value: this.listing[this.date1]});
                this.$store.dispatch('editNewListing', {key:this.date2, value: this.listing[this.date2]});

                if(this.listing[this.date1] === '' && this.listing[this.date2] !== '')
                {
                    this.listing[this.date1] = this.listing[this.date2];
                    this.$store.dispatch('editNewListing', {key:this.date1, value: this.listing[this.date1]});
                }

                if(this.listing[this.date2] === '' && this.listing[this.date1] !== '')
                {
                    this.listing[this.date2] = this.listing[this.date1];
                    this.$store.dispatch('editNewListing', {key:this.date2, value: this.listing[this.date2]});
                }

                let d1 = new Date(this.listing[this.date1]);
                let d2 = new Date(this.listing[this.date2]);

                if(d1 > d2)
                {
                    this.listing[this.date2] = this.listing[this.date1];
                    this.$store.dispatch('editNewListing', {key:this.date2, value: this.listing[this.date2]});
                }
                if( this.date1 === 'shipping_date_from') {
                    let d = new Date(this.listing['unshipping_date_from']);
                    let d0 = new Date(this.listing['unshipping_date_to']);
                    if(d < d1)
                    {
                        this.$store.dispatch('editNewListing', {key:'unshipping_date_from', value: this.listing[this.date1]});
                    }
                    if(d0 < d1)
                    {
                        this.$store.dispatch('editNewListing', {key:'unshipping_date_to', value: this.listing[this.date1]});
                    }
                }
            },
            selectAddress(selection) {
                if(this.date1 === 'unshipping_date_from'){
                    this.$store.dispatch('editNewListing', {key:'place_of_delivery', value: selection});
                }
                else {
                    this.$store.dispatch('editNewListing', {key:'place_of_loading', value: selection});
                }
            },
        }
    }
</script>
<style>
 
</style>
