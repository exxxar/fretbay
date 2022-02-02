<template>
    <div id="file-drag-drop">
        <div v-show="dragging" class="large-12 medium-12 small-12 filezone"
             @dragend="dragging=false" @dragleave="dragging=false" @drop="handleFiles()"
        >
            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
            <p>
                Drag and drop pictures here <br> or click to search
            </p>
        </div>
        <div class="row w-100 m-auto" @dragenter="dragging=true" v-show="!dragging">
            <div class="col-12 col-md-4">
                <button class="btn btn-primary w-100 mb-1" type="button" @click="startUpload">Upload</button>
            </div>
            <div class="col-12 col-md-8">
                <p>This information can often be found on the Internet. Approximate measures will already allow carriers
                    to offer you a suitable offer.</p>
            </div>
        </div>
        <ul class="d-flex w-100 p-0" @dragenter="dragging=true" v-show="!dragging" v-if="files.length>0" style="overflow-x: auto;">
            <li v-for="(file, key) in files" class="col-md-3 col-sm-6 col-12 transport-category d-flex justify-content-around align-items-center flex-wrap">
                <img class="preview" v-bind:ref="'preview'+parseInt( key )" width="75px"
                     height="75px" alt="">

                <a class="remove cursor-pointer" v-on:click="removeFile( key )">Remove</a>

            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                dragAndDropCapable: false,
                // files: [],
                dragging: false
            }
        },

        mounted() {
            // this.dragAndDropCapable = this.determineDragAndDropCapable();
            //
            // if( this.dragAndDropCapable ){
            //
            //     ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach( function( evt ) {
            //
            //         this.$refs.files.addEventListener(evt, function(e){
            //             e.preventDefault();
            //             e.stopPropagation();
            //         }.bind(this), false);
            //     }.bind(this));
            //
            //     this.$refs.files.addEventListener('drop', function(e){
            //         for( let i = 0; i < e.dataTransfer.files.length; i++ ){
            //             this.files.push( e.dataTransfer.files[i] );
            //             this.getImagePreviews();
            //         }
            //     }.bind(this));
            // }
        },
        computed: {
            files: {
                get() {
                    return this.$store.getters.listing.images
                },
                set(value) {
                    this.$store.commit('editNewListing', {key: 'images', value: value})
                }
            }
        },
        methods: {
            // determineDragAndDropCapable(){
            //
            //     var div = document.createElement('div');
            //
            //     return ( ( 'draggable' in div )
            //         || ( 'ondragstart' in div && 'ondrop' in div ) )
            //         && 'FormData' in window
            //         && 'FileReader' in window;
            // },

            getImagePreviews() {
                for (let i = 0; i < this.files.length; i++) {
                    if (/\.(jpe?g|png|gif|svg)$/i.test(this.files[i].name)) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function () {
                            this.$refs['preview' + i][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            },
            removeFile(key) {
                this.files.splice(key, 1);
                this.getImagePreviews();
                // this.$store.dispatch('editNewListing', {key:'images', value: this.files})
            },
            handleFiles() {
                let uploadedFiles = this.$refs['files'].files;
                for (let i = 0; i < uploadedFiles.length; i++) {
                    if (/\.(jpe?g|png|gif|svg)$/i.test(uploadedFiles[i].name)) {
                        this.files.push(uploadedFiles[i]);
                        this.getImagePreviews();
                    }
                }
                this.dragging = false;
                // this.$store.dispatch('editNewListing', {key:'images', value: this.files})
            },
            startUpload() {
                this.$refs.files.click();
            }
        }
    }
</script>
<style lang="scss">
    .transport-category {
        padding: 10px;
        list-style: none;
        border: 1px solid lightgrey;
    }
</style>
