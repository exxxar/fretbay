<template>
    <div class="form-group w-100" v-if="field.type !== 'checkbox'">
        <ValidationProvider :name="field.title" :rules="getRules(field)" v-slot="{ errors }">
            <div class="input-has-icon-right">
                <input v-model="data.value" :type="field.type"
                       class="form-control"
                       :placeholder="field.title">
                <span class="rel-icon rel-icon-square" v-if="field.icon && field.icon!=null && field.icon !=''">
                    <img :src="field.icon" alt="">
                </span>
            </div>
        </ValidationProvider>
    </div>
    <div class="custom-control custom-switch" v-else>
        <input v-model="data.value" type="checkbox" class="custom-control-input" :id="field.slug">
        <label class="custom-control-label" :for="field.slug">{{field.title}}</label>
    </div>
</template>

<script>
    export default {
        name: "ArticleInput",
        props: {
            field: { required: true },
            data: { required: true }
        },
        methods:{
            getRules(field) {
                if(field.required == true) {
                    return 'required'
                }
                return ''
            }
        }
    }
</script>

<style scoped>

</style>
