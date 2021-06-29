<template>
    <div class="container" style="padding-top: 130px;">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false">Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="vehicle-tab" data-toggle="tab" href="#vehicles" role="tab" aria-controls="vehicles" aria-selected="false">Vehicles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <profile-my-account-page/>
            </div>
            <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">

                <profile-my-company-page/>
            </div>
            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                <profile-legal-documents-page/>
            </div>
            <div class="tab-pane fade" id="vehicles" role="tabpanel" aria-labelledby="vehicles-tab">
                <profile-my-vehicles-page/>
            </div>

            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <profile-settings-page/>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                editMode: false
            }
        },
        computed: {
            user() {
                return JSON.parse(window.user)
            }
        },
    }
</script>

