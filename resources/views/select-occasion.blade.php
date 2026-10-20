@extends('includes.layout')
@section('title','Select Occasion')

@section('content')
 <style>
      .error-label {
        color: red;
        margin-left: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <a href="javascript:void(0)" class="back-btn text-decoration-none mt-5" onclick="goBack()">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
                    height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>Back
            </a>
            <div class="fs-3 fw-bold my-4">Select Decoration </div>
            <label id="check_error" class="error-label" ></label>
            <!--  -->
            <form class="mb-5" name="personalinfo">
                <div class="row gy-4">
                    @foreach($decorationsWithAssets as $occ)
                    <div class="col-6 col-lg-3">
                        <label class="select-option text-center">
                            <input type="radio" name="check" value="{{$occ->id}}" onchange="getDecoration({{$occ->id}})" class="main_div">
                            @foreach($occ->assets as $asset)
                            <div class="frame"><img src="{{URL::asset('assets/img/'.$asset->foldername.'/'.$asset->filename)}}"
                                    class="img-fluid" /><i class=""></i></div>
                            @endforeach        
                            <p class="fw-bold mb-0">{{$occ->name}}</p>
                            <!--<div class="price">₹ {{$occ->price}}</div>-->
                        </label>
                    </div>
                    @endforeach
                    
                    
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="500" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_anniversary.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Anniversary</p>-->
                    <!--        <div class="price">₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="600" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_romantic_date.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Romantic Date</p>-->
                    <!--        <div class="price">₹ 600</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="600" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_marriage_proposal.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Proposal</p>-->
                    <!--        <div class="price">₹ 600</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="600" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_congratulations.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Congratulations</p>-->
                    <!--        <div class="price">₹ 600</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="600" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_bride_to_be.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Bride to be</p>-->
                    <!--        <div class="price">₹ 600</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="600" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_baby_shower.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Baby Shower</p>-->
                    <!--        <div class="price">₹ 600</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="600" class="main_div">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/event_farewell.webp')}}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0">Farewell</p>-->
                    <!--        <div class="price">₹ 600</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                </div>
                <input type="hidden" name="decoration_hidden_id" id="decoration_hidden_id" />
                <div class="row">
                    <!--<div class="col-md-6" >-->
                    <!--    <label for="exampleFormControlInput1" class="form-label">Partner Name*</label>-->
                    <!--    <input type="text" class="form-control form-control-lg w-70 nick_name" name="nick_name"-->
                    <!--        id="exampleFormControlInput1" placeholder="Type here">-->
                    <!--        <label id="nick_name_error" class="error-label"></label>-->
                    <!--</div>-->
                    <div class="col-md-6" id="partner_div" style="display:none;">
                        <label for="exampleFormControlInput13" class="form-label partner_name_label">Partner Name</label>
                        <input type="text" class="form-control form-control-lg w-100 partner_name" name="partner_name"
                            id="exampleFormControlInput3" placeholder="Type here" maxlength="25">
                            <label id="partner_name_error" class="error-label"></label>
                    </div>
                    <div class="col-md-6" id="your_name_div" style="display:none;">
                        <label for="exampleFormControlInput2" class="form-label your_name_label" >Your Name*</label>
                        <input type="text" class="form-control form-control-lg w-70 your_name" name="your_name"
                            id="exampleFormControlInput2" placeholder="Type here" maxlength="25">
                            <label id="your_name_error" class="error-label"></label>
                    </div>
                    <!--<div class="col-md-6" id="partner_div" style="display:none;">-->
                    <!--    <label for="exampleFormControlInput13" class="form-label">Partner Name</label>-->
                    <!--    <input type="text" class="form-control form-control-lg w-100 partner_name" name="partner_name"-->
                    <!--        id="exampleFormControlInput3" placeholder="Type here">-->
                    <!--        <label id="partner_name_error" class="error-label"></label>-->
                    <!--</div>-->
                </div>

            </form>
        </div>
        <div class="col-md-5">
            <div class="summary-content p-3  p-md-4 find-us mb-4 h-100">
                <div class="fs-5 fw-bold mb-4">Booking Summary</div>
                <div class="d-flex mb-2">
                    <span id="theater_with_person_notrequired">Base Price</span><b class="ms-auto total"></b>
                </div>
                <div class="d-flex mb-2">
                    <span class="decoration_div">Decoration</span>  <span class="decoration_count" ></span><b class="ms-auto decoration"></b>
                </div>
                <div class="d-flex mb-2" id="extra_person_div"> 
                    <span style="margin-right: 10px;">Extra Person Charges</span> <span class="extra_count"></span><b class="ms-auto extra"></b>
                </div>
                <div class="mb-2" id="coupon_applied_div" style="display: none;">
                  <span id="coupon-applied-text">Coupon Applied</span><b class="ms-auto coupon-applied-amount"></b>
                </div>
                <!--<div class="d-flex mb-2">-->
                <!--    <span class="decoration_name"></span><b class="ms-auto decoration"></b>-->
                <!--</div>-->
                
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
                    <a href="javascript:void(0)"
                        class="btn button-custom rounded-pill px-3 px-lg-12 px-xxl-5 next_cake">Next Cake</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var savedDecorationId = localStorage.getItem('decoration_id_check');
    getDecoration(localStorage.getItem('decoration_id_check'));
    if (savedDecorationId) {
        $('input[name="check"][value="' + savedDecorationId + '"]').prop('checked', true).trigger('change');
    }
    
    if(localStorage.getItem('extra_count_per') === ''){
        $('#extra_person_div').hide();
        $('#extra_person_div').removeClass("d-flex mb-2");
    }
    else{
        $('#extra_person_div').show();
        $('#extra_person_div').addClass("d-flex mb-2");
    }
        
    document.getElementById("check_error").style.display = "block";
    if(localStorage.getItem('decoration_included') == 0){
      $('.decoration').text('₹' +' '+ localStorage.getItem('decoration_amount'));
    }
    else { 
      $('.decoration').text('Free');
    }
    localStorage.removeItem('nick_name');
    localStorage.removeItem('your_name');
    localStorage.removeItem('partner_name');
    localStorage.removeItem('decoration');
    localStorage.removeItem('after_decoration');
    localStorage.removeItem('after_decoration_sub_total');
    var occasion_sub_total = localStorage.getItem('overview_sub_total').match(/\d+/)[0];
    var left_advance = occasion_sub_total - localStorage.getItem('advance');
    $('.name').text(localStorage.getItem('name'));
    $('.calender').text(localStorage.getItem('calender'));
    $('.time').text(localStorage.getItem('time'));
    $('.total').text(localStorage.getItem('overview_total'));
    $('.sub_total').text(localStorage.getItem('overview_sub_total'));
    $('.advance').text('₹ ' + '' + localStorage.getItem('advance'));
    $('.fs-11').text('(Payable at the Venue on ' + ' ' + localStorage.getItem('calender') + ')');
    $('.balance').text('₹ ' + left_advance);
    // $('.decoration').text('₹ 0');
    if(localStorage.hasOwnProperty('extra') && localStorage.getItem('extra') != '') {
      $('.extra').text('₹ ' + localStorage.getItem('extra').match(/\d+/)[0]);
    }
    $('.decoration_name').text('Occasion Decoration');
    $('.extra_count').text(localStorage.getItem('extra_count_per'));
    $('#theater_with_person').text(localStorage.getItem('name') +' '+'Theater ('+localStorage.getItem('min_people')+' '+'People)');
    //       if (localStorage.getItem('form_select_lg') == 2) {
    //          $('#decoration_price').hide();
    //   $("#decoration_price").removeClass("d-flex mb-2");
    //       }
    //              $('input[name="check"]').on('change', function() {
    //      var label = $(this).closest('.select-option');

    //      // Get the text from the <p> and <div class="price"> elements
    //      var eventText = label.find('p.fw-bold').text();
    //      var priceText = label.find('div.price').text();

    //      // Example: Show the values in an alert
    //      alert('Event: ' + eventText + '\nPrice: ' + priceText);
    //  });
    
    $('.partner_name').on('input', function () {
                // Remove any non-digit characters
                // Limit to 10 digits
                if (this.value.length > 8) {
                    //this.value = this.value.slice(0, 8);
                }
            });
            
            $('.your_name').on('input', function () {
                // Remove any non-digit characters
                // Limit to 10 digits
                if (this.value.length > 8) {
                    //this.value = this.value.slice(0, 8);
                }
            });

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

function getDecoration(val) {
     window.scrollBy(0,700);
    console.log($(this));
    $('.partner_name').val('');
    $('.your_name').val('');
    localStorage.removeItem('partner_name_label');
    localStorage.removeItem('your_name_label');
    localStorage.removeItem('decoration_id_check');
    $('#check_error').text('');

    $("#partner_name_error").text('');
    $("#your_name_error").text('');
    // console.log($(this).val());
    var decoration_id = val;
    // console.log(decoration_id);
    localStorage.setItem('decoration_id_check',decoration_id);
    $('#decoration_hidden_id').val(decoration_id);
     $.ajax({
            url: "{{ url('select-occasion/decoration_type') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "decoration_id" :  decoration_id,
                
            },
            success: function(data) {
                
                console.log(data);
                if(data.person1 != null){
                    $('#partner_div').show();
                    $('.partner_name_label').html(data.person1 +' '+'<span style="color:red">*</span>');
                    localStorage.setItem('partner_name_label',data.person1)
                }
                else{
                    $('.partner_name_label').text('')
                     $('#partner_div').hide();
                     localStorage.removeItem('partner_name_label')
                }
                 if(data.person2 != null){
                     $('.your_name_label').html(data.person2 +' '+'<span style="color:red">*</span>')
                    $('#your_name_div').show();
                    localStorage.setItem('your_name_label',data.person2)
                }
                else{
                    $('.your_name_label').text('')
                    $('#your_name_div').hide();
                    localStorage.removeItem('your_name_label')
                }
                // console.log(data['doneMessage']);
            
            
                //   $(data).each(function(key, value) {
                //     $('.card-title').text(value.name);
                // });


            }
            
        });
    // $('.decoration_name').text('')
    // var price = 0;
    // var balance_total = 0;
    // $('.decoration').text('');

    // var occasion_sub_total = localStorage.getItem('overview_sub_total').match(/\d+/)[0];
    
    // var left_advance = occasion_sub_total - localStorage.getItem('advance');
    // var label = $(this).closest('.select-option');

    // // Get the text from the <p> and <div class="price"> elements
    // var eventText = label.find('p.fw-bold').text();
    // var priceText = label.find('div.price').text();
    // // console.log('Event:'+eventText+'Price:'+priceText);

    // price = priceText;
    // $('.decoration_name').text('Occasion Decoration' + ' ' + eventText);
    // //  console.log(price);
    // var price_change = price.match(/\d+/)[0];
    // //  console.log(price_change);
    // $('.sub_total').text('₹ ' + (parseFloat(occasion_sub_total) + parseFloat(price_change)));
    // $('.decoration').text('₹ ' + price_change);
    // balance_total = left_advance;
    // var result = parseFloat(balance_total) + parseFloat(price_change);
    // //  // console.log(result);
    // $('.balance').text('₹ ' + result);
    // if (eventText == 'Anniversary' || eventText == 'Romantic Date' || eventText == 'Proposal') {
    //     $('#partner_div').show();
    // } else {
    //     $('#partner_div').val('');
    //     $('#partner_div').hide();
    // }
    // console.log($(this).find('.price').text());
}

