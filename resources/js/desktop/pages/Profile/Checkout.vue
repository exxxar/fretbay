<template>
    <div>
        <stripe-checkout
            ref="checkoutRef"
            mode="payment"
            :pk="publishableKey"
            :line-items="lineItems"
            :success-url="successURL"
            :cancel-url="cancelURL"
            @loading="v => loading = v"
        />
        <button @click="submit">Pay now!</button>
    </div>
</template>

<script>
    import { StripeCheckout } from '@vue-stripe/vue-stripe';
    export default {
        components: {
            StripeCheckout,
        },
        data () {
            this.publishableKey = "pk_test_xu5zxofOjXnXB4sUxB18RzkO00sj25snkJ";
            return {
                loading: false,
                lineItems: [
                    {
                        price: 'pi_3JpHNwE3GkYb2FVm1vIb9bvo', // The id of the one-time price you created in your Stripe dashboard
                        quantity: 1,
                    },
                ],
                successURL: 'http://localhost:8000/checkout_callback',
                cancelURL: 'http://localhost:8000/checkout_callback',
            };
        },
        methods: {
            submit () {
                // You will be redirected to Stripe's secure checkout page
                this.$refs.checkoutRef.redirectToCheckout();
            },
        },
    };
</script>
