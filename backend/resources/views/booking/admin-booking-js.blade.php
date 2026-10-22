<script>
  $(function() {
    handlePersonsDiv();
    handleUIForDecorationSelection();
    handleBookingSummary();

    $('#view_summary').on('click', function() {
      validateBookingForm();
    });

    $('#book_now').on('click', function() {
      $('#booking_form').submit();
    });

    $('#edit_booking').on('click', function() {
      $('#booking_form_container').show();
      $('#booking_summary_container').hide();
    });

    $("#decoration_needed").change(function() {
      handleUIForDecorationSelection();
    });

    $("#payment_type").change(function() {
      var paymentType = $('#payment_type option:selected').val();
      
    //  if(paymentType != 'CASH') 
    //  {
    //    $('#payment_screen_shot_mandatory').show();
    //  } else {
    //    $('#payment_screen_shot_mandatory').hide();
    //  }
      
    });

    $('input[type="checkbox"][name=package_addon_ids[]][readonly="readonly"]').click(function(e){
      e.preventDefault();
    });

    function isPackageBooking() {
      return $('#is_package_booking').val() == 1;
    }

    function handleUIForDecorationSelection() {
      var decorationNeeded = $('#decoration_needed option:selected').val();
      if(decorationNeeded == 0) {
        $('#decoration_container').hide();
        $('#cake_container').hide();
        $('#addon_container').hide();
      } else {
        $('#decoration_container').show();
        $('#cake_container').show();
        $('#addon_container').show();
      }
    }

    function handleBookingSummary() {

      var baseAmount = parseInt($('#base_amount').val()); //parseInt($('#theatre_amount_summary').text());
      var discountAmount = 0;
      var extraPersonAmount = 0;
      var decorationAmount = 0;
      var cakeAmount = 0;
      var addOnAmount = 0;

      var peopleallowed = parseInt($('#peopleallowed').val());
      var extraPersonPrice = parseInt($('#extra_person_price').val());
      var noOfGuests = parseInt($('#no_of_guest option:selected').val());
      if(noOfGuests > peopleallowed) {
        var extraGuest = noOfGuests - peopleallowed;
        extraPersonAmount = extraPersonPrice * extraGuest;
        $('#extra_person_count').text(""+extraGuest+"X"+extraPersonPrice);
        $('#extra_person_row').show();
      } else {
        $('#extra_person_row').hide();
        $('#extra_person_count').text("");
      }

      var decorationNeeded = $('#decoration_needed option:selected').val();
      var decorationIncluded = $('#decoration_included').val();
      
      var decorationAmountText = 0;
      var new_starttime = 0;
       var new_endtime = 0;

     new_starttime = $('#new_starttime').val()
      new_endtime = $('#new_endtime').val()

      var addOnsText = "";

      if(decorationNeeded == 1) {
        if(decorationIncluded != 1) {
          decorationAmount = parseInt($('#decoration_amount').val());
          decorationAmountText = decorationAmount;
        } else {
          if(!isPackageBooking()) {
            decorationAmountText = "Free";
          }
        }
        if(isPackageBooking()) {
          cakeAmount = parseInt($('#package_cake_id option:selected').attr('data-amount'));
        } else {
          cakeAmount = parseInt($('#branch_cake_id option:selected').attr('data-amount'));
        }

        if(isPackageBooking()) {
          $("input:checkbox[name=package_addon_ids[]]:checked").each(function() {
            addOnsText = ""+addOnsText + "<br/>"+ $(this).attr('data-info');
            addOnAmount = addOnAmount + parseInt($(this).attr('data-amount'));
          });
        } else {
          $("input:checkbox[name=branch_addon_ids[]]:checked").each(function() {
            addOnsText = ""+addOnsText + "<br/>"+ $(this).attr('data-info');
            addOnAmount = addOnAmount + parseInt($(this).attr('data-amount'));
          });
        }
      }
      
      var subTotal = baseAmount + extraPersonAmount + cakeAmount + addOnAmount + decorationAmount;

      var discountDataJson = $('#coupon_code_id option:selected').attr('data-coupon');
      if(discountDataJson != undefined && discountDataJson != '') {
        var discountData = JSON.parse(discountDataJson);
        if(discountData.discount_type == 'FLAT') {
          discountAmount = parseInt(discountData.discount);
        } else if(discountData.discount_type == 'PERCENTAGE') {
          discountAmount = parseInt(subTotal * (discountData.discount / 100));
        }
      }

      var advanceAmount = parseInt($('#payment_advance').val());

      var balanceAmount = subTotal - advanceAmount - discountAmount;

      $('#add_ons').html(addOnsText);

      $('#decoration_amount_summary').text(decorationAmountText);
      $('#cake_amount_summary').text(bindValidAmount(cakeAmount));

      $('#new_starttime_summary').text(new_starttime);
        $('#new_endtime_summary').text(new_endtime);
     
      $('#extra_person_amount_summary').text(bindValidAmount(extraPersonAmount));
      $('#add_on_amount_summary').text(bindValidAmount(addOnAmount));
      $('#subtotal_amount_summary').text(bindValidAmount(subTotal));
      $('#advance_amount_summary').text(bindValidAmount(advanceAmount));
      $('#discount_amount_summary').text(bindValidAmount(discountAmount));
      $('#balance_amount_summary').text(bindValidAmount(balanceAmount));
    }

    function bindValidAmount(value) {
      if(isNaN(value)) {
        return "";
      }
      return value;
    }
    
    var dateSelected = $('#admin_booking_date').val();
    if (dateSelected != undefined && dateSelected != null && dateSelected != '') {
      getSlots();
    }

    $('#admin_booking_date').daterangepicker({
        locale: {
          format: 'DD-MM-YYYY'
        }
        , opens: 'center'
        , alwaysShowCalendars: false
        , singleDatePicker: true
        , startDate: moment()
        , minDate: moment()
        , autoApply: true
        , autoUpdateInput: false
      , }
      , function(start, end) {
        var formattedDate = start.format('DD-MM-YYYY');
        $('#admin_booking_date').val(formattedDate);
        getSlots();
        //$('#admin_booking_date_selection').text(start.format('DD/MM/YYYY'));
      }
    )

    $('#customer_phone').on('input', function() {
      // Remove any non-digit characters
      this.value = this.value.replace(/\D/g, '');
      // Limit to 10 digits
      if (this.value.length > 13) {
        this.value = this.value.slice(0, 13);
      }
    });

    $("#decoration_id").change(function() {
      handlePersonsDiv();
    });

    function handlePersonsDiv() {
      var decorationIsSelected = $('#decoration_id option:selected').val();

      if (decorationIsSelected != "") {
        var decorationJson = $('#decoration_id option:selected').attr('data-decoration');
        var decoration = JSON.parse(decorationJson);

        $('#person_one_label').text(decoration.person1);
        $('#person_two_label').text(decoration.person2);

        $('#person_one_div').show();

        $('#decoration_noofperson').val(decoration.noofperson);

        if (decoration.noofperson > 1) {
          $('#person_two_div').show();
        } else {
          hidePersonsDiv(false)
        }
      } else {
        hidePersonsDiv(true)
      }
    }

    function hidePersonsDiv(hideBoth) {
      if (hideBoth) {
        $('#person_one_div').hide();
        $('#person_one').val('');
      }

      $('#person_two_div').hide();
      $('#person_two').val('');
    }

    $("#theater_slot_id").change(function() {
      var theaterSlotId = $('#theater_slot_id option:selected').val();
      $('#theater_slot_id_local').val(theaterSlotId);
    });
    
    /** Get Time slots by date and theatre id Starts */
    function getSlots() {
      var ajaxOptions = {
        url: "{{ route('admin.get-slots') }}"
        , type: "POST"
        , data: {
          "_token": '{{ csrf_token() }}'
          , "theatre_id": $('#theater_id').val()
          , "selected_date": $('#admin_booking_date').val()
          , "booking_id": $('#booking_id').val()
        }
      };

      var slotsDropDown = $('#theater_slot_id');
      slotsDropDown.empty();
      slotsDropDown.append($('<option>', {
        value: "", text: "Choose..."
      }));

      var req = $.ajax(ajaxOptions);
      req.done(function(resp) {
        if (resp != null && resp.success != null && resp.success == true && resp.slots != null) {
          var slots = resp.slots;
        
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
            var selected = ""

            if(slotData.isSlotBookedOrLapsed == 1) {
              className = "btn-secondary";
              disabled = "disabled";
              slotAvailable = 0;
            }
            if(slotId == $('#theater_slot_id_local').val()) {
              selected = "selected";
            }

            slotsDropDown.append("<option "+disabled+" "+selected+" value='"+slotId+"'>"+fullSlotTime24+"</option>");
          });    
        } else {
          //
        }
        return resp;
      });

      req.fail(function(e) {
        if (e.status == 422) {}
        if (e.status == 500) {}
        if (e.status == 404) {}

        $('#time_slot_selection').html('');
        return e.status;
      });
    }

    function validateBookingForm() {
      var form = $('#booking_form');

      $('#error_div').html('');
      showBookNowButtonLoader();

      var formData = new FormData(form[0])
      formData.append('isValidateOnly', 1);

      var ajaxOptions = {
        enctype: 'multipart/form-data',
        url:form.attr('action'),
        type:'POST',
        cache:false,
        processData:false,
        dataType:'json',
        contentType:false,
        data: formData
      };
      var req = $.ajax(ajaxOptions);

      req.done(function(resp) {
        hideBookNowButtonLoader();
        if(resp != null && resp.success != null && resp.success == true) {
          handleBookingSummary();
          $('#booking_form_container').hide();
          $('#booking_summary_container').show();
        } else {
          handlesaveCustomerError(["Error: "+resp.errMsg]);
        }
        return resp;
      });
      req.fail(function(e) {
        hideBookNowButtonLoader();
        if (e.status == 422) {
          var errors = JSON.parse(e.responseText).errors;
          handlesaveCustomerError(errors);
        }
        if(e.status == 500) {
          handlesaveCustomerError([e.status + ' ' + e.statusText]);
        }
        if(e.status == 404) {
          handlesaveCustomerError([e.status + ' ' + e.statusText + ' - Requested Resource or Record Not Found']);
        }
        
        return e.status;
      });
    }

    function showBookNowButtonLoader() {
      $("#view_summary").attr("disabled","disabled");
    }

    function hideBookNowButtonLoader() {
      $("#view_summary").removeAttr("disabled");
    }

    function handlesaveCustomerError(errors) {
      $('#error_div').show().html('<div class="alert alert-danger alert-dismissible" role="alert" id="error_message"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      $.each(errors, function(k, v){
          $('#error_message').append('<span>'+ v +'</span><br/>');
      });
      $(window).scrollTop(0);
      $("#error_div_main").click();
    }  

  });

</script>
