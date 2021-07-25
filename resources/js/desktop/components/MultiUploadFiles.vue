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
                    <button class="btn btn-primary" @click="startUpload"><slot name="inButton">Upload</slot></button>
                </slot>
            </div>
        </div>
        <div class="row w-100 mt-2 mx-auto row-cols-2 row-cols-md-3" @dragenter="dragging=true" v-show="!dragging">
            <slot name="filesListAdditional">
            </slot>
            <slot name="filesList">
                <div v-for="(file, key) in files" class="col-md-4 col-sm-6 col-6 px-1 px-sm-2">
                    <div class="card my-2">
                        <img class="card-img-top preview mx-auto" v-bind:ref="'preview'+parseInt( key )"
                             style="width:100%; height:150px; object-fit: cover;" alt="">
                        <div class="card-body px-md-2 text-center">
                            <button class="btn btn-outline-blue mt-2 mx-auto w-100" v-on:click="removeFile( key )">Remove</button>
                        </div>
                    </div>
                </div>
            </slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MultiUploadFiles",
        props:['files'],
        data(){
            return {
                dragAndDropCapable: false,
                dragging:false
            }
        },
        mounted(){
        },
        methods: {
            getImagePreviews(){
                for( let i = 0; i < this.files.length; i++ ){
                    if ( /\.(jpe?g|png|gif|svg)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            this.$refs['preview'+ i ][0].src = reader.result;
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
        }
    }
</script>

<style scoped>

</style>