// $('input[name="check"]').on('change', getDecoration);


function goBack() {
  window.history.back()
}

function redirect_cake() {
    // console.log($('#your_name_div').attr('style'));
    var href_a = $(location).attr("href");
    var sub = href_a.substr(0, 34);
    
    // document.getElementById("nick_name_error").innerText = "";
document.getElementById("your_name_error").innerText = "";

document.getElementById("partner_name_error").innerText = "";

let hasErrors = false;

    //   if (document.personalinfo.nick_name.value == "") {
    //       window.scrollBy(0,180);
    //     //  alert("Please type Nick Name!");
    //       document.getElementById("nick_name_error").innerText = "Please type Nick Name!";
    // hasErrors = true;
    //   }
        if(document.personalinfo.check.value == ''){
            document.getElementById("check_error").style.visibility = "visible"
            document.getElementById("check_error").innerText = 'Please Choose Decoration'
            
            // alert("Please Choose Decoration");
            hasErrors = true;
        }
      if ($('#partner_div').attr('style') == '') {
     if (document.personalinfo.partner_name.value == "") {
             window.scrollBy(0,180);
            //   alert("Please type Partner Name!");
              document.getElementById("partner_name_error").innerText = localStorage.getItem('partner_name_label');
     hasErrors = true;
          }
         
         
      }
      if ($('#your_name_div').attr('style') == '') {
         if (document.personalinfo.your_name.value == "") {
          window.scrollBy(0,180);
        //  alert("Please type your name!");
          document.getElementById("your_name_error").innerText = localStorage.getItem('your_name_label');
    hasErrors = true;
      }
      }
       if (hasErrors) {
        return; // Stop if there are validation errors
    }
    //  if (document.personalinfo.partner_name.value == "") {
    //      alert("Please type Partner Name!");
    //      document.personalinfo.partner_name.focus();
    //      return false;
    //  }
   //  console.log($('#partner_div').find('style'));

    //  if ($('#partner_div').find('style')) {

    //  }
    // alert('yes');
    var after_decoration = $('.balance').text();
    localStorage.setItem('after_decoration_total',$('.total').text());
    localStorage.setItem('after_decoration', after_decoration.match(/\d+/)[0]);
    localStorage.setItem('after_decoration_sub_total', $('.sub_total').text());
    localStorage.setItem('decoration', $('.decoration').text());
    localStorage.setItem('decoration_id',$('#decoration_hidden_id').val());
    localStorage.setItem('nick_name', $('.nick_name').val());
    localStorage.setItem('your_name', $('.your_name').val());
    localStorage.setItem('partner_name', $('.partner_name').val());
     window.location.href = '{{ env('APP_URL') }}'+'select-cake/'+localStorage.getItem('branch_id');
}
$('.next_cake').on('click', redirect_cake)
</script>

@endsection