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
                <button class="btn btn-primary" @click="startUpload">Upload</button>
            </div>
            <div class="col-12 col-md-8">
                <p>This information can often be found on the Internet. Approximate measures will already allow carriers to offer you a suitable offer.</p>
            </div>
        </div>
        <ul class="row w-100 m-auto" @dragenter="dragging=true" v-show="!dragging" v-if="files.length>0">
            <li v-for="(file, key) in files" class="col-md-3 col-sm-6 col-12 transport-category">
                <label>
                    <span class="category-label-inner">
                        <span class="animated-icon">
                            <img class="preview" v-bind:ref="'preview'+parseInt( key )" width="75px"
                                 height="75px" alt="">
                        </span>
                        <a class="remove" v-on:click="removeFile( key )">Remove</a>
                    </span>
                </label>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                dragAndDropCapable: false,
                // files: [],
                dragging:false
            }
        },

        mounted(){
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
                get () {
                    return this.$store.getters.listing.images
                },
                set (value) {
                    this.$store.commit('editNewListing', {key:'images', value: value})
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
                // this.$store.dispatch('editNewListing', {key:'images', value: this.files})
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
                // this.$store.dispatch('editNewListing', {key:'images', value: this.files})
            },
            startUpload() {
                this.$refs.files.click();
            }
        }
    }
</script>
<style>

    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
    .filezone input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }
    .preview {
        /*width:100%;*/
        /*height:100px;*/
        object-fit: contain;
    }
</style>
