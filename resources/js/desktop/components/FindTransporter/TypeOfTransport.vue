<template>
    <div class="mt-5">
        <h3 class="text-dark">TYPE OF TRANSPORT</h3>

        <vue-custom-scrollbar class="scroll-area list-types-of-transport" tagname="div">
            <ul>
                <li v-for="(item, index) in list" class="item" @click="openItem(item.id)">
                    {{item.title}}
                </li>
            </ul>
        </vue-custom-scrollbar>

        <div class="row d-flex justify-content-end mt-2 w-100">
            <div class="col-2">
                <button class="btn btn-custom-danger">Back</button>
            </div>
            <div class="col-3">
                <button class="btn btn-custom-white">Next</button>
            </div>
        </div>
    </div>
</template>
<script>
    import vueCustomScrollbar from 'vue-custom-scrollbar'
    import "vue-custom-scrollbar/dist/vueScrollbar.css"


    export default {
        components: {
            vueCustomScrollbar
        },
        data() {
            return {
                settings: {
                    suppressScrollY: false,
                    suppressScrollX: false,
                    wheelPropagation: false
                },
                list: [
                    {
                        id: 1,
                        title: "Caravans"
                    },
                    {
                        id: 2,
                        title: "Vehicle spare parts"
                    },
                    {
                        id: 3,
                        title: "Cars and vans"
                    },
                    {
                        id: 4,
                        title: "Recreational vehicles (RVs)"
                    },
                    {
                        id: 5,
                        title: "Trailers"
                    },
                    {
                        id: 6,
                        title: "Aircrafts"
                    },
                    {
                        id: 7,
                        title: "Vintage vehicles"
                    }, {
                        id: 8,
                        title: "HGVs and construction vehicles"
                    }, {
                        id: 9,
                        title: "Tractors and agricultural equipment"
                    },
                    {
                        id: 10,
                        title: "Other vehicles"
                    },
                    {
                        id: 11,
                        title: "Vehicules (what’s this one for ?)"
                    }


                ]
            }
        }
    }
</script>
<style lang="scss">
   .scroll-area {
       position: relative;
       margin: auto;
       width: 100%;
       height: 400px;

       ul {
           width: 100%;
           height: 100%;

           li.item {
               width: 100%;
               padding: 10px;
               cursor:pointer;

               &:nth-of-type(2n){
                   background: #f6f6f6;
               }

               &:hover {
                   background:green;
                   color:white;
               }
           }
       }
   }
</style>
