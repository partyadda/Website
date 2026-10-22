@extends('includes.layout')

@section('title','PartyAdda | Private Theatre Celebrations in Bangalore')

@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','
PartyAdda offers private theatre celebrations in Bangalore with branches in AECS Layout and JP Nagar for birthdays, anniversaries, baby showers, bride-to-be events, and more.')
@section('content')
<style>

  /*.time-slot-selection .available {*/
  /*     border: 3px solid green !important;*/
  /*}*/
  .time-slot-selection .available.selected {
    border: 3px solid #00ff38 !important; /* Use !important to override other styles */
    background: #00ff38; /*This is parrot green;*/
    color:white;
    font-style: bold;
}
</style>


<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Demo Popup</button>-->

<!-- Modal -->


    <div class="package-main package-list d-grid row">
        <div class="mb-4 col-md-6">
            <a href="javascript:void(0)" class="back-btn text-decoration-none" onclick="goBack();">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
                    height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>Back
            </a>
            <center><h2 class="fs-4 mb-0 d-md-block d-none slot_name">{{$theatre_by_id->name}}</h2></center>
            <div class="package-images">
                @foreach($theatre_by_id->assets as $cars)
                <div><img src="{{URL::asset('assets/img/'.$cars->foldername.'/'.$cars->filename)}}" style="height:320px;" class="img-fluid"
                        alt="Opera Private Theatre"></div>
                @endforeach        
                <!--<div><img src="{{URL::asset('assets/img/opera2.jpg')}}" style="height:220px;" class="img-fluid"-->
                <!--        alt="Opera Private Theatre"></div>-->
                <!--<div><img src="{{URL::asset('assets/img/opera1.jpg')}}" style="height:220px;" class="img-fluid"-->
                <!--        alt="Opera Private Theatre"></div>-->
            </div>
        </div>
        <div class="mb-4 col-md-6">
            <div class="row g-0 ">
                <div class="col-lg-6">
                    <div class="select-date">
                        <div class="fw-bold mb-2">
                            Select Date
                        </div>
                         <input id="calendar" class="form-control" type="date" />
                    </div>
                    <input type="hidden" value="{{$theatre_by_id->peopleallowed}}" id="min_people" />
                    <input type="hidden" value="{{$theatre_by_id->max_people}}" id="max_people" />
                    <input type="hidden" value="{{$theatre_by_id->decoration_included}}" id="decoration_included" />
                    <input type="hidden" value="{{$theatre_by_id->branchs->decoration_amount}}" id="decoration_amount" />
                    <div class="px-2 px-md-3">
                        <input type="hidden" name="slot_time" value="" id="slot_time">
                         <input type="hidden" name="slot_id" value="" id="slot_id">
                        <input type="hidden" name="theatre_id"  value="{{$theatre_by_id->id}}" id="theatre_id"  />
                        <input type="hidden" id="per_amount_hidden" name="per_amount_hidden" value="" / >
                        <center style="margin-top: 12px;"><span class="seat-available fs-14 fw-bold text-white rounded-pill py-2 px-3 ms-auto1" style="background-color:green">
                                Slots Available</span></center><br>
                        <!--<h2 class="fs-4 mb-0 d-md-none d-block  mb-3 slot_name">Opera</h2>-->
                        <div class="fw-500 mb-2">Choose a time slot for <b id="calendar-value"></b></div>
                        <div class="time-slot-selection flex-wrap">
                            @foreach($theatre_by_id->slots as $sl)
                             <button class="available" data-id="{{$sl->id}}"  data-bs-toggle="modal"
                                data-bs-placement="top" title="@if($sl->Percentage <= 99)Short Duration @endif"
                                @if($sl->Percentage <= 99)
                                data-bs-target=".exampleModal"
         data-bs-placement="top" data-bs-toggle="modal"
                                    @endif>
                                <input type="hidden" id="per_hidden" name="per_hidden" value="{{$sl->Percentage}}" / >
                                 <!--<img class="me-1" src="{{URL::asset('assets/img/sunLight.svg')}}"-->
                                 <!--   alt="" />-->
                                 @if($sl->daypart == 'M')
                                 <!--Morning Slot-->
                                 <i class="fa-solid fa-sun"></i>
                                 @elseif($sl->daypart == 'A')
                                 <!--Afternoon slot-->
                                 <i class="fa-solid fa-sun-bright"></i>
                                 @else
                                 <!--Evening Slot-->
                                 <i class="fa-solid fa-moon"></i>
                                 @endif
                                <span>{{\Carbon\Carbon::createFromTimestamp(strtotime($sl->start_time))->format('h:i A')}} - {{\Carbon\Carbon::createFromTimestamp(strtotime($sl->end_time))->format('h:i A')}}</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-md-4 p-2">
                        <div class="d-flex flex-wrap align-items-center mb-2">
                            <!-- <h2 class="fs-4 mb-0 d-md-block d-none slot_name">{{$theatre_by_id->name}}</h2> -->
                            <span class="fs-14 fw-bold text-white rounded-pill ms-md-auto"><a href="javascript:void(0)"
                                    class="btn button-custom rounded-pill px-3 px-lg-4 px-xxl-5 proceed">Proceed</a><br>
                                <!--<p class="mt-2 mb-0" style="color:blue;">(Just pay <b id="advance_amount">₹ {{$advance_amount}}
                                        advance</b> to book)</p> -->
                                <p class="mt-2 mb-0" style="color:blue;">Reserve your spot with just a <b id="advance_amount">₹ {{$advance_amount}}
                                        </b> advance payment.</p>        
                                        
                            </span>
                        </div>
                        <div class="fs-5 total_amount">₹ {{$theatre_by_id->price}} for {{$theatre_by_id->displayname}}</div>
                        <div class="fs-14  extra_count"><!-- Including Taxes |--> ₹ {{$theatre_by_id->extra_person_price}} for each additional guest</div>
                        <input type="hidden" name="display_name" id="display_name" value="{{$theatre_by_id->displayname}}"/>
                        <div class="d-flex info my-3">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Maximum Capacity is 2 people">
                                Max {{$theatre_by_id->max_people}} people
                            </button>
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="">
                                @if($theatre_by_id->decoration_included == 0)
                                Decoration {{$theatre_by_id->branchs->decoration_amount}}
                                @else
                                Decoration Included
                                @endif
                                
                            </button>
                        </div>
                        <h1 class="fs-4 fw-500 mb-4 description_main">
                           <!--{{$theatre_by_id->description}}-->
                           <input type="hidden" value="{{$theatre_by_id->description}}" id="description" />
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////// -->
        <div class="doubts-section mb-4 d-block d-md-none">
            <h5 class="text-center text-white fw-bold  mb-3">Have doubts?
            </h5>
            <div class="row g-2 flex-column">
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="" class="d-flex align-items-center text-decoration-none theme-color fw-500 lh-sm ">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1"
                                viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="42" width="42"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#558B2F"
                                    d="M15,40h23l6,6V25c0-2.2-1.8-4-4-4H15c-2.2,0-4,1.8-4,4v11C11,38.2,12.8,40,15,40z">
                                </path>
                                <path fill="#1B5E20"
                                    d="M28.8,32.8h-3.6l-0.7,2.1h-2.2l3.7-10h1.9l3.7,10h-2.2L28.8,32.8z M25.7,31.2h2.5L27,27.4L25.7,31.2z">
                                </path>
                                <path fill="#8BC34A"
                                    d="M33,25H10l-6,6V8c0-2.2,1.8-4,4-4h25c2.2,0,4,1.8,4,4v13C37,23.2,35.2,25,33,25z">
                                </path>
                                <path fill="#fff"
                                    d="M25.4,14.2c0,1-0.2,1.8-0.5,2.5c-0.3,0.7-0.7,1.3-1.3,1.7l1.7,1.3L24,20.9l-2.2-1.7c-0.2,0-0.5,0.1-0.8,0.1 c-0.6,0-1.2-0.1-1.8-0.3c-0.5-0.2-1-0.6-1.4-1c-0.4-0.4-0.7-1-0.9-1.6c-0.2-0.6-0.3-1.3-0.3-2.1v-0.4c0-0.8,0.1-1.5,0.3-2.1 c0.2-0.6,0.5-1.2,0.9-1.6c0.4-0.4,0.8-0.8,1.4-1c0.5-0.2,1.1-0.3,1.8-0.3c0.6,0,1.2,0.1,1.8,0.3c0.5,0.2,1,0.6,1.4,1 c0.4,0.4,0.7,1,0.9,1.6c0.2,0.6,0.3,1.3,0.3,2.1V14.2z M23.2,13.7c0-1.1-0.2-1.9-0.6-2.4c-0.4-0.6-0.9-0.8-1.6-0.8 c-0.7,0-1.3,0.3-1.6,0.8c-0.4,0.6-0.6,1.4-0.6,2.4v0.5c0,0.5,0.1,1,0.2,1.4c0.1,0.4,0.2,0.8,0.4,1c0.2,0.3,0.4,0.5,0.7,0.6 c0.3,0.1,0.6,0.2,0.9,0.2c0.7,0,1.3-0.3,1.6-0.8c0.4-0.6,0.6-1.4,0.6-2.5V13.7z">
                                </path>
                            </svg>
                            <span class="ms-2">Our predefined FAQs are incredibly thorough and address 99.99% of
                                questions you might have.</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="bg-warning p-2">
                        <a href="" class="d-flex align-items-center  text-decoration-none theme-color fw-500 lh-sm">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1"
                                viewBox="0 0 16 16" height="42" width="42" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.641 2.325c-1.497-1.5-3.488-2.325-5.609-2.325-4.369 0-7.925 3.556-7.925 7.928 0 1.397 0.366 2.763 1.059 3.963l-1.125 4.109 4.203-1.103c1.159 0.631 2.463 0.966 3.787 0.966h0.003c0 0 0 0 0 0 4.369 0 7.928-3.556 7.928-7.928 0-2.119-0.825-4.109-2.322-5.609zM8.034 14.525v0c-1.184 0-2.344-0.319-3.356-0.919l-0.241-0.144-2.494 0.653 0.666-2.431-0.156-0.25c-0.663-1.047-1.009-2.259-1.009-3.506 0-3.634 2.956-6.591 6.594-6.591 1.759 0 3.416 0.688 4.659 1.931 1.244 1.247 1.928 2.9 1.928 4.662-0.003 3.637-2.959 6.594-6.591 6.594zM11.647 9.588c-0.197-0.1-1.172-0.578-1.353-0.644s-0.313-0.1-0.447 0.1c-0.131 0.197-0.512 0.644-0.628 0.778-0.116 0.131-0.231 0.15-0.428 0.050s-0.838-0.309-1.594-0.984c-0.588-0.525-0.987-1.175-1.103-1.372s-0.013-0.306 0.088-0.403c0.091-0.088 0.197-0.231 0.297-0.347s0.131-0.197 0.197-0.331c0.066-0.131 0.034-0.247-0.016-0.347s-0.447-1.075-0.609-1.472c-0.159-0.388-0.325-0.334-0.447-0.341-0.116-0.006-0.247-0.006-0.378-0.006s-0.347 0.050-0.528 0.247c-0.181 0.197-0.694 0.678-0.694 1.653s0.709 1.916 0.809 2.050c0.1 0.131 1.397 2.134 3.384 2.991 0.472 0.203 0.841 0.325 1.128 0.419 0.475 0.15 0.906 0.128 1.247 0.078 0.381-0.056 1.172-0.478 1.338-0.941s0.166-0.859 0.116-0.941c-0.047-0.088-0.178-0.137-0.378-0.238z">
                                </path>
                            </svg>
                            <span class="ms-2"> Click here to connect with our intelligent WhatsApp ChatBot and Well
                                Trained Professional Support Agents.</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="" class="d-flex align-items-center text-decoration-none theme-color fw-500 lh-sm">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="42" width="42"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5"></path>
                                <path d="M3 10h18"></path>
                                <path d="M7 15h.01"></path>
                                <path d="M11 15h2"></path>
                                <path d="M16 19h6"></path>
                                <path d="M19 16l-3 3l3 3"></path>
                            </svg>
                            <span class="ms-2"> Concerned about changes in plans? Our Refund Policy has you
                                covered.</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="bg-warning p-2">
                        <a href="" class="d-flex align-items-center  text-decoration-none theme-color fw-500 lh-sm">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="42" width="42"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2">
                                </path>
                                <path d="M15 7h-6h1a3 3 0 0 1 0 6h-1l3 3"></path>
                                <path d="M9 10h6"></path>
                            </svg>
                            <span class="ms-2"> Unsure about our pricing? Take a look at this explainer.</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="bg-white p-2">
                        <a href="" class="d-flex align-items-center text-decoration-none theme-color fw-500 lh-sm">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                height="42" width="42" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M426.666 330.667a250.385 250.385 0 0 1-75.729-11.729c-7.469-2.136-16-1.073-21.332 5.333l-46.939 46.928c-60.802-30.928-109.864-80-140.802-140.803l46.939-46.927c5.332-5.333 7.462-13.864 5.332-21.333-8.537-24.531-12.802-50.136-12.802-76.803C181.333 73.604 171.734 64 160 64H85.333C73.599 64 64 73.604 64 85.333 64 285.864 226.136 448 426.666 448c11.73 0 21.334-9.604 21.334-21.333V352c0-11.729-9.604-21.333-21.334-21.333z">
                                </path>
                            </svg>
                            <span class="ms-2"> Want to have a call with us? Simply tap here to get connected.</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="fade whybuyus d-block d-md-none">
            <div>
                <div class="row gy-4 flex-column">
                    <div class="col">
                        <img src="{{URL::asset('assets/img/whychooseus_1.jpg')}}" class="d-block w-100 rounded20"
                            alt="...">
                    </div>
                    <div class="col">
                        <div class="fs-3 mb-4">
                            Affordable Private celebration Packages
                        </div>
                        <p>
                            Celebrate without breaking the bank! The Binge Town offers affordable packages that cater to
                            various budgets, ensuring that everyone can enjoy a premium private celebration without
                            compromising on quality.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="row gy-4 flex-column">
                    <div class="col">
                        <img src="{{URL::asset('assets/img/whychooseus_3.jpg')}}" class="d-block w-100 rounded20"
                            alt="...">
                    </div>
                    <div class="col">
                        <div class="fs-3 mb-4">
                            Surprises Galore – Balloon Decoration Extravaganza
                        </div>
                        <p>
                            Add a pop of joy to your celebrations with our exclusive balloon decorations. Our skilled
                            team ensures that your private theatre is adorned with vibrant balloons, creating a festive
                            and visually stunning atmosphere. It's the perfect backdrop for capturing those
                            Instagram-worthy moments!
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="row gy-4 flex-column">
                    <div class="col">
                        <img src="{{URL::asset('assets/img/whychooseus_4.jpg')}}" class="d-block w-100 rounded20"
                            alt="...">
                    </div>
                    <div class="col">
                        <div class="fs-3 mb-4">
                            Private theater with best service guarantee
                        </div>
                        <p>
                            At The Binge Town, customer satisfaction is our top priority. We take pride in being the
                            celebration venue with the best service. Join the ranks of our delighted customers who have
                            made us the highest rated private theater celebration space and rest assured about
                            exceptional celebration experiences. Your happiness is our success.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade exampleModal" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Short Duration Discount</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--<div class="modal fade" id="slotModal{{$sl->id}}" tabindex="-1" aria-labelledby="slotModalLabel{{$sl->id}}" aria-hidden="true">-->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="slotModalLabel{{$sl->id}}">Slot Details</h5>-->
