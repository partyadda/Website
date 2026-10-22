@extends('includes.layout')

@section('title','Private Theaters for Celebration and Surprises')
@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')

@section('content')

<style>
    .booking-agreement {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
        color: #000;
    }

    .booking-agreement .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-top: 8px;
        padding: 0;
        color: inherit;
        font-size: 14px;
    }

    .booking-agreement .agreement-heading {
        margin: 12px 0;
        padding: 0;
        font-family: inherit;
        font-size: clamp(20px, 3vw, 26px);
        font-weight: 700;
        line-height: 1.3;
    }

    .booking-agreement .section-title {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
        margin: 12px 0 8px;
        padding: 0;
        font-family: inherit;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.4;
    }

    .booking-agreement .section-title small {
        font-size: 12px;
        font-weight: 400;
    }

    .booking-agreement .section-icon { margin: 0; font-size: 18px; }
    .booking-agreement .list-group { padding-left: 0; }

    .booking-agreement .list-group-item {
        padding: 8px 12px;
        color: inherit;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
    }

    .booking-agreement .form-check {
        margin-bottom: 8px;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
    }

    .booking-agreement .form-check-input {
        width: 1.1em;
        height: 1.1em;
        margin-top: 0.25em;
    }

    .booking-agreement .button-custom {
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.5;
    }

    .booking-agreement .alert { margin-bottom: 12px; font-size: 14px; }

    @media (max-width: 767px) {
        .booking-agreement .list-group-item { padding: 8px 10px; }
    }
</style>


