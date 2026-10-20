<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Partyadda - Birthday, anniversaries, bride-to-be, kids birthday, first birthdays, and mom-to-be celebrations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />//
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <meta name="description"
    content="PartyAdda brings your celebrations to life with a private cinema experience! Celebrate birthdays, anniversaries, bachelorette parties (bride-to-be or groom-to-be), romantic dates, mom-to-be celebrations, or baby showers in style. Enjoy your favorite movies on a stunning big screen, surrounded by loved ones, DJ lights, selfie walls, and a 360-degree selfie booth." />
  <meta name="Keywords"
    content="birthday celebration, bride-to-be, mom-to-be, bachelorette parties, kids birtday, children birtday, 1st birthday, first birthday, place for celebration, private theater in bangalore, private movie theater, party venue, mini party hall, celebration venue, marthahalli, private theater, varthur, aecs layout, mahadevapura, itpl, munnekollal, binge watch, happy hours morning"
    data-react-helmet="true" />
  <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
  <link rel="canonical" href="https://partyadda.com/booknow.php" />
  <meta name="google-site-verification" content="" />
  <meta property="og:title" content="Celebrate anniversaries, bride-to-be moments, kids' milestones, first birthdays, and mom-to-be celebrations with joy!" />
  <meta property="og:description" content="Celebrate birthdays, anniversaries, bride-to-be, kids birthdays, 1st birthday and mom-to-be moments with unforgettable experiences!" />
  <meta property="og:site_name" content="Partyadda">
  <meta property="og:title" content="Birthday, anniversaries, bride-to-be moments, kids' milestones, first birthdays, and mom-to-be celebrations with joy".{{ $package->package_name }}  />
 
  <meta property="og:description"
    content="PartyAdda brings your celebrations to life with a private cinema experience! Celebrate birthdays, anniversaries, bachelorette parties (bride-to-be or groom-to-be), romantic dates, mom-to-be celebrations, or baby showers in style. Enjoy your favorite movies on a stunning big screen, surrounded by loved ones, DJ lights, selfie walls, and a 360-degree selfie booth." />
  <meta property="og:image" content="https://partyadda.com/resources/img/logo.png">
  <meta property="og:type" content="website" />
  <meta property="article:publisher"
    content="https://www.facebook.com/people/Party-Adda-Private-Theatre/61557507302516/" />
  <link rel="icon" type="image/png" href="images/favicon.png" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <link rel="stylesheet" href="{{URL::asset('assets/css/package-booking.css')}}">

  <style>
    .imageScale {
      /* Image is scaled to fill the container. Aspect ratio IS maintained */
      object-fit: cover;
      width: 100%;
      aspect-ratio: 4/3;
    }
    
    
    .dropbtn {
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 260px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.show {display: block;}

    
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg" aria-label="Fifth navbar example">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{URL::asset('assets/img/logo.png')}}" alt="Party Adda" width="74" height="74">
      </a>
     
      <a href="tel:+91 98457 40260" aria-label="Call us" class="nav-item text-decoration-none me-2">
        <img src="{{URL::asset('assets/img/phoneIcon.png')}}" alt="Party Adda Phone" style="width:14px;height:14px;">
            <span class="d-md-inline">9845740260</span>
        </a>
        <a href="tel:+91 82175 75597" aria-label="Call us" class="nav-item text-decoration-none me-2">
            <span class="d-md-inline">| 8217575597</span>
        </a>
	
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
        aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-md-center">
          <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('faq') }}">FAQs</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid border-top">
    <!-- Modal Starts -->
    <div class="modal fade" id="shortDurationModal" tabindex="-1" aria-labelledby="shortDurationModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="shortDurationModalLabel">Short Duration Discount</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body shortDurationModalBody">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Ends -->

    <div class="container1" style="margin:12px;">
      <div class="row" style="margin-bottom:1px;">
        <!-- box-shadow: 0px 4px 10px #CCCCCC; border-radius: 5px; -->
        <div class="col-lg-12" style="margin-top:16px; margin-bottom:1px;">
          <span class="fs-5 fw-bold">{{ $package->package_name }} Package</span>

          @php
          $packageName = str_replace(" ","-", $package->package_name);

          $peopleallowed = $package->theatre->peopleallowed;
          $advance_amount = 999;

          if ($package->id == 25  ||  $package->id == 17):
              $peopleallowed = 10;
              $advance_amount = 1499;
          endif;

          $packagedetails = str_replace("<li>","%0A > ", $package->long_desc);
            $packagedetails = str_replace("</li>","", $packagedetails);

          @endphp
          <a
            href="https://api.whatsapp.com/send?text=Check this *{{$packageName}}* package at Partyadda: 