<!--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
                    <!-- Slot details can go here -->
<!--                    <p><strong>Start Time:</strong> {{\Carbon\Carbon::createFromTimestamp(strtotime($sl->start_time))->format('h:i A')}}</p>-->
<!--                    <p><strong>End Time:</strong> {{\Carbon\Carbon::createFromTimestamp(strtotime($sl->end_time))->format('h:i A')}}</p>-->
<!--                    <p><strong>Day Part:</strong> -->
<!--                        @if($sl->daypart == 'M') Morning -->
<!--                        @elseif($sl->daypart == 'A') Afternoon -->
<!--                        @else Evening -->
<!--                        @endif-->
<!--                    </p>-->
                    <!-- You can add more slot information here -->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Book Now</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

$('.ms-auto1').text($('.available:not(:disabled)').length +' ' +'Slots Available' )

$('.description_main').html($('#description').val());

document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.available');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Remove 'selected' class from all buttons
            buttons.forEach(btn => btn.classList.remove('selected'));

            // Add 'selected' class to the clicked button
            this.classList.add('selected');
        });
    });

    // Prevent losing focus when clicking outside
    document.addEventListener('click', function(event) {
        const isButtonClick = event.target.closest('.available');
        if (!isButtonClick) {
            // Keep the selected class if the click is outside
            buttons.forEach(btn => {
                if (btn.classList.contains('selected')) {
                    btn.classList.add('selected');
                }
            });
        }
    });
});

    var extra_c = $('.extra_count').text().match(/\d+/)[0];
    // console.log(extra_c);
    if(extra_c > 1 ){
        // console.log('yes');
        $('.extra_count').text();
    }
    else{
        // console.log('no');
        $('.extra_count').text('Including Taxes |  No Extra Person .allowed');
    }
    
    $('.available').on('click', function() {
        $('.modal-body').text('');
    console.log('yes');
    $('#slot_time').val('');
    $('#slot_id').val('');
    $('#per_amount_hidden').val('');
    var total_count = $('.total_amount').text().match(/\d+/)[0];
    
    var slot_time = $(this).find('span').text();
    var slot_id = $(this).attr('data-id');
    var per_hidden = $(this).find('#per_hidden').val();
    // console.log(per_hidden);
    // console.log($(this).find('span').text());
    $('#slot_time').val(slot_time);
    $('#slot_id').val(slot_id);
    $('#per_amount_hidden').val(per_hidden);
    
    var result = Math.ceil((parseInt(total_count) * parseInt(per_hidden)) / 100);
    console.log(total_count);
    $('.modal-body').text(`Since you've booked a slot with a shorter duration, the price has been reduced from `+ + total_count +' to '+ + Math.ceil((parseInt(total_count) * parseInt(per_hidden)) / 100));
    
})
    // console.log(href_a.substr(0,34));
