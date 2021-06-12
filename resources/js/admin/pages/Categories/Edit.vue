<template>
    <div class="row w-100 m-auto justify-content-center align-items-center">
        <div class="col-sm-12 col-md-6 mb-2">
            <b-form-group label="Title" label-size="sm" class="mb-0">
                <b-form-input v-model="edit_category.title"
                              placeholder="Category title"
                              class="w-100 min"
                />
            </b-form-group>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Edit",
        props:['category'],
        data() {
            return {
                edit_category:{
                    title:'',
                    image:'',
                    mode:'article',
                    is_active:false,
                    properties:[]
                },
                properties_options:[],
                loading: false,

            }
        },
        mounted() {
            this.edit_category={
                id:this.category.id,
                title:this.category.title,
            };
        },
        computed: {

        },
        methods: {
            sendMessage(message) {
                this.$notify({
                    group: 'info',
                    type: 'success',
                    title: 'Categories',
                    text: message
                });
            },

            save(value, id, key) {
                this.$store.dispatch('saveCategory', {
                    id: id,
                    key: key,
                    value: value
                }).then(resp => {
                    this.$store.commit('saveCategory', resp.data.category);
                    this.sendMessage(resp.data.message);
                });
            },

            removeFile( key ){
                // item.new_files.splice( key, 1 );
                // item.new_src.splice( key, 1 );
                // this.getImagePreviews(item.new_files, item.new_src);
                this.new_files.splice( key, 1 );
                this.getImagePreviews(this.new_files);
            },
            deleteFile(name, index) {
                this.file_loading = true;
                this.edit_category.src.splice( index, 1 );
               let data = {
                   id: this.edit_category.id,
                   name: name,
                   src:  this.edit_category.src
               };
                this.$store.dispatch('deleteFile', data).then(resp => {
                    // this.category = resp.data.category;
                    this.file_loading = false;
                }).catch(function (error) {
                    console.log(error);
                    this.file_loading = false;
                });
            },
            saveImages() {
                this.file_loading = true;
                let formData = new FormData();
                for( let i = 0; i < this.new_files.length; i++ ) {
                    formData.append('files[' + i + ']', this.new_files[i]);
                }
                formData.append('id', this.edit_category.id);
                this.$store.dispatch('uploadFiles', formData).then(resp => {
                    // this.$store.commit('saveCategory', resp.data.category);
                    this.edit_category = resp.data.category;
                    this.new_files = [];
                    this.file_loading = false;
                }).catch(function (error) {
                    console.log(error);
                    this.file_loading = false;
                });
            },
            handleFiles() {
                let uploadedFiles = this.$refs['files'].files;
                for(let i = 0; i < uploadedFiles.length; i++) {
                    if (/\.(jpe?g|png|gif|svg)$/i.test(uploadedFiles[i].name))
                    {
                        this.new_files.push(uploadedFiles[i]);
                        this.getImagePreviews(this.new_files);
                    }
                    else
                    {
                        this.sendMessage('This file has wrong format')
                        // break;
                    }
                }
            },
            getImagePreviews(arr){
                for( let i = 0; i < arr.length; i++ ) {
                    if ( /\.(jpe?g|png|gif|svg)$/i.test( arr[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            // arr_src.push(reader.result);
                            this.$refs['preview'+i][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( arr[i] );
                    }else{
                        this.$nextTick(function(){
                            // arr_src.push('/images/category.jpg');
                            this.$refs['preview'+i][0].src = '/images/category.jpg';
                        });
                    }
                }
            },
            calculateDiscountPrice(key) {
                this.edit_category.discount_price = (this.edit_category.price - this.edit_category.discount);
                this.edit_category.discount_price = Math.round( this.edit_category.discount_price * 1e2 ) / 1e2;;

                if ( key == 'price') {
                    this.save(this.edit_category.price, this.edit_category.id,'price');
                }
                else {
                    this.save(this.edit_category.discount, this.edit_category.id,'discount');
                }
                this.save(this.edit_category.discount_price, this.edit_category.id, 'discount_price');
            }
        }
    }
</script>

<style scoped>
    .custom-select option {
        color: black !important;
    }
    @media screen and (min-width: 991.98px) {
        .min {
            min-width: 300px !important;
        }
    }
    @media (max-width: 900px) {
        .stacked {
            display: block;
            width: 100%;
        }
        .stacked > tbody, .stacked > tbody > tr, .stacked > tbody > tr > td, .stacked > tbody > tr > th {
            display: block;
        }
        .stacked > tbody > tr > [data-label]::before {
            content: attr(data-label);
            width: 40%;
            float: left;
            text-align: right;
            overflow-wrap: break-word;
            font-weight: bold;
            font-style: normal;
            padding: 0 calc(1rem / 2) 0 0;
            margin: 0;
        }
        .stacked > tbody > tr > [data-label]::after {
            display: block;
            clear: both;
            content: "";
        }
    }
    input[type="file"]{
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
    input[type="file"]{
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
    div.file-listing img{
        max-width: 90%;
    }

    div.file-listing{
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    div.file-listing img{
        height: 100px;
    }
    div.success-container{
        text-align: center;
        color: green;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }

    a.submit-button {
        display: block;
        margin: auto;
        text-align: center;
        width: 200px;
        padding: 10px;
        text-transform: uppercase;
        background-color: green;
        color: white;
        font-weight: bold;
        margin-top: 20px;
    }
    .preview {
        width:100%;
        height:100px;
        object-fit: contain;
    }
</style>
