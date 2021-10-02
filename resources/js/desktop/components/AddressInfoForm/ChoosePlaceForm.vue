<template>
    <form>
        <div class="row">
            <div class="col-12">
                <ValidationProvider :name="postal" rules="required" v-slot="{ errors }">
                    <input type="text" v-model="postal" class="form-control mb-2" placeholder="Postal Code">
                </ValidationProvider>
            </div>
            <div class="col-12" v-if="postal">
                <ValidationProvider :name="address" rules="required" v-slot="{ errors }">
                    <address-input v-model="listing[address]" class="mb-2" v-on:selected="selectAddress" :disabled="false" placeholder="City"></address-input>
                </ValidationProvider>
            </div>

<!--            <input type="text" class="form-control" aria-describedby="address" placeholder="Address">-->

        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <ValidationProvider :name="date1" rules="required" v-slot="{ errors }">
                    <date-picker v-model="listing[date1]" :min="min1" @input="changeDate" placeholder="From..."
                                 class="mb-2 w-100"
                                 :value-type="'timestamp'"
                                       :date-format-options="{ day: '2-digit', month: '2-digit', year: 'numeric'}"
                    />
                </ValidationProvider>
            </div>
            <div class="col-12 col-md-12">
                <ValidationProvider :name="date2" rules="required" v-slot="{ errors }">
                    <date-picker v-model="listing[date2]" :min="min2" @input="changeDate" placeholder="To..."
                                 class="mb-2 w-100"
                                 :value-type="'timestamp'"
                                       :date-format-options="{ day: '2-digit', month: '2-digit', year: 'numeric'}"
                   />
                </ValidationProvider>
            </div>
        </div>

    </form>
</template>
<script>
    import moment from 'moment'
    import AddressInput from "./AddressInput";
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

    export default {
        props:['date1', 'date2'],
        components:{
            AddressInput, DatePicker
        },
        data() {
            return {
                address: '',
                postal: null,
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

                console.log('data1=>'+this.listing[this.date1])
                console.log('data2=>'+this.listing[this.date2])

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

                let d1 = new Date(this.listing[this.date1]).getUTCMilliseconds();
                let d2 = new Date(this.listing[this.date2]).getUTCMilliseconds();

                if(d1 > d2)
                {
                    this.listing[this.date2] = this.listing[this.date1];
                    this.$store.dispatch('editNewListing', {key:this.date2, value: this.listing[this.date2]});
                }
                if( this.date1 === 'shipping_date_from') {
                    let d = new Date(this.listing['unshipping_date_from']).getUTCMilliseconds();
                    let d0 = new Date(this.listing['unshipping_date_to']).getUTCMilliseconds();
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
                selection.postal = this.postal
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
<style lang="scss">
.mx-input {
    height: 50px;
}
</style>
