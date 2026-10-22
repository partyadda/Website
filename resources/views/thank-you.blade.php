@extends('includes.layout')

@section('title', 'Party Adda - Package Booking')

@section('content')
<style>
    .payment-result {
        padding: 8px 6px 12px;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .payment-result .row { --bs-gutter-x: 12px; }
    .payment-result h1 {
        margin: 0 0 8px;
        font-family: inherit;
        font-size: clamp(20px, 3vw, 26px);
        font-weight: 700;
        line-height: 1.3;
    }

    .payment-result .card-title {
        margin: 0;
        font-family: inherit;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.3;
    }

    .payment-result p,
    .payment-result .lead {
        margin-bottom: 8px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.6;
    }

    .payment-result .payment-status-card { padding: 16px; }
    .payment-result .card-body { padding: 12px; }
    .payment-result .list-group-item { padding: 8px 10px; font-size: 14px; line-height: 1.6; }
    .payment-result .btn { padding: 9px 16px; font-family: inherit; font-size: 14px; line-height: 1.5; }
    .payment-result small { font-size: 12px; }

    @media (max-width: 767px) {
        .payment-result .payment-status-card { padding: 12px; }
    }
</style>

<div class="container-fluid payment-result">
    <div class="row" style="margin-bottom:8px; box-shadow: 0px 4px 10px #CCCCCC; border-radius: 5px;">
      <div class="col-lg-12" style="margin-top:8px; margin-bottom:8px;">
        <span class="fs-5 fw-bold "></span>
      </div>
      <div class="col-lg-12" style="padding-left:6px;padding-right:6px;">
        <div class="row" style="margin-bottom:8px;">
          <div class="col-lg-8" id="booking_details" style="margin-bottom:8px;">
             <div class="vh-20">
              <div class="col-md-12">
                  
                <div class="border border-3 
                  @if(($is_paid ?? 0) ==  1)
                    border-success
                  @else
                    border-danger
                  @endif">
                </div>
                
                <div class="card  bg-white shadow payment-status-card">
                  
                  <div class="mb-2 text-center">
                      <h1>
                      @if(($is_paid ?? 0) == 1)
                        Congratulations ! - {{ $customer->customer_name ?? '' }}
                      @else
                        Payment Couldn’t Be Completed!!
                      @endif
                    </h1> 
                      
                    <div id="payment_success" style="display: 
                      @if(($is_paid ?? 0) ==  1)
                        block;
                      @else
                        none;
                      @endif">
                        
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                      </svg>
                    </div>
                    
                    <div id="payment_failed" style="display:
                      @if(($is_paid ?? 0) ==  1)
                        none;
                      @else
                        block;
                      @endif">
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                        <path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"> </path>
                        <path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z"></path>
                        <path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z"></path>
                      </svg>
                    </div>
                  </div>
                  
                  <div class="text-center">
<!--
Whats app link can have the details of the booking, date, slot, occassion, booking Person name, 
the icon can be reduced 

-->
                    @if(($is_paid ?? 0) == 1)
                      <p class="lead">Your slot has been booked successfully. </p>
                      <p>If you have any further questions about your booking, please don&#39;t hesitate to reach out to us on our WhatsApp number.
                      <a href="https://wa.me/+918217575597" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img
                        src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25" height="25" alt="WhatsApp"/></a>
                      </p>
                    @else
                      <p>Your booking isn’t confirmed yet. Please try again or contact us on WhatsApp for help. If any amount was debited, contact us before retrying so we can check your payment status.
                      <a href="https://wa.me/+918217575597" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img
                        src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25" height="25" alt="WhatsApp"/></a>
                      </p>
                    @endif

                    <a class="btn btn-outline-success" href="{{ env('APP_URL') }}">Go to Homepage</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Booking Summary Starts -->
          <div class="col-lg-4" id="booking_summary" style="margin-bottom:8px;">
            <div class="card" style="border-radius: 5px;">
              <div class="card-body">
                <h5 class="card-title">Booking Summary</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <span id="pkg_base_price">Package Price</span>
                  <span style="float: right;"><b>₹</b> 
                    <b class="pkg_base_price">{{ $booking_data->package_amount}}</b>
                  </span>
                </li>
                @php
                  $isShowExtraGuest = 0;
                  $no_of_guest = $booking_data->no_of_guest;
                  $allowed_no_of_guest = $booking_data->allowed_no_of_guest;
                  $extra_person_price = $booking_data->extra_person_price;

                  $extra_guest_label = "Extra Person Charges";
                  if($no_of_guest > $allowed_no_of_guest) {
                    $extraGuest = $no_of_guest - $allowed_no_of_guest;
                    $extra_guest_label = "Extra Person Charges (".$extraGuest."X".$extra_person_price.")";
                    $extra_person_total_price = $extraGuest*$extra_person_price;

                    $isShowExtraGuest = 1;
                  }
                @endphp
                @if($isShowExtraGuest == 1)
                <li class="list-group-item" id="pkg_extra_guest_price_div">
                  <span id="pkg_extra_guest_price">{{ $extra_guest_label }}</span>
                  <span style="float: right;"><b>₹</b> 
                    <b class="pkg_extra_guest_price">
                     {{ $extra_person_total_price }}
                    </b>
                  </span>
                </li>
                @endif
                <li class="list-group-item" id="pkg_cake_price_div">
                  <span id="pkg_cake_price">Cake <small>({{ $booking_data->cake_name }})</small></span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_cake_price">{{ $booking_data->cake_extra_amount }}</b></span>
                </li>
                @php
                  $isShowAddOn = 0;
                  $addOnTotalPrice = 0;
                  $addOns = "";
                @endphp
                @foreach ($booking_data->addon_data as $addon)
                  @php
                    $isShowAddOn = 1;
                    $addOnTotalPrice = $addOnTotalPrice + $addon->add_on_extra_amount;
                    $addOnExtraAmountText = "";
                    if($addon->add_on_extra_amount > 0) {
                      $addOnExtraAmountText = "(".$addon->add_on_extra_amount.")";
                    }
                    $addOns = $addOns."<br/><span class='text-secondary'><small>".$addon->addon_name."".$addOnExtraAmountText."</small></span>";
                  @endphp
                @endforeach
                @if($isShowAddOn == 1)
                <li class="list-group-item" id="pkg_addon_price_div">
                  <span id="pkg_addon_price">AddOns</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_addon_price">{{ $addOnTotalPrice }}</b></span>
                  <span id="add_on_list">
                    {!! $addOns !!}
                  </span>
                </li>
                @endif

                @if(($booking_data->coupon_code_amount ?? 0) > 0)
                <li class="list-group-item" id="pkg_coupon_amount_div">
                  <span id="pkg_coupon_amount">Coupon Applied</span>
                  <span style="float: right;"><b>-₹</b> <b class="pkg_coupon_amount">{{ $booking_data->coupon_code_amount }}</b></span>
                </li>
                @endif
               
                <li class="list-group-item">
                  <span id="pkg_sub_total_amount">Sub Total</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_sub_total_amount">{{ $booking_data->sub_total_amount }}</b></span>
                </li>
                <li class="list-group-item">
                  <span id="pkg_advance_amount">Payable Advance Amount</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_advance_amount">{{ $booking_data->advance_amount }}</b></span>
                </li>
                @if(($is_paid ?? 0) == 1)
                <li class="list-group-item">
                  <span id="pkg_paid_amount"><b class="text-success">Paid Amount</b></span>
                  <span style="float: right;">
                    <b class="pkg_paid_amount text-success">₹ {{ $paid_amount ?? '' }}</b>
                  </span>
                </li>
                @else
                <li class="list-group-item">
                  <span id="pkg_paid_amount"><b class="text-warning">Paid Amount</b></span>
                  <span style="float: right;">
                    <b class="pkg_paid_amount text-warning">₹ 0</b>
                  </span>
                </li>
                @endif
                <li class="list-group-item">
                  <span id="pkg_balance_amount">Balance Amount</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_balance_amount">{{ $booking_data->balance_amount }}</b></span>
                </li>
              </ul>
              
            </div>
          </div>
          <!-- Booking Summary Ends -->
        </div><!-- Row -->
      </div>
    </div>
  </div>
@endsection

