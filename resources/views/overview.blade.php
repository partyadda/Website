@extends('includes.layout')
@section('title','Party Adda celebrations budget-friendly booking Summary ')
@section('content')
<style>
  .error-label {
    color: red;
    margin-left: 10px;
  }
  /* Hide the number input spin buttons */
  .input-box::-webkit-inner-spin-button,
  .input-box::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <a href="javascript:void(0)" class="back-btn text-decoration-none mt-5" onclick="goBack()">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        </svg>
        Back
      </a>
      <div class="fs-3 fw-bold my-4">Booking Overview</div>
      <div class="d-flex flex-wrap mb-4">
        <div class="d-flex me-3 me-md-4 mb-md-0 mb-3">
          <img src="{{URL::asset('assets/img/theatre_icon.png')}}" style="width:16-x;height:16px;">
          <span class="ms-2 name"></span>
          <img src="{{URL::asset('assets/img/calender_icon.png')}}" style="width:16-x;height:16px;">
          <span class="ms-2 calender"></span>
          <span class="ms-2 time"> </span>
        </div>
      </div>
  
      <form class="mb-5" name="personalinfo">
          
        <div class="row">
          
          <div class="col-md-5 ">
            <label for="Booking-Name" class="form-label">Booking Person Full Name<font color="red">*</font></label>
            <input type="text" class="form-control form-control-lg" id="Booking_Name" 
                style="font-size:14px;"  name="Booking_Name" placeholder="" 
                onkeydown="return((event.keyCode >= 65 && event.keyCode <= 120) || (event.keyCode==32));" maxlength="25" />
                
            <label id="Booking_Name_error" class="error-label" style="display:none"></label>
            
            <script>
              //Logic#1
              /*document.getElementById("Booking_Name").addEventListener('keydown', function (e) {
                if (this.value.length === 0 && e.which === 32) e.preventDefault();
              });
              */
              //Logic#2
              const el = document.getElementById("Booking_Name");

              // A function to encapsulate your logic. 
              const process = e => {
                const v = el.value.toString().replace(/\ /g, '');

                // Must have length > 0 before the space bar will do anything. 
                if (v.length == 0 && e.which == 32) e.preventDefault();

                // First char must not be a space. 
                else if (el.value[0] == ' ') el.value = el.value.replace(/\ /, '');
              };

              // Do whatever here. 
              const onChange = () => {
                el.onkeydown = process;
                el.onkeyup = process;
              };
              // Lazy on ready.. 
              setTimeout(onChange, 100);

            </script>
          </div>
        
          <div class="col-md-3 number_of_people" >
            <label for="" class="form-label">No.Of Guests<font color="red">*</font></label>
            <div class="input-group quantity">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number-minus" data-type="minus" data-field="quant[1]" disabled>
                  <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-1k33q06" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="RemoveIcon">
                    <path d="M19 13H5v-2h14z"></path>
                  </svg>
                </button>
              </span>
              
              <input type="text" name="input_number" style="font-size:14px;" class="form-control input_number" id="input_number" value="2" min="2" max="30" readonly>
              
              <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number-plus" data-type="plus" data-field="quant[1]">
                  <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-1k33q06" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="AddIcon">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"></path>
                  </svg>
                </button>
              </span>
            </div>
          </div>

          <div class="col-md-4" >
            <label for="form-select-lg" class="form-label" >Decoration<font color="red">*</font>
            </label>
            <select class="form-select form-select-lg" id="form_select_lg" aria-label="Default select example" style="font-size:14px;" >
              <option value="1" selected>Yes</option>
              <option value="2">No</option>
            </select>
          </div>
          <!--
                    <div class="col-md-3" id="ref_by_div">
                        <label for="ref_by" class="form-label">Referred By</label>
                        <select class="form-select ref_by" id="ref_by"
                            aria-label="Default select example">
                            <option value="" selected>Choose</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Whatsapp">Whatsapp</option>
                            <option value="Google">Google</option>
                            <option value="Youtube">Youtube</option>
                            <option value="News Paper">News Paper</option>
                            <option value="Flyer">Flyer</option>
                            <option value="Friend">Friend</option>
                            <option value="Others">Others</option>         
                        </select>
                    </div>
                    -->
          <div class="col-md-6" style="margin-top: 6px;">
            <label for="Whatsapp-Name" class="form-label">Whatsapp Number<font color="red">*</font></label>
            <input type="number" class="form-control form-control-lg"  style="font-size:14px;" minlength="10" maxlength="10" id="Whatsapp_Name" name="Whatsapp_Name" placeholder="">
            <label id="Whatsapp_Name_error" class="error-label" style="display:none"></label>
          </div>
          <div class="col-md-6" style="margin-top: 6px;">
            <label for="Email-ID" class="form-label">Email ID<font color="red">*</font></label>
            <input type="email" class="form-control form-control-lg" style="font-size:14px;" required id="Email_ID" placeholder="" onkeyup="" maxlength="30">
            <label id="Email_ID_error" class="error-label" style="display:none"></label>
          </div>
          <div class="col-md-6" style="margin-top: 6px;">
            <label for="Coupon" class="form-label">Coupon Code</label>
            <div class="input-group input-group-lg" >
                
              <input type="text" class="form-control coupon_code" placeholder="" style="font-size:14px;" aria-label="coupon" 
              aria-describedby="button-coupon" id="coupon_code" name="coupon_code">
              <button class="btn btn-secondary" type="button" id="button-coupon" style="font-size:14px;">Appy</button>
            </div>
            <label id="coupon_code_error" class="error-label" style="display:none"></label>
          </div>
                    
        </div>
      </form>
    </div>
    <div class="col-md-5">
      <div class="summary-content p-3  p-md-4 find-us mb-4 h-100">
        <div class="fs-5 fw-bold mb-4">Booking Summary</div>
        <div class="d-flex mb-2">
          <span id="theater_with_person_notrequired">Base Price</span><b class="ms-auto total"></b>
        </div>
        <div class="d-flex mb-2 decoration_div" id="decoration_div">
          <span class="decoration_span">Decoration</span> <span class="decoration_count"></span><b class="ms-auto decoration"></b>
        </div>
        <div class="d-flex mb-2">
          <input type="hidden" id="extra_guest_count" name="extra_quest_count" value="0"/>
          <input type="hidden" id="extra_guest_total_amount" name="extra_guest_total_amount" value="0"/>
          <span style="margin-right: 10px;" class="extra_count_div">Extra Person Charges</span> <span class="extra_count"></span><b class="ms-auto extra"></b>
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
        <div class="row">
          <div class="col-md-6" id="next_occasion_id">
            <a href="javascript:void(0)" class="btn button-custom rounded-pill px-3 px-lg-12 px-xxl-5 next_occasion">Next Occasion</a>
          </div>

          <div class="col-md-6">
            <a href="javascript:void(0)" class="btn button-custom rounded-pill px-3 px-lg-12 px-xxl-5 pay_book" style="display:none;background:green">Pay and Book</a>
          </div>
        </div>

        <form action="{{ route('agreement') }}" id="form_with_data" method="POST">
          @csrf
              <input type="hidden" name="sub_total">
              <input type="hidden" name="advance">
              <input type="hidden" name="customer_id">
        </form>

      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    localStorage.removeItem('name_on_cake');
    
    handleBookingSummary();

    $('#coupon-applied-div').hide();
    var couponCode= null;
    if (localStorage.hasOwnProperty("coupon_data")) {
      var couponCodeJson = localStorage.getItem('coupon_data');
      if(couponCodeJson != null && couponCodeJson != '') {
        couponCode = JSON.parse(couponCodeJson);
      }
    }
    handleApplyCouponCode(couponCode);

    $('#form_select_lg').on('change', function() {
      // console.log('yes');
      /*var sub_total_val = $('.sub_total').text().match(/\d+/)[0];
      console.log("CHECK_TOTAL"+sub_total_val);
      
      var balance_val = $('.balance').text().match(/\d+/)[0];
      var text_value = $(this).val();
      // console.log(text_value);

      if (text_value == '1') {
        $('.pay_book').hide();
        $('#next_occasion_id').show();
        $('#decoration_div').show();
        $('#decoration_div').addClass("d-flex mb-2");
        $('.sub_total').text('₹' + ' ' + (parseInt(sub_total_val) + parseInt(localStorage.getItem('decoration_amount'))));
        $('.balance').text('₹' + ' ' + (parseInt(balance_val) + parseInt(localStorage.getItem('decoration_amount'))))
      } else {
        $('.pay_book').show();
        $('#next_occasion_id').hide();
        $('#decoration_div').hide();
        $('#decoration_div').removeClass("d-flex mb-2");
        $('.sub_total').text('₹' + ' ' + (parseInt(sub_total_val) - parseInt(localStorage.getItem('decoration_amount'))));
        $('.balance').text('₹' + ' ' + (parseInt(balance_val) - parseInt(localStorage.getItem('decoration_amount'))))
      }*/

      var decorationNeeded = $(this).val();
      if(decorationNeeded == 1) {
        $('.pay_book').hide();
        $('#next_occasion_id').show();
      } else {
        $('.pay_book').show();
        $('#next_occasion_id').hide();
      }
      handleBookingSummary();
    });
  });

  function checkAndGetCouponAmount() {
    var totalCouponAmount = 0;
    if (localStorage.hasOwnProperty("coupon_data")) {
      var couponCodeJson = localStorage.getItem('coupon_data');
      if(couponCodeJson != null && couponCodeJson != '') {
        var couponCodeData = JSON.parse(couponCodeJson);
        if(couponCodeData.totalCouponAmount != null) {
          totalCouponAmount = parseInt(couponCodeData.totalCouponAmount);
        }
      }
    }
    return totalCouponAmount;
  }

  function handleBookingSummary() {
    $('.name').text('');
    $('.calender').text('');
    $('.time').text('');

    // New Code start 
    $('.sub_total').text('');
    $('.decoration').text('');
    $('.balance').text('');
    // New Code End

    var total_amount = 0;
    var totalCouponAmount = checkAndGetCouponAmount();
    if (localStorage.getItem('per_amount_hidden') == 0) {
      total_amount = parseInt(localStorage.getItem('total'));
    } else {
      total_amount = Math.ceil((parseInt(localStorage.getItem('total')) * parseInt(localStorage.getItem('per_amount_hidden'))) / 100);
    }

    /*$("#input_number").attr({
      "min": localStorage.getItem('min_people'), // substitute your own
      "max": localStorage.getItem('max_people') // values (or variables) here
    });*/

    var extraGuestCount = parseInt($('#extra_guest_count').val());
    var extraGuestTotalmount = parseInt($('#extra_guest_total_amount').val());
    var decorationNeeded = $('#form_select_lg').val();
    
    if(decorationNeeded == 1) {
      $('#decoration_div').show();
      $('#decoration_div').addClass("d-flex mb-2");
    } else {
      $('#decoration_div').hide();
      $('#decoration_div').removeClass("d-flex mb-2");
    }

    if (localStorage.getItem('decoration_included') == 0 && decorationNeeded == 1) {
      $('.decoration').text('₹' + ' ' + localStorage.getItem('decoration_amount'));
      $('.sub_total').text('₹' + ' ' + ((parseInt(localStorage.getItem('decoration_amount')) + parseInt(total_amount)) + extraGuestTotalmount - parseInt(totalCouponAmount)));

      var totalBalanceAmount = parseInt(total_amount - totalCouponAmount) + parseInt(localStorage.getItem('decoration_amount')) + extraGuestTotalmount - parseInt(localStorage.getItem('advance'));
      $('.balance').text('₹' + ' ' + totalBalanceAmount);
    } else {
      $('.sub_total').text('₹' + ' ' + ((total_amount + extraGuestTotalmount) - totalCouponAmount));
      $('.decoration').text('Free');

      var totalBalanceAmount = parseInt(total_amount - totalCouponAmount) + extraGuestTotalmount - parseInt(localStorage.getItem('advance'));
      $('.balance').text('₹' + ' ' +totalBalanceAmount);
    }

    $('.name').text(localStorage.getItem('name'));
    $('.calender').text(localStorage.getItem('calender'));
    $('.time').text(localStorage.getItem('time'));
    $('.total').text('₹' + ' ' + total_amount);

    // $('.sub_total').text('₹' + ' ' + localStorage.getItem('total'));
    $('.advance').text('₹' + ' ' + localStorage.getItem('advance'));
    $('.fs-11').text('(Payable at the Venue on ' + ' ' + localStorage.getItem('calender') + ')');
    // $('.balance').text('₹' + ' ' + (localStorage.getItem('total') - localStorage.getItem('advance')));
    $('#theater_with_person').text(localStorage.getItem('name') + ' ' + 'Theater (' + localStorage.getItem('min_people') + ' ' + 'People)');

    localStorage.removeItem('extra');
    localStorage.removeItem('Booking_Name', );
    localStorage.removeItem('input_number', );
    localStorage.removeItem('Whatsapp_Name', );
    localStorage.removeItem('Email_ID');
    localStorage.removeItem('form_select_lg');
    localStorage.removeItem('coupon_code');
    localStorage.removeItem('extra_count_per');

    //if (localStorage.getItem('extra_count') > 1) {
    if(extraGuestCount > 0) {
      $('.extra_count_div').show();
      $('.extra_count').show();
      $('.extra').show();
    } else {
      $('.extra_count_div').hide();
      $('.extra_count').hide();
      $('.extra').hide();
    }
    // console.log($('#form_select_lg :selected').val());

    $('#Whatsapp_Name').on('input', function() {
      // Remove any non-digit characters
      this.value = this.value.replace(/\D/g, '');
      // Limit to 10 digits
      if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
      }
    });

    $('#Booking_Name').on('input', function() {
      // Remove any non-digit characters
      // Limit to 10 digits
      if (this.value.length > 20) {
        this.value = this.value.slice(0, 20);
      }
    });
  }

  function customer_by_email() {
    // console.log($('#Email_ID').val()+','+$('#Whatsapp_Name').val());
    var number = $('#Whatsapp_Name').val();
    var email = $('#Email_ID').val();
    var Booking_Name = $('#Booking_Name').val();
    var ref_by = $('#ref_by').val();
    // console.log(ref_by);
    $.ajax({
      url: "{{ url('overview/customer') }}"
      , type: "POST"
      , data: {
        "_token": "{{ csrf_token() }}"
        , "number": number
        , "email": email
        , "Booking_Name": Booking_Name
        , "ref_by": ref_by
      , }
      , success: function(data) {
        console.log(data);
        // console.log(data['doneMessage']);
        localStorage.setItem('customer_id', data.id)
      }
    });
  }

  function nextOccasion() {
    //customer_by_email()
    var href_a = $(location).attr("href");
    var sub = href_a.substr(0, 34);
    document.getElementById("Booking_Name_error").innerText = "";
    document.getElementById("Whatsapp_Name_error").innerText = "";

    document.getElementById("Email_ID_error").innerText = "";

    let hasErrors = false;
    //  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (document.personalinfo.Booking_Name.value == "") {
      document.getElementById("Booking_Name_error").style.display = "block";
      document.getElementById("Booking_Name_error").innerText = "Enter Booking Person Name!";
      hasErrors = true;
    }

    if (document.personalinfo.Whatsapp_Name.value == "") {
      document.getElementById("Whatsapp_Name_error").style.display = "block";
      document.getElementById("Whatsapp_Name_error").innerText = "Enter Whatsapp Number!";
      hasErrors = true;
    }

    const email = document.personalinfo.Email_ID.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == "") {
      document.getElementById("Email_ID_error").style.display = "block";
      document.getElementById("Email_ID_error").innerText = "Enter Email Address!";
      hasErrors = true;
    } else if (!emailRegex.test(email)) {
      document.getElementById("Email_ID_error").style.display = "block";
      document.getElementById("Email_ID_error").innerText = "Enter a Valid Email Address";
      hasErrors = true;
    }

    // Prevent form submission if there are errors
    // return !hasErrors;

    if (hasErrors) {
      return; // Stop if there are validation errors
    }

    // console.log('yes');
    var Booking_Name = $('#Booking_Name').val();
    var input_number = $('.input_number').val();
    var Whatsapp_Name = $('#Whatsapp_Name').val();
    var Email_ID = $('#Email_ID').val();
    var form_select_lg = $('#form_select_lg').val();
    var coupon_code = $('.coupon_code').val();
    var extra = $('.extra').text();
    // console.log(Booking_Name+input_number+Whatsapp_Name+Email_ID+form_select_lg+coupon_code);
    localStorage.setItem('Booking_Name', Booking_Name)
    localStorage.setItem('input_number', input_number)
    localStorage.setItem('Whatsapp_Name', Whatsapp_Name)
    localStorage.setItem('Email_ID', Email_ID)
    localStorage.setItem('form_select_lg', form_select_lg)
    localStorage.setItem('coupon_code', coupon_code)
    localStorage.setItem('extra', extra);
    localStorage.setItem('overview_total', $('.total').text());
    localStorage.setItem('overview_sub_total', $('.sub_total').text());
    localStorage.setItem('overview_balance', $('.balance').text());
    localStorage.setItem('extra_count_per', $('.extra_count').text());

    localStorage.setItem('is_decoration_not_opted', "0");

    window.location.href = '{{ env('APP_URL') }}' + 'select-occasion/' + localStorage.getItem('branch_id');
  }

  function saveCustomerAndRediectBy(event) {
    if(validateForErrors()) {
      return;
    }
    var callFunType = event.data.callFunType;

    var number = $('#Whatsapp_Name').val();
    var email = $('#Email_ID').val();
    var Booking_Name = $('#Booking_Name').val();
    var ref_by = $('#ref_by').val();

    $.ajax({
      url: "{{ url('overview/customer') }}"
      , type: "POST"
      , data: {
        "_token": "{{ csrf_token() }}"
        , "number": number
        , "email": email
        , "Booking_Name": Booking_Name
        , "ref_by": ref_by
      , }
      , success: function(data) {
        console.log(data);
        if (data != null && data.id != null) {
          localStorage.setItem('customer_id', data.id);
          $('input[name=customer_id]').val(data.id);
          
          if (callFunType == "PayAndBook") {
            pay_book();
          } else if (callFunType == "NextOccasion") {
            nextOccasion();
          }
        } else {
          alert('Unable to save user, Pleae try again');
        }
      }
    });
  }

  //$('.next_occasion').on('click', nextOccasion);
  $('.next_occasion').on('click', {callFunType: 'NextOccasion'}, saveCustomerAndRediectBy);

  function goBack() {
    window.history.back()
  }

  function pay_book() {
    //customer_by_email()

    var href_a = $(location).attr("href");
    var sub = href_a.substr(0, 34);
    document.getElementById("Booking_Name_error").innerText = "";
    document.getElementById("Whatsapp_Name_error").innerText = "";
    document.getElementById("Email_ID_error").innerText = "";

    let hasErrors = false;
    //  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (document.personalinfo.Booking_Name.value == "") {
      document.getElementById("Booking_Name_error").style.display = "block";
      document.getElementById("Booking_Name_error").innerText = "Please enter Booking Person Name!";
      hasErrors = true;
    }

    if (document.personalinfo.Whatsapp_Name.value == "") {
      document.getElementById("Whatsapp_Name_error").style.display = "block";
      document.getElementById("Whatsapp_Name_error").innerText = "Please enter Whatsapp Number!";
      hasErrors = true;
    }


    const email = document.personalinfo.Email_ID.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == "") {
      document.getElementById("Email_ID_error").style.display = "block";
      document.getElementById("Email_ID_error").innerText = "Please enter Email";
      hasErrors = true;
    } else if (!emailRegex.test(email)) {
      document.getElementById("Email_ID_error").style.display = "block";
      document.getElementById("Email_ID_error").innerText = "Please enter a Valid Email Address";
      hasErrors = true;
    }

    // Prevent form submission if there are errors
    // return !hasErrors;

    if (hasErrors) {
      return; // Stop if there are validation errors
    }

    // console.log('yes');
    var Booking_Name = $('#Booking_Name').val();
    var input_number = $('.input_number').val();
    var Whatsapp_Name = $('#Whatsapp_Name').val();
    var Email_ID = $('#Email_ID').val();
    var form_select_lg = $('#form_select_lg').val();
    var coupon_code = $('.coupon_code').val();
    var extra = $('.extra').text();
    // console.log(Booking_Name+input_number+Whatsapp_Name+Email_ID+form_select_lg+coupon_code);
    localStorage.setItem('Booking_Name', Booking_Name)
    localStorage.setItem('input_number', input_number)
    localStorage.setItem('Whatsapp_Name', Whatsapp_Name)
    localStorage.setItem('Email_ID', Email_ID)
    localStorage.setItem('form_select_lg', form_select_lg)
    localStorage.setItem('coupon_code', coupon_code)
    localStorage.setItem('extra', extra);
    localStorage.setItem('overview_total', $('.total').text());
    localStorage.setItem('overview_sub_total', $('.sub_total').text());
    localStorage.setItem('overview_balance', $('.balance').text());
    localStorage.setItem('extra_count_per', $('.extra_count').text());

    $('input[name=customer_id]').val(localStorage.getItem('customer_id'));
    $('input[name=advance]').val(localStorage.getItem('advance'));
    $('input[name=sub_total]').val(localStorage.getItem('overview_sub_total').match(/\d+/)[0]);

    localStorage.setItem('is_decoration_not_opted', "1");

    {{-- window.location.href = '{{ env('APP_URL') }}' + 'aggrement'; --}}
    $("#form_with_data").submit();
  }

  //$('.pay_book').on('click', pay_book);
  $('.pay_book').on('click', {callFunType: 'PayAndBook'}, saveCustomerAndRediectBy);

  function validateForErrors() {
    var href_a = $(location).attr("href");
    var sub = href_a.substr(0, 34);
    document.getElementById("Booking_Name_error").innerText = "";
    document.getElementById("Whatsapp_Name_error").innerText = "";
    document.getElementById("Email_ID_error").innerText = "";

    let hasErrors = false;
    //  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (document.personalinfo.Booking_Name.value == "") {
      document.getElementById("Booking_Name_error").style.display = "block";
      document.getElementById("Booking_Name_error").innerText = "Please enter Booking Person Name!";
      hasErrors = true;
    }

    if (document.personalinfo.Whatsapp_Name.value == "") {
      document.getElementById("Whatsapp_Name_error").style.display = "block";
      document.getElementById("Whatsapp_Name_error").innerText = "Please enter Whatsapp Number!";
      hasErrors = true;
    }


    const email = document.personalinfo.Email_ID.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == "") {
      document.getElementById("Email_ID_error").style.display = "block";
      document.getElementById("Email_ID_error").innerText = "Please enter Email";
      hasErrors = true;
    } else if (!emailRegex.test(email)) {
      document.getElementById("Email_ID_error").style.display = "block";
      document.getElementById("Email_ID_error").innerText = "Please enter a Valid Email Address";
      hasErrors = true;
    }

    return hasErrors
  }

  $('#button-coupon').on('click', getCouponCode);

  function getCouponCode() {

    var isRemove = $('#button-coupon').text() == "Remove";
    if(isRemove) {
      $('#coupon_code').val('');
      handleApplyCouponCode(null);
    } else {
      //if(validateForErrors()) {
        //return;
      //}
      var couponCode= $('#coupon_code').val();
      var branchId= localStorage.getItem("branch_id");
      if(couponCode == undefined ||  couponCode == '' || branchId == undefined || branchId == null || branchId == '') {
        return;
      }
  
      var url = "{{ route('booking.verify.coupon_code', ['branch_id' => ':branch_id', 'coupon_code' => ':coupon_code']) }}";
      url = url.replace(':branch_id', branchId);
      url = url.replace(':coupon_code', couponCode);
  
      $('#button-coupon').attr('disabled', 'disabled');
  
      $.ajax({
         url: url, 
         type: "GET",
         success: function(resp) {
          console.log(resp);
          if (resp != null && resp.status == true && resp.coupon_data && resp.coupon_data.discount != null) {
            var coupon_data = resp.coupon_data;
            handleApplyCouponCode(coupon_data);
          } else {
            alert('Coupon code not found/expired, Please use valid code');
            handleApplyCouponCode(null);
          } 
        },
        error: function (xhr, status, errorThrown) {
          handleApplyCouponCode(null);
          //xhr.status;
          //xhr.responseText;
        }
      });
    }
  }

  function handleApplyCouponCode(couponCodeData) {
    if(couponCodeData == null) {
      $('#coupon_applied_div').removeClass('d-flex');
      $('#coupon_applied_div').hide();

      localStorage.removeItem('coupon_data');

      $('#coupon_code').removeAttr('disabled')
      $('#button-coupon').removeAttr('disabled');
      $('#button-coupon').removeClass('btn-danger');
      $('#button-coupon').addClass('btn-secondary');

      $('#button-coupon').text('Apply');
    } else {
      $('#coupon_applied_div').addClass('d-flex');
      $('#coupon_applied_div').show();

      $('#coupon_code').val(couponCodeData.promocode);

      var basePrice = 0;
      if (localStorage.getItem('per_amount_hidden') == 0) {
        basePrice = localStorage.getItem('total');
      } else {
        total_amount = Math.ceil((parseInt(localStorage.getItem('total')) * parseInt(localStorage.getItem('per_amount_hidden'))) / 100);
      } 
      //couponAmount = parseInt(Math.ceil(basePrice * (couponCodeData.discount / 100)));
      var couponAmount = 0;
      if(couponCodeData.discount_type == 'FLAT') {
        couponAmount = parseInt(couponCodeData.discount);
      } else if(couponCodeData.discount_type == 'PERCENTAGE') {
        couponAmount = parseInt(basePrice * (couponCodeData.discount / 100));
      }
      $('.coupon-applied-amount').text('-₹' + ' ' + couponAmount)
      couponCodeData['totalCouponAmount'] = couponAmount;
    
      localStorage.setItem('coupon_data', JSON.stringify(couponCodeData));

      $('#coupon_code').attr('disabled', 'disabled');
      $('#button-coupon').removeAttr('disabled');
      $('#button-coupon').removeClass('btn-secondary');
      $('#button-coupon').addClass('btn-danger');  

      $('#button-coupon').text('Remove');
    }
    handleBookingSummary();
  }

  $('.btn-number-plus').on('click', {countType: 'plus'}, handleNumberOfGuest);
  $('.btn-number-minus').on('click', {countType: 'minus'}, handleNumberOfGuest);

  function handleNumberOfGuest(event) {
    var type = event.data.countType;

    var allowedGuest = localStorage.getItem('min_people');
    var maxGuest = localStorage.getItem('max_people');

    var currentGuestCount = $('.input_number').val();

    if(type == 'plus') {
      currentGuestCount = parseInt(currentGuestCount) + 1;
    } else if(type == 'minus') {
      currentGuestCount = parseInt(currentGuestCount) - 1;  
    }
    if(currentGuestCount > maxGuest) {
      currentGuestCount = maxGuest;
    }

    var minGuestRequired = 2;
    if(currentGuestCount > minGuestRequired) {
      $('.btn-number-minus').removeAttr('disabled')
    }
    if(currentGuestCount <= minGuestRequired) {
      $('.btn-number-minus').attr('disabled', 'disabled');
      currentGuestCount = minGuestRequired;
    }
    if(currentGuestCount < maxGuest) {
      $('.btn-number-plus').removeAttr('disabled')
    }
    if(currentGuestCount >= maxGuest) {
      $('.btn-number-plus').attr('disabled', 'disabled');
    }

    $('.input_number').val(currentGuestCount);

    if(currentGuestCount > allowedGuest) {
      $('.extra_count_div').show();
      $('.extra_count').show();
      $('.extra').show();
      var extraGuest = parseInt(currentGuestCount - allowedGuest);
      var extraGuestAmount = extraGuest * parseInt(localStorage.getItem('extra_count'));
      $('.extra_count').text(extraGuest +'x'+localStorage.getItem('extra_count'));
      $('.extra').text('₹ ' + extraGuestAmount);
      $('#extra_guest_count').val(extraGuest);
      $('#extra_guest_total_amount').val(extraGuestAmount);
    } else {
      $('.extra_count_div').hide();
      $('.extra_count').hide();
      $('.extra').hide();
      $('.extra').text(0);
      $('.extra_count').html('');
      $('#extra_guest_count').val(0);
      $('#extra_guest_total_amount').val(0);
    }
    handleBookingSummary();
  }
</script>

@endsection