%0A %0A {{$package->short_desc}} 
%0A {{$packagedetails}} 
%0APrice: {{$package->package_amount}} only for {{$peopleallowed}} people 
%0A {{ route('package.booking', ['package_name' => $packageName,'package_id' => $package->id]) }}"
            target="_blank" title="Share on WhatsApp" class="btn btn-sm btn-secondary rounded-circle">
            <i class="fas fa-share-alt"></i>
          </a>
          </br>
          <span style="font-size:16px;">{{ $package->short_desc }}</span>

          <!-- <span class="fs-5 fw-bold"> - {{ $package->theatre->name }} - ₹ {{ $package->package_amount }}</span> -->

          {{-- <div class="border-top"></div> --}}
        </div>
        <div class="col-lg-12" style="padding-left:0px;padding-right:0px; margin-top:10px;">
          <div class="row" style="margin-bottom:16px;">
            <div class="col-lg-12" id="booking_details" style="margin-bottom:16px;">

              <form action="{{ route('agreement') }}" id="form_agreement" method="POST">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <input type="hidden" name="sub_total" id="agg_sub_total">
                <input type="hidden" name="advance" id="agg_advance">
                <input type="hidden" name="customer_id" id="agg_customer_id">
              </form>

              <form action="{{ url('package/booking/book_package') }}" id="form_package_booking_details" method="POST">
                @csrf
                <input type="hidden" name="package_id" id="package_id" value="{{ $package->id }}" required>
                <input type="hidden" name="branch_id" id="branch_id" value="{{ $package->branch_id }}" required>
                <input type="hidden" name="package_amount" id="package_amount" value="" required>
                <input type="hidden" name="advance_amount" id="advance_amount"
                  value="{{ $advance_amount}}" required>
                <input type="hidden" name="theatre_id" id="theatre_id" value="" required>
                <input type="hidden" name="slot_date" id="slot_date" value="" required>
                <input type="hidden" name="slot_id" id="slot_id" value="" required>
                <input type="hidden" name="slot_short_duration_per" id="slot_short_duration_per" value="" required>
                <input type="hidden" name="customer_id" id="customer_id" value="" required>
                <input type="hidden" name="no_of_guest" id="no_of_guest" value="2" required>
                <input type="hidden" name="allowed_no_of_guest" id="allowed_no_of_guest" value="" required>
                <input type="hidden" name="max_no_of_guest" id="max_no_of_guest" value="" required>
                <input type="hidden" name="extra_person_price" id="extra_person_price" value="" required>
                <input type="hidden" name="decoration_id" id="decoration_id" value="{{ $package->decoration->id }}"
                  required>
                <input type="hidden" name="decoration_partner_name" id="decoration_partner_name" value="" required>
                <input type="hidden" name="decoration_your_name" id="decoration_your_name" value="" required>
                <input type="hidden" name="cake_id" id="cake_id" value="" required>
                <input type="hidden" name="cake_name" id="cake_name" value="">
                <input type="hidden" name="cake_extra_amount" id="cake_extra_amount" value="0" required>
                <input type="hidden" name="name_on_cake" id="name_on_cake" value="">
                <input type="hidden" name="addon_data" id="addon_data" value="">
                <input type="hidden" name="coupon_code_id" id="coupon_code_id" value="" required>
                <input type="hidden" name="coupon_code_used" id="coupon_code_used" value="" required>
                <input type="hidden" name="coupon_code_amount" id="coupon_code_amount" value="0" required>
                <input type="hidden" name="sub_total_amount" id="sub_total_amount" value="" required>
                <input type="hidden" name="balance_amount" id="balance_amount" value="" required>
              </form>
              <!-- Booking Section Starts -->
              <section>
                <div class="container1111">
                  <form class="card" style="border-radius: 0px; background-color: #FFFFFF;border-width: 0px;">
                    <div class="card-header" style="background-color: #FFFFFF; border-width: 1px;">
                      <div class="d-flex">

                        {{-- <span id="back_button_top" style="cursor: pointer;" onclick="back_top()">
&nbsp;<img src="{{URL::asset('assets/img/arrow_left.png')}}" loading="lazy" width="24" height="24" alt="Back"
                        loading="lazy"><br><b><small>Back</small></b>
                        </span> --}}
                        
                        <button type="button" id="back_button_top" class="btn btn-secondary" onclick="back_top()"
                          style="min-width: 100px;">Back</button>
                        <button type="button" id="next_button_top" class="btn btn-primary ms-auto" onclick="next_top()"
                          data-nav-type="0" style="min-width: 100px;">Next</button>
                        <button type="button" class="btn button-custom ms-auto" id="btn_book_now_top"
                          style="display: none;">Book Now</button>
                      </div>
                      <nav class="nav nav-pills nav-fill" style="display:none;">
                        <a class="nav-link tab-pills" href="javascript:void(0)">Select Theatre</a>
                        {{-- <a class="nav-link tab-pills" href="javascript:void(0)">Personal Details</a> --}}
                        {{-- <a class="nav-link tab-pills" href="javascript:void(0)">Occasion</a> --}}
                        <a class="nav-link tab-pills" href="javascript:void(0)">Cakes</a>
                        <a class="nav-link tab-pills" href="javascript:void(0)">AddOns</a>
                      </nav>
                      <!-- 
                        <div id="short_desc">
                        <span class="fs-5 fw-semibold">{!! $package->short_desc !!}</span>
                        <span style="float: right;" class="fs-8 fw-bold">
                        Just pay advance ₹ {{ $package->branch->advance_amount }} to book
                        </span> 
                        </div>
                        -->
                        
                      <div id="select_cake" style="display:none; text-align:center">
                        <span class="fs-5 fw-bold">Select the cake</span>
                      </div>
                      <div id="select_add_ons" style="display:none; text-center">
                        <span class="fs-5 fw-bold">Add Ons</span>
                      </div>
                    </div>
                    <!-- card-body Starts -->
                    <div class="card-body" id="tab_container" style="margin-top:-18px;">
                      <!-- Select Theatre Starts -->
                      <div class="tab d-none">
                        <div class="row">
                          <div class="col-lg-12">
                            <div id="theatre-slots-error-alert" style="display: none;">
                              <div class="alert alert-danger" role="alert">
                                <span id="theatre-slots-error-message">Please select theatre</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-5 mb-3 order-1 order-lg-1">
                                {{-- order-2 order-lg-1 --}}
                             
                              <div class="form-check form-check-inline" style="display:none;">
                                  
                                <input class="form-check-input" type="radio" name="theatre"
                                  id="theatre_rb_{{ $package->theatre->id }}" value="{{ $package->theatre->id }}"
                                  data-theatre-id="{{ $package->theatre->id }}"
                                  data-theatre-package-amount="{{ $package->package_amount }}"
                                  data-theatre-max-people="{{ $package->theatre->max_people }}"
                                  data-theatre-peopleallowed="{{ $peopleallowed}}"
                                  data-theatre-extra-guest-amount="{{ $package->theatre->extra_person_price }}"
                                  required>

                                <label class="form-check-label" for="theatre_rb_{{ $package->theatre->id }}">
                                    {{$package->theatre->name }}</label>

                                @if(isset($package->package_assets) && count($package->package_assets) > 0)
                                    <span id="theatre_span_{{ $package->theatre->id }}" style="display:none;"> 
                                     {{$package->package_assets }}
                                    </span>
                                @else
                                    <span id="theatre_span_{{ $package->theatre->id }}" style="display:none;"> 
                                    {{$package->theatre->theatre_assets }}
                                    </span>
                                @endif
                              </div>

                              <!-- Slider Starts -->
                              <div id="theatreCarouselIndicators" class="carousel slide" data-bs-ride="carousel"
                                style="margin-top: 10px;">
                                <div class="carousel-indicators">
                                  {{-- <button type="button" data-bs-target="#theatreCarouselIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#theatreCarouselIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#theatreCarouselIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button> --}}
                                </div>
                               
                                <div class="carousel-inner" id="carousel-inner-img-holder"
                                  style="box-shadow: 0px 4px 10px #CCCCCC; border-radius: 25px;">

                                  <!-- image holder -->

                                </div>
                                <button class="carousel-control-prev" type="button"
                                  data-bs-target="#theatreCarouselIndicators" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                  data-bs-target="#theatreCarouselIndicators" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                              <!-- Slider Ends -->
                            </div>
                            
                            <div class="col-lg-4 mb-3 order-3 order-lg-2" style="margin-top: 16px;">
                              {{-- order-3 order-lg-2 --}}
                              <div class="row">
                                <div class="col-lg-8 mb-3 offset-lg-1">
                                  <div class="input-group">
                                    <input class="form-control" type="text" name="selected_date" style="margin-top:-10px;font-size:14px;" id="selected_date" value="" placeholder="Select Date" readonly required />
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i> </span>
                                  </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                  <div class="row" style="margin-top:-0px;">
                                    <div id="spinner-div" class="col-sm-12 text-center" style="display: none;">
                                      <div class="spinner-border text-primary" role="status">
                                      </div>
                                    </div>
                                    <div id="time_slot_selection" class="col-sm-12">
                                      {{-- Dynamic Slot from package-booking-js getSlots() --}}
                                    </div>
                                  </div>
                                </div>
                                <!-- Personal Details Starts -->
                                <div style="margin-top:-0px;margin-bottom:-30px;">
                                    <div class="row" style="margin-top:-8px;">
                                    <div class="col-lg-6 mb-3">
                                      <label for="customer_full_name" style="font-size:12px;" class="form-label">Booking Person Name 
                                      <font color="red">*</font></label>
                                      <input type="text" class="form-control" name="customer_full_name" style="margin-top:-10px;font-size:12px;"
                                                id="customer_full_name" placeholder="Full Name" required minlength="3" maxlength="18">
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                      <label for="customer_no_guest"  style="font-size:12px;" class="form-label">No.Of Guests <font color="red">*</font></label>
                                      <select class="form-select" aria-label="No.Of Guests" name="customer_no_guest" style="margin-top:-10px;font-size:12px;"
                                        id="customer_no_guest" required>
                                        <option value="2" selected>2</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <!-- Whatsapp email Details Ends -->
                                <div class="row" style="margin-top:26px;">
                                  <div class="col-lg-6 mb-3">
                                    <label for="customer_ph_no" class="form-label">Whatsapp Number <font color="red">*</font></label>
                                    <input type="number" class="form-control" name="customer_ph_no" style="margin-top: -10px; font-size:12px;" id="customer_ph_no" min="10" max="10" placeholder="Whatsapp Num" value="" required />
                                  </div>
                                  <div> <!-- Set for junk data -->
                                    <label for="customer_email" hidden class="form-label">Email ID<font color="red">*</font></label>
                                    <input type="email" class="form-control" hidden name="customer_email" style="margin-top: -10px;font-size:12px;" id="customer_email"
                                      placeholder="Email ID" value="dummy@gmail.com" maxlength="30" />
                                  </div>
                                </div>

                                <!-- Occassion Person Details Starts -->
                                <div class="row" style="margin-top:10x;">
                                  <div class="col-lg-6 mb-3" id="partner_name_div" style="display:
                                    @if ($package->decoration->person1 != NULL && $package->decoration->person1 != "")
                                        block
                                    @else
                                        none
                                    @endif;">
                                    <label for="partner_name" class="form-label" style="margin-top:-10px;font-size:12px;">
                                      <span id="partner_name_label">{{ $package->decoration->person1}}</span><font color="red">*</font>
                                    </label>
                                    <input type="text" class="form-control" name="partner_name" id="partner_name" style="margin-top:-10px;font-size:14px;" placeholder="Type here" maxlength="12">
                                  </div>

                                  <div class="col-lg-6 mb-3" id="your_name_div" style="display:
                                    @if ($package->decoration->person2 != NULL && $package->decoration->person2 != "")
                                        block
                                    @else
                                        none
                                    @endif;">
                                    <label for="your_name" class="form-label" style="margin-top: -10px;">
                                        <span id="your_name_label">{{ $package->decoration->person2 }}</span>
                                      <font color="red">*</font>
                                    </label>
                                    <input type="text" class="form-control" name="your_name" id="your_name" style="margin-top:-10px;font-size:14px;" placeholder="Type here" maxlength="12">
                                  </div>
                                </div>
                                <!-- Personal Details Ends -->
                              </div>

                            </div>

                            <!-- Start of the description -->
                            <div class="col-lg-3 mb-3 order-1 order-lg-3" style="margin-top: 16px;">
                              {{-- order-1 order-lg-3 --}}
                              <span style="padding-left:6px; padding-right:6px; padding-top:1px; padding-bottom:1px; background-color:yellow" class="btn btn-sm btn-light rounded-pill">
                                <span style="text-align: left;" class="fw-bolder">
                                  ₹ {{ $package->package_amount }} only
                                </span>
                              </span>
                              for Upto {{ $peopleallowed}} people
                              
                              <!-- row-cols-2 row-cols-sm-2 row-cols-lg-2 g-3 -->
                              <div class="row-cols-2 row-cols-sm-2 row-cols-lg-2 g-3">
                                <div class="col-lg-4" style="margin-top:0px;">
                                  <span style="width: 100%; padding:0px; cursor: none; background-color:rgb(233, 238, 233)" 
                                  class="btn btn-sm btn-light rounded-pill">
                                    <span style="text-nowrap; font-size:12px;">Max {{ $package->theatre->max_people }} people</span>
                                  </span>
                                </div>

                                @if ($package->theatre->peopleallowed != $package->theatre->max_people)
                                <div class="col-lg-8" style="margin-top:0px;">
                                  <span style="width: 100%; padding:1px; cursor: none; background-color:rgb(233, 238, 233)" 
                                  class="btn btn-sm btn-light rounded-pill">
                                    <span style="text-align: center; text-nowrap; font-size:12px;">
                                      <b>₹ {{ $package->theatre->extra_person_price }}</b> per extra person
                                    </span>
                                  </span>
                                </div>
                                @endif
                              </div>

                              <div style="margin-top: -10px;margin-bottom: -16px;">
                                <span style="padding:10px">
                                  {!! $package->long_desc !!}
                                </span>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Select Theatre Ends -->

                    <!-- Cakes Starts -->
                    <div class="tab d-none">
                        
                      <div class="row" style="margin-top:16px; ">
                        <div class="col-lg-12">
                          <div id="cake-error-alert" style="display: none;">
                            <div class="alert alert-danger" role="alert">
                              <span id="cake-error-message">Please select Cake</span>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-12 mb-3 text-center">
                        
                          <div class="selection-wrapper-16">
                            @isset($package->package_cakes)
                            <div class="col-lg-12 mb-3 bg-light p-0">
                              <b>Inclusion</b>
                            </div>
                            @foreach ($package->package_cakes as $pckCake)
                            @if($pckCake->included_in_package == "1")
                            <label class="selection-wrapper mb-3">
                              <input type="radio" class="selection-input" name="cake"
                                id="cake_rb_{{ $pckCake->cake->id }}" value="{{ $pckCake->cake->id }}"
                                data-cake-name="{{ $pckCake->cake->cakename }}"
                                data-cake-id="{{ $pckCake->cake->id }}"
                                data-cake-amount="{{ $pckCake->extra_amount }}" required />
                              <span class="selection-tile">
                                <img
                                  src="{{URL::asset('assets/img/'.$pckCake->cake->asset->foldername.'/'.$pckCake->cake->asset->filename) }}"
                                  class="img-fluid"
                                  style="width: 10rem; min-height:9rem; max-height:10rem; border-radius: 10rem;"
                                  loading="lazy" />
                              </span>
                              <div class="text-center" style="margin-top: 12px; width:10rem;">
                                <small class="text-wrap">
                                  {{ $pckCake->cake->cakename }}
                                  <br />
                                  @if($pckCake->extra_amount > 0)
                                  <b>+ ₹ {{ $pckCake->extra_amount }}</b>
                                  @else
                                  <b>₹ 0</b>
                                  @endif
                                </small>
                              </div>
                            </label>
                            @endif
                            @endforeach

                            <div class="col-lg-12 mb-3 bg-light p-0" style="margin-top:16px;">
                              <b>Special</b>
                            </div>
                            @foreach ($package->package_cakes as $pckCake)
                            @if($pckCake->included_in_package == "0")
                            <label class="selection-wrapper mb-3">
                              <input type="radio" class="selection-input" name="cake"
                                id="cake_rb_{{ $pckCake->cake->id }}" value="{{ $pckCake->cake->id }}"
                                data-cake-name="{{ $pckCake->cake->cakename }}"
                                data-cake-id="{{ $pckCake->cake->id }}"
                                data-cake-amount="{{ $pckCake->extra_amount }}" required />
                              <span class="selection-tile">
                                <img
                                  src="{{URL::asset('assets/img/'.$pckCake->cake->asset->foldername.'/'.$pckCake->cake->asset->filename) }}"
                                  class="img-fluid"
                                  style="width: 10rem; min-height:9rem; max-height: 10rem; border-radius: 10rem;"
                                  loading="lazy" />
                              </span>
                              <div class="text-center" style="margin-top: 12px; width:10rem;">
                                <small class="text-wrap">
                                  {{ $pckCake->cake->cakename }}
                                  <br />
                                  @if($pckCake->extra_amount > 0)
                                  <b>+ ₹ {{ $pckCake->extra_amount }}</b>
                                  @else
                                  <b>₹ 0</b>
                                  @endif
                                </small>
                              </div>
                            </label>
                            @endif
                            @endforeach
                            
                            @endisset
                          </div>

                        </div>
                        <div class="col-lg-6 mb-3 offset-lg-1" style="margin-top:-16px;">
                          <label for="name_on_cake_tab" class="form-label">Name on Cake</label>
                          <input type="text" class="form-control" name="name_on_cake_tab" id="name_on_cake_tab"
                            minlength="1" maxlength="12" placeholder="Enter name on cake">
                        </div>
                      </div>
                    </div>
                    <!-- Cakes Ends -->

                    <!-- AddOns Ends -->
                    <div class="tab d-none">
                      <div class="row" style="margin-top:10px;">
                          
                        <div class="col-lg-12 mb-3 text-center">
                          <div class="selection-wrapper-16">
                            @isset($package->package_addons)
                            <div class="col-lg-12 mb-3 bg-light p-0">
                              <b>Inclusion</b>
                            </div>
                            
                            <div class="col-lg-12">
                              @foreach ($package->package_addons as $pckAddOn)
                              @if($pckAddOn->included_in_package == "1")
                              <label class="selection-wrapper">
                                <input type="checkbox" class="selection-input" name="addon"
                                  id="addon_rb_{{ $pckAddOn->addon->id }}" value="{{ $pckAddOn->addon->id }}"
                                  data-addon-name="{{ $pckAddOn->addon->name }}"
                                  data-addon-id="{{ $pckAddOn->addon->id }}"
                                  data-addon-amount="{{ $pckAddOn->extra_amount }}" required
                                  @if($pckAddOn->included_in_package == "1")
                                checked disabled
                                @endif/>
                                <span class="selection-tile @if($pckAddOn->included_in_package == " 1")
                                  selection-tile-disabled @endif">
                                  <img
                                    src="{{URL::asset('assets/img/'.$pckAddOn->addon->asset->foldername.'/'.$pckAddOn->addon->asset->filename) }}"
                                    class="img-fluid"
                                    style="width: 10rem; min-height:9rem; max-height: 10rem; border-radius: 10rem;"
                                    loading="lazy" />
                                </span>
                                <div class="text-center" style="margin-top: 12px; width:10rem;">
                                  <small class="text-wrap">
                                    {{ $pckAddOn->addon->name }}
                                    <br />
                                    @if($pckAddOn->extra_amount > 0)
                                    <b>+ ₹ {{ $pckAddOn->extra_amount }}</b>
                                    @else
                                    <b>₹ 0</b>
                                    @endif
                                  </small>
                                </div>
                              </label>
                              @endif
                              @endforeach
                            </div>

                            <div class="col-lg-12 mb-3 bg-light p-0" style="margin-top:16px;">
                              <b>Extra</b>
                            </div>
                            <div class="col-lg-12">
                              @foreach ($package->package_addons as $pckAddOn)
                              @if($pckAddOn->included_in_package == "0")
                              <label class="selection-wrapper">
                                <input type="checkbox" class="selection-input" name="addon"
                                  id="addon_rb_{{ $pckAddOn->addon->id }}" value="{{ $pckAddOn->addon->id }}"
                                  data-addon-name="{{ $pckAddOn->addon->name }}"
                                  data-addon-id="{{ $pckAddOn->addon->id }}"
                                  data-addon-amount="{{ $pckAddOn->extra_amount }}" required
                                  @if($pckAddOn->included_in_package == "1")
                                checked disabled
                                @endif/>
                                <span class="selection-tile @if($pckAddOn->included_in_package == " 1")
                                  selection-tile-disabled @endif">
                                  <img
                                    src="{{URL::asset('assets/img/'.$pckAddOn->addon->asset->foldername.'/'.$pckAddOn->addon->asset->filename) }}"
                                    class="img-fluid"
                                    style="width: 10rem; min-height:9rem; max-height:10rem; border-radius: 10rem;"
                                    loading="lazy" />
                                </span>
                                <div class="text-center" style="margin-top: 12px; width:10rem;">
                                  <small class="text-wrap">
                                    {{ $pckAddOn->addon->name }}
                                    <br />
                                    @if($pckAddOn->extra_amount > 0)
                                    <b>+ ₹ {{ $pckAddOn->extra_amount }}</b>
                                    @else
                                    <b>₹ 0</b>
                                    @endif
                                  </small>
                                </div>
                              </label>
                              @endif
                              @endforeach
                            </div>
                            @endisset
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- AddOns Ends -->

                </div>
                <!-- card-body Ends -->

                <!-- card-footer Starts -->
                <div class="card-footer" style="background-color: #FFFFFF; border-width: 0px;">
                  <div class="d-flex">
                    {{-- <span id="back_button" style="cursor: pointer;" onclick="back_top()">
&nbsp;<img src="{{URL::asset('assets/img/arrow_left.png')}}" loading="lazy" width="24" height="24" alt="Back"
                    loading="lazy"><br><b><small>Back</small></b>
                    </span> --}}
                    <button type="button" id="back_button" class="btn btn-secondary" onclick="back()"
                      style="min-width: 100px;">Back</button>

                    <button type="button" id="next_button" class="btn btn-primary ms-auto" onclick="next()"
                      data-nav-type="0" style="min-width: 100px;">Next</button>
                    <button type="button" class="btn button-custom ms-auto" id="btn_book_now"
                      style="display: none;">Book Now</button>
                  </div>
                </div>
                <!-- card-footer Ends -->
                </form>
            </div>
            </section>
            <!-- Booking Section Ends -->
          </div>
          <!-- Booking Summary Starts -->
          <div class="col-lg-3" id="booking_summary" style="border-width:0px; display:none; margin-bottom:16px;">
            <div class="row">
              <div class="col-lg-12">
                <div class="card" style="border-radius: 25px; border-width: initial;">
                  <div class="card-body">
                    <h5 class="card-title">Booking Summary</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <span id="pkg_base_price">Package Price</span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_base_price"></b></span>
                    </li>
                    <li class="list-group-item" id="pkg_extra_guest_price_div" style="display: none;">
                      <span id="pkg_extra_guest_price">Extra Person Charges</span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_extra_guest_price">0</b></span>
                    </li>
                    <li class="list-group-item" id="pkg_cake_price_div" style="display: none;">
                      <span id="pkg_cake_price">Cake</span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_cake_price">0</b></span>
                    </li>
                    <li class="list-group-item" id="pkg_addon_price_div" style="display: none;">
                      
                      <span id="pkg_addon_price">AddOns </span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_addon_price">0</b></span>
                        <span id="add_on_list"></span>
                      
                    </li>
                    <li class="list-group-item" id="pkg_coupon_amount_div" style="display: none;">
                      <span id="pkg_coupon_amount">Coupon Applied</span>
                      <span style="float: right;"><b>-₹</b> <b class="pkg_coupon_amount"></b></span>
                    </li>
                    <li class="list-group-item">
                      <span id="pkg_sub_total_amount">Sub Total</span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_sub_total_amount"></b></span>
                    </li>
                    <li class="list-group-item">
                      <span id="pkg_advance_amount">Payable Advance Amount</span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_advance_amount"></b></span>
                    </li>
                    <li class="list-group-item">
                      <span id="pkg_balance_amount">Balance Amount</span>
                      <span style="float: right;"><b>₹</b> <b class="pkg_balance_amount"></b></span>
                    </li>
                  </ul>
                  <div class="card-body">
                    <div class="input-group mb-3" id="coupon_code_div">
                      <input class="form-control" type="text" name="coupon_code" id="coupon_code" value=""
                        placeholder="Apply Coupon Code" />
                      <button type="button" class="btn btn-secondary" id="button-coupon">Apply</button>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn button-custom" id="btn_book_now_summary">Book Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12" style="margin-top:16px; vertical-align: text-bottom;">
                <div id="cake_conditions">
                  <li class="font-size">
                    <span>Only eggless cakes are available. Cake images are for reference only; the actual cake may look different. </span>
                  </li>
                  <li class="">
                    <span>Party poppers and sparklers are not allowed.</span>
                  </li>
                  <li class="">
                    <span>Cutlery for the cake is available if needed. You can ask the staff to pack the remaining cake so you can enjoy it later.</span>
                  </li>
                  <li class="">
                    <span>You can order a customised cake—just share an image with customer care. For now, simply choose the flavour.</span>
                  </li>
                  <li class="">
                    <span>If you cancel, you can still pick up the cake by paying the right amount.</span>
                  </li>
                </div>

                <div id="addons_conditions">
                  Let the staff know when you want:
                  <ul>
                    <li><strong>Fog Entry</strong> — during entry or cake cutting (lasts a few minutes).</li>
                    <li><strong>360 Selfie Booth</strong> setup.</li>
                    <li><strong>DJ Lights</strong> — available for 30 minutes during your slot*.</li>
                    <li><strong>Mascot Costume</strong> — available for 20 minutes, worn by someone from your group*.</li>
                    This helps them arrange everything smoothly!
                  </ul>

                  <li class="font-size">
                    <span>Customers need to bring their own printed photos. For printing help, contact customer care.</span>
                  </li>

                </div>
              </div>
            </div>
          </div>
          <!-- Booking Summary Ends -->
        </div><!-- Row -->
      </div>
    </div>
  </div>
  </div>

  <!-- Nav Footer Starts -->
  <div class="footer-lower text-white">
    <div class="container">
      <div class="row gy-3">
        <div class="col-md-7">
          Copyright &copy;<script>
            //document.write(new Date().getFullYear())
          </script>2024 Party Adda
        </div>
        <div class="col text-md-end">
          <a href="{{ env('APP_URL') }}refund" class="fw-bold text-white text-decoration-none"
            aria-label="Refund Policy" title="Refund Policy">
            Refund Policy
          </a>
          <a href="{{ env('APP_URL') }}terms" class="fw-bold text-white text-decoration-none"
            aria-label="Terms and Conditions" title="Terms and Conditions">
            Terms and Conditions
          </a>
          <a href="{{ env('APP_URL') }}privacy" class="fw-bold text-white text-decoration-none"
            aria-label="Privacy Policy" title="Privacy Policy">
            Privacy Policy
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Nav Footer Ends -->

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  @include('package-booking-js')
</body>

</html>