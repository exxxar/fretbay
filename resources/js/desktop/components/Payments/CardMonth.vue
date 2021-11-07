<template>
    <div>
        <label class='control-label'>Expiration Month</label>
        <input
            v-mask="'##'"
            class='form-control card-expiry-month' placeholder='MM' size='2'
            type='text'>
    </div>
</template>