<div class="container py-2 booking-agreement">
  <a href="javascript:void(0)" class="back-btn text-decoration-none" onclick="goBack()">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
    </svg>
    Back
  </a>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      
      <h1 class="agreement-heading">Terms & Conditions</h1>
      
       <!-- General Section -->
    <h4 class="section-title"><span class="section-icon">🚫</span>General</h4>
    <ul class="list-group mb-3">
      <li class="list-group-item">No outside food allowed inside the premises.</li>
      <li class="list-group-item">Smoking & alcohol are prohibited; violators will be asked to leave.</li>
      <li class="list-group-item">Children above 5 years will be charged. All minors must be accompanied by an adult and carry valid ID.</li>
      <li class="list-group-item">Party poppers, snow sprays & sparkle candles are not permitted.</li>
      <li class="list-group-item">Damage to property or decor (balloons, lights, flowers) must be compensated. Cleaning charges up to ₹1000 may apply.</li>
      <li class="list-group-item">Slot timings are fixed and cannot be extended. Please collect all your items before leaving the theatre promptly at the end of your booking. We are not responsible for lost belongings.</li>
    </ul>

    <!-- Technical Section -->
    <h4 class="section-title"><span class="section-icon">🎬</span>Technical & Entertainment</h4>
    <ul class="list-group mb-3">
      <li class="list-group-item">In case of technical issues (projector, sound, AC, internet), refund will be processed after deducting rent for the affected duration.</li>
      <li class="list-group-item">OTT access is provided — guests must use their own login credentials. Streaming of illegal content is strictly prohibited.</li>
    </ul>

    <!-- Add-ons Section -->
    <h4 class="section-title"><span class="section-icon">🌟</span>Special Add-ons <small class="text-muted">(Notify staff when needed, if chosen)</small></h4>
    <ul class="list-group mb-3">
      <li class="list-group-item"><strong>Fog Entry:</strong> Available during entry or cake cutting.</li>
      <li class="list-group-item"><strong>360° Selfie Booth, Photography</strong></li>
      <li class="list-group-item"><strong>DJ Lights:</strong> Available for 30 minutes during your slot.</li>
      <li class="list-group-item"><strong>Teddy Mascot:</strong> Worn by someone from your group for 20 minutes.</li>
      <li class="list-group-item"><strong>Photo Clippings:</strong> Guests must bring printed photos.</li>
    </ul>

    <!-- Refund Section -->
    <h4 class="section-title"><span class="section-icon">💸</span>Refund Policy</h4>
    <ul class="list-group mb-3">
      <li class="list-group-item">Full refund for cancellations made at least 72 hours in advance.</li>
      <li class="list-group-item">No refund for cancellations made within 72 hours of your scheduled time.</li>
    </ul>
      <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">I agree to the above Terms & Conditions.</label>
      </div>

      @if(($is_package ?? 0) == 1)
      <form action="{{ route('package.booking.book_package_now') }}" id="form_book_now_package" method="POST">
        @csrf
        <input type="hidden" name="is_package" value="1">
        <button type="submit" class="btn button-custom rounded-pill px-3 my-3 w-100" id="pay_now"> </button>
      </form>
      @else
      <form action="{{ route('book-now') }}" id="form_book_now" method="POST">
        @csrf
        <input type="hidden" name="name">
        <input type="hidden" name="theatre_id">
        <input type="hidden" name="slot_id">
        <input type="hidden" name="customer_id">
        <input type="hidden" name="calender">
        <input type="hidden" name="time">
        <input type="hidden" name="Booking_Name">
        <input type="hidden" name="input_number">
        <input type="hidden" name="Whatsapp_Name">
        <input type="hidden" name="Email_ID">
        <input type="hidden" name="form_select_lg">
        <input type="hidden" name="coupon_code">
        <input type="hidden" name="extra">
        <input type="hidden" name="cake_price">
        <input type="hidden" name="cake_name">
        <input type="hidden" name="name_on_cake">
        <input type="hidden" name="decoration_price">
        <input type="hidden" name="decoration_name">
        <input type="hidden" name="total">
        <input type="hidden" name="sub_total">
        <input type="hidden" name="advance">
        <input type="hidden" name="slot">
        <input type="hidden" name="decoration">
        <input type="hidden" name="decoration_id">
        <input type="hidden" name="addon_id">
        <input type="hidden" name="cake_id">
        <input type="hidden" name="nick_name">
        <input type="hidden" name="your_name">
        <input type="hidden" name="partner_name">
        <input type="hidden" name="overview_sub_total">
        <input type="hidden" name="addon_amount">
        <input type="hidden" name="discount_id">

        <button type="submit" class="btn button-custom rounded-pill px-3 my-3 w-100" id="pay_now"> </button>
      </form>
      @endif

      <form action="{{ route('payment-status') }}" id="form_with_payment" method="POST">
        @csrf
        <input type="hidden" name="is_package" value="{{ ($is_package ?? 0) }}">
        <input type="hidden" name="booking_id">
        <input type="hidden" name="payment_id">
        <input type="hidden" name="customer_id">
        <input type="hidden" name="payble_amount">
        <input type="hidden" name="payment_status" value="">
        <input type="hidden" name="razorpay_payment_id">
        <input type="hidden" name="razorpay_order_id">
        <input type="hidden" name="razorpay_signature">
      </form>

      @if($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>Error!</strong> {{ $message }}
      </div>
      @endif
      @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <strong>Success!</strong> {{ $message }}
      </div>
      @endif
    </div>
  
  
  </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    {{-- $('form#form_book_now').on('submit', function(ev) {
      ev.preventDefault();
      submitForm($(this));
    }); --}}

    $('#pay_now').on('click', function(ev) {
      var form = null;
      var isPackageBooking = '{{ $is_package }}';
      if(isPackageBooking == 1) {
        form = $('#form_book_now_package');
      } else {
        form = $('#form_book_now');
      }
      ev.preventDefault();
      submitForm(form);
    });

    function submitForm(form, formType) {
      var btn = form.find('button[type=submit]');
      disableBtn(btn);
      var ajaxOptions = {
        url: form.attr('action')
        , type: 'POST'
        , cache: false
        , processData: false
        , dataType: 'json'
        , contentType: false
        , data: new FormData(form[0])
      };
      var req = $.ajax(ajaxOptions);
      req.done(function(resp) {
        console.log(resp);
        if (resp != null && resp.success != null && resp.success == true) {
          $('input[name=booking_id]').val(resp.booking_id);
          $('input[name=payment_id]').val(resp.payment_id);
          $('input[name=customer_id]').val(resp.customer.id);
          $('input[name=payble_amount]').val(resp.paybleAmount);
          initPayMent(resp);
        } else {
          alert("Error: " + resp.errMsg);
        }
        enableBtn(btn);
        return resp;
      });
      req.fail(function(e) {
        if (e.status == 422) {}
        if (e.status == 500) {}
        if (e.status == 404) {}
        enableBtn(btn);
        alert("Something went wrong");
        return e.status;
      });
    }

    function disableBtn(btn) {
      var btnText = btn.data('text') ? btn.data('text') : 'Book Now';
      btn.prop('disabled', true).html('<i class="icon-spinner mr-2 spinner"></i>' + btnText);
    }

    function enableBtn(btn) {
      var btnText = btn.data('text') ? btn.data('text') : 'Book Now and Pay';
      btn.prop('disabled', false).html(btnText);
    }

    function initPayMent(bookingResponse) {

      var rzpKey = "{{env('RAZOR_API_KEY')}}";
      var paybleAmountInPaise = bookingResponse.paybleAmountInPaise;
      var rzrOrderId = bookingResponse.rzr_order_id;
      var customerName = bookingResponse.customer.customer_name;
      var email = bookingResponse.customer.email;
      var phone = bookingResponse.customer.phone;

      var options = {
        key: rzpKey, // Replace with your Razorpay API Key
        amount: paybleAmountInPaise
        , currency: "INR"
        , name: "Party Adda"
        , order_id: rzrOrderId
        // Payment for booking can be more descriptice - occasion, date, time, totalamount, people , custname, phone, 
        , description: "Payment for booking"
        , image: "https://partyadda.com/assets/img/logo.png"
        , prefill: {
          name: customerName
          , email: email // Email may not be much of use 
          , contact: phone
        , }
        , theme: {
          color: "#F37254"
        , }
        , handler: function(response) {
          console.log("Payment successful. Response:", response);

          $('input[name=payment_status]').val('SUCCESS');
          $('input[name=razorpay_payment_id]').val(response.razorpay_payment_id);
          $('input[name=razorpay_order_id]').val(response.razorpay_order_id);
          $('input[name=razorpay_signature]').val(response.razorpay_signature);

          $("#form_with_payment").submit();
        }
        , modal: {
          escape: false
          , ondismiss: function() {
            console.log('Checkout form closed');
            $('input[name=payment_status]').val('MODEL_CLOSED');
            $("#form_with_payment").submit();
          }
        }
      , };

      var rzp = new Razorpay(options);
      rzp.open();
      updatePayMentInitStatus();

      rzp.on('payment.failed', function(response) {
        console.log("PaymentError:", response.error.description);
        $('input[name=payment_status]').val('FAILED');
        $("#form_with_payment").submit();

        //alert(response.error.code);
        //alert(response.error.description);
        //alert(response.error.source);
        //alert(response.error.step);
        //alert(response.error.reason);
        //alert(response.error.metadata.order_id);
        //alert(response.error.metadata.payment_id);
      });
    }

    function updatePayMentInitStatus() {
      $.ajax({
        url: "{{ url('update_booking_payment_init_status') }}"
        , type: "POST"
        , data: {
          "_token": "{{ csrf_token() }}"
          , "booking_id": $('input[name=booking_id]').val()
        }
        , success: function(data) {}
      });
    }
  });

