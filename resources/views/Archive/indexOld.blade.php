@extends('includes.layout')
@section('title','Index')

@section('content')
<style>
  .service-style-two {
    position: relative;
    padding: 110px 0px;
    background-color: #ffca00;
    margin: 50px 0 50px 0;
  }

  .how-it-works-item {
    position: relative;
    padding: 20px;
    padding-top: 2px;
    background-color: #000;
    border-radius: 8px;
    /*transition: all 0.3s ease;*/
  }

  .how-it-works-item .larger-icon {
    width: 80px;
    /* Increase the size of the icons */
    height: 80px;
    object-fit: cover;
    margin-right: 10px;
    /* Ensure space between icon and text */
  }

  .how-it-works-item i.arrow-icon {
    font-size: 20px;
    color: white;
    right: 80px;

    /*transition: right 0.3s ease;*/
  }

  .how-it-works-item a.book-now {
    font-size: 16px;
    color: #ffca00;
    text-decoration: none;
    /*transition: right 0.3s ease;*/
    display: flex;
    gap: 6px;
    justify-content: center;
  }



  .arrow-icon {
    margin-top: 2px;
    /* Adjust the value as needed */
  }

  .book-now {
    margin-top: 2px;
    /* Adjust the value as needed */

  }

  #book_now_section .carousel-indicators {
    margin-bottom: -1.8rem !important;
  }

</style>

<!--<div class="top-strip text-center">
         Can't find your preferred slot? <a href="" class="btn-link fw-bold text-white">Join our waitlist</a> and we'll reach out to you
      </div>
      -->

@isset($coupon_code)
<div class="row" style="background-image: linear-gradient(to bottom right, #34265c,#161125); padding-top:8px;padding-bottom:8px;">
  <marquee direction="left" loop="">
    <div style="color:yellow; font-size:22px;"> {{ $coupon_code->description }}, Use code <b>{{ $coupon_code->promocode }}<b/></div>
  </marquee>
</div>
@endisset

