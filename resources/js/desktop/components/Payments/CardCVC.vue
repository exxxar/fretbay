<template>
    <div>
        <label class='control-label'>CVC</label>
        <input autocomplete='off'
               class='form-control card-cvc'
               placeholder='ex. 311' size='4'
               v-mask="'###'"
               type='text'>
    </div>
</template>