</script>
<script>
  function goBack() {
    window.history.back()
  }

  $(document).ready(function() {

    $('#pay_now').text('Book Now');
    $('#pay_now').attr('disabled', 'disabled');

    $($('#flexCheckDefault')).on('click', function() {
      if ($('#flexCheckDefault').is(':checked')) {
        $('input[name=advance]').val(localStorage.getItem('advance'));
        $('#pay_now').removeAttr('disabled');
      } else {
        $('#pay_now').attr('disabled', 'disabled');
      }
    })

    var isPackageBooking = '{{ $is_package }}';
    
    if(isPackageBooking == 0) {
      var couponCode = null;
      if (localStorage.hasOwnProperty("coupon_data")) {
        var couponCodeJson = localStorage.getItem('coupon_data');
        if (couponCodeJson != null && couponCodeJson != '') {
          couponCode = JSON.parse(couponCodeJson);
        }
      }

      if (couponCode != null && couponCode.discount_id != null) {
        $('input[name=discount_id]').val(couponCode.discount_id);
      } else {
        $('input[name=discount_id]').val('');
      }

      $('input[name=name]').val(localStorage.getItem('name'));
      $('input[name=theatre_id]').val(localStorage.getItem('theatre_id'));
      $('input[name=slot_id]').val(localStorage.getItem('slot_id'));
      $('input[name=customer_id]').val(localStorage.getItem('customer_id'));
      $('input[name=calender]').val(localStorage.getItem('calender'));
      $('input[name=time]').val(localStorage.getItem('time'));
      $('input[name=cake]').val(localStorage.getItem('cake'));
      $('input[name=Booking_Name]').val(localStorage.getItem('Booking_Name'))
      $('input[name=input_number]').val(localStorage.getItem('input_number'))
      $('input[name=Whatsapp_Name]').val(localStorage.getItem('Whatsapp_Name'))
      $('input[name=Email_ID]').val(localStorage.getItem('Email_ID'))
      $('input[name=form_select_lg]').val(localStorage.getItem('form_select_lg'))
      $('input[name=coupon_code]').val(localStorage.getItem('coupon_code'))

      if (localStorage.hasOwnProperty('extra') && localStorage.getItem('extra') != '') {
        $('.extra').text('₹ ' + localStorage.getItem('extra').match(/\d+/)[0]);
      } else {
        $('input[name=extra]').val(0);
      }
      $('input[name=multiCakeContent]').val(localStorage.getItem('multiCakeContent'));
      if (localStorage.getItem('decoration_id') === '') {
        $('input[name=decoration_id]').val('');
      } else {
        $('input[name=decoration_id]').val(localStorage.getItem('decoration_id'));
      }

      if (localStorage.getItem('addon_id')) {
        $('input[name=addon_id]').val(localStorage.getItem('addon_id'));
      } else {
        $('input[name=addon_id]').val();
      }

      if (localStorage.getItem('multiDecorationContent') == null) {
        $('input[name=total]').val(localStorage.getItem('after_decoration_balance_select'));
      } else {
        $('input[name=total]').val(localStorage.getItem('after_decoration_balance_select'));
      }

      $('input[name=addon_amount]').val(localStorage.getItem('addon_amount'));
      if (localStorage.getItem('cake_id') === undefined || localStorage.getItem('cake_id') === "undefined" || localStorage.getItem('cake_id') === null || localStorage.getItem('cake_id') === '') {
        $('input[name=cake_id]').val('0');
      } else {
        $('input[name=cake_id]').val(localStorage.getItem('cake_id'));
        if (localStorage.hasOwnProperty('name_on_cake')) {
          $('input[name=name_on_cake]').val(localStorage.getItem('name_on_cake'));
        }
      }
      var decoration_price = null
      if (localStorage.hasOwnProperty('multi_decoration')) {
        decoration_price = localStorage.getItem('multi_decoration');
      }
      if (decoration_price === null) {
        decoration_price = 0;
      } else {
        decoration_price = localStorage.getItem('multi_decoration').match(/\d+/)[0];
      }
      if (localStorage.getItem('after_decoration_sub_total_select') === null) {
        $('input[name=sub_total]').val(localStorage.getItem('overview_sub_total').match(/\d+/)[0]);
      } else {
        $('input[name=sub_total]').val(localStorage.getItem('after_decoration_sub_total_select').match(/\d+/)[0]);
      }
      $('input[name=decoration_name]').val(localStorage.getItem('multiDecorationContent'));
      $('input[name=decoration_price]').val(decoration_price)
      $('input[name=multiDecorationContent]').val(localStorage.getItem('multiDecorationContent'));

      if (localStorage.getItem('after_decoration_balance_select') === null) {
        $('input[name=total]').val(localStorage.getItem('overview_balance').match(/\d+/)[0]);
      } else {
        $('input[name=total]').val(localStorage.getItem('after_decoration_balance_select'));
      }

      $('input[name=advance]').val(localStorage.getItem('advance'));

      if (localStorage.getItem('decoration') === null) {
        $('input[name=decoration]').val('');
      } else {
        $('input[name=decoration]').val(localStorage.getItem('decoration').match(/\d+/)[0]);
      }

      $('input[name=slot]').val(localStorage.getItem('slot'));
      $('input[name=nick_name]').val(localStorage.getItem('nick_name'));
      $('input[name=your_name]').val(localStorage.getItem('your_name'));
      $('input[name=partner_name]').val(localStorage.getItem('partner_name'));
    } 
  });

</script>
@endsection

