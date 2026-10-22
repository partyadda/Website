<script>
  $(document).ready(function(){

    handleQr();

    $("#payment_reference").change(function() {
      handleQr();
    });

    function handleQr() {
      var paymentTypeObj = $('#payment_reference option:selected');
      var paymentType = paymentTypeObj.val();
      if(paymentType == 'CASH') {
        $('#qr_display').hide();
      } else {
        var qrImage = paymentTypeObj.attr('data-qr');
        var qrLink = "<a href="+qrImage+" target='_blank'> <img src="+qrImage+" alt='Qr' width='200'></a>";
        $('#qr_display').html(qrLink);
        $('#qr_display').show();
      }
    }
   
  });
</script>
