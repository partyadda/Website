<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Party Adda - Package Booking</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Microsharp Technologies, Bangalore  - https://www.microsharp.net">
  <meta property="og:title" content="Party Adda" />
  <meta property="og:description" content="Party Adda - India's Best Private Theatre " />
  <meta property="og:image" content="https://partyadda.com/TESTLARA/public/assets/img/logo.png" />

  <meta name="description" content="Partyadda, a private theater in marthahalli book now for celebrate your special occassions, screening your own content, short movies, cricket live streaming" />
  <meta name="Keywords" content="Private movie theater, birthday celebration, place for celebration, Private movie screening, private theater in bangalore, party venue, celebration venue, private theater in Marthahalli, Private theater Bangalore, Exclusive cinema experience, VIP theater Bangalore, Luxury cinema Bangalore, Personal cinema room, Home theater setup Bangalore, Custom theater experience, Private screening Bangalore, Boutique cinema Bangalore, Premium cinema experience" data-react-helmet="true" />
  <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
  <link rel="canonical" href="https://partyadda.com/booknow.php" />
  <meta name="author" content="Microsharp Technologies, Bengaluru - https://www.microsharp.net">
  <meta name="google-site-verification" content="" />
  <meta property="og:site_name" content="Partyadda">
  <meta property="og:title" content="Partyadda" />
  <meta property="og:description" content="Partyadda, a private theater in marthahalli book now for celebrate your special occassions, screening your own content, short movies, cricket live streaming" />
  <meta property="og:image" content="https://partyadda.com/resources/img/logo.png">
  <meta property="og:type" content="website" />
  <meta property="article:publisher" content="https://www.facebook.com/people/Party-Adda-Private-Theatre/61557507302516/" />
  <link rel="icon" type="image/png" href="images/favicon.png" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <link rel="stylesheet" href="{{URL::asset('assets/css/package-booking.css')}}">
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

      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
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

  <div class="container1" style="padding:30px;">
    <div class="row" style="margin-bottom:16px; box-shadow: 0px 4px 10px #CCCCCC; border-radius: 5px;">
      <div class="col-lg-12" style="margin-top:16px; margin-bottom:16px;">
        <span class="fs-5 fw-bold "></span>
      </div>
      <div class="col-lg-12" style="padding-left:20px;padding-right:20px;">
        <div class="row" style="margin-bottom:16px;">
          <div class="col-lg-8" id="booking_details" style="margin-bottom:16px;">
             <div class="vh-20">
              <div class="col-md-12">
                  
                <div class="border border-3 
                  @if(($is_paid ?? 0) ==  1)
                    border-success
                  @else
                    border-danger
                  @endif">
                </div>
                
                <div class="card  bg-white shadow p-5">
                  
                  <div class="mb-4 text-center">
                      <h1>
                      @if(($is_paid ?? 0) == 1)
                        Congratulations ! - {{ $customer->customer_name ?? '' }}
                      @else
                        Payment Unsuccessful!!
                      @endif
                    </h1> 
                      
                    <div id="payment_success" style="display: 
                      @if(($is_paid ?? 0) ==  1)
                        block;
                      @else
                        none;
                      @endif">
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                      </svg>
                    </div>
                    
                    <div id="payment_failed" style="display:
                      @if(($is_paid ?? 0) ==  1)
                        none;
                      @else
                        block;
                      @endif">
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                        <path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"> </path>
                        <path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z"></path>
                        <path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z"></path>
                      </svg>
                    </div>
                  </div>
                  
                  <div class="text-center">
<!--
Whats app link can have the details of the booking, date, slot, occassion, booking Person name, 
the icon can be reduced 

