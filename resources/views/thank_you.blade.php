@extends('includes.layout')
@section('title','Thank You!')

@section('content')

<style>
  .thank-you-message {
    text-align: center;
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

<div class="container">
  {{-- <div class="thank-you-message">
    <h1 class="display-4">Thank You!</h1>
    <p class="lead">Your slot has been booked successfully. One of our executives will contact you shortly regarding payment.</p>
    <hr class="my-4">
    <!--<a class="btn btn-primary btn-lg" href="javascript:void(0)" role="button" onclick="clear();">Go to Homepage</a>-->
  </div> --}}

  <div class="row">
    <div class="col-md-7">
      <div class="fs-4 fw-bold my-4 thank-you-note">
        @if(($is_paid ?? 0) == 1)
          Congratulations ! - {{ $customer->customer_name ?? '' }}
        @else
          Payment Unsuccessful!!
        @endif
      </div>
      <div class="d-flex flex-wrap mb-4">
        <div class="d-flex me-3 me-md-4 mb-md-0 mb-3">
          <img src="{{URL::asset('assets/img/theatre_icon.png')}}" style="width:32-x;height:32px;">
          <span class="ms-2 name"></span>&nbsp;Theatre
        </div>
        <div class="d-flex me-3 me-md-4 me-sm-6 me-xs-6">
          <img src="{{URL::asset('assets/img/calender_icon.png')}}" style="width:32-x;height:32px;">
          <span class="ms-2 calender"></span>
        </div>
        <div class="d-flex me-3 me-md-4 me-sm-6 me-xs-6">
          <img src="{{URL::asset('assets/img/timer_icon.png')}}" style="width:32-x;height:32px;">
          <span class="ms-2 time"> </span>
        </div>
      </div>
      <hr class="my-4">

      @if(($is_paid ?? 0) == 1)
        <p class="lead">Your slot has been booked successfully. </p>
        <p>If you have any further questions about your booking, please don&#39;t hesitate to reach out to us on our WhatsApp number.
        <a href="https://wa.me/+919845740260" target="_blank" aria-label="WhatsApp"><img
          src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25px; height: 25px;"/></a>
        </p>
      @else
        <p>You may try again or contact our customer support team to explore other options for booking your slot.
         <a href="https://wa.me/+919845740260" target="_blank" aria-label="WhatsApp"><img
          src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25px; height: 25px;"/></a>
        </p>
      @endif
      <hr class="my-4">
      <a class="btn btn-primary btn-sm homepage" href="javascript:void(0)">Go to Homepage</a>
      <br><br>
    </div>

    <div class="col-md-5">
      <div class="summary-content p-3  p-md-4 find-us mb-4 h-100">
        <div class="fs-5 fw-bold mb-4">Booking Summary</div>
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
