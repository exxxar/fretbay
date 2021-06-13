<template>
    <div>
        <div class="form-group w-100" v-if="props_data && field.type !== 'checkbox' && field.type !== 'radio'">
            <ValidationProvider :name="field.title" :rules="getRules(field)" v-slot="provider">
                <div class="input-has-icon-right position-relative">
                    <input v-model="props_data.value" :type="field.type"
                           class="form-control"
                           :placeholder="field.title">
                    <span class="rel-icon rel-icon-square" v-if="field.icon && field.icon!=null && field.icon !==''">
                        <img :src="field.icon" alt="">
                    </span>
                </div>
            </ValidationProvider>
        </div>
        <div class="custom-control custom-switch" v-if="props_data && field.type === 'checkbox'">
            <input v-model="props_data.value" type="checkbox" class="custom-control-input" :id="field.slug">
            <label class="custom-control-label" :for="field.slug">{{field.title}}</label>
        </div>
    </div>

</template>

<script>
    export default {
        name: "ArticleInput",
        props: {
            field: { required: true },
            props_data: { required: true }
        },
        methods:{
            getRules(field) {
                if(field.pivot.required == true) {
                    return 'required'
                }
                return ''
            }
        }
    }
</script>

<style scoped>
    .content-box-gray .input-has-icon-right .rel-icon {
        position: absolute;
        right: 0px;
        left: auto;
        top: 0;
    }

    .content-box-gray .input-has-icon-right .rel-icon img{
        margin: 0;
    }
</style>
