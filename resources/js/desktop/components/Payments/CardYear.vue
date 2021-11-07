<template>
    <div>
        <label class='control-label'>Expiration Year</label>
        <input
            v-mask="'####'"
            class='form-control card-expiry-year' placeholder='YYYY' size='4'
            type='text'>
    </div>
</template>
