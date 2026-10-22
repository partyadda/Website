<script>
  $(document).ready(function(){

    $('#cold_drink_qty').on('input', function() {
      var qty = parseInt($(this).val());
      var unitPrice = parseInt($('#cold_drink_unit_price').val());
      var totalAmount = qty*unitPrice;
      $('#cold_drink_amount').val(totalAmount);
    });

    $('#water_bottle_250_qty').on('input', function() {
      var qty = parseInt($(this).val());
      var unitPrice = parseInt($('#water_bottle_250_unit_price').val());
      var totalAmount = qty*unitPrice;
      $('#water_bottle_250_amount').val(totalAmount);
    });

    $('#water_bottle_500_qty').on('input', function() {
      var qty = parseInt($(this).val());
      var unitPrice = parseInt($('#water_bottle_500_unit_price').val());
      var totalAmount = qty*unitPrice;
      $('#water_bottle_500_amount').val(totalAmount);
    });

    $('#water_bottle_1000_qty').on('input', function() {
      var qty = parseInt($(this).val());
      var unitPrice = parseInt($('#water_bottle_1000_unit_price').val());
      var totalAmount = qty*unitPrice;
      $('#water_bottle_1000_amount').val(totalAmount);
    });

    $('#billing_summary').on('click', function() {
      validateBillingForm();
    });

    $('#submit_billing').on('click', function() {
      $('#booking_billing_form').submit();
    });

    $('#edit_billing').on('click', function() {
      $('#billing_conatiner').show();
      $('#billing_conatiner_summary').hide();
    });

    function validateBillingForm() {
      var form = $('#booking_billing_form');

      $('#error_div').html('');
      $('#summary_holder').html('');
      showButtonLoader();

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
        hideButtonLoader();
        if(resp != null && resp.success != null && resp.success == true) {
          $('#billing_conatiner').hide();
          $('#billing_conatiner_summary').show();

          $('#summary_holder').html(resp.data.html);
        } else {
          handleCustomerError(["Error: "+resp.errMsg]);
        }
        return resp;
      });
      req.fail(function(e) {
        hideButtonLoader();
        if (e.status == 422) {
          var errors = JSON.parse(e.responseText).errors;
          handleCustomerError(errors);
        }
        if(e.status == 500) {
          handleCustomerError([e.status + ' ' + e.statusText]);
        }
        if(e.status == 404) {
          handleCustomerError([e.status + ' ' + e.statusText + ' - Requested Resource or Record Not Found']);
        }
        
        return e.status;
      });
    }
    
    function showButtonLoader() {
      $("#billing_summary").attr("disabled","disabled");
    }

    function hideButtonLoader() {
      $("#billing_summary").removeAttr("disabled");
    }

    function handleCustomerError(errors) {
      $('#error_div').show().html('<div class="alert alert-danger alert-dismissible" role="alert" id="error_message"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      $.each(errors, function(k, v){
          $('#error_message').append('<span>'+ v +'</span><br/>');
      });
      $(window).scrollTop(0);
      $("#error_div_main").click();
    }  

  });
</script>
