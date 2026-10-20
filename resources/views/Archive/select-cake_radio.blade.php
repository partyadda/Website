@extends('includes.layout')
@section('title','Select Cake')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <a href="javascript:void(0)" class="back-btn text-decoration-none mt-5" onclick="goBack()">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
                    height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                Back
            </a>
            <div class="fs-3 fw-bold my-4">Select the Cake 
                <input class="form-check-input" type="radio" name="cake" id="cake2" value="egless" checked>
                <label class="form-check-label" for="cake2">
                    Egg-less
                </label>
                <input class="form-check-input" type="radio" name="cake" id="cake3" value="egg">
                <label class="form-check-label" for="cake3">
                    Egg
                </label>

            </div>

            <!--  -->
            <form class="mb-5">
                <input type="hidden" name="cake_id" id="cake_id" value="">

                <div class="row gy-4 row_div">
                    @foreach($cake as $ck)
                    <div class="col-6 col-lg-3 main_div" id="div1">
                        <label class="select-option text-center">
                            <input type="radio" name="check" value="{{$ck->name}}" onclick="getAdon($(this),'{{$ck->price}}',{{$ck->id}})">
                            <div class="frame"><img src="{{URL::asset('assets/img/cakes/'.$ck->image) }}"
                                    class="img-fluid" /><i class=""></i></div>
                            <p class="fw-bold mb-0"> {{$ck->name}} <img class="cake_type" src="{{URL::asset('assets/img/veg.jpg')}}"
                                    style="width:25px;height:25px;" /></p>
                            <div class="price_div">₹ {{$ck->price}}</div>
                        </label>
                    </div>
                    @endforeach
                    <!--<div class="col-6 col-lg-3 main_div" id="div2">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Strawberry" onclick="getAdon($(this),'500',2)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Strawberry <img class="cake_type" src="{{URL::asset('assets/img/veg.jpg')}}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3 main_div" id="div3">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Butterscotch" onclick="getAdon($(this),'500',3)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Butterscotch <img class="cake_type" src="{{URL::asset('assets/img/veg.jpg')}}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3 main_div" id="div4">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Chocolate" onclick="getAdon($(this),'500',4)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Chocolate<img class="cake_type" src="{{URL::asset('assets/img/nonveg.png')}}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3 main_div" id="div5">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Black Forest" onclick="getAdon($(this),'500',5)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Black Forest<img class="cake_type" src="{{URL::asset('assets/img/nonveg.png')}}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3 main_div" id="div6">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Dry Fruit" onclick="getAdon($(this),'500',6)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Dry Fruit<img class="cake_type" src="{{URL::asset('assets/img/veg.jpg')}}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3 main_div" id="div7">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Chocolate Coffee"-->
                    <!--            onclick="getAdon($(this),'500',7)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Chocolate Coffee<img class="cake_type" src="{{URL::asset('assets/img/nonveg.png') }}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                    <!--<div class="col-6 col-lg-3 main_div" id="div8">-->
                    <!--    <label class="select-option text-center">-->
                    <!--        <input type="radio" name="check" value="Chocolate Truffle"-->
                    <!--            onclick="getAdon($(this),'500',8)">-->
                    <!--        <div class="frame"><img src="{{URL::asset('assets/img/Black_forest.png') }}"-->
                    <!--                class="img-fluid" /><i class=""></i></div>-->
                    <!--        <p class="fw-bold mb-0"> Chocolate Truffle<img class="cake_type" src="{{URL::asset('assets/img/nonveg.png')}}"-->
                    <!--                style="width:25px;height:25px;" /></p>-->
                    <!--        <div>₹ 500</div>-->
                    <!--    </label>-->
                    <!--</div>-->
                </div>
                <div class="mt-5 fs-14"><font color="red">*</font>Cake images are examples only</div>
            </form>
        </div>
        <div class="col-md-5">
            <div class="summary-content p-3  p-md-4 find-us mb-4 h-100">
                <div class="fs-5 fw-bold mb-4">Booking Summary</div>
                <div class="d-flex mb-2">
                    <span>Opera Theater (4 People)</span><b class="ms-auto total"></b>
                </div>
                <div class="d-flex mb-2">
                    <!--<span>Extra Person</span><b class="ms-auto extra"></b>-->
                    <span style="margin-right: 10px;">Extra Person</span> <span class="extra_count"></span><b class="ms-auto extra"></b>
                </div>
                <div class="d-flex mb-2">
                    <span>Birthday Decoration</span><b class="ms-auto decoration"></b>
                </div>
                
                <div class="d-flex mb-2">
                    <span class="multi_cake"></span><b class="ms-auto cake"></b>
                </div>
                <!-- <div class="d-flex mb-2">
                        <span>Cake</span><b class="ms-auto cake"></b>
                     </div> -->
                <hr>
                <div class="d-flex mb-2">
                    <span>Subtotal</span><b class="ms-auto sub_total"></b>
                </div>
                <hr>
                <div class="d-flex mb-2 fw-bold">
                    <span>Advance Amount Payable</span><b class="ms-auto advance"></b>
                </div>
                <hr>
                <div class="d-flex mb-2 ">
                    <span>Balance Amount<div class="fs-11"></div></span>
                    <b class="ms-auto balance"></b>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)"
                        class="btn button-custom rounded-pill px-3 px-lg-12 px-xxl-5 next_ad_on">Next Special Ad-Ons</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var left_advance = localStorage.getItem('total') - localStorage.getItem('advance');
    $('.name').text(localStorage.getItem('name'));
    $('.calender').text(localStorage.getItem('calender'));
    $('.time').text(localStorage.getItem('time'));
    $('.total').text('₹ ' + '' + localStorage.getItem('after_decoration'));
    $('.sub_total').text(localStorage.getItem('after_decoration_sub_total'));
    $('.decoration').text(localStorage.getItem('decoration'));
    $('.advance').text('₹ ' + '' + localStorage.getItem('advance'));
    $('.fs-11').text('(Payable at the Venue on ' + ' ' + localStorage.getItem('calender') + ')');
    $('.balance').text('₹ ' + '' + localStorage.getItem('after_decoration'));
    $('.extra').text('₹ ' + '' + localStorage.getItem('extra').match(/\d+/)[0]);
    $('.extra_count').text(localStorage.getItem('extra_count_per'));
    // category_val()
    // $("input[name='cake']").on('click',category_val); 
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function filterCakes() {
        var selectedValue = $("input[name='cake']:checked").val();
        $.ajax({
             url: "{{ url('select-cake/categ') }}",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "selectedValue" : selectedValue,
            },
            success:function(data){
                console.log(selectedValue);
                $('.row_div').html('');
                // console.log($('.main_div').find('p').text());
                // var arr = [];
                // var decoration_name = $('.main_div').find('p').text();
                // arr.push(decoration_name);
                // console.log(arr);
                $(data).each(function(key,value){
                //     // console.log(value.name);
                    $('.row_div').append(`
    <div class='col-6 col-lg-3 main_div' id='div1'>
        <label class='select-option text-center'>
            <input type='radio' name='check' value='${value.name}' onclick='getAdon($(this), ${value.price}, ${value.id})'>
            <div class='frame'>
                <img src='assets/img/cakes/${value.image}' class='img-fluid' />
                <i class=''></i>
            </div>
            <p class='fw-bold mb-0'>${value.name}
                <img class='cake_type' src='${selectedValue === "egless" ? "assets/img/veg.jpg" : "assets/img/nonveg.png"}' style='width:25px;height:25px;' />
            </p>
            <div class='price_div'>₹ ${value.price}</div>
        </label>
    </div>
`);
                //     // if()
                //      $('.price_div').text('₹'+''+value.egless_price);
                })
                //  $('.main_div').each(function(){
                //      var name = $(this).find('p').text();
                //      console.log(data.name);
                //  });
                // $(data).each(function(key,value){
                //     $('.price_div').text('₹'+''+value);
                // })
            }
        })
        // if (selectedValue === "veg") {
        //     $(".main_div").hide(); // Hide all divs
        //     $(".main_div").each(function () {
        //         if ($(this).find("img.cake_type").attr("src").includes("veg.jpg")) {
        //             $(this).show(); // Show only divs with veg cakes
        //         }
        //     });
        // } else if (selectedValue === "egg") {
        //     $(".main_div").hide(); // Hide all divs
        //     $(".main_div").each(function () {
        //         if ($(this).find("img.cake_type").attr("src").includes("nonveg.png")) {
        //             $(this).show(); // Show only divs with non-veg (egg) cakes
        //         }
        //     });
        // } else if (selectedValue === "both") {
        //     $(".main_div").show(); // Show all divs
        // }
    }

    // Run the filter function when a radio button is changed
    $("input[name='cake']").change(function () {
        filterCakes();
    });

    // Run the filter function on page load
    filterCakes();

});

