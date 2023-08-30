     <!-- Modal Cash on Transfer-->
     <div class="modal fade" id="cod" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{__('Transaction Cash On Delivery')}}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form action="{{route('front.checkout.submit')}}" method="POST">
            @csrf
            <input type="hidden" name="payment_method" value="Cash On Delivery" id="">
            <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
            <div class="card-body">
              <p>{{PriceHelper::GatewayText('cod')}}</p>
            </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Cash On Delivery')}}</span></button>
          </form>
          </div>
        </div>
      </div>
    </div>
      <!-- Modal MOLLIE -->
    <div class="modal fade" id="mollie" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{ __('Transactions via Mollie') }}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>{{PriceHelper::GatewayText('mollie')}}</p>
          </div>
          <div class="modal-footer">
            <form action="{{route('front.checkout.submit')}}" method="POST">
              @csrf
              <input type="hidden" name="payment_method" value="Mollie">
              <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{ __('Checkout With Mollie') }}</span></button>
          </form>
          </div>
        </div>
      </div>
    </div>
        <!-- Modal PayPal -->
    <div class="modal fade" id="paypal" tabindex="-1"  aria-hidden="true">
      <form class="interactive-credit-card row" action="{{route('front.checkout.submit')}}" method="POST">
          @csrf
      <div class="modal-dialog" >

        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{__('Transactions via PayPal')}}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <p>{{PriceHelper::GatewayText('paypal')}}</p>
              </div>
          </div>
          <input type="hidden" name="payment_method" value="Paypal">
          <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With PayPal')}}</span></button>
          </div>
        </div>

      </div>
  </form>
    </div>

      <!-- Modal Stripe -->
    <div class="modal fade" id="stripe" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{__('Transactions via Stripe')}}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card-body">
                  <div class="card-wrapper"></div>
                  <form class="interactive-credit-card row" action="{{route('front.checkout.submit')}}" method="POST">
                    @csrf
                    <div class="form-group col-sm-12">
                      <input class="form-control" type="text" name="card" placeholder="{{ __('Card Number') }}" required>
                    </div>
                 <input type="hidden" name="payment_method" value="Stripe">
                 <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
                    <div class="form-group col-sm-6">
                      <input class="form-control" type="text" name="month" placeholder="{{__('Expitation Month')}}" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <input class="form-control" type="text" name="year" placeholder="{{__('Expitation Year')}}" required>
                    </div>
                    <div class="form-group col-sm-12">
                      <input class="form-control" type="text" name="cvc" placeholder="{{ __('CVV') }}" required>
                    </div>

                    <p class="p-3">{{PriceHelper::GatewayText('stripe')}}</p>
                </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Chekout With Stripe')}}</span></button>
          </div>
        </form>
        </div>
      </div>
    </div>

         <!-- Modal Authorize -->
         <div class="modal fade" id="authorize" tabindex="-1"  aria-hidden="true">
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title">{{__('Transactions via Authorize.Net')}}</h6>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                      <div class="card-wrapper"></div>
                      <form class="interactive-credit-card row" action="{{route('front.authorize.submit')}}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12">
                          <input class="form-control" type="text" name="card" placeholder="{{ __('Card Number') }}" required>
                        </div>
                        <input type="hidden" name="payment_method" value="Authorize.Net">
                        <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
                        <div class="form-group col-sm-6">
                          <input class="form-control" type="text" name="month" placeholder="{{__('Expitation Month')}}" required>
                        </div>
                        <div class="form-group col-sm-6">
                          <input class="form-control" type="text" name="year" placeholder="{{__('Expitation Year')}}" required>
                        </div>
                        <div class="form-group col-sm-12">
                          <input class="form-control" type="text" name="cvc" placeholder="{{ __('CVV') }}" required>
                        </div>

                        <p class="p-3">{{PriceHelper::GatewayText('authorize')}}</p>
                    </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
                <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Chekout With Stripe')}}</span></button>
              </div>
            </form>
            </div>
          </div>
        </div>


    {{-- PAYPAL --}}
    <div class="modal fade" id="paypal" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog" >
        <form class="interactive-credit-card row" action="{{route('front.checkout.submit')}}" method="POST">
          @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{__('Transactions via PayPal')}}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <p>{{PriceHelper::GatewayText('paypal')}}</p>
              </div>
          </div>
          <input type="hidden" name="payment_method" value="Paypal">
          <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With PayPal')}}</span></button>
          </div>
        </div>
        </form>
      </div>
    </div>


    {{-- REZORPAY --}}
    <div class="modal fade" id="razorpay" tabindex="-1"  aria-hidden="true">
      <form class="interactive-credit-card row" action="{{route('front.razorpay.submit')}}" method="POST">
          @csrf
          <div class="modal-dialog" >

              <div class="modal-content">
                  <div class="modal-header">
                  <h6 class="modal-title">{{__('Transactions via Razorpay')}}</h6>
                  <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                  <div class="card-body">
                      <p>{{PriceHelper::GatewayText('razorpay')}}</p>
                      </div>
                  </div>
                  <input type="hidden" name="payment_method" value="Rezorpay">
                  <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
                  <div class="modal-footer">
                  <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
                  <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With Razorpay')}}</span></button>
                  </div>
              </div>
          </div>
      </form>
    </div>

    {{-- Flutterwave --}}
    <div class="modal fade" id="flutterwave" tabindex="-1"  aria-hidden="true">
      <form class="interactive-credit-card row" action="{{route('front.flutterwave.submit')}}" method="POST">
          @csrf
          <div class="modal-dialog" >

          <div class="modal-content">
              <div class="modal-header">
              <h6 class="modal-title">{{__('Transactions via Flutterwave')}}</h6>
              <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
              <div class="card-body">
                  <p>{{PriceHelper::GatewayText('flutterwave')}}</p>
                  </div>
              </div>
              <input type="hidden" name="payment_method" value="Flutterwave">
              <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
              <div class="modal-footer">
              <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
              <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With Flutterwave')}}</span></button>
              </div>
          </div>
          </div>
      </form>
    </div>

    {{-- PAYTM --}}
    <div class="modal fade" id="paytm" tabindex="-1"  aria-hidden="true">
      <form class="interactive-credit-card row" action="{{route('front.paytm.submit')}}" method="POST">
          @csrf
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{__('Transactions via Paytm')}}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <p>{{PriceHelper::GatewayText('paytm')}}</p>
              </div>
          </div>
          <input type="hidden" name="payment_method" value="Paytm">
          <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With Paytm')}}</span></button>
          </div>
        </div>
      </div>
  </form>
    </div>

    {{-- SSL COMMERZ --}}
    <div class="modal fade" id="sslcommerz" tabindex="-1"  aria-hidden="true">
      <form class="interactive-credit-card row" action="{{route('front.sslcommerz.submit')}}" method="POST">
          @csrf
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{__('Transactions via SSLCommerz')}}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <p>{{PriceHelper::GatewayText('sslcommerz')}}</p>
              </div>
          </div>
          <input type="hidden" name="payment_method" value="SSLCommerz">
          <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With SSLCommerz')}}</span></button>
          </div>
        </div>

      </div>
  </form>
    </div>







