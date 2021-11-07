<template>
    <div>
        <label class='control-label'>Card Number</label>
        <input
            autocomplete='off'
            v-mask="['####-####-####-####']"
            class='form-control card-number' size='20'
            type='text'>
    </div>
</template>
