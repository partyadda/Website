@extends('includes.layout')

@section('title','Private Theaters for Celebration and Surprises')
@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')
@section('content')

<style>
    .booking-payment-result {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .booking-payment-result .thank-you-note {
        margin: 12px 0;
        font-family: inherit;
        font-size: clamp(20px, 3vw, 26px);
        font-weight: 700;
        line-height: 1.3;
    }

    .booking-payment-result .booking-meta { gap: 8px 12px; }
    .booking-payment-result .booking-meta > div { align-items: center; }
    .booking-payment-result .booking-meta img { width: 24px; height: 24px; object-fit: contain; }

    .booking-payment-result p,
    .booking-payment-result .lead {
        margin: 0 0 8px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.6;
    }

    .booking-payment-result hr { margin: 10px 0; }
    .booking-payment-result .summary-content {
        height: auto;
        margin-bottom: 12px;
        padding: 16px;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
    }

    .booking-payment-result .summary-heading {
        margin: 0 0 12px;
        font-family: inherit;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.3;
    }

    .booking-payment-result .fs-11 { font-size: 11px; }
    .booking-payment-result .btn { padding: 9px 16px; font-family: inherit; font-size: 14px; line-height: 1.5; }
    .booking-payment-result .thank-you-message { text-align: center; }

    @media (max-width: 767px) {
        .booking-payment-result .summary-content { padding: 14px; }
    }
</style>
<script>
  // document.addEventListener('DOMContentLoaded', function () {
  //     @if(isset($localStorageKeys))
  //         let keys = @json($localStorageKeys);
  //         keys.forEach(function(key) {
  //             localStorage.removeItem(key);
  //         });
  //     @endif
  // });
</script>

<div class="container py-2 booking-payment-result">
  {{-- <div class="thank-you-message">
    <h1 class="display-4">Thank You!</h1>
    <p class="lead">Your slot has been booked successfully. One of our executives will contact you shortly regarding payment.</p>
    <hr class="my-2">
    <!--<a class="btn btn-primary btn-lg" href="javascript:void(0)" role="button" onclick="clear();">Go to Homepage</a>-->
  </div> --}}

  <div class="row">
    <div class="col-md-7">
      <div class="thank-you-note">
        @if(($is_paid ?? 0) == 1)
          Congratulations ! - {{ $customer->customer_name ?? '' }}
        @else
          Payment Couldn’t Be Completed!!
        @endif
      </div>
      <div class="d-flex flex-wrap mb-2 booking-meta">
        <div class="d-flex mb-0">
          <img src="{{URL::asset('assets/img/theatre_icon.png')}}" style="width:24px;height:24px;">
          <span class="ms-2 name"></span>&nbsp;Theatre
        </div>
        <div class="d-flex">
          <img src="{{URL::asset('assets/img/calender_icon.png')}}" style="width:24px;height:24px;">
          <span class="ms-2 calender"></span>
        </div>
        <div class="d-flex">
          <img src="{{URL::asset('assets/img/timer_icon.png')}}" style="width:24px;height:24px;">
          <span class="ms-2 time"> </span>
        </div>
      </div>
      <hr class="my-2">

      @if(($is_paid ?? 0) == 1)
        <p class="lead">Your slot has been booked successfully. </p>
        <p>If you have any further questions about your booking, please don&#39;t hesitate to reach out to us on our WhatsApp number.
        <a href="https://wa.me/+919845740260" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img
          src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25" height="25" alt="WhatsApp"/></a>
        </p>
      @else
        <p>Your booking isn’t confirmed yet. Please try again or contact us on WhatsApp for help. If any amount was debited, contact us before retrying so we can check your payment status
         <a href="https://wa.me/+919845740260" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img
          src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25" height="25" alt="WhatsApp"/></a>
        </p>
      @endif
      <hr class="my-2">
      <a class="btn btn-primary btn-sm homepage" href="javascript:void(0)">Go to Homepage</a>
      <div class="mb-2"></div>
    </div>

    <div class="col-md-5">
      <div class="summary-content find-us">
        <h2 class="summary-heading">Booking Summary</h2>
        <div class="d-flex mb-2">
          <span>Base Price</span><b class="ms-auto total"></b>
        </div>
        <div class="d-flex mb-2">
          <span class="decoration_div">Decoration</span> <span class="decoration_count"></span><b class="ms-auto decoration"></b>
        </div>
        <div class="d-flex mb-2" id="extra_person_div">
          <span style="margin-right: 10px;">Extra Person Charges</span> <span class="extra_count"></span><b class="ms-auto extra"></b>
        </div>
       
        <div class="d-flex mb-2">
          <span class="multi_cake"></span><b class="ms-auto cake"></b>
        </div>
        <div class="d-flex mb-2">
          <span class="multi"></span><b class="ms-auto multi_decoration"></b>
        </div>
        <div class="d-flex mb-2" id="coupon_applied_div" style="display: none;">
          <span id="coupon-applied-text">Coupon Applied</span><b class="ms-auto coupon-applied-amount"></b>
        </div>
        <hr>
        <div class="d-flex mb-2">
          <span>Subtotal</span><b class="ms-auto sub_total"></b>
        </div>
        <hr>
        <div class="d-flex mb-2 fw-bold" id="non_paid_advance">
          <span>Payable Advance Amount</span><b class="ms-auto advance"></b>
        </div>
        <div class="d-flex mb-2 fw-bold"  id="paid_advance">
          <span class="advance_paid_text">Paid Advance Amount</span><b class="ms-auto advance_paid"></b>
        </div>
        <hr>
        <div class="d-flex mb-2 ">
          <span>Balance Amount<div class="fs-11"></div></span>
          <b class="ms-auto balance"></b>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    //var thanYouNote = "Thank You";
    //$('.thank-you-note').text(thanYouNote);

    var paid_amount = parseInt({{ $paid_amount ?? 0 }});
    if(paid_amount == 0) {
      $('.advance_paid').css("color", "#FFA500");
      $('.advance_paid_text').css("color", "#FFA500");
    } 
    $('.advance_paid').text('₹ ' + '' + {{  $paid_amount ?? 0 }});
    $('.advance').text('₹ ' + '' + localStorage.getItem('advance'));

    $('.name').text(localStorage.getItem('name'));
    $('.calender').text(localStorage.getItem('calender'));
    $('.time').text(localStorage.getItem('time'));

    if (localStorage.getItem('extra_count_per') == null || localStorage.getItem('extra_count_per') === '') {
      $('#extra_person_div').hide();
      $('#extra_person_div').removeClass("d-flex mb-2");
    } else {
      $('#extra_person_div').show();
      $('#extra_person_div').addClass("d-flex mb-2");
    }

    if (localStorage.getItem('is_decoration_not_opted') == "1") {
      $('.decoration_div').hide();
      $('.decoration').hide();
    } else {
      $('.decoration_div').show();
      $('.decoration').show();
      if (localStorage.getItem('decoration_included') == 0) {
        $('.decoration').text('₹' + ' ' + localStorage.getItem('decoration_amount'));
      } else {
        $('.decoration').text('Free');
      }
      $('.decoration').text(localStorage.getItem('decoration'));
      $('.cake').text(localStorage.getItem('cake'))
    }

    if(localStorage.getItem('after_cake_total') === null){
      $('.total').text(localStorage.getItem('overview_total').match(/\d+/)[0]);
    } else {
      $('.total').text(localStorage.getItem('after_cake_total'));
    }
   
    $('.fs-11').text('(Payable at the Venue on ' + ' ' + localStorage.getItem('calender') + ')');
  
    if(localStorage.getItem('after_decoration_sub_total_select')  === null) {
      $('.sub_total').text(localStorage.getItem('overview_sub_total').match(/\d+/)[0]);
    } else {
      $('.sub_total').text(localStorage.getItem('after_decoration_sub_total_select').match(/\d+/)[0]);
    }

    if(localStorage.getItem('after_decoration_balance_select') === null || localStorage.getItem('after_decoration_balance_select') === '') {
      $('.balance').text(localStorage.getItem('overview_balance').match(/\d+/)[0]);
    } else {
      $('.balance').text(localStorage.getItem('after_decoration_balance_select'));
    }
    
    $('#coupon-applied-div').hide();
    var couponCode= null;
    if (localStorage.hasOwnProperty("coupon_data")) {
      var couponCodeJson = localStorage.getItem('coupon_data');
      if(couponCodeJson != null && couponCodeJson != '') {
        couponCode = JSON.parse(couponCodeJson);
      }
    }
    if(couponCode != null) {
      $('#coupon_applied_div').addClass('d-flex');
      $('#coupon_applied_div').show();

      $('.coupon-applied-amount').text('-₹' + ' ' + couponCode.totalCouponAmount);
    } else {
      $('#coupon_applied_div').removeClass('d-flex');
      $('#coupon_applied_div').hide();

      $('.coupon-applied-amount').text('');
    }

    if(localStorage.hasOwnProperty('extra') && localStorage.getItem('extra') != '') {
      $('.extra').text('₹ ' + '' + localStorage.getItem('extra').match(/\d+/)[0]);
    }

    var storedContent = localStorage.getItem('multiCakeContent');
    $('.extra_count').text(localStorage.getItem('extra_count_per'));
    $('.multi_cake').html(storedContent);

    $('.multi').html(localStorage.getItem('multiDecorationContent'));
    $('.multi_decoration').text('₹ '+ localStorage.getItem('multi_decoration').match(/\d+/)[0]);
  });

  function clear() {
    localStorage.clear();
    window.location.href = '{{ env('APP_URL') }}';
  }

  $('.homepage').on('click', clear);

  // $(document).ready(function(){
  //     localStorage.clear();
  //     localStorage.removeItem('extra');
  //     localStorage.removeItem('Booking_Name',);
  //     localStorage.removeItem('input_number',);
  //     localStorage.removeItem('Whatsapp_Name',);
  //     localStorage.removeItem('Email_ID');
  //     localStorage.removeItem('form_select_lg');
  //     localStorage.removeItem('coupon_code');
  //     localStorage.removeItem('extra_count_per');
  //     localStorage.removeItem('overview_total');
  //     localStorage.removeItem('overview_sub_total');
  //     localStorage.removeItem('overview_balance');
  //     localStorage.removeItem('nick_name');
  //     localStorage.removeItem('your_name');
  //     localStorage.removeItem('partner_name');
  //     localStorage.removeItem('decoration');
  //     localStorage.removeItem('after_decoration');
  //     localStorage.removeItem('after_decoration_sub_total');
  //     localStorage.removeItem('decoration_id');
  //     localStorage.removeItem('after_decoration_total');
  //     localStorage.removeItem('cake_val_check');
  //     localStorage.removeItem('cake_amount_check');
  //     localStorage.removeItem('cake_id_check');
  //     localStorage.removeItem('advance');
  //     localStorage.removeItem('after_cake_ad_on');
  //     localStorage.removeItem('after_cake_ad_on_sub_total');
  //     localStorage.removeItem('after_cake_total');
  //     localStorage.removeItem('after_decoration_balance_select');
  //     localStorage.removeItem('after_decoration_sub_total_select');
  //     localStorage.removeItem('branch_id');
  //     localStorage.removeItem('cake_id_check');
  //     localStorage.removeItem('cake_id_check');
  //     localStorage.removeItem('cake_id_check');
  //     localStorage.removeItem('cake_id_check');
  // })
</script>

@endsection