-->
                    @if(($is_paid ?? 0) == 1)
                      <p class="lead">Your slot has been booked successfully. </p>
                      <p>If you have any further questions about your booking, please don&#39;t hesitate to reach out to us on our WhatsApp number.
                      <a href="https://wa.me/+918217575597" target="_blank" aria-label="WhatsApp"><img
                        src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="25px; height: 25px;"/></a>
                      </p>
                    @else
                      <p>Please try again or contact our customer support team to explore other booking options tailored to your needs.
                      
                      <a href="https://wa.me/+918217575597" target="_blank" aria-label="WhatsApp"><img
                        src="{{URL::asset('assets/img/whatsapp-icon.png')}}" width="35px; height: 35px;"/></a>
                      </p>
                    @endif

                    <a class="btn btn-outline-success" href="{{ env('APP_URL') }}">Go to Homepage</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Booking Summary Starts -->
          <div class="col-lg-4" id="booking_summary" style="display:noned; margin-bottom:16px;">
            <div class="card" style="border-radius: 5px;">
              <div class="card-body">
                <h5 class="card-title">Booking Summary</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <span id="pkg_base_price">Package Price</span>
                  <span style="float: right;"><b>₹</b> 
                    <b class="pkg_base_price">{{ $booking_data->package_amount}}</b>
                  </span>
                </li>
                @php
                  $isShowExtraGuest = 0;
                  $no_of_guest = $booking_data->no_of_guest;
                  $allowed_no_of_guest = $booking_data->allowed_no_of_guest;
                  $extra_person_price = $booking_data->extra_person_price;

                  $extra_guest_label = "Extra Person Charges";
                  if($no_of_guest > $allowed_no_of_guest) {
                    $extraGuest = $no_of_guest - $allowed_no_of_guest;
                    $extra_guest_label = "Extra Person Charges (".$extraGuest."X".$extra_person_price.")";
                    $extra_person_total_price = $extraGuest*$extra_person_price;

                    $isShowExtraGuest = 1;
                  }
                @endphp
                @if($isShowExtraGuest == 1)
                <li class="list-group-item" id="pkg_extra_guest_price_div">
                  <span id="pkg_extra_guest_price">{{ $extra_guest_label }}</span>
                  <span style="float: right;"><b>₹</b> 
                    <b class="pkg_extra_guest_price">
                     {{ $extra_person_total_price }}
                    </b>
                  </span>
                </li>
                @endif
                <li class="list-group-item" id="pkg_cake_price_div">
                  <span id="pkg_cake_price">Cake <small>({{ $booking_data->cake_name }})</small></span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_cake_price">{{ $booking_data->cake_extra_amount }}</b></span>
                </li>
                @php
                  $isShowAddOn = 0;
                  $addOnTotalPrice = 0;
                  $addOns = "";
                @endphp
                @foreach ($booking_data->addon_data as $addon)
                  @php
                    $isShowAddOn = 1;
                    $addOnTotalPrice = $addOnTotalPrice + $addon->add_on_extra_amount;
                    $addOnExtraAmountText = "";
                    if($addon->add_on_extra_amount > 0) {
                      $addOnExtraAmountText = "(".$addon->add_on_extra_amount.")";
                    }
                    $addOns = $addOns."<br/><span class='text-secondary'><small>".$addon->addon_name."".$addOnExtraAmountText."</small></span>";
                  @endphp
                @endforeach
                @if($isShowAddOn == 1)
                <li class="list-group-item" id="pkg_addon_price_div">
                  <span id="pkg_addon_price">AddOns</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_addon_price">{{ $addOnTotalPrice }}</b></span>
                  <span id="add_on_list">
                    {!! $addOns !!}
                  </span>
                </li>
                @endif

                @if(($booking_data->coupon_code_amount ?? 0) > 0)
                <li class="list-group-item" id="pkg_coupon_amount_div">
                  <span id="pkg_coupon_amount">Coupon Applied</span>
                  <span style="float: right;"><b>-₹</b> <b class="pkg_coupon_amount">{{ $booking_data->coupon_code_amount }}</b></span>
                </li>
                @endif
               
                <li class="list-group-item">
                  <span id="pkg_sub_total_amount">Sub Total</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_sub_total_amount">{{ $booking_data->sub_total_amount }}</b></span>
                </li>
                <li class="list-group-item">
                  <span id="pkg_advance_amount">Payable Advance Amount</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_advance_amount">{{ $booking_data->advance_amount }}</b></span>
                </li>
                @if(($is_paid ?? 0) == 1)
                <li class="list-group-item">
                  <span id="pkg_paid_amount"><b class="text-success">Paid Amount</b></span>
                  <span style="float: right;">
                    <b class="pkg_paid_amount text-success">₹ {{ $paid_amount ?? '' }}</b>
                  </span>
                </li>
                @else
                <li class="list-group-item">
                  <span id="pkg_paid_amount"><b class="text-warning">Paid Amount</b></span>
                  <span style="float: right;">
                    <b class="pkg_paid_amount text-warning">₹ 0</b>
                  </span>
                </li>
                @endif
                <li class="list-group-item">
                  <span id="pkg_balance_amount">Balance Amount</span>
                  <span style="float: right;"><b>₹</b> <b class="pkg_balance_amount">{{ $booking_data->balance_amount }}</b></span>
                </li>
              </ul>
              
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
          Copyright &copy; <script>
            //document.write(new Date().getFullYear())
          </script>2024 Party Adda
        </div>
        <div class="col text-md-end">
          <a href="{{ env('APP_URL') }}refund" class="fw-bold text-white text-decoration-none" aria-label="Refund Policy" title="Refund Policy">
            Refund Policy
          </a>
          <a href="{{ env('APP_URL') }}terms" class="fw-bold text-white text-decoration-none" aria-label="Terms and Conditions" title="Terms and Conditions">
            Terms and Conditions
          </a>
          <a href="{{ env('APP_URL') }}privacy" class="fw-bold text-white text-decoration-none" aria-label="Privacy Policy" title="Privacy Policy">
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
</body>
</html>