<div class="row">
  <div class="main-banner">
    <div class="container d-inline-flex   flex-column">
      <h1 class="ityped fw-bold fs-1 text-white"></h1>
    </div>
    @foreach($home_banner as $home_ban)
    <img src="{{URL::asset('assets/img/'.$home_ban->foldername.'/'.$home_ban->filename)}}" class="img-fluid w-100" />
    @endforeach
  </div>
  <!--  -->
  <!--<div class="find-us py-md-5 pb-5">-->
  <!--   <div class="container">-->
  <!--       <div class="row gy-4">-->

  <!--<div class="col-md-6">-->
  <!--       <div class="form-group">-->
  <!--           <select id="city_id" class="form-select">-->
  <!--               <option value="">Select City</option>-->
  <!--               @foreach($city as $c)-->
  <!--               <option value="{{$c->city_id}}">{{$c->city_name}}</option>-->
  <!--               @endforeach-->
  <!--           </select>-->
  <!--       </div>-->
  <!--   </div>-->
  <!--   <div class="col-md-6">-->
  <!--       <div class="form-group">-->
  <!--           <select id="branch_id" class="form-select">-->
  <!--               <option value=""></option>-->
  <!--           </select>-->
  <!--       </div>-->
  <!--   </div>-->
  <!--   </div>-->
  <style>
    /* Basic styling for button and icons */
    /* Basic styling for button and icons */
    .social-button {
      position: absolute;
      padding: 10px 16px;
     /* background-color: #007bff;*/
      color: #fff;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      display: inline-block;
      bottom: 12px;
      right: 12px;
    }

    /* Hidden by default */
    .social-icons {
      display: none;
      position: absolute;
      bottom: 100%;
      left: 0;
      background-color: #fff;
      border-radius: 5px;
      padding: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Social icon styling */
    .social-icons a {
      margin: 0 5px;
      color: #007bff;
      text-decoration: none;
    }

    /* Show icons on hover for desktop */
    .desktop-hover .social-button:hover .social-icons {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    /* Show icons when clicked on mobile */
    .social-button.show-icons .social-icons {
      display: block;
    }

  </style>

  </style>

  <div class="my-4" id="book_now_section">

    <!--<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">-->
    <!-- Carousel indicators -->
    <!--<div class="carousel-indicators">-->
    <!--    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
    <!--    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
    <!--</div>-->

    <!-- Carousel inner -->
    <!--<div class="carousel-inner">-->
    @foreach($theatre_carousel->chunk(4) as $chunk)
    <!-- Chunk ensures 3 cards per slide -->
    <div class="row gy-4 ">
      @foreach($chunk as $theatre)
      <div class="col-md-6">
        <!-- Updated column size to show 3 cards per row -->
        <div class="card rounded20 bg-white">
          <div class="card-body px-0">
            <div class="row">
              {{-- <h5 class="card-title">{{$theatre->name}}</h5>
              <p class="ps-4 ms-auto">{{$theatre->displayname}}</p> --}}
              <div class="col-lg-3"><p class="float-start"><h5 style="margin-left:16px;" class="card-title">{{$theatre->name}}</h5></p></div>  
              <div class="col-lg-9"><p style="margin-right:16px;margin-right:16px;" class="float-end">{{$theatre->displayname}}</p></div>  
            </div>
            <div class="theatre-slider">
              @foreach($theatre->assets as $asset)
              <div>
                <div class="theatre-list position-relative">
                  {{-- <a href="{{$theatre->video_url}}" target="_blank" class="nav-link btn ms-auto button-custom rounded-pill px-3 px-lg-4 px-xxl-5 position-absolute" style='top:20px; left:20px'>
                    Sample Video
                  </a> --}}
                  {{-- <a href="{{$theatre->video_url}}" target="_blank" class="btn btn-light btn-sm position-absolute" style='top:12px; left:12px'><i class="fas fa-video"></i></a> --}}

                  {{-- <button class="social-button" onclick="toggleIcons(this)">
                    <a href="https://api.whatsapp.com/send?text=Theater%20Name%3A%20*{{$theatre->name}}*%0ABase%20Price%3A%20*{{$theatre->price}}*%0AExtra%20person%20Price%3A%20*{{$theatre->extra_person_price}}*%0AScreen%3A%20*{{$theatre->videodetails}}*%0ASound%3A%20*{{$theatre->audiodetails}}*%0ALet%20us%20check%20out%20the%20pictures%20and%20book%20online%20at%3A%20{{ route('privatetheatre', ['name' => $theatre->name]) }}" target="_blank"><i class="fab 2fa fa-whatsapp"></i></a>
                  </button> --}}
                  <img src="{{$asset->image_url}}" class="img-fluid" alt="{{$asset->filename}}" style="width:100%;height:320px;" />

                  <div class="btn-group btn-group-sm position-absolute" role="group" style='top:-1px; left:12px; background-color: transparent;'>
                    <a href="{{$theatre->video_url}}" target="_blank" class="btn btn-secondary" title="Watch Video">
                      <i class="fas fa-video"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=Theater%20Name%3A%20*{{$theatre->name}}*%0ABase%20Price%3A%20*{{$theatre->price}}*%0AExtra%20person%20Price%3A%20*{{$theatre->extra_person_price}}*%0AScreen%3A%20*{{$theatre->videodetails}}*%0ASound%3A%20*{{$theatre->audiodetails}}*%0ALet%20us%20check%20out%20the%20pictures%20and%20book%20online%20at%3A%20{{ route('privatetheatre', ['name' => $theatre->name]) }}" target="_blank" class="btn btn-secondary" title="Share on WhatsApp">
                      <i class="fab 2fa fa-whatsapp"></i><i class="fas fa-share-alt"></i>
                    </a>
                  </div>

                  {{-- <a class="social-button btn btn-light btn-sm" href="https://api.whatsapp.com/send?text=Theater%20Name%3A%20*{{$theatre->name}}*%0ABase%20Price%3A%20*{{$theatre->price}}*%0AExtra%20person%20Price%3A%20*{{$theatre->extra_person_price}}*%0AScreen%3A%20*{{$theatre->videodetails}}*%0ASound%3A%20*{{$theatre->audiodetails}}*%0ALet%20us%20check%20out%20the%20pictures%20and%20book%20online%20at%3A%20{{ route('privatetheatre', ['name' => $theatre->name]) }}" target="_blank">
                    {{-- <img src="{{URL::asset('assets/img/whatsapp.png')}}" style="width:36px;height:36px;" alt="Party Adda"  /> 
                    <i class="fas fa-share-alt" style="color:#00000;"></i>
                  </a> --}}

                </div>
              </div>
              @endforeach
            </div>

            <div class="container align-items-center" style="margin-top:10px;">
              <div class="row">
                <div class="col-lg-6">&#9675; <b>₹{{ $theatre->price }}</b> for up to {{ $theatre->peopleallowed }} people</div>
                <div class="col-lg-6">&#9675; Max {{ $theatre->max_people }} people </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  @if ($theatre->peopleallowed == $theatre->max_people)
                     &#9675; More than {{ $theatre->peopleallowed }} people not allowed
                  @else
                     &#9675; <b>₹{{ $theatre->extra_person_price }}</b> per extra person
                  @endif
                </div>
                <div class="col-lg-6">
                  @if ($theatre->decoration_included == "1")
                    &#9675; Decoration Included
                  @else
                    &#9675; Decoration  <b>₹{{ $theatre->branchs->decoration_amount }}</b> extra
                  @endif
                </div>
              </div>
              <div class="row" style="margin-top:10px; opacity:50%;">
                <div class="col-lg-12"><b>Available time slots</b></div>
              </div>
              <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-4 g-3" style="margin-top:2px;">
                @foreach($theatre->slots as $sl)
                @php
                //$slotStartTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->start_time))->format('h:i a'); // 12-hour format 
                //$slotEndTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->end_time))->format('h:i a'); // 12-hour format 

                $slotStartTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->start_time))->format('H:i'); // 24-hour format 
                $slotEndTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->end_time))->format('H:i'); // 24-hour format 
               
                @endphp
                <div class="col" style="margin-bottom: -10px;">
                  <button style="width: 100%; padding:0px; cursor: none;" class="btn btn-sm btn-secondary">
                    <span style="text-align: center; font-size:12px;">{{ $slotStartTime }} - {{ $slotEndTime }}</span>
                  </button>
                </div>
                @endforeach
              </div>

              <div class="row" style="margin-top:10px;">
                <div class="col-lg-12">
                  <a class="nav-link btn ms-auto button-custom rounded-pill px-2 px-lg-4 px-xxl-5" href="{{ route('privatetheatre', ['name' => $theatre->name]) }}" style="margin-top:16px;">Book Now</a>
                </div>            
              </div>
            </div>
            {{-- <div class="d-flex mt-5 card-labels align-items-center px-3" style="margin-top:16px;">
              <p class="fw-500 description_main">
                <!--<input type="hidden" value="{{$theatre->short_description}}" id="description" />-->
                {{$theatre->plain_description}}
                <a class="nav-link btn ms-auto button-custom rounded-pill px-2 px-lg-4 px-xxl-5" href="{{ route('privatetheatre', ['name' => $theatre->name]) }}" style="margin-top:16px;">Book Now</a>
              </p>
            </div> --}}
          </div>
        </div>
      </div>
      @endforeach
    </div>

    @endforeach

    <script>
      function toggleIcons(button) {
        // Hide any other open icons
        document.querySelectorAll('.social-button').forEach(btn => {
          if (btn !== button) {
            btn.classList.remove('show-icons');
          }
        });
        // Toggle icons for the clicked button
        button.classList.toggle('show-icons');
      }

      // Detect if device is mobile and apply relevant class
      if (window.matchMedia("(hover: none)").matches) {
        document.body.classList.add('mobile-click');
      } else {
        document.body.classList.add('desktop-hover');
      }

    </script>
    <!--</div>-->

    <!-- Carousel controls -->
    <!--<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">-->
    <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--    <span class="visually-hidden">Previous</span>-->
    <!--</button>-->
    <!--<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">-->
    <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
    <!--    <span class="visually-hidden">Next</span>-->
    <!--</button>-->
    <!--</div>-->
  </div>
  <!-- Services Slider Section -->
  <div class="container-fluid pt-3 py-2" style="background-color: #ebe5d4; margin-top: 30px;">
    <div class="text-center mb-4">
      <!---<button class="btn btn-light rounded-pill px-4 py-2 mb-2">WHAT WE OFFER</button> -->
      <h2 class="fw-bold fs-1">Our Services</h2>
      <p>We also provide decorations, cake, food & beverages, gifting items to make your celebration memorable</p>
    </div>

    <!-- Carousel with autoplay and dots for navigation -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" style="margin-bottom: 30px;">
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/beverage.png')}}" class="card-img-top" alt="Beverage">
          <div class="card-body">
            <h5 class="card-title">Beverage</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/cakes.png')}}" class="card-img-top" alt="Cakes">
          <div class="card-body">
            <h5 class="card-title">Cakes</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/flowers.png')}}" class="card-img-top" alt="Flowers">
          <div class="card-body">
            <h5 class="card-title">Flowers</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/gifts.png')}}" class="card-img-top" alt="Gifts">
          <div class="card-body">
            <h5 class="card-title">Gifts</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
    </div>


    {{-- <div class="responsive">
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/beverage.png')}}" class="img-fluid" alt="Decorations">
        <h5 class="mt-2">Beverage</h5>
      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/cakes.png')}}" class="img-fluid" alt="cakes">
        <h5 class="mt-2">Cakes</h pe-35>
      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/flowers.png')}}" class="img-fluid" alt="Cakes">
        <h5 class="mt-2">Flowers</h5>
      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/gifts.png')}}" class="img-fluid" alt="Food & Beverages">
        <h5 class="mt-2">Gifts</h5>
      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/cakes.png')}}" class="img-fluid" alt="Gifts">
        <h5 class="mt-2">Cakes</h5>
      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/flowers.png')}}" class="img-fluid" alt="Cakes">
        <h5 class="mt-2">Flowers</h5>
      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/gifts.png')}}" class="img-fluid" alt="Food & Beverages">
        <h5 class="mt-2">Gifts</h5>

      </div>
      <div class="pe-3">
        <img src="{{URL::asset('assets/img/home/beverage.png')}}" class="img-fluid" alt="Decorations">
        <h5 class="mt-2">Beverage</h5>
      </div>
    </div> --}}

    <!--<div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">-->

    <!-- Carousel Indicators (dots) -->
    <!--    <div class="carousel-indicators">-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>-->
    <!--        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="7" aria-label="Slide 8"></button>-->
    <!--    </div>-->

    <!--    <div class="carousel-inner">-->
    <!--        <div class="carousel-item active">-->
    <!--            <img src="{{URL::asset('assets/img/home/beverage.png')}}" class="img-fluid w-100" alt="Decorations">-->
    <!--            <h5 class="mt-2">Beverage</h5>-->
    <!--        </div>-->
    <!--        <div class="carousel-item">-->
    <!--             <img src="{{URL::asset('assets/img/home/cakes.png')}}" class="img-fluid w-100" alt="cakes">-->
    <!--                    <h5 class="mt-2">Cakes</h5>-->
    <!--        </div>            -->
    <!--        <div class="carousel-item">-->
    <!--            <img src="{{URL::asset('assets/img/home/flowers.png')}}" class="img-fluid w-100" alt="Cakes">-->
    <!--                    <h5 class="mt-2">Flowers</h5>-->
    <!--        </div>-->
    <!--        <div class="carousel-item">-->
    <!--             <img src="{{URL::asset('assets/img/home/gifts.png')}}" class="img-fluid w-100" alt="Food & Beverages">-->
    <!--                    <h5 class="mt-2">Gifts</h5>-->
    <!--        </div>-->
    <!--        <div class="carousel-item">-->
    <!--            <img src="{{URL::asset('assets/img/home/cakes.png')}}" class="img-fluid w-100" alt="Gifts">-->
    <!--                    <h5 class="mt-2">Cakes</h5>-->
    <!--        </div>-->
    <!--        <div class="carousel-item">-->
    <!--             <img src="{{URL::asset('assets/img/home/flowers.png')}}" class="img-fluid w-100" alt="Cakes">-->
    <!--                    <h5 class="mt-2">Flowers</h5>-->
    <!--        </div>-->
    <!--        <div class="carousel-item">-->
    <!--            <img src="{{URL::asset('assets/img/home/gifts.png')}}" class="img-fluid w-100" alt="Food & Beverages">-->
    <!--            <h5 class="mt-2">Gifts</h5>-->

    <!--        </div>-->
    <!--        <div class="carousel-item">-->
    <!--            <img src="{{URL::asset('assets/img/home/beverage.png')}}" class="img-fluid w-100" alt="Decorations">-->
    <!--            <h5 class="mt-2">Beverage</h5>-->
    <!--        </div>-->
    <!--    </div>-->

    <!-- Remove arrow controls -->
    <!--</div>-->
  </div>

  <div class="container-fluid py-2" style="background-color: #ebe5d4; margin-top: 30px; margin-bottom: 30px;">
    <div class="text-center mb-4">
      <h2 class="fw-bold fs-1">How It Works</h2>
    </div>
    <div class="row text-center gy-3" style="margin-bottom: 30px;">
      <!-- Step 1 -->
      <div class="col-md-3">
        <div class="how-it-works-item d-flex align-items-center">
          <div class="icon">
            <img src="{{URL::asset('assets/img/theatre_Icon4how.png')}}" alt="Theatre Icon" class="img-fluid larger-icon">
          </div>
          <div class="text-right ms-auto position-relative">
            <h6 class="text-uppercase text-warning">Step#1</h6>
            <p class="text-white">Select Theatre & Date</p>
            <a href="{{ url('/') }}#book_now_section" class="book-now"><i class="fas fa-angle-double-right arrow-icon"></i>Book Now</a>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-md-3">
        <div class="how-it-works-item d-flex">
          <div class="icon">
            <img src="{{URL::asset('assets/img/timeslot_Icon4how.png')}}" alt="Timeslot Icon" class="img-fluid larger-icon">
          </div>
          <div class="text-right ms-auto position-relative">
            <h6 class="text-uppercase text-warning">Step#2</h6>
            <p class="text-white">Choose Time Slot</p>
            <a href="{{ url('/') }}#book_now_section" class="book-now"><i class="fas fa-angle-double-right arrow-icon"></i> Book Now</a>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-md-3">
        <div class="how-it-works-item d-flex align-items-center">
          <div class="icon">
            <img src="{{URL::asset('assets/img/decoration_Icon4how.png')}}" alt="Decoration Icon" class="img-fluid larger-icon">
          </div>
          <div class="text-right ms-auto position-relative">
            <h6 class="text-uppercase text-warning">Step#3</h6>
            <p class="text-white">Select Decoration</p>
            <!-- Double Arrow Icon -->
            <a href="{{ url('/') }}#book_now_section" class="book-now"><i class="fas fa-angle-double-right arrow-icon"></i> Book Now</a>
          </div>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="col-md-3">
        <div class="how-it-works-item d-flex align-items-center">
          <div class="icon">
            <img src="{{URL::asset('assets/img/home/7.png')}}" alt="Payment & Enjoy Icon" class="img-fluid larger-icon">
          </div>
          <div class="text-right ms-auto position-relative">
            <h6 class="text-uppercase text-warning">Step#4</h6>
            <p class="text-white">Pay & Enjoy</p>
            <a href="{{ url('/') }}#book_now_section" class="book-now"><i class="fas fa-angle-double-right arrow-icon"></i> Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!--  Testimonials Starts -->
  <style>
    #client-testimonial-carousel {
      min-height: 200px;
    }

  </style>
  <script>
    window.console = window.console || function(t) {};

  </script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <br>
  <div class="row bg-dark ">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <div class="pt-3">
        <div class="text-center mb-4">
          <h2 class="fw-bold fs-1 text-light">Testimonials</h2>
        </div>
        <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item text-center p-4  text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i> I strongly recommend to choose party adda for your special celebrations. This was my last minute find while I was searching for private theatre for my daughter birthday celebration. Everything went so well - party decor and cake all are awesome even though it was last minute ask. Over all event they made it Hit.amazing experiance</p>
                <br />Vyshnavi Vyshu
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p </blockquote>
            </div>
            <div class="carousel-item text-center p-4 text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i> Thanks to Party Adda ❤️ . Your service was very much appreciated . Decoration was lovely and hygienic theater . Everything was well arranged . Thanks ❤️</p>
                <br />Neha Asthana
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p </blockquote>
            </div>
            <div class="carousel-item text-center p-4 text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i> Excellent place to celebrate special occasions with friends and family. Friendly staff. Neat and tidy place. Awesome experience with great time spent with affordable cost 🥳🥳🥳</p>
                <br />Venkatkishore Chinna
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p </blockquote>
            </div>
            <div class="carousel-item text-center p-4 text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i>I must say, the experience was outstanding. Their attention to detail, wide range of services, and exceptional customer service made the entire process smooth and enjoyable. I highly recommend Party Adda to anyone looking for a hassle-free and memorable event planning experience</p>
                <br />V Nallamothula
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p </blockquote>
            </div>
            <div class="carousel-item active text-center p-4 text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i> strongly recommend to choose PartyAdda for your special celebrations to make it more special.The decoration was excellent, best quality video and audio experience. The private theater was simply awesome. We didn't even notice how we spent 2 hours. ... 👍🎁🎂❤️🌍</p>
                <br>Chandan Raj
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p>
              </blockquote>
            </div>
            <div class="carousel-item text-center p-4  text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i> The vibe and the decoration are amazing for both family and friends. Amazing place to celebrate any occasion.</p>
                <br />Chandrankith Kalmat. P
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p </blockquote>
            </div>
            <div class="carousel-item text-center p-4 text-light">
              <blockquote class="blockquote text-center">
                <p class="mb-0"><i class="fa fa-quote-left"></i> Had been to the Opera one for a friend's surprise birthday party! It was amazing! The movie experience was sooo goooooood. The staff were really kind and helpful.</p>
                <br="">Sunflower
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p </blockquote>
            </div>
          </div>
          <ol class="carousel-indicators">
            <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
            <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    </div>
  </div>
  
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'></script>
<!--  Testimonials Ends -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $('.description_main').html($('#description').val());

  document.addEventListener('DOMContentLoaded', function() {
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

  $(document).ready(function() {


    var swiper = new Swiper('.mySwiper', {
      slidesPerView: 4
      , spaceBetween: 30
      , loop: true
      , pagination: {
        el: '.swiper-pagination'
        , clickable: true
      , }
      , navigation: {
        nextEl: '.swiper-button-next'
        , prevEl: '.swiper-button-prev'
      , }
      , breakpoints: {
        320: {
          slidesPerView: 1
          , spaceBetween: 10
        , }
        , 768: {
          slidesPerView: 2
          , spaceBetween: 20
        , }
        , 1024: {
          slidesPerView: 4
          , spaceBetween: 30
        , }
      , }
    , });
    // alert('yes');

    if ($('#city_id').val() == "" && $('#branch_id').val() == "") {
      // console.log('yes');
      $('.select_now').addClass('disabled');
    } else {
      //  console.log('No');
      $('.select_now').removeClass('disabled');
    }


    //     var branch = 1;
    //     $.ajax({
    //             url: "{{ url('index/branch') }}",
    //             type: "GET",
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 "branch" :  branch,

    //             },
    //             success: function(data) {

    //                 console.log(data);
    //                 // console.log(data['doneMessage']);
    //                 $(data).each(function(key, value) {

    //                     let selectNowUrl = `{{ route('privatetheatre', ['name' => ':name']) }}`.replace(':name', value.name);

    //                   var theatreInfo = '<div class="col-lg-4 col-sm-6">' +
    //     '<div class="card rounded20 bg-white">' +
    //     '<div class="card-body">' +
    //     '<h5 class="card-title">' + value.name + '</h5>' +
    //     '<p>' + value.displayname + '</p>' +
    //     '<div class="theatre-slider">';

    // // Add carousel items as individual divs inside the theatre-slider
    // $.each(value.assets, function(i, carousel) {
    //     theatreInfo += '<div>'+
    //                         '<div class="theatre-list">'+
    //                             '<img src="' + carousel.image_url + '" class="img-fluid rounded20" alt="' + carousel.filename + '"  style="width:467px;height:350px;" />'+
    //                         '</div>'+
    //                     '</div>';
    // });

    // theatreInfo += '</div>' + // Closing the theatre-slider div
    //     '<div class="d-flex flex-wrap mt-5 card-labels mb-4">' +
    //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
    //     '<img src="{{URL::asset('assets/img/youtube_icon.svg')}}" width="24" height="24" class="me-1"/>' +
    //     value.displayname +
    //     '</span>' +
    //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
    //     '<img src="{{URL::asset('assets/img/tool.png')}}" width="16" height="16" class="me-1"/>' +
    //     value.audiodetails +
    //     '</span>' +
    //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
    //     '<img src="{{URL::asset('assets/img/tool.png')}}" width="16" height="16" class="me-1"/>' +
    //     value.videodetails +
    //     '</span>' +
    //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
    //     '<img src="{{URL::asset('assets/img/tool.png')}}" width="16" height="16" class="me-1"/>' +
    //     value.displayname +
    //     '</span>' +

    //     '</div>' +
    //     '<a class="nav-link btn button-custom rounded-pill px-3 px-lg-4 px-xxl-5" href="' + selectNowUrl + '">Select Now</a>' +
    //     '</div>' +
    //     '</div>' +
    //     '</div>';
    //                 $('#book_now_section').append(theatreInfo);

    //                 $('.theatre-slider').last().slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     dots: true,
    //     speed: 300,
    //     infinite: true,
    //     autoplaySpeed: 5000,
    //     autoplay: true
    // });
    //         });
    //         //   $(data).each(function(key, value) {
    //         //     $('.card-title').text(value.name);
    //         // });


    //     }

    // });

  });

  $('#city_id').on('change', function() {
    // console.log($(this).val());
    $('#branch_id').html('');
    var city_id = $(this).val();
    $.ajax({
      url: "{{ url('index/city') }}"
      , type: "GET"
      , data: {
        "_token": "{{ csrf_token() }}"
        , "city_id": city_id,

      }
      , success: function(data) {
        // console.log(data);
        // console.log(data['doneMessage']);
        $('#branch_id').append('<option>Select Branch</option>')
        $(data).each(function(key, value) {
          // console.log(value.address);
          $('#branch_id').append('<option value=' + value.id + '>' + value.branch_name + '</option>')
        });


      }
    });
  })

  // $('#branch_id').on('change',function(){


  //     $('.select_now').removeClass('disabled');
  //      $('#book_now_section').html('');
  //     // console.log($(this).val());
  //     //  $('#branch_id').html('');
  //     var branch = 1;
  //     $.ajax({
  //             url: "{{ url('index/branch') }}",
  //             type: "GET",
  //             data: {
  //                 "_token": "{{ csrf_token() }}",
  //                 "branch" :  branch,

  //             },
  //             success: function(data) {

  //                 console.log(data);
  //                 // console.log(data['doneMessage']);
  //                 $(data).each(function(key, value) {

  //                     let selectNowUrl = `{{ route('privatetheatre', ['name' => ':name']) }}`.replace(':name', value.name);

  //                   var theatreInfo = '<div class="col-lg-3 col-sm-6">' +
  //     '<div class="card rounded20 bg-white">' +
  //     '<div class="card-body">' +
  //     '<h5 class="card-title">' + value.name + '</h5>' +
  //     '<p>' + value.displayname + '</p>' +
  //     '<div class="theatre-slider">';

  // // Add carousel items as individual divs inside the theatre-slider
  // $.each(value.assets, function(i, carousel) {
  //     theatreInfo += '<div>'+
  //                         '<div class="theatre-list">'+
  //                             '<img src="' + carousel.image_url + '" class="img-fluid rounded20" alt="' + carousel.filename + '"  style="width:300px;height:130px;" />'+
  //                         '</div>'+
  //                     '</div>';
  // });

  // theatreInfo += '</div>' + // Closing the theatre-slider div
  //     '<div class="d-flex flex-wrap mt-5 card-labels mb-4">' +
  //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
  //     '<img src="{{URL::asset('assets/img/youtube_icon.svg')}}" width="24" height="24" class="me-1"/>' +
  //     value.displayname +
  //     '</span>' +
  //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
  //     '<img src="{{URL::asset('assets/img/tool.png')}}" width="16" height="16" class="me-1"/>' +
  //     value.audiodetails +
  //     '</span>' +
  //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
  //     '<img src="{{URL::asset('assets/img/tool.png')}}" width="16" height="16" class="me-1"/>' +
  //     value.videodetails +
  //     '</span>' +
  //     '<span class="rounded20 border shadow p-2 fs-14 d-flex align-items-center">' +
  //     '<img src="{{URL::asset('assets/img/tool.png')}}" width="16" height="16" class="me-1"/>' +
  //     value.people_range +
  //     '</span>' +

  //     '</div>' +
  //     '<a class="nav-link btn button-custom rounded-pill px-3 px-lg-4 px-xxl-5" href="' + selectNowUrl + '">Select Now</a>' +
  //     '</div>' +
  //     '</div>' +
  //     '</div>';
  //                 $('#book_now_section').append(theatreInfo);

  //                 $('.theatre-slider').last().slick({
  //     slidesToShow: 1,
  //     slidesToScroll: 1,
  //     arrows: false,
  //     dots: true,
  //     speed: 300,
  //     infinite: true,
  //     autoplaySpeed: 5000,
  //     autoplay: true
  // });
  //                 });
  //                 //   $(data).each(function(key, value) {
  //                 //     $('.card-title').text(value.name);
  //                 // });


  //             }

  //         });

  // })
  // $('.theatre-slider').slick({
  //           slidesToShow: 1,
  //           slidesToScroll: 1,
  //           arrows: false,
  //           dots: true,
  //           speed: 300,
  //           infinite: true,
  //           autoplaySpeed: 5000,
  //           autoplay: true,
  //           // centerMode:true,
  //       });

</script>
@endsection