@php
    $paymentData = App\Models\PaymentSetting::where('unique_keyword','mercadopago')->first();
    $paydata = $paymentData->convertJsonData();
@endphp

@if ($paymentData->status == 1)
{{-- MERCADOPAGO --}}
  <div class="modal fade" id="mercadopago" tabindex="-1"  aria-hidden="true">
    <form class="interactive-credit-card row" id="mercadopagofrom" action="{{route('front.mercadopago.submit')}}" method="POST">
        @csrf
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">{{__('Transactions via Mercadapago')}}</h6>
          <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="col-lg-12 form-group">
              <input class="form-control" type="text" placeholder="{{ __('Credit Card Number') }}" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" autocomplete=off required />
            </div>

            <div class="col-lg-12 form-group">
              <input class="form-control" type="text" id="securityCode" data-checkout="securityCode" placeholder="{{ __('Security Code') }}" onselectstart="return false" autocomplete=off required />
            </div>

            <div class="col-lg-12 form-group">
              <input class="form-control" type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="{{ __('Expiration Month') }}" autocomplete=off required />
            </div>

            <div class="col-lg-12 form-group">
            <input class="form-control" type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="{{ __('Expiration Year') }}" autocomplete=off required />
            </div>

            <div class="col-lg-12 form-group">
              <input class="form-control" type="text" id="cardholderName" data-checkout="cardholderName" placeholder="{{ __('Card Holder Name') }}" required />
            </div>
            <div class="col-lg-12 form-group">
              <input class="form-control" type="text" id="docNumber" data-checkout="docNumber" placeholder="{{ __('Document Number') }}" required />
            </div>
            <div class="col-lg-12 form-group">
                <label for="docType" class="col-lg-3 pl-0" id="dc-label">{{ __('Document type') }}</label>
                <select class="form-control col-lg-9 pl-0" id="docType" data-checkout="docType" required>
                </select>
            </div>


            <p>{{PriceHelper::GatewayText('mercadopago')}}</p>
            </div>
        </div>
        <input type="hidden" name="payment_method" value="Mercadopago">
        <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
          <button class="btn btn-primary btn-sm" type="submit"><span>{{__('Checkout With Mercadopago')}}</span></button>
        </div>
      </div>

    </div>
    <input type="hidden" id="installments" value="1"/>
    <input type="hidden" name="amount" id="amount"/>
    <input type="hidden" name="description"/>
    <input type="hidden" name="paymentMethodId" />
    </form>

    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script>

        window.Mercadopago.setPublishableKey("{{$paydata['public_key']}}");
        window.Mercadopago.getIdentificationTypes();

        function addEvent(to, type, fn){
          if(document.addEventListener){
              to.addEventListener(type, fn, false);
          } else if(document.attachEvent){
              to.attachEvent('on'+type, fn);
          } else {
              to['on'+type] = fn;
          }
      };

        addEvent(document.querySelector('#cardNumber'), 'keyup', guessingPaymentMethod);
        addEvent(document.querySelector('#cardNumber'), 'change', guessingPaymentMethod);

        function getBin() {
            var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
            return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
        };

        function guessingPaymentMethod(event) {
            var bin = getBin();

            if (event.type == "keyup") {
                if (bin.length >= 6) {
                    window.Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            } else {
                setTimeout(function() {
                    if (bin.length >= 6) {
                        window.Mercadopago.getPaymentMethod({
                            "bin": bin
                        }, setPaymentMethodInfo);
                    }
                }, 100);
            }
        };

        function setPaymentMethodInfo(status, response) {
            if (status == 200) {
                const paymentMethodElement = document.querySelector('input[name=paymentMethodId]');

                if (paymentMethodElement) {
                    paymentMethodElement.value = response[0].id;
                } else {
                    const input = document.createElement('input');
                    input.setAttribute('name', 'paymentMethodId');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('value', response[0].id);

                    form.appendChild(input);
                }

                Mercadopago.getInstallments({
                    "bin": getBin(),
                    "amount": parseFloat(document.querySelector('#amount').value),
                }, setInstallmentInfo);

            }
        };


        doSubmit = false;
        addEvent(document.querySelector('#mercadopagofrom'), 'submit', doPay);
        function doPay(event){
            event.preventDefault();
            if(!doSubmit){
                var $form = document.querySelector('#mercadopagofrom');

                window.Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below

                return false;
            }
        };

        function sdkResponseHandler(status, response) {
            if (status != 200 && status != 201) {
                alert("Some of your information is wrong!");
                $('#preloader').hide();

            }else{
              
                var form = document.querySelector('#mercadopagofrom');
                var card = document.createElement('input');
                card.setAttribute('name', 'token');
                card.setAttribute('type', 'hidden');
                card.setAttribute('value', response.id);
                form.appendChild(card);
                doSubmit=true;
                form.submit();
            }
        };


        function setInstallmentInfo(status, response) {
                var selectorInstallments = document.querySelector("#installments"),
                fragment = document.createDocumentFragment();
                selectorInstallments.length = 0;

                if (response.length > 0) {
                    var option = new Option("Escolha...", '-1'),
                    payerCosts = response[0].payer_costs;
                    fragment.appendChild(option);

                    for (var i = 0; i < payerCosts.length; i++) {
                        fragment.appendChild(new Option(payerCosts[i].recommended_message, payerCosts[i].installments));
                    }

                    selectorInstallments.appendChild(fragment);
                    selectorInstallments.removeAttribute('disabled');
                }
            };

    </script>
  </div>
@endif


{{-- Paystack --}}
<div class="modal fade" id="paystack" tabindex="-1"  aria-hidden="true">

  <form class="interactive-credit-card row" action="{{route('front.checkout.submit')}}" method="POST" id="paystack_form">
    @csrf
    <input type="hidden" name="ref_id" id="ref_id" value="">
      <div class="modal-dialog" >
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title">{{__('Transactions via Paystack')}}</h6>
                  <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <div class="card-body">
                  <p>{{PriceHelper::GatewayText('paystack')}}</p>
                  </div>
              </div>
              <input type="hidden" name="payment_method" value="Paystack">
              <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
              <div class="modal-footer">
                  <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal"><span>{{ __('Cancel') }}</span></button>
                  <button class="btn btn-primary btn-sm final-btn" id="final-btn" type="submit"><span>{{__('Checkout With Paystack')}}</span></button>
              </div>
          </div>
      </div>
  </form>


@php
$data = App\Models\PaymentSetting::whereUniqueKeyword('paystack')->first();
$paydata = $data->convertJsonData();
$billing = Session::get('billing_address');
@endphp
@section('script')
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  let email = $('#checkout_email_billing').val();
  $(document).on('submit','#paystack_form',function(e){
    e.preventDefault();
      var total = {{PriceHelper::cartTotal(Session::get('cart'))}};
          total = Math.round(total);

          var handler = PaystackPop.setup({
            key: '{{$paydata['key']}}',
            email: '{{isset($user) ? $user->email : $billing['bill_email']}}',
            amount: '{{round($grand_total * PriceHelper::setCurrencyValue(),2)}}' * 100,
            currency: '{{PriceHelper::setCurrencyName()}}',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){
              $('#ref_id').val(response.reference);
              $('#paystack_form').removeAttr('id');
              $('.final-btn').click();
            },
            onClose: function(){
              window.location.reload();
            }
          });
          handler.openIframe();
              return false;
  });
</script>

@endsection
</div>




  <!-- Modal bank -->
  <div class="modal fade" id="bank" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">{{ __('Transactions via Bank Transfer') }}</h6>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form action="{{route('front.checkout.submit')}}" method="POST">
          <div class="modal-body">
            <div class="col-lg-12 form-group">
              <label for="transaction">{{ __('Transaction Number') }}</label>
              <input class="form-control" name="txn_id" id="transaction" placeholder="{{__('Enter Your Transaction Number')}}" required />
          </div>
            <p>{!!PriceHelper::GatewayText('bank')!!}</p>
          </div>
          <div class="modal-footer">

              @csrf
              <input type="hidden" name="payment_method" value="Bank">
              <input type="hidden" name="state_id" value="{{auth()->check() && auth()->user()->state_id ? auth()->user()->state_id : ''}}" class="state_id_setup">
            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
            <button class="btn btn-primary btn-sm" type="submit"><span>{{ __('Checkout With Bank Transfer') }}</span></button>
          </form>
          </div>
        </div>
      </div>
    </div>
