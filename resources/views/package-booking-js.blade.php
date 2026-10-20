<script>
  /** Step Wizard Start */
  var current = 0;
  var tabs = $(".tab");
  var tabs_pill = $(".tab-pills");
  
  loadStepFormData(current);
  
      
      /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  
  
  function loadStepFormData(n) {
    $(tabs_pill[n]).addClass("active");
    $(tabs[n]).removeClass("d-none");
    $("#back_button").attr("disabled", n == 0 ? true : false);
    $("#back_button_top").attr("disabled", n == 0 ? true : false);
    if(n == 0) {
      $("#back_button").hide();
      $("#back_button_top").hide();
    } else {
      $("#back_button").show();
      $("#back_button_top").show();
    }

    n == tabs.length - 1
      ? $("#next_button").text("Submit").removeAttr("onclick")
      : $("#next_button")
          .attr("type", "button")
          .text("Next")
          .attr("onclick", "next()");
          
    if(n == 0) {
      $("#short_desc").show();
      $("#select_cake").hide();
      $("#select_add_ons").hide();
      $("#next_button").text('Next Cake');
      $("#next_button_top").text('Next Cake');
      $("#cake_conditions").hide();
      $("#addons_conditions").hide();
    } else if(n == 1) {
      $("#short_desc").hide();
      $("#select_cake").show();
      $("#select_add_ons").hide();
      $("#next_button").text('Next AddOns');
      $("#next_button_top").text('Next AddOns');
      $("#cake_conditions").show();
      $("#addons_conditions").hide();
    } else if(n == 2) {
      $("#short_desc").hide();
      $("#select_cake").hide();
      $("#select_add_ons").show();
      $("#next_button").text('Submit');
      $("#next_button_top").text('Submit');
      $("#cake_conditions").hide();
      $("#addons_conditions").show();
    }    

    if(n == 2) {
      $("#next_button").hide();
      $("#btn_book_now").show();
      $("#btn_book_now_summary").show();
      $("#next_button_top").hide();
      $("#btn_book_now_top").show();
    } else {
      $("#next_button").show();
      $("#btn_book_now").hide();
      $("#btn_book_now_summary").hide();
      $("#next_button_top").show();
      $("#btn_book_now_top").hide();
    }
    $(window).scrollTop(0);

    handleBookingSummary();
    
    enableDisableBookNow();
  }

  function enableDisableBookNow() {
    if(current == 2) {
      $("#btn_book_now").removeAttr("disabled");
      $("#btn_book_now_summary").removeAttr("disabled");
      $("#btn_book_now_top").removeAttr("disabled");
    } else {
      $("#btn_book_now").attr("disabled","disabled");
      $("#btn_book_now_summary").attr("disabled","disabled");
      $("#btn_book_now_top").attr("disabled","disabled");
    }
  }
  
  function next() {
    if(validateTabs()) {
      return;
    }

    var navType = parseInt($("#next_button").attr('data-nav-type'));

    if(current == 0 && navType == 0) {
      saveCustomerDetails();
    } else {
      $("#btn_book_now").removeAttr("data-nav-type");
      $("#next_button").attr("data-nav-type","0");

      $(tabs[current]).addClass("d-none");
      $(tabs_pill[current]).removeClass("active");
    
      current++;
      loadStepFormData(current);
    }
  }

  function validateTabs() {
    var isInValid = false;

    if(current == 0) {
      isInValid = !validateTabTheatre();
    }  
    
    {{-- if(current == 1) {
      isInValid = !validateTabOccassion();
    } --}}

    if(current == 1) {
      isInValid = !validateTabCake();
    }
    
    return isInValid;
  }
  
  function back() {
    $(tabs[current]).addClass("d-none");
    $(tabs_pill[current]).removeClass("active");
  
    current--;
    loadStepFormData(current);
  }

  function next_top() {
    $("#next_button").click();
  }

  function back_top() {
    $("#back_button").click();
  }

  function validateTabTheatre() {
    var isValid = true;
    var errorMessage = '';
    
    var theatre = $("input[name='theatre']:checked").val();
    var slotId =  $('#slot_id').val();

    if(!validateFieldValue(theatre)) {
      errorMessage = 'Please select theatre';
      isValid = false;
    } else if(!validateFieldValue(slotId)) {
      errorMessage = 'Please select slot';
      isValid = false;
    }

    if(isValid && !validateCustomerDetails()) {
      return;
    }

    if(isValid) {
      var partnerName = $('#partner_name').val();
      if(!validateFieldValue(partnerName)) {
        errorMessage = $('#partner_name_label').text()+' field is required';
        isValid = false;
      }
      var yourName = '';
      if($('#your_name').is(':visible')) {
        yourName = $('#your_name').val();
        if(!validateFieldValue(yourName)) {
          if(errorMessage != '') {
            errorMessage = errorMessage +"<br/>"
          }
          errorMessage = errorMessage + $('#your_name_label').text()+' field is required';
          isValid = false;
        }
      } 
      $('#decoration_partner_name').val(partnerName);
      $('#decoration_your_name').val(yourName);
    }

    if(!isValid) {
      $('#theatre-slots-error-message').text(errorMessage);
      showErrorDiv('theatre-slots-error-alert', 'theatre-slots-error-message', errorMessage);
      return false;
    }

    hideErrorDiv('theatre-slots-error-alert');
    return true
  }

  function validateTabOccassion() {
    var decoration = $("input[name='decoration']:checked").val();

    if(!validateFieldValue(decoration)) {
      showErrorDiv('decoration-error-alert', 'decoration-error-message', 'Please select Occasion');
      return false;
    }

    var errorMessage = '';
    var partnerName = $('#partner_name').val();
    if(!validateFieldValue(partnerName)) {
      errorMessage = $('#partner_name_label').text()+' field is required';
    }
    var yourName = '';
    if($('#your_name').is(':visible')) {
      yourName = $('#your_name').val();
      if(!validateFieldValue(yourName)) {
        if(errorMessage != '') {
          errorMessage = errorMessage +"<br/>"
        }
        errorMessage = errorMessage + $('#your_name_label').text()+' field is required';
      }
    } 
    if(errorMessage != '') {
      showErrorDiv('decoration-error-alert', 'decoration-error-message', errorMessage);
      return;
    }

    $('#decoration_partner_name').val(partnerName);
    $('#decoration_your_name').val(yourName);

    hideErrorDiv('decoration-error-alert');
    return true
  }

  function validateTabCake() {
    var cake = $("input[name='cake']:checked").val();

    if(!validateFieldValue(cake)) {
      showErrorDiv('cake-error-alert');
      return false;
    }

    $('#name_on_cake').val($('#name_on_cake_tab').val());

    hideErrorDiv('cake-error-alert');
    return true
  }

  function validateFieldValue(value) {
    if(value == undefined || value == null || value == '') {
      return false;
    }
    return true;
  }
  
  function showErrorDiv(errorDivId, messageDivId, errorMessage) {
    if(messageDivId != undefined && (errorMessage != undefined && errorMessage != '')) {
      $('#'+messageDivId).html(errorMessage);
    }
    var errorDiv = $('#'+errorDivId);
    errorDiv.show();
    //$('html, body').scrollTop(errorDiv.offset().top);
    $(window).scrollTop(0);
  }

  function hideErrorDiv(errorDivId) {
    $('#'+errorDivId).hide();
  }
  /** Step Wizard Ends */

  $(document).ready(function() {

    $('#slot_date').val(moment().format('DD-MM-YYYY'));

    $("input:radio[name=theatre]").first().click();

    $('#customer_ph_no').on('input', function() {
      // Remove any non-digit characters
      this.value = this.value.replace(/\D/g, '');
      // Limit to 10 digits
      if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
      }
    });

    $('#button-coupon').on('click', getCouponCode);

    $('#btn_book_now').on('click', submitPackageBookingForm);
    $('#btn_book_now_top').on('click', submitPackageBookingForm);
    $('#btn_book_now_summary').on('click', submitPackageBookingForm);
  });

  /** Date Selection Starts */
  $('input[name="selected_date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: false,
    minDate: moment(), 
    autoUpdateInput: true,
    locale: {
      format: 'DD-MM-YYYY'
    }, 
    autoApply: true
  }, function(start, end, label) {
    var formattedDate = start.format('DD-MM-YYYY');
    $('#selected_date').val(formattedDate);
    $('#slot_date').val(formattedDate);

    getSlots();
  });
  /** Date Selection Ends */

  /** Validate and Get Coupon Code Details Starts */
  function getCouponCode() {
    var isRemove = $('#button-coupon').text() == "Remove";
    if(isRemove) {
      $('#coupon_code').val('');
      handleApplyCouponCode(null);
    } else {
      var couponCode= $('#coupon_code').val();
      var branchId= $('#branch_id').val(); 
        var packageAmount = parseInt($('#package_amount').val());
        
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
          if (resp != null && resp.status == true && resp.coupon_data && packageAmount > 1499 && resp.coupon_data.discount != null) {
            var coupon_data = resp.coupon_data;
            handleApplyCouponCode(coupon_data);
          } else {
            alert('The coupon code was not successfully applied.\n - Code not found/expired \n - The booking amount should be over 1500 ');
            handleApplyCouponCode(null);
          } 
        },
        error: function (xhr, status, errorThrown) {
          handleApplyCouponCode(null);
        }
      });
    }
  }

  function handleApplyCouponCode(couponCodeData) {
    if(couponCodeData == null) {
      $('#pkg_coupon_amount_div').hide();

      $('#coupon_code').removeAttr('disabled')
      $('#button-coupon').removeAttr('disabled');
      $('#button-coupon').removeClass('btn-danger');
      $('#button-coupon').addClass('btn-secondary');

      $('#button-coupon').text('Apply');

      $('#coupon_code_id').val('');
      $('#coupon_code_used').val('');
      $('#coupon_code_amount').val('0');
    } else {
      $('#pkg_coupon_amount_div').show();

      $('#coupon_code').val(couponCodeData.promocode);

      var couponAmount = 0;
      var packageAmount = parseInt($('#package_amount').val());
      if(couponCodeData.discount_type == 'FLAT') {
        couponAmount = parseInt(couponCodeData.discount);
      } else if(couponCodeData.discount_type == 'PERCENTAGE') {
        couponAmount = parseInt(packageAmount * (couponCodeData.discount / 100));
      }
      $('.pkg_coupon_amount').text(couponAmount)
      couponCodeData['totalCouponAmount'] = couponAmount;

      $('#coupon_code_id').val(couponCodeData.discount_id);
      $('#coupon_code_amount').val(couponAmount);
      $('#coupon_code_used').val(couponCodeData.promocode);

      $('#coupon_code').attr('disabled', 'disabled');
      $('#button-coupon').removeAttr('disabled');
      $('#button-coupon').removeClass('btn-secondary');
      $('#button-coupon').addClass('btn-danger');  

      $('#button-coupon').text('Remove');
    }
    handleBookingSummary();
  }
  /** Validate and Get Coupon Code Details Starts */

  /** Get Time slots by date and theatre id Starts */
  function getSlots() {
    var ajaxOptions = {
      url: "{{ url('package/booking/get-slots') }}", 
      type: "POST",
      data: {
        "_token": '{{ csrf_token() }}', 
        "theatre_id": $('#theatre_id').val(),
        "selected_date": $('#slot_date').val()
      }
    };

    $("#spinner-div").show(); 
    $('#time_slot_selection').html("");

    var req = $.ajax(ajaxOptions);
    req.done(function(resp) {
      //console.log(resp);
      if (resp != null && resp.success != null && resp.success == true && resp.slots != null) {
        var slotsHtml = "";
        var slots = resp.slots;
        $('#slot_id').val('');
       
        $.each(slots, function(i, slotData) {             
           var slotId = slotData.slot.id;
           var startTime = slotData.slot.start_time;
           var endTime = slotData.slot.end_time;
           var fullSlotTime = startTime+" - "+endTime;

           var startTime24 = slotData.slot.start_time_24;
           var endTime24 = slotData.slot.end_time_24;
           var fullSlotTime24 = startTime24+" - "+endTime24;

           var shortDurationPer = slotData.slot.Percentage;
           var shortDurationPer = slotData.slot.Percentage;
           var title = fullSlotTime;
           
           if(shortDurationPer <= 99) {
            title = "Short Duration";
           }

           var className = "btn-outline-primary";
           var disabled = "";
           var slotAvailable = 1;

           if(slotData.isSlotBookedOrLapsed == 1) {
            className = "btn-secondary";
            disabled = "disabled";
            slotAvailable = 0;
           }

           slotsHtml = slotsHtml +''+'<button type="button" class="btn rounded-pill  btn-sm me-2 small time_slot_btn '+className+'" data-time-slot="'+fullSlotTime+'" data-time-slot-id="'+slotId+'" data-time-slot-available="'+slotAvailable+'" data-time-slot-short-duration="'+shortDurationPer+'" style="margin-bottom: 10px;color:Black;" '+disabled+' title="'+title+'">'+fullSlotTime24+'</button>';
        });    
        $('#time_slot_selection').html(slotsHtml);
      } else {
        alert("Error: " + resp.errMsg);
        $('#time_slot_selection').html('');
      }
      $("#spinner-div").hide();
      return resp;
    });

    req.fail(function(e) {
      $("#spinner-div").hide();
      if (e.status == 422) {}
      if (e.status == 500) {}
      if (e.status == 404) {}

      $('#time_slot_selection').html('');
      alert("Something went wrong");
      return e.status;
    });
  } 
  /** Get Time slots by date and theatre id Ends */

  /** Theatre Selection Starts */
  $('input[type=radio][name=theatre').on('change', function() {
    if ($(this).is(':checked')) {
      $('#theatre-slots-error-alert').hide();

      var theaterPackageAmount = $(this).attr('data-theatre-package-amount');
      var theaterId = $(this).attr('data-theatre-id');

      $('#theatre_id').val(theaterId);
      $('#package_amount').val(theaterPackageAmount);
      $('#slot_short_duration_per').val(100); 

      var allowedGuest = parseInt($(this).attr('data-theatre-peopleallowed'));
      var maxGuest = parseInt($(this).attr('data-theatre-max-people'));
      var extraGuestAmount = parseInt($(this).attr('data-theatre-extra-guest-amount')); 
      
      $('#allowed_no_of_guest').val(allowedGuest); 
      $('#max_no_of_guest').val(maxGuest); 
      $('#extra_person_price').val(extraGuestAmount); 

      var guestDropDown = $('#customer_no_guest');
      guestDropDown.empty();
      for(i=2; i <= maxGuest; i++) {
        guestDropDown.append($('<option>', {
          value: i, text: i
        }));
      }
      $('#no_of_guest').val(2);

      getSlots();
      
      setAllAddOns();

      handleBookingSummary();

      var theaterAssets = JSON.parse($('#theatre_span_'+theaterId).text());
      var imageBaseUrl = '{{ URL::asset('assets/img/') }}';
      var imageCarousel = '';
      var imageCarouselIndiCators = '' 
      $.each(theaterAssets, function(key, item) {
        var imageFullUrl = imageBaseUrl + '/'+item.foldername + '/'+ item.filename;
        var active = '';
        if(key == 0) {
          active = 'active';
        }
        //d-block w-100 
        imageCarousel += '<div class="carousel-item '+active+'"><img src="'+imageFullUrl+'" class="imageScale" alt="'+item.filename+'"></div>';

        imageCarouselIndiCators += '<button type="button" data-bs-target="#theatreCarouselIndicators" data-bs-slide-to="'+key+'" class="'+active+'" aria-current="true" aria-label="Slide '+key+'"></button>';
      });

      $('.carousel-indicators').html(imageCarouselIndiCators);
      $('#carousel-inner-img-holder').html(imageCarousel);

      if($("#your_name_div").is(":visible")) {
        $('#partner_name_div').removeClass('col-lg-12');
        $('#partner_name_div').addClass('col-lg-6');
      }
    }
  });
  /** Theatre Selection Ends */

  /** Guest Selection Starts */
  $("#customer_no_guest").change(function () {                            
    var noOfGuest = $('select[name=customer_no_guest]').val();
    $('#no_of_guest').val(noOfGuest);

    handleBookingSummary();
  });
  /** Guest Selection Ends */

  /** Time slot Selection Starts */
  $("#time_slot_selection").on("click", '.time_slot_btn', function() {
     var currentBtn = $(this);
     var slotId = $(this).attr('data-time-slot-id');
     var slotTime = $(this).attr('data-time-slot');

     $(".time_slot_btn").each(function() {
       var timeSlotAvailable = parseInt($(this).attr('data-time-slot-available'));
       if(timeSlotAvailable == 1) {
        $(this).removeClass("btn-primary").addClass("btn-outline-primary");
       }
     });
     $('#slot_id').val(slotId);

     var slotShortDuration = parseInt($(this).attr('data-time-slot-short-duration'));
     $('#slot_short_duration_per').val(slotShortDuration); 
     var slotShortDuration = parseInt($('#slot_short_duration_per').val());
     var theaterPackageAmount = parseInt($('#package_amount').val());

     if($.isNumeric(slotShortDuration) && slotShortDuration <= 99) {
       var theaterPackageAmountReduced = Math.ceil((parseInt(theaterPackageAmount) * parseInt(slotShortDuration)) / 100);
       
       $('.shortDurationModalBody').html('Since you have selected a slot with a shorter duration \n Price has been reduced from <b>'+theaterPackageAmount+'</b> to <b>'+theaterPackageAmountReduced+'</b>');
       
       $('#shortDurationModal').modal('show'); 
     
     }

     handleBookingSummary();

     currentBtn.removeClass("btn-outline-primary").addClass("btn-primary");
  });
  /** Time slot Selection Ends */

  /** Decoration Selection Starts */
  $('input[type=radio][name=decoration').on('change', function() {
    if ($(this).is(':checked')) {
      $('#decoration-error-alert').hide();

      var decorationId = $(this).attr('data-decoration-id');
      $('#decoration_id').val(decorationId);

      var partnerNameLabel = $(this).attr('data-partner-label');
      var yourNameLabel = $(this).attr('data-your-label');

      $('#partner_name_div').hide();
      $('#your_name_div').hide();

      if(partnerNameLabel != null && partnerNameLabel != 'undefined' && partnerNameLabel != '') {
        $('#partner_name_div').show();
        $('#partner_name_div').removeClass('offset-lg-3');
        $('#partner_name_div').addClass('offset-lg-3');
        $('#partner_name_label').text(partnerNameLabel);
      }

      if(yourNameLabel != null && yourNameLabel != 'undefined' && yourNameLabel != '') {
        $('#your_name_div').show();
        $('#partner_name_div').removeClass('offset-lg-3');
        $('#your_name_label').text(yourNameLabel);
      }
    }
  });
  /** Decoration Selection Ends */

  /** Cake Selection Starts */
  $('input[type=radio][name=cake').on('change', function() {
    if ($(this).is(':checked')) {
      $('#cake-error-alert').hide();

      var cakeId = $(this).attr('data-cake-id');
      var cakeName = $(this).attr('data-cake-name');
      var cakeExtraAmount = $(this).attr('data-cake-amount');

      $('#cake_id').val(cakeId);
      $('#cake_name').val(cakeName);
      $('#cake_extra_amount').val(cakeExtraAmount);

      handleBookingSummary();
    }
  });
  /** Cake Selection Ends */

  /** Addon Selection Starts */
  $('input[type=checkbox][name=addon').on('change', function() {
    setAllAddOns();
  });

  function setAllAddOns() {
    var addOnData = [];
    $('input[type=checkbox][name=addon]:checked').each(function() {
      var addOnId = $(this).attr('data-addon-id');
      var addOnname = $(this).attr('data-addon-name');
      var addOnExtraAmount = $(this).attr('data-addon-amount');

      var addOn = {};
      addOn['addon_id'] = addOnId;
      addOn['addon_name'] = addOnname;
      addOn['add_on_extra_amount'] = addOnExtraAmount;

      addOnData.push(addOn);
    });

    $('#addon_data').val('');
    if(addOnData.length > 0) {
      $('#addon_data').val(JSON.stringify(addOnData));
    } 

    handleBookingSummary();
  }
  /** Addon Selection Ends */

  /** Save Customer Details Starts */
  function saveCustomerDetails() {
    var customer_name = $('#customer_full_name').val();
    var customer_phno = $('#customer_ph_no').val();
    var customer_email = '';

    $('#customer-error-alert').hide();
    $('#customer-error-alert').html('');
    $('#customer_id').val('');

    if(!validateCustomerDetails()) {
      return;
    }
    
    $('#next_button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Plase wait...');
    $("#next_button").attr("disabled","disabled");

    $('#next_button_top').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Plase wait...');
    $("#next_button_top").attr("disabled","disabled");

    var ajaxOptions = {
      url: "{{ url('package/booking/update_customer_details') }}", 
      type: "POST",
      data: {
        "_token": '{{ csrf_token() }}', 
        "customer_name": customer_name,
        "customer_phno": customer_phno
        //,"customer_email": customer_email,
      }
    };

    var req = $.ajax(ajaxOptions);
    req.done(function(resp) {
      enableNextButton();
      if (resp != null && resp.success != null && resp.success == true && resp.customer != null &&  resp.customer.id != null) { 
        $('#customer_id').val(resp.customer.id);
        $("#btn_book_now").removeAttr("data-nav-type");
        $("#next_button").attr("data-nav-type","1");
        next();
      }
      return resp;
    });

    req.fail(function(e) {
      enableNextButton();

      if (e.status == 422) {
        var errors = e.responseJSON.errors;
        handlesaveCustomerError(errors);
      }
      if(e.status == 500) {
        var errorMessage = e.responseJSON.message;
        handlesaveCustomerError([e.status + ' ' + e.statusText +', '+errorMessage])
      }
      if(e.status == 404) {
        handlesaveCustomerError([e.status + ' ' + e.statusText + ' - Requested Resource or Record Not Found'])
      }
      return e.status;
    });
  }

  function validateCustomerDetails() {
    var customer_name = $('#customer_full_name').val();
    var customer_phno = $('#customer_ph_no').val();
    var customer_email = '';

    var isValidData = true;
    var errors = {};

    if(customer_name == '') {
      errors.customer_name = ["The Booking Person Name is required."];
      isValidData = false;
    }

    if(customer_phno == '') {
      errors.customer_phno = ["The Whatsapp Number is required."];
      isValidData = false;
    } else if (customer_phno.length != 10) {
      errors.customer_phno = ["The Whatsapp Number must be 10 digits."];
      isValidData = false;
    }

 /*  var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    if(customer_email != '') 
    {
        if(!pattern.test(customer_email)) {
          errors.customer_email = ["The Email ID must be a valid email address."];
          isValidData = false;
        }
    }
*/

    if(!isValidData) {
      handlesaveCustomerError(errors);
    }
    return isValidData;
  }

  function enableNextButton() {
    $('#next_button').text('Next');

    if(current == 0) {
      $("#next_button").text('Next Cake');
      $("#next_button_top").text('Next Cake');
    } else if(current == 1) {
      $("#next_button").text('Next AddOns');
      $("#next_button_top").text('Next AddOns');
    }

    $("#next_button").removeAttr("disabled");
    $("#next_button_top").removeAttr("disabled");
  }

  function handlesaveCustomerError(errors) {
    $('#theatre-slots-error-alert').show().html('<div class="alert alert-danger" role="alert" id="theatre-slots-error-message"></div>');
    $.each(errors, function(k, v){
        $('#theatre-slots-error-message').append('<span>'+ v +'</span><br/>');
    });
    //$('html, body').scrollTop($("#customer-error-alert").offset().top);
    $(window).scrollTop(0);
  }
  /** Save Customer Details Ends */

  /** Booking Summary UI binding Starts */
  function handleBookingSummary() {
    if(current != 0) {
      $('#booking_summary').show();
      $('#booking_details').removeClass('col-lg-12');
      $('#booking_details').addClass('col-lg-9');
      
      $('#booking_summary').removeClass('col-lg-0');
      $('#booking_summary').addClass('col-lg-3');
    } else {
      $('#booking_summary').hide();
      $('#booking_details').removeClass('col-lg-9');
      $('#booking_details').addClass('col-lg-12');
      
      $('#booking_summary').removeClass('col-lg-3');
      $('#booking_summary').addClass('col-lg-0');
    }
   
    var theaterPackageAmount = parseInt($('#package_amount').val());

    var slotShortDuration = parseInt($('#slot_short_duration_per').val());
    if($.isNumeric(slotShortDuration) && slotShortDuration <= 99) {
       theaterPackageAmount = Math.ceil((parseInt(theaterPackageAmount) * parseInt(slotShortDuration)) / 100);
    }

    $('.pkg_base_price').text(theaterPackageAmount);

    var extraGuestTotalAmount = 0;
    var noOfGuest = parseInt($('#no_of_guest').val());
    var allowedGuest = parseInt($('#allowed_no_of_guest').val());
    //var maxGuest = parseInt($('#max_no_of_guest').val());
    var extraGuestAmount = parseInt($('#extra_person_price').val());
    $('#pkg_extra_guest_price_div').hide();
    $('.pkg_extra_guest_price').text(0);
    
    if(noOfGuest > allowedGuest) {
      var extraGuestCount = (noOfGuest - allowedGuest)
      extraGuestTotalAmount = extraGuestCount * extraGuestAmount;
      $('#pkg_extra_guest_price_div').show();
      $('#pkg_extra_guest_price').html('Extra Person Charges <small>('+extraGuestCount+'X'+extraGuestAmount+')</small>');
      $('.pkg_extra_guest_price').text(extraGuestTotalAmount);
    }

    var cakeId = $('#cake_id').val();
    var cakeExtraAmount = 0;
    $('#pkg_cake_price_div').hide();
    if(cakeId != '') {
      cakeExtraAmount = parseInt($('#cake_extra_amount').val());
      $('#pkg_cake_price').html('Cake (<small>'+$('#cake_name').val()+'</small>)');
      $('.pkg_cake_price').text(cakeExtraAmount);
      $('#pkg_cake_price_div').show();
    }

    var addOnAmount = 0;
    var addonData = $('#addon_data').val();
    if(addonData != '') {
      var addonArray = JSON.parse(addonData);
      var addOnNameList = '';
      
      $.each(addonArray, function(key, item) {
        var addonName = item.addon_name;
        var addOnExtraAmount = parseInt(item.add_on_extra_amount);
        var addOnExtraAmountText = '';
        if(addOnExtraAmount > 0) {
          addOnExtraAmountText = '(₹ '+addOnExtraAmount+')';
        }
      
        addOnNameList = addOnNameList + '<br/><span class="text-secondary"><small>'+addonName+' '+addOnExtraAmountText+'</small></span>';
        addOnAmount= addOnAmount + parseInt(item.add_on_extra_amount);
      });
      $('#add_on_list').html(addOnNameList);
      $('#pkg_addon_price_div').show();
    } else {
      $('#pkg_addon_price_div').hide();
    }
    $('.pkg_addon_price').text(addOnAmount);

    var couponAmount = parseInt($('#coupon_code_amount').val());
    
    var subTotalAmount = (theaterPackageAmount + extraGuestTotalAmount + cakeExtraAmount + addOnAmount) - couponAmount;
    $('.pkg_sub_total_amount').text(subTotalAmount);
    $('#sub_total_amount').val(subTotalAmount);

    var advanceAmount = parseInt($('#advance_amount').val());
    $('.pkg_advance_amount').text(advanceAmount);

    var balanceAmount = subTotalAmount - advanceAmount;
    $('.pkg_balance_amount').text(balanceAmount);

    $('#balance_amount').val(balanceAmount);
  }
  /** Booking Summary UI binding Ends */

  /** Submit Package Booking Form Starts */
  function submitPackageBookingForm() {

    showBookNowButtonLoader();

    var form = $('#form_package_booking_details');
    var ajaxOptions = {
        url:form.attr('action'),
        type:'POST',
        cache:false,
        processData:false,
        dataType:'json',
        contentType:false,
        data:new FormData(form[0])
    };
    var req = $.ajax(ajaxOptions);
    req.done(function(resp) {

      hideBookNowButtonLoader();
  
      if(resp != null && resp.success != null && resp.success == true) {
        rediectToAgreement();
      } else {
        alert("Error: "+resp.errMsg);
      }
      return resp;
    });
    req.fail(function(e) {
      hideBookNowButtonLoader();
  
      if (e.status == 422){
      }
      if(e.status == 500){
      }
      if(e.status == 404){
      }
      alert("Something went wrong");
      return e.status;
    });
  }

  function rediectToAgreement() {
    $('#agg_sub_total').val($('#sub_total_amount').val());
    $('#agg_advance').val($('#advance_amount').val());
    $('#agg_customer_id').val($('#customer_id').val());

    $("#form_agreement").submit();
  }

  function showBookNowButtonLoader() {
    $('#btn_book_now').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Plase wait...');
    $('#btn_book_now_summary').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Plase wait...');

    $("#btn_book_now").attr("disabled","disabled");
    $("#btn_book_now_summary").attr("disabled","disabled");
  }

  function hideBookNowButtonLoader() {
    $('#btn_book_now').html('Book Now');
    $('#btn_book_now_summary').html('Book Now');
    $("#btn_book_now").removeAttr("disabled");
    $("#btn_book_now_summary").removeAttr("disabled");
  }
  /** Submit Package Booking Form Ends */

</script>
