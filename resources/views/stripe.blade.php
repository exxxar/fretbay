@extends("layouts.app")

@section("content")
    <header-component></header-component>

    <div class="container" style="padding-top:30px;">

        <div class="row d-flex justify-content-center">

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Payment details</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form
                            role="form"
                            action="{{ route('stripe.post') }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf

                            <div class='row mb-2'>
                                <div class='col-12 required'>
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control' size='4' type='text'>
                                </div>
                            </div>

                            <input type="hidden" name="payment_id" value="{{$payment->id}}">

                            <div class='row mb-2'>
                                <div class='col-12 required'>
                                    <card-input-component></card-input-component>
                                </div>
                            </div>

                            <div class='row mb-2'>
                                <div class='col-12 col-md-4 cvc required'>
                                    <card-cvc-component></card-cvc-component>
                                </div>
                                <div class='col-12 col-md-4 form-group expiration required'>
                                    <card-month-component></card-month-component>
                                </div>
                                <div class='col-12 col-md-4 form-group expiration required'>
                                    <card-year-component></card-year-component>
                                </div>
                            </div>
                            <div class="row stripe-alert d-none">
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        This is a danger alert—check it out!
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Pay Now ({{$payment->amount}} {{$payment->currency}})
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-center">AlloTrans.com</h6>
                    </div>
                </div>
            </div>


        </div>

    </div>


    <footer-component></footer-component>
@endsection


@section("scripts")

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function () {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.stripe-alert')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
