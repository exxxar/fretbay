<template>
    <div class="row w-100 m-auto justify-content-center align-items-center">
        <div class="col-12 mb-2">
            <b-form-group label="Title" label-size="sm" class="mb-0">
                <b-form-input v-model="new_category.title"
                              placeholder="Category title"
                              class="w-100 min"
                />
            </b-form-group>
        </div>
        <div class="col-12 mb-2">
            <input type="file" id="image" ref="image" v-on:change="handleFiles()"/>
            <button class="btn btn-primary" @click="startUpload">Upload</button>
        </div>
        <div class="col-12">
            <b-form-group label="Mode">
                <b-form-radio-group
                    id="radio-group-2"
                    v-model="new_category.mode"
                    name="radio-sub-component"
                >
                    <b-form-radio value="article">Article</b-form-radio>
                    <b-form-radio value="grid">Grid</b-form-radio>
                    <b-form-radio value="calculator">Calculator</b-form-radio>
                </b-form-radio-group>
            </b-form-group>
        </div>
        <div class="col-12" v-if="new_category.mode==='article'">
            <multiselect
                v-model="new_category.properties"
                :options="properties_options"
                label="title" track-by="id"
                :multiple="true" :taggable="true"
            ></multiselect>
<!--            todo: make list of properties with checkboxes 'required'-->
        </div>
        <div class="col-12">
            <b-form-checkbox
                id="checkbox-1"
                v-model="new_category.is_active"
                name="checkbox-1"
            >
<!--                 value="true"
                unchecked-value="false"-->
                Category is active
            </b-form-checkbox>
        </div>
        <div class="col-12 mb-2">
            <div class="row w-100 m-auto align-items-center">
                <b-button variant="primary" class="ml-auto float-right w-25" :disabled="loading" @click="addCategory">
                    <b-spinner small v-if="loading"></b-spinner>
                    <span class="sr-only" v-if="loading">Loading...</span>
                    Create
                </b-button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Edit",
        data() {
            return {
                new_category:{
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
            if ( this.properties.length <=0)
            {
                this.$store.dispatch('getProperties');
            }
        },
        computed: {
            categories: function () {
                return this.$store.getters.categories;
            },
            properties: function () {
                return this.$store.getters.properties;
            },
        },
        methods: {
            sendMessage(message, type='success') {
                this.$notify({
                    group: 'info',
                    type: type,
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
                this.new_category.image = '';
                this.getImagePreviews();
            },
            startUpload() {
                this.$refs.image.click();
            },
            getImagePreviews(){
                if ( /\.(jpe?g|png|gif|svg)$/i.test( this.new_category.image.name ) ) {
                    let reader = new FileReader();
                    reader.addEventListener("load", function(){
                        this.$refs['preview'][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL( this.new_category.image );
                }
            },
            handleFiles() {
                //todo:check this i think it won't work
                this.new_category.image = this.$refs['image'].image;
                this.getImagePreviews();
            },
            addCategory() {
                this.loading = true;
                let formData = new FormData();
                Object.keys(this.new_category).forEach(key => {
                    formData.append(key, this.new_category[key]);
                });
                this.$store.dispatch('addCategory', formData).then(resp => {
                    this.$store.commit('addCategory', resp.data.category);
                    this.sendMessage(resp.data.message,  resp.data.status);
                    this.new_category = {
                        title:'',
                        image:'',
                        mode:'article',
                        is_active:false,
                        properties:[],
                    };
                    this.loading = false;
                });
            },

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
    #image {
        opacity: 0;
        width: 100%;
        height: 0px;
        visibility: hidden;
        position: absolute;
        cursor: pointer;
    }

    .preview {
        width:100%;
        height:100px;
        object-fit: contain;
    }
</style>