function getValue() {
    var branch_id = '{{$theatre_by_id->branch_id}}';
    // console.log(branch_id);
    
    var href_a  = $(location).attr("href");
    var sub = href_a.substr(0,34);
    if ($('#slot_time').val() == '') {
        alert('select time Slot');
    } else {
        // console.log('no`');
        localStorage.removeItem('name');
        localStorage.removeItem('calender');
        localStorage.removeItem('time');
        localStorage.removeItem('total');
        localStorage.removeItem('advance');
         localStorage.removeItem('slot');
         localStorage.removeItem('min_people');
          localStorage.removeItem('max_people');
          localStorage.removeItem('display_name');
          localStorage.removeItem('per_amount_hidden');
          
        // console.log('yes');
        var name = $('.slot_name').text();
        // console.log(name);
        var calender = $('#calendar-value').text();
        var advance_amount = $('#advance_amount').text();
        var total_amount = $('.total_amount').text();
        var total = total_amount.match(/\d+/)[0];
        var advance = advance_amount.match(/\d+/)[0];
        var total_seat = $('.seat-available').text().match(/\d+/)[0];
        var decoration_included = $('#decoration_included').val();
        var decoration_amount = $('#decoration_amount').val(); 
        var display_name_text = $('#display_name').val();
        var display_name = display_name_text.match(/\d+/)[0];
        var per_amount_hidden = $('#per_amount_hidden').val();
        // console.log(total+':'+advance);
        var time = $('#slot_time').val();
        // console.log(extra_c);
        var extra_count ='';
        if(extra_c == 0){
            // console.log('yes');
            extra_count = 0;
        }
        else{
            // console.log('No');
             extra_count = $('.extra_count').text().match(/\d+/)[0];
        }
        // console.log(time);
        localStorage.setItem('name', name);
        localStorage.setItem('calender', calender);
        localStorage.setItem('time', time);
        localStorage.setItem('total', total);
        localStorage.setItem('advance', advance);
        localStorage.setItem('total_seat',$('#min_people').val());
        localStorage.setItem('slot', total_seat);
        localStorage.setItem('extra_count', extra_count);
        localStorage.setItem('min_people',$('#min_people').val());
        localStorage.setItem('max_people',$('#max_people').val());
        localStorage.setItem('slot_id',$('#slot_id').val());
        localStorage.setItem('theatre_id',$('#theatre_id').val());
        localStorage.setItem('branch_id',branch_id);
        localStorage.setItem('decoration_included',decoration_included);
        localStorage.setItem('decoration_amount',decoration_amount);
        localStorage.setItem('display_name',display_name);
        localStorage.setItem('per_amount_hidden',per_amount_hidden);
        
        window.location.href = '{{ env('APP_URL') }}'+'overview';
    }
}
$('.proceed').on('click', getValue);
function goBack() {
  window.history.back()
}
</script>
@endsection