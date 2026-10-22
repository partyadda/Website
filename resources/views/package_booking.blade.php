@extends('includes.layout')

@section('title', $package->title)
@section('keyword', $package->SEO_keywords)
@section('description', $package->short_desc)

@section('content')
    {{-- Shared fonts, Bootstrap, Slick styles, icons, analytics, navbar and footer come from includes.layout. --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/package-booking.css') }}">

<style>
    .package-booking-page {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .package-booking-page input,
    .package-booking-page select,
    .package-booking-page button,
    .package-booking-page .btn {
        font-family: inherit;
        font-size: 14px;
    }

    .package-booking-page h1,
    .package-booking-page h2,
    .package-booking-page h3,
    .package-booking-page h4,
    .package-booking-page h5 {
        margin-bottom: 8px;
        font-family: inherit;
        font-weight: 700;
        line-height: 1.3;
    }

    .package-booking-page h1.fs-5 { font-size: clamp(20px, 3vw, 26px) !important; }
    .package-booking-page h2.fs-6 { font-size: 14px !important; font-weight: 400; }
    .package-booking-page h3.fs-6 { font-size: 16px !important; }
    .package-booking-page .fs-5,
    .package-booking-page .card-title { font-size: 18px !important; }
    .package-booking-page p { margin-bottom: 8px; font-size: 14px; line-height: 1.6; }
    .package-booking-page small { font-size: 12px; }
    .package-booking-page .row { --bs-gutter-x: 12px; --bs-gutter-y: 0; }
    .package-booking-page > .container-fluid { padding: 0 6px; }
    .package-booking-page .container1 { margin: 6px; }
    .package-booking-page .card-header,
    .package-booking-page .card-footer { padding: 8px; }
    .package-booking-page .card-body { padding: 10px; }
    .package-booking-page .form-label { margin: 0 0 4px; font-size: 13px; line-height: 1.5; }
    .package-booking-page .form-control,
    .package-booking-page .form-select { min-height: 40px; padding-top: 8px; padding-bottom: 8px; line-height: 1.5; }
    .package-booking-page .form-control { padding-left: 10px; padding-right: 10px; }
    .package-booking-page .form-select { padding-left: 10px; padding-right: 32px; }
    .package-booking-page .btn { padding: 8px 12px; line-height: 1.5; }
    .package-booking-page .btn-sm { padding: 6px 10px; font-size: 12px; }
    .package-booking-page .selection-wrapper-16 { gap: 10px; padding: 0; }
    .package-booking-page .selection-wrapper { margin: 0 6px 8px; padding: 4px; max-width: 100%; }
    .package-booking-page .selection-tile { padding: 4px; }
    .package-booking-page #booking_summary .list-group-item { padding: 8px 10px; font-size: 14px; }
    .package-booking-page #cake_conditions,
    .package-booking-page #addons_conditions { font-size: 12px; line-height: 1.6; }
    .package-booking-page #cake_conditions li,
    .package-booking-page #addons_conditions li { margin-bottom: 4px; }
    .package-booking-page #addons_conditions ul { margin: 4px 0 8px; padding-left: 18px; }
    .package-booking-page .modal-header,
    .package-booking-page .modal-body,
    .package-booking-page .modal-footer { padding: 10px 12px; }

    .package-booking-page .imageScale { object-fit: cover; width: 100%; aspect-ratio: 4 / 3; }
    .package-booking-page .dropbtn { border: none; cursor: pointer; }
    .package-booking-page .dropdown { position: relative; display: inline-block; }
    .package-booking-page .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 260px;
        max-width: calc(100vw - 24px);
        overflow: auto;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }
    .package-booking-page .dropdown-content.show { display: block; }

    @media (max-width: 767px) {
        .package-booking-page .container1 { margin: 4px; }
        .package-booking-page .card-body { padding: 8px; }
        .package-booking-page .selection-wrapper { margin-right: 4px; margin-left: 4px; }
    }
</style>

<div class="package-booking-page">
<div class="container-fluid">
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
    <div class="container1">
      <div class="row" style="margin-bottom:1px;">
        <!-- box-shadow: 0px 4px 10px #CCCCCC; border-radius: 5px; -->
        <div class="col-lg-12" style="margin-top:0; margin-bottom:1px;">
          <h1 class="fs-5 fw-bold">{{ $package->package_name }} Package</h1>
          @php
              $packageName = str_replace(" ","-", $package->package_name);
              $peopleallowed = $package->people_allowed;
              $advance_amount =  $package->advance_amount;
              $packagedetails = str_replace("<li>","%0A > ", $package->long_desc);
              $packagedetails = str_replace("</li>","", $packagedetails);
          @endphp
          <h2 class="fs-6 d-inline">{{ $package->short_desc }}</h2>
           <a href="https://api.whatsapp.com/send?text=Check this *{{$packageName}}* package at Partyadda:
%0A %0A {{$package->short_desc}}
%0A {{$packagedetails}}
%0APrice: {{$package->package_amount}} only for {{$peopleallowed}} people
%0A {{ route('package.booking', ['package_name' => $packageName,'package_id' => $package->id]) }}"
            target="_blank" title="Share on WhatsApp" class="btn btn-sm btn-secondary rounded-circle fs-8 ">
            <i class="fas fa-share-alt" ></i>
          </a>
          <!-- <span class="fs-5 fw-bold"> - {{ $package->theatre->name }} - ₹ {{ $package->package_amount }}</span> -->
          {{-- <div class="border-top"></div> --}}
        </div>
        <div class="col-lg-12" style="padding-left:0px;padding-right:0px; margin-top:0;">
          <div class="row" style="margin-bottom:8px;">
            <div class="col-lg-12" id="booking_details" style="margin-bottom:8px;">
              <form action="{{ route('agreement') }}" id="form_agreement" method="POST">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <input type="hidden" name="package_name" id="package_name" value="{{ $package->package_name }}">
                <input type="hidden" name="sub_total" id="agg_sub_total">
                <input type="hidden" name="advance" id="agg_advance">
                <input type="hidden" name="customer_id" id="agg_customer_id">
              </form>
              <form action="{{ url('package/booking/book_package') }}" id="form_package_booking_details" method="POST">
                @csrf
                <input type="hidden" name="package_id" id="package_id" value="{{ $package->id }}" required>
                <input type="hidden" name="package_name" id="package_name" value="{{ $package->package_name }}" required>
                <input type="hidden" name="branch_name" id="branch_name" value="{{ $package->branch->branch_name }}" required>
                <input type="hidden" name="branch_id" id="branch_id" value="{{ $package->branch_id }}" required>
                <input type="hidden" name="package_amount" id="package_amount" value="" required>
                <input type="hidden" name="advance_amount" id="advance_amount"
                  value="{{ $advance_amount}}" required>
                <input type="hidden" name="theatre_id" id="theatre_id" value="" required>
                <input type="hidden" name="slot_date" id="slot_date" value="" required>
                <input type="hidden" name="slot_id" id="slot_id" value="" required>
                <input type="hidden" name="slot_time" id="slot_time">
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
                        <button type="button" class="btn btn-success ms-auto" id="btn_book_now_top"
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
                      <div id="select_add_ons" style="display:none; text-align:center;">
                        <span class="fs-5 fw-bold">Add Ons</span>
                      </div>
                    </div>
                    <!-- card-body Starts -->
                    <div class="card-body" id="tab_container" style="margin-top:0;">
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
                              <div class="col-lg-5 mb-2 order-1 order-lg-1">
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
                                  {{$package->package_assets }}</span>
                                  @else
                                  <span id="theatre_span_{{ $package->theatre->id }}" style="display:none;">
                                  {{$package->theatre->theatre_assets }}
                                  </span>
                                  @endif
                                </div>

                                <!-- Slider Starts -->
                                <div id="theatreCarouselIndicators" class="carousel slide" data-bs-ride="carousel"
                                  style="margin-top:0;">
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
                              <div class="col-lg-4 mb-2 order-3 order-lg-2" style="margin-top:0;">
                                {{-- order-3 order-lg-2 --}}
                                <div class="row">
                                  <div class="col-lg-8 mb-2">
                                    <h3 style="display: inline;" class="fs-6">Choose a slot</h3>
                                    <div class="input-group">
                                      <input class="form-control" type="text" name="selected_date" id="selected_date" value="" placeholder="Select Date" readonly required />
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i> </span>
                                    </div>
                                  </div>
                                  <div class="col-lg-12 mb-2">
                                    <div class="row" style="margin-top:0;">
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
                                  <div style="margin-top:0;margin-bottom:8px;">
                                    <div class="row" style="font-size:12px;margin-top:0;">
                                      <div class="col-lg-6 mb-2">
                                        <label for="customer_full_name" class="form-label">Booking Person Name <font color="red">*</font></label>
                                        <input type="text" class="form-control" name="customer_full_name" style="margin-top:0;"
                                          id="customer_full_name" placeholder="Full Name" required minlength="3" maxlength="18">
                                      </div>
                                      <div class="col-lg-5 mb-2">
                                        <label for="customer_no_guest" class="form-label">No.Of Guests <font color="red">*</font></label>
                                        <select class="form-select" aria-label="No.Of Guests" name="customer_no_guest" style="margin-top:0;"
                                          id="customer_no_guest" required>
                                          <option value="2" selected>2</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Whatsapp email Details Ends -->
                                  <div class="row" style="font-size:12px;margin-top:0;">
                                    <div class="col-lg-6 mb-2">
                                      <label for="customer_ph_no" class="form-label">Whatsapp Number <font color="red">*</font></label>
                                      <input type="number" class="form-control" name="customer_ph_no" style="margin-top:0;" id="customer_ph_no" min="10" max="10" placeholder="Whatsapp Num" value="" required />
                                    </div>
                                    <div> <!-- Set for junk data -->
                                      <label for="customer_email" hidden class="form-label">Email ID<font color="red">*</font></label>
                                      <input type="email" class="form-control" hidden name="customer_email" style="margin-top:0;" id="customer_email"
                                        placeholder="Email ID" value="dummy@gmail.com" maxlength="30" />
                                    </div>
                                  </div>
                                  <!-- Occassion pERSON Details Starts -->
                                  <div class="row" style="font-size:12px;margin-top:0;">
                                    <div class="col-lg-6 mb-2" id="partner_name_div" style="display:
@if ($package->decoration->person1 != NULL && $package->decoration->person1 != "")
block
@else
none
@endif;">
                                      <label for="partner_name" class="form-label" style="margin-top:0;">
                                        <span id="partner_name_label">{{ $package->decoration->person1 }}</span>
                                        <font color="red">*</font>
                                      </label>
                                      <input type="text" class="form-control" name="partner_name" id="partner_name" style="margin-top:0;" placeholder="Type here" maxlength="12">
                                    </div>

                                    <div class="col-lg-6 mb-2" id="your_name_div" style="display:
@if ($package->decoration->person2 != NULL && $package->decoration->person2 != "")
block
@else
none
@endif;">
                                      <label for="your_name" class="form-label" style="font-size:12px;margin-top:0;"><span id="your_name_label">{{ $package->decoration->person2 }}</span>
                                        <font color="red">*</font>
                                      </label>
                                      <input type="text" class="form-control" name="your_name" id="your_name" style="margin-top:0;" placeholder="Type here" maxlength="12">
                                    </div>
                                  </div>
                                  <!-- Occassion pERSON Details eNDS -->

                                  <!-- Personal Details Ends -->
                                </div>

                              </div>

                              <!-- Starr of the description -->
                              <div class="col-lg-3 mb-2 order-2 order-lg-3" style="margin-top:0;">
                                {{-- order-1 order-lg-3 --}}
                                <h4 class="fs-4" style="display: inline;" >
                                <span style="padding-left:6px; padding-right:6px; padding-top:1px; padding-bottom:1px; "
                                class="btn btn-sm btn-light rounded-pill">
                                  <span style="text-align: left; background-color:yellow" class="fw-bolder ">
                                    ₹ {{ $package->package_amount }} only
                                  </span>
                                  for Upto {{ $peopleallowed}} people
                                </span>
                                </h4>
                                <!-- row-cols-2 row-cols-sm-2 row-cols-lg-2 g-3 -->
                                <div class="row">
                                  <div class="col-lg-12" style="margin-top:0;">
                                    <!-- Extra Person Info -->
                                    @if ($package->theatre->peopleallowed != $package->theatre->max_people)
                                    <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#333; font-size:11px;"><b>
                                        ₹{{ $package->theatre->extra_person_price }}</b> per extra person
                                    </span>
                                    @endif
                                    <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#333; font-size:11px;">
                                      Max {{ $package->theatre->max_people }} people
                                    </span>
                                  </div>
                                </div>
                                <div style="margin-top:0;margin-bottom:8px;">
                                  <span style="padding:30px">
                                    {!! $package->long_desc !!}
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
     <!-- google_review -->
                            <div class="row">
                        @if ($package->other_option != NULL)
                             <div class="col-lg-12">
                               <h6 class="d-inline small-heading">Compare Other Packages</h6>
                                <span class="tiny-text">
                                  {!! $package->other_option !!}
                                </span>
                              </div>
                        @endif

                         @if ($package->google_review != NULL)
                              <div class="col-lg-12"  style="margin-top:20px;">
                                 <h6>Customer Review</h6>
                                    <div>
                                        <blockquote class="blockquote text-center">
                                         <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i>
                                          {!! $package->google_review !!}
                                       </p>
                                        <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                        class="fas fa-star"></i> <i class="fas fa-star"></i>
                                     </p>
                                        </blockquote>
                                    </div>
                              </div>
                        @endif
                            </div>
                             <!-- google_review -->
                      </div>
                      <!-- Select Theatre Ends -->

                      <!-- Cakes Starts -->
                      <div class="tab d-none">
                        <div class="row" style="margin-top:0; ">
                          <div class="col-lg-12">
                            <div id="cake-error-alert" style="display: none;">
                              <div class="alert alert-danger" role="alert">
                                <span id="cake-error-message">Please select Cake</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12 mb-2 text-center">
                            <div class="selection-wrapper-16">
                    @isset($package->package_cakes)
  <div class="col-lg-12 mb-2 bg-light p-0">
    <b>Inclusion</b>
  </div>

@php
$randomIncludedCakes = $package->package_cakes
  ->where('included_in_package', '1')
  ->shuffle()
@endphp

  @foreach ($randomIncludedCakes as $pckCake)
      <label class="selection-wrapper mb-2">
        <input type="radio" class="selection-input" name="cake"
          id="cake_rb_{{ $pckCake->cake->id }}" value="{{ $pckCake->cake->id }}"
          data-cake-name="{{ $pckCake->cake->cakename }}" data-cake-id="{{ $pckCake->cake->id }}"
          data-cake-amount="{{ $pckCake->extra_amount }}" required />
        <span class="selection-tile">
          <img
            src="{{ URL::asset('assets/img/'.$pckCake->cake->asset->foldername.'/'.$pckCake->cake->asset->filename) }}"
            class="img-fluid" style="width: 10rem; min-height:9rem; max-height:10rem; border-radius: 10rem;" loading="lazy" />
        </span>
        <div class="text-center" style="margin-top: 6px; width:10rem;">
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
  @endforeach
  <div class="col-lg-12 mb-2 bg-light p-0" style="margin-top:0;">
    <b>Special</b>
  </div>
@php
$randomSpecialCakes = $package->package_cakes
  ->where('included_in_package', '0')
  ->shuffle()
@endphp

  @foreach ($randomSpecialCakes as $pckCake)
      <label class="selection-wrapper mb-2">
        <input type="radio" class="selection-input" name="cake"
          id="cake_rb_{{ $pckCake->cake->id }}" value="{{ $pckCake->cake->id }}"
          data-cake-name="{{ $pckCake->cake->cakename }}"
          data-cake-id="{{ $pckCake->cake->id }}"
          data-cake-amount="{{ $pckCake->extra_amount }}" required />
        <span class="selection-tile">
          <img
            src="{{ URL::asset('assets/img/'.$pckCake->cake->asset->foldername.'/'.$pckCake->cake->asset->filename) }}"
            class="img-fluid"
            style="width: 10rem; min-height:9rem; max-height: 10rem; border-radius: 10rem;"
            loading="lazy" />
        </span>
        <div class="text-center" style="margin-top: 6px; width:10rem;">
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
  @endforeach
@endisset
                            </div>
                          </div>
                          <div class="col-lg-6 mb-2 offset-lg-1" style="margin-top:0;">
                            <label for="name_on_cake_tab" class="form-label">Name on Cake</label>
                            <input type="text" class="form-control" name="name_on_cake_tab" id="name_on_cake_tab"
                              minlength="1" maxlength="12" placeholder="Enter name on cake">
                          </div>
                        </div>
                      </div>
                      <!-- Cakes Ends -->

                      <!-- AddOns Ends -->
                      <div class="tab d-none">
                        <div class="row" style="margin-top:0;">
                          <div class="col-lg-12 mb-2 text-center">
                            <div class="selection-wrapper-16">
                              @isset($package->package_addons)
                              <div class="col-lg-12 mb-2 bg-light p-0">
                                <b>Inclusion</b>
                              </div>

                              <div class="col-lg-12">
                                @foreach ($package->package_addons as $pckAddOn)
                                @if($pckAddOn->included_in_package == "1")
                                <label class="selection-wrapper">
                                  <input type="checkbox" class="selection-input" name="addon"
                                    id="addon_rb_{{ $pckAddOn->addon->id }}" value="{{ $pckAddOn->addon->id }}"
                                    data-addon-name="{{ $pckAddOn->addon->name }}" data-addon-id="{{ $pckAddOn->addon->id }}"
                                    data-addon-amount="{{ $pckAddOn->extra_amount }}" required
                                  @if($pckAddOn->included_in_package == "1")
                                  checked disabled
                                  @endif/>
                                  <span class="selection-tile @if($pckAddOn->included_in_package == " 1")
                                    selection-tile-disabled @endif">
                                    <img src="{{URL::asset('assets/img/'.$pckAddOn->addon->asset->foldername.'/'.$pckAddOn->addon->asset->filename) }}"
                                      class="img-fluid"
                                      style="width: 10rem; min-height:9rem; max-height: 10rem; border-radius: 10rem;"
                                      loading="lazy" />
                                  </span>
                                  <div class="text-center" style="margin-top: 6px; width:10rem;">
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

                              <div class="col-lg-12 mb-2 bg-light p-0" style="margin-top:0;">
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
                                  <div class="text-center" style="margin-top: 6px; width:10rem;">
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
                        <button type="button" class="btn btn-success ms-auto" id="btn_book_now"
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
            <div class="col-lg-3" id="booking_summary" style="border-width:0px; display:none; margin-bottom:8px;">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card" style="border-radius: 25px; border-width: initial;">
                    <div class="card-body">
                      <h5 class="card-title">Booking Summary</h5>
                        <span class="pkg_branch_theatre"></span>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <span id="pkg_base_price">Package Price</span>
                        <span style="float: right;"><b>₹</b> <b class="pkg_base_price"></b></span>
                      </li>
                      <li class="list-group-item" id="pkg_extra_guest_price_div" style="display: none;">
                        <span id="pkg_extra_guest_price">Extra Person Fee</span>
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
                      <div class="input-group mb-2" id="coupon_code_div">
                        <input class="form-control" type="text" name="coupon_code" id="coupon_code" value=""
                          placeholder="Apply Coupon Code" />
                        <button type="button" class="btn btn-secondary" id="button-coupon">Apply</button>
                      </div>
                      <div class="text-center">
                        <button type="button" class="btn btn-success" id="btn_book_now_summary">Book Now</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12" style="margin-top:0; vertical-align: text-bottom;">
                  <div id="cake_conditions">
                    <li class="font-size">
                      <span>Only eggless cakes are available. The cake images shown are for reference only, and the actual cake may differ slightly.</span>
                    </li>
                    <li class="">
                      <span>Party poppers and sparklers are not allowed.</span>
                    </li>
                    <li class="">
                      <span>Cake cutlery will be provided on request. You may ask the staff to pack any remaining cake for later.</span>
                    </li>
                    <li class="">
                      <span>Customised cakes can also be arranged by sharing a reference image with customer care.For now, please select the flavour only.</span>
                    </li>
                    <li class="">
                      <span>If you cancel, you may still pick up the cake by paying the applicable amount.</span>
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
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  @include('package-booking-js')
@endsection
