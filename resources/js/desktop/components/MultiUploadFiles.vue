<template>
    <div id="files-drag-drop" class="w-100">
        <div v-show="dragging" class="large-12 medium-12 small-12 filezone"
             @dragend="dragging=false" @dragleave="dragging=false" @drop="handleFiles()"
        >
            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
            <p>
                Drag and drop pictures here <br> or click to search
            </p>
        </div>
        <div class="row w-100 m-auto" @dragenter="dragging=true" v-show="!dragging">
            <div class="col-12 p-0">
                <slot name="uploadButton">
                    <button class="btn btn-primary w-100 mb-1" @click="startUpload"><slot name="inButton">Upload</slot></button>
                </slot>
            </div>
        </div>

<!--        <div class="row w-100 mt-2 mx-auto" @dragenter="dragging=true" v-show="!dragging&&carousel&&files.length>0">-->
<!--                <slot name="filesListAdditional">-->
<!--                </slot>-->
<!--                <slot name="filesList">-->
<!--                    <VueSlickCarousel v-bind="settings">-->
<!--                        <div v-if="files.length==0"></div>-->
<!--&lt;!&ndash;                    <div v-for="(file, key) in files" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">&ndash;&gt;-->
<!--                        <div class="card my-2" v-for="(file, key) in files">-->
<!--                            <img class="card-img-top preview mx-auto" v-bind:ref="'carousel_preview'+parseInt( key )"-->
<!--                                 style="width:100%; max-width: 200px; height:150px; object-fit: cover;" alt="">-->
<!--                            <div class="card-body px-md-2 text-center">-->
<!--                                <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile( key )">Remove</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--                    </VueSlickCarousel>-->
<!--                </slot>-->
<!--        </div>-->
        <div class="row w-100 mt-2 mx-auto row-cols-2 row-cols-md-3" @dragenter="dragging=true" v-show="!dragging">
            <slot name="filesListAdditional">
            </slot>
            <slot name="filesList">
                <VueSlickCarousel class="p-1" v-bind="settings" >
                <div v-for="(file, key) in files" class="px-1 px-sm-2">
                    <div class="card my-2">
                        <img class="card-img-top preview mx-auto" v-bind:ref="'preview'+parseInt( key )"
                             style="width:100%; height:150px; object-fit: cover;" alt="">
                        <div class="card-body px-md-2 text-center">
                            <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile( key )">Remove</button>
                        </div>
                    </div>
                </div>
                </VueSlickCarousel>
            </slot>
        </div>
    </div>
</template>

<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        name: "MultiUploadFiles",
        // props:['files', 'carousel'],
        props:{
            files: {
                type: Array,
                required: true,
            },
            // carousel:{
            //     type: Boolean,
            //     default: false
            // }
        },
        // components:{
        //     VueSlickCarousel
        // },
        data(){
            return {
                dragAndDropCapable: false,
                dragging:false,
                settings:{
                    "dots": false,
                    "arrows": true,
                    "focusOnSelect": true,
                    "infinite": true,
                    "speed": 500,
                    "slidesToShow": 4,
                    "slidesToScroll": 3,
                    "touchThreshold":4,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 1008,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                },
                // settings:{
                //     "dots": false,
                //     "arrows": true,
                //     "focusOnSelect": true,
                //     "infinite": true,
                //     "speed": 500,
                //     "slidesToShow": 5,
                //     "slidesToScroll": 3,
                //     "touchThreshold": 5,
                //     responsive: [
                //         {
                //             breakpoint: 1200,
                //             settings: {
                //                 slidesToShow: 5,
                //                 slidesToScroll: 1
                //             }
                //         },
                //         {
                //             breakpoint: 1008,
                //             settings: {
                //                 slidesToShow: 2,
                //                 slidesToScroll: 1
                //             }
                //         },
                //         {
                //             breakpoint: 800,
                //             settings: {
                //                 slidesToShow: 1,
                //                 slidesToScroll: 1
                //             }
                //         }
                //
                //     ]
                // },
            }
        },
        mounted(){
        },
        methods: {
            getImagePreviews(){
                console.log('ref1', this.$refs);
                // console.log('ref10', this.$refs['preview0'][0]);
                for( let i = 0; i < this.files.length; i++ ){
                    if ( /\.(jpe?g|png|gif|svg)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            // this.$nextTick(() => {
                            //         // DOM updated
                            //     if(!this.carousel) {
                                    this.$refs['preview'+ i ][0].src = reader.result;
                            //     }
                            //     else {
                            //         this.$refs['carousel_preview'+ i ][0].src = reader.result;
                            //     }
                            // })
                        }.bind(this), false);
                        reader.readAsDataURL( this.files[i] );
                    }
                }
            },
            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },
            handleFiles() {
                let uploadedFiles = this.$refs['files'].files;
                for(let i = 0; i < uploadedFiles.length; i++) {
                    if (/\.(jpe?g|png|gif|svg)$/i.test(uploadedFiles[i].name))
                    {
                        this.files.push(uploadedFiles[i]);
                        this.getImagePreviews();
                    }
                }
                this.dragging = false;
            },
            startUpload() {
                this.$refs.files.click();
            }
        },
        components:{
            VueSlickCarousel
        }
    }
</script>

<style scoped>

</style>
