<template>
    <div id="file-drag-drop">
        <div v-show="dragging" class="large-12 medium-12 small-12 filezone"
             @dragend="dragging=false" @dragleave="dragging=false" @drop="handleFile()"
        >
            <input type="file" id="file" ref="upload" v-on:change="handleFile()"/>
            <p>
                {{$trans('request_a_quote.section_5.p_5')}}

            </p>
        </div>
        <div class="row w-100 m-auto" @dragenter="dragging=true" v-show="!dragging">
            <div class="col-12 px-0 mb-1">
                <slot name="uploadButton">
                    <button class="btn btn-primary w-100" @click="startUpload">{{$trans('request_a_quote.section_5.button_upload')}}</button>
                </slot>
            </div>
        </div>
        <div class="row w-100 mt-2 mx-auto" @dragenter="dragging=true" v-show="!dragging" v-if="upload_file && upload_file !== ''">
            <slot name="filePlace">
                <div class="col-12 p-0">
                    <img class="preview" ref="file_preview" style="width:100%; max-height:300px; object-fit: cover;" alt="">
                </div>
                <div class="col-12 p-0">
                    <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile">{{$trans('request_a_quote.section_5.button_remove')}}</button>
                </div>
            </slot>
        </div>
        <slot name="filePlaceAdditional">
        </slot>
    </div>
</template>

<script>



    export default {
        name: "UploadFile",
        props:['file'],
        model: {
            prop: 'file',
            event: 'change'
        },
        data(){
            return {
                dragAndDropCapable: false,
                dragging:false,
                upload_file:'',

            }
        },
        mounted(){
        },
        // computed: {
        //     upload_file: {
        //         get () {
        //             return this.$store.getters.listing.images
        //         },
        //         set (value) {
        //             this.$store.commit('editNewListing', {key:'images', value: value})
        //         }
        //     }
        // },
        methods: {
            getImagePreview(){
                if ( /\.(jpe?g|png|gif|svg)$/i.test( this.upload_file.name ) ) {
                    let reader = new FileReader();
                    reader.addEventListener("load", function(){
                        this.$refs['file_preview'].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL( this.upload_file );
                }
            },
            removeFile(){
                this.upload_file = '';
                this.$emit('change', '');
                this.getImagePreview();
            },
            handleFile() {
                let uploadedFiles = this.$refs['upload'].files;
                for(let i = 0; i < uploadedFiles.length; i++) {
                    if (/\.(jpe?g|png|gif|svg)$/i.test(uploadedFiles[i].name))
                    {
                        this.upload_file = uploadedFiles[i];
                        this.$emit('change', uploadedFiles[i]);
                        this.getImagePreview();
                    }
                }
                this.dragging = false;
            },
            startUpload() {
                this.$refs.upload.click();
            }
        }
    }
</script>

<style scoped>

</style>