function goBack() {
  window.history.back()
}
var arr = '';
var totalAmount = 0;

function getAdon(val, amount, id) {
    $('#cake_id').val('');
    var sub_total_cake = localStorage.getItem('after_decoration_sub_total').match(/\d+/)[0];
    var cake_balance = localStorage.getItem('after_decoration').match(/\d+/)[0];

    // console.log(sub_total_cake);
    var name = $(val).val();

    if ($(val).is(':checked')) {
        // console.log(amount);

        // If the radio is checked, add the value to the array and update the total amount
        // arr.push(name);
        arr = name;
        // totalAmount += parseFloat(amount); // Add the amount to the total
        var cake_total_result = parseInt(sub_total_cake) + parseInt(amount);
        var balance_result = parseInt(cake_balance) + parseInt(amount);
        var cake_id = $('#cake_id').val(id);

    }
    // else {
    //     // If the radio is unchecked, remove the value from the array and update the total amount
    //     var index = arr.indexOf(name);
    //     // if (index !== -1) {
    //        arr = name;
    //         totalAmount -= parseFloat(amount); // Subtract the amount from the total
    //         var cake_total_result = parseInt(sub_total_cake) - parseInt(amount);
    // var balance_result = parseInt(cake_balance) - parseInt(amount);
    //     // }
    // }

    // console.log(arr);

    // Build the HTML dynamically based on the number of items in the array
    var htmlContent = 'Cake <small>' + arr + '</small>';

    // htmlContent += '<small>' + arr[i] + '</small><br>';




    //  htmlContent += '<br>Total Amount: $' + totalAmount.toFixed(2); // Display the total amount
    $('.cake').text('₹ ' + '' + amount);
    $('.sub_total').text('₹ ' + '' + cake_total_result);
    $('.balance').text('₹ ' + '' + balance_result);

    $('.multi_cake').html(htmlContent);




}
function category_val(){
    // console.log($(this).val());
    var category_check = $("input[name='cake']:checked").val();
    
    // console.log(category_check);
    // $('.cake_type').each(function(key,value){
    //     console.log($(value).attr('src'));
    //     var img = $(value).attr('src');
    //     // console.log(img.substr(45,10));
    //     var subs =img.substr(45,10);
    //     console.log(subs.replace(/\.png|\.jpg/g, ''));
    //     var cake_type_img  = subs.replace(/\.png|\.jpg/g, '');
    //     if (category_check == cake_type_img) {
            
    //     }

    //     // href_a.substr(34,37)
    // })
    // if (category_check == 'veg') {
    //     // console.log($('#cake_type').find('src'));
    //     var ckt = $('#cake_type').attr('src');
    //     console.log(ckt);
        
       
    //     // $('#div1').show();
    //     // $('#div2').show();
    //     // $('#div3').show();
    //     // $('#div4').hide();
    //     // $('#div5').hide();
    //     // $('#div6').show();
    //     // $('#div7').hide();
    //     // $('#div8').hide();
    // }
    // else if(category_check == 'egg'){
    //     // $('#div1').hide();
    //     // $('#div2').hide();
    //     // $('#div3').hide();
    //     // $('#div4').show();
    //     // $('#div5').show();
    //     // $('#div6').hide();
    //     // $('#div7').show();
    //     // $('#div8').show();
    // }
    // else if(category_check == 'both'){
    //     // $('#div1').show();
    //     // $('#div2').show();
    //     // $('#div3').show();
    //     // $('#div4').show();
    //     // $('#div5').show();
    //     // $('#div6').show();
    //     // $('#div7').show();
    //     // $('#div8').show();
    // }
    
}


// $('.main_div').on('click',getAdon);
function redirect_ad_on() {
    var after_cake_ad_on = $('.balance').text();
    localStorage.setItem('after_cake_ad_on', after_cake_ad_on.match(/\d+/)[0]);
    localStorage.setItem('after_cake_ad_on_sub_total', $('.sub_total').text());
    localStorage.setItem('cake', $('.cake').text());
    localStorage.setItem('multiCakeContent', $('.multi_cake').text());
    localStorage.setItem('cake_id', $('#cake_id').val());
    window.location.href = '{{ env('APP_URL') }}'+'select-decoration';
}
$('.next_ad_on').on('click', redirect_ad_on);
</script>
@endsection