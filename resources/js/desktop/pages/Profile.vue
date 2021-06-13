<template>
    <div class="my-account-container">
        <div class="row">
            <profile-menu-component v-on:test="change"/>
            <profile-my-account-page v-if="section===1"/>
            <profile-my-company-page v-if="section===2"/>
            <profile-legal-documents-page v-if="section===3"/>
            <profile-my-vehicles-page v-if="section===4"/>
            <profile-settings-page v-if="section===5"/>
        </div>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                section: 1
            }
        },
        methods: {
            change(section) {
                console.log("section")
                this.section = section
                console.log(section)
            }
        }
    }
</script>
