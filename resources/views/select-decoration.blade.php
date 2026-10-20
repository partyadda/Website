@extends('includes.layout')
@section('title','Select Decoration')

@section('content')



<div class="container">

  <div class="row">
    <div class="col-md-7">
      <a href="javascript:void(0)" class="back-btn text-decoration-none mt-5" onclick="goBack()">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        </svg>Back
      </a>
      <div class="fs-3 fw-bold my-4">Select Decoration (Optional)</div>
      <!--  -->
      <form class="mb-5">
        <div class="row gy-4">
          @foreach($groupedAddonsWithAssets as $category => $addons)
          <div class="col-12">
            <h3 class="category-title">{{ $category }}</h3>
          </div>
          @foreach($addons as $dec)
          <div class="col-6 col-lg-3 main_div" id="main_div">
            <label class="select-option text-center">
              <input type="checkbox" name="check" value="{{$dec->name}}" onchange="getDecorationMulti($(this), '{{$dec->pivot->price}}','{{$dec->id}}' )">
              @foreach($dec->assets as $asset)
              <div class="frame">
                <img src="{{ URL::asset('assets/img/'.$asset->foldername.'/'.$asset->filename) }}" class="img-fluid" style="width: 250px;height: 145px;"/>
                <i class=""></i>
              </div>
              @endforeach
              <p class="fw-bold mb-0 text_value">{{ $dec->name }}</p>
              <div>₹ {{ $dec->pivot->price }}</div>
            </label>
          </div>
          @endforeach
          @endforeach
        </div>
        <!-- <div class="mt-5">
                        <label for="exampleFormControlInput1" class="form-label">Nick name of Mom to be *</label>
                        <input type="text" class="form-control form-control-lg w-50" id="exampleFormControlInput1" placeholder="Type here">
                     </div> -->
      </form>

      <form action="{{ route('agreement') }}" id="form_with_data" method="POST">
        @csrf
            <input type="hidden" name="sub_total">
            <input type="hidden" name="advance">
            <input type="hidden" name="customer_id">
      </form>
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
        <!--<div class="d-flex mb-2">-->
        <!--   <span>Birthday Occasion</span><b class="ms-auto decoration"></b>-->
        <!--</div>-->

        <div class="d-flex mb-2">
          <span class="multi_cake"></span><b class="ms-auto cake"></b>
        </div>
        <div class="d-flex mb-2">
          <span class="multi"></span><b class="ms-auto multi_decoration"></b>
        </div>
        <div class="mb-2" id="coupon_applied_div" style="display: none;">
          <span id="coupon-applied-text">Coupon Applied</span><b class="ms-auto coupon-applied-amount"></b>
        </div>
        <hr>
        <div class="d-flex mb-2">
          <span>Subtotal</span><b class="ms-auto sub_total"></b>
        </div>
        <hr>
        <div class="d-flex mb-2 fw-bold">
          <span>Payable Advance Amount</span><b class="ms-auto advance"></b>
        </div>
        <hr>
        <div class="d-flex mb-2 ">
          <span>Balance Amount<div class="fs-11"></div></span>
          <b class="ms-auto balance"></b>
        </div>
        <div class="col-md-6">
          <a href="javascript:void(0)" class="btn button-custom rounded-pill px-3 px-lg-12 px-xxl-5 pay_and_book">Pay & Book</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {

    if (localStorage.getItem('extra_count_per') === '') {
      $('#extra_person_div').hide();
      $('#extra_person_div').removeClass("d-flex mb-2");
    } else {
      $('#extra_person_div').show();
      $('#extra_person_div').addClass("d-flex mb-2");
    }

    if (localStorage.getItem('decoration_included') == 0) {
      $('.decoration').text('₹' + ' ' + localStorage.getItem('decoration_amount'));
    } else {
      $('.decoration').text('Free');
    }


    localStorage.removeItem('after_decoration_balance_select');
    localStorage.removeItem('after_decoration_sub_total_select');
    localStorage.removeItem('multi_decoration');
    localStorage.removeItem('multiDecorationContent');
    localStorage.removeItem('addon_id');
    localStorage.removeItem('addon_amount');
    $('.name').text(localStorage.getItem('name'));
    $('.calender').text(localStorage.getItem('calender'));
    $('.time').text(localStorage.getItem('time'));
    $('.total').text(localStorage.getItem('after_cake_total'));
    $('.sub_total').text(localStorage.getItem('after_cake_ad_on_sub_total'));
    $('.decoration').text(localStorage.getItem('decoration'));
    $('.advance').text('₹ ' + '' + localStorage.getItem('advance'));
    $('.fs-11').text('(Payable at the Venue on ' + ' ' + localStorage.getItem('calender') + ')');
    $('.balance').text('₹ ' + '' + localStorage.getItem('after_cake_ad_on'));
    $('.cake').text(localStorage.getItem('cake'));

    var storedContent = localStorage.getItem('multiCakeContent');
    $('.multi_cake').html(storedContent);

    if(localStorage.hasOwnProperty('extra') && localStorage.getItem('extra') != '') {
      $('.extra').text('₹ ' + '' + localStorage.getItem('extra').match(/\d+/)[0]);
    }
    $('.extra_count').text(localStorage.getItem('extra_count_per'));
    //        if (localStorage.getItem('form_select_lg') == 2) {
    //          $('#decoration_price').hide();
    //   $("#decoration_price").removeClass("d-flex mb-2");
    //       }

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
  });

  function goBack() {
    window.history.back()
  }

  var arr = [];
  var arrId = [];
  var amount_arr = [];
  var totalAmount = 0;


  function getDecorationMulti(val, amount, id) {

    console.log(id);
    var sub_total_decoration = localStorage.getItem('after_cake_ad_on_sub_total').match(/\d+/)[0];
    var decoration_balance = localStorage.getItem('after_cake_ad_on').match(/\d+/)[0];
    // console.log(sub_total_decoration);
    var name = $(val).val();
    var id = id;
    var amount = amount;
    if ($(val).is(':checked')) {
      // If the checkbox is checked, add the value to the array and update the total amount
      arr.push(name);
      arrId.push(id);
      amount_arr.push(amount)
      totalAmount += parseFloat(amount); // Add the amount to the total
      var decoration_total_result = parseInt(sub_total_decoration) + parseInt(totalAmount);
      var balance_result = parseInt(decoration_balance) + parseInt(totalAmount);
    } else {
      var multi_decoration_price = $('.multi_decoration').text().match(/\d+/)[0];
      // If the checkbox is unchecked, remove the value from the array and update the total amount
      var index = arr.indexOf(name);
      var indexId = arr.indexOf(id);
      var indexAmount = arr.indexOf(amount)
      if (index !== -1) {
        arr.splice(index, 1);
        arrId.splice(indexId, 1);
        amount_arr.splice(indexAmount, 1);
        var sub_amount_ad_on = $('.sub_total').text();
        var total_ad_on = $('.balance').text();
        var sub_total_decoration_min = sub_amount_ad_on.match(/\d+/)[0];
        var decoration_balance_min = total_ad_on.match(/\d+/)[0];
        // Subtract the amount from the total
        totalAmount = parseFloat(amount);
        // console.log(totalAmount);
        var decoration_total_result = parseInt(sub_total_decoration_min) - parseInt(totalAmount);
        var balance_result = parseInt(decoration_balance_min) - parseInt(totalAmount);
        totalAmount = parseFloat(multi_decoration_price) - parseFloat(amount);
      }
    }

    // console.log(arr);

    // Build the HTML dynamically based on the number of items in the array
    var htmlContent = 'Special Ad-On<br>';
    var htmlContentId = '';
    var htmlContentAmount = '';
    for (var i = 0; i < arr.length; i++) {
      htmlContent += '<small>' + arr[i] + '</small><br>';
      htmlContentId += '<small>' + arrId[i] + '</small><br>';
      htmlContentAmount += '<small>' + amount_arr[i] + '</small><br>';
    }

    //  htmlContent += '<br>Total Amount: $' + totalAmount.toFixed(2); // Display the total amount
    $('.multi_decoration').text('₹ ' + '' + totalAmount);
    $('.sub_total').text('₹ ' + '' + decoration_total_result);
    $('.balance').text('₹ ' + '' + balance_result);

    $('.multi').html(htmlContent);
    localStorage.setItem('addon_id', htmlContentId);
    localStorage.setItem('multiDecorationContent', htmlContent);
    localStorage.setItem('addon_amount', htmlContentAmount);
  }

  function redirect_pay_and_book() 
  {
    var href_a = $(location).attr("href");
    var sub = href_a.substr(0, 34);
    var after_decoration_balance_select = $('.balance').text();
    localStorage.setItem('after_decoration_balance_select', after_decoration_balance_select.match(/\d+/)[0]);
    localStorage.setItem('after_decoration_sub_total_select', $('.sub_total').text());
    localStorage.setItem('multi_decoration', $('.multi_decoration').text());

    {{-- window.location.href = '{{ env('APP_URL') }}' + 'agreement'; --}}

    $('input[name=customer_id]').val(localStorage.getItem('customer_id'));
    $('input[name=advance]').val(localStorage.getItem('advance'));

    if(localStorage.getItem('after_decoration_sub_total_select')  === null) {
        $('input[name=sub_total]').val(localStorage.getItem('overview_sub_total').match(/\d+/)[0]);
    } else {
        $('input[name=sub_total]').val(localStorage.getItem('after_decoration_sub_total_select').match(/\d+/)[0]);
    }

    $("#form_with_data").submit();
  }

  $('.pay_and_book').on('click', redirect_pay_and_book);

  //     function updateSelectedValuesDisplay() {
  //         $('#selected-values').val(selectedValues.join(', '));
  // }



  // $('.main_div').on('click',getDecorationMulti);
  //         var selectedValues = []; 
  //         $(".main_div").click(function() {
  //     // Get the text inside the .text_value element within the clicked .main_div
  //     var textValue = $(this).find('.text-center').find(".text_value").text();
  //             // console.log(textValue);
  //     // Push the textValue into the array
  //      selectedValues.push(textValue);
  //     console.log(selectedValues);        
  //     // console.log(array_unique(textbox_value)); // Log the array to the console to see the values
  // });

</script>
@endsection
