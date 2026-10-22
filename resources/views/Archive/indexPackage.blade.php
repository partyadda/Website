@extends('includes.layout')

@section('title','Private Theaters for Celebration and Surprises')
@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')
@section('content')
<style>
  #client-testimonial-carousel {
    min-height: 200px;
  }

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

@isset($coupon_code)
<div class="row" style="background-image: linear-gradient(to bottom right, #34265c,#161125); padding-top:8px;padding-bottom:8px;">
  <marquee direction="left" loop="">
    <div style="color:yellow; font-size:22px;"> {{ $coupon_code->description }}, Use code <b>{{ $coupon_code->promocode }}<b /></div>
  </marquee>
</div>
@endisset

<div class="row">
  
  <!-- Main banner Section -->
  <div class="main-banner">
    <div class="container d-inline-flex   flex-column">
      <h1 class="ityped fw-bold fs-1 text-white"></h1>
    </div>
    @foreach($home_banner as $home_ban)
    <img src="{{URL::asset('assets/img/'.$home_ban->foldername.'/'.$home_ban->filename)}}" class="img-fluid w-100" loading="lazy"/>
    @endforeach
  </div>
  <!-- Main banner Section -->

  <div class="my-4" id="book_now_section">
    @foreach($theatre_carousel->chunk(4) as $chunk)
      <div class="row gy-4">
        @foreach($chunk as $theatre)
        <div class="col-md-6">
          <!-- Updated column size to show 3 cards per row -->
          <div class="card rounded20 bg-white">
            <div class="card-body px-0">
              <div class="row">
                <div class="col-lg-3">
                  <p class="float-start">
                    <h5 style="margin-left:16px;" class="card-title">
                      <span class="fs-5 fw-bold">{{$theatre->name}}</span>
                    </h5>
                  </p>
                </div>  
                <div class="col-lg-9"><p style="margin-right:16px;margin-right:16px;" class="float-end">{{$theatre->displayname}}</p></div>  
              </div>
              <div class="theatre-slider">
                @foreach($theatre->assets as $asset)
                <div>
                  <div class="theatre-list position-relative">
                    <img src="{{$asset->image_url}}" class="img-fluid" alt="{{$asset->filename}}" style="width:100%;height:320px;" />
  
                    <div class="btn-group btn-group-sm position-absolute" role="group" style='top:-1px; left:12px; background-color: transparent;'>
                      <a href="{{$theatre->video_url}}" target="_blank" class="btn btn-secondary" title="Watch Video">
                        <i class="fas fa-video"></i>
                      </a>
                      <a href="https://api.whatsapp.com/send?text=Theater%20Name%3A%20*{{$theatre->name}}*%0ABase%20Price%3A%20*{{$theatre->price}}*%0AExtra%20person%20Price%3A%20*{{$theatre->extra_person_price}}*%0AScreen%3A%20*{{$theatre->videodetails}}*%0ASound%3A%20*{{$theatre->audiodetails}}*%0ALet%20us%20check%20out%20the%20pictures%20and%20book%20online%20at%3A%20{{ route('privatetheatre', ['name' => $theatre->name]) }}" target="_blank" class="btn btn-secondary" title="Share on WhatsApp">
                        <i class="fab 2fa fa-whatsapp"></i><i class="fas fa-share-alt"></i>
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
  
              <div class="container align-items-center" style="margin-top:10px;">
                <div class="row">
                  <div class="col">
                    <b>₹ {{ $theatre->price }}</b> for up to {{ $theatre->peopleallowed }} people
                  </div>
                </div>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 g-3" style="margin-top:-10px;">
                  <div class="col" style="margin-bottom: -10px;">
                    <button style="width: 100%; padding:2px; cursor: none; background-color:rgb(233, 238, 233)" class="btn btn-sm btn-light rounded-pill">
                      <span style="text-align: center; font-size:12px;">
                        Max {{ $theatre->max_people }} people
                      </span>
                    </button>
                  </div>
                  <div class="col" style="margin-bottom: -10px;">
                    <button style="width: 100%; padding:3px; cursor: none; background-color:rgb(233, 238, 233)" class="btn btn-sm btn-light rounded-pill">
                      <span style="text-align: center; font-size:12px;">
                        @if ($theatre->decoration_included == "1")
                          Decoration Included
                        @else
                          Decoration  <b>₹{{ $theatre->branchs->decoration_amount }}</b> extra
                        @endif
                      </span>
                    </button>
                  </div>
                

                  {{-- <div class="col-lg-4">
                    <div class="btn btn-light rounded-pill" style="text-align: center; font-size:12px; padding:6px; background-color:rgb(233, 238, 233)"> 
                      <b>₹{{ $theatre->price }}</b> for up to {{ $theatre->peopleallowed }} people
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="btn btn-light rounded-pill" style="text-align: center; font-size:12px; padding:6px; background-color:rgb(233, 238, 233)"> 
                      Max {{ $theatre->max_people }} people allowed
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="btn btn-light rounded-pill" style="text-align: center; font-size:12px; padding:6px; background-color:rgb(233, 238, 233)"> 
                      @if ($theatre->decoration_included == "1")
                        Decoration Included
                      @else
                        Decoration  <b>₹{{ $theatre->branchs->decoration_amount }}</b> extra
                      @endif
                    </div>
                  </div> --}}
                  {{-- <div class="col-lg-4">
                    <div class="btn btn-light rounded-pill" style="text-align: center; font-size:12px; padding:6px; background-color:rgb(233, 238, 233)"> 
                      @if ($theatre->peopleallowed == $theatre->max_people)
                        More than {{ $theatre->peopleallowed }} people not allowed
                      @else
                        <b>₹{{ $theatre->extra_person_price }}</b> per extra person
                      @endif
                     </div>
                  </div> --}}
                </div>
                <div class="row" style="margin-top:16px;">
                  <div class="col-lg-12"><b style="opacity:50%;">Packages</b></div>
                  <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-2 g-3" style="margin-top:-16px;">
                    <div class="col" style="margin-bottom: -10px;">
                      <a style="width: 100%; padding:5px;" href="https://partyadda.com/package/booking/1">
                        <span style="text-align: center; font-size:12px;">Couple Package</span>
                      </a>
                      <a style="width: 100%; padding:5px;" href="https://partyadda.com/package/booking/2">
                        <span style="text-align: center; font-size:12px;">Bride/Groom to be1</span>
                      </a>
                    </div>
                    {{-- <div class="col" style="margin-bottom: -10px;">
                      <a style="width: 100%; padding:3px; background-color:rgb(233, 238, 233)" class="btn btn-sm btn-light rounded-pill" href="https://partyadda.com/package/booking/2">
                        <span style="text-align: center; font-size:12px;">Bride/Groom to be</span>
                      </a>
                    </div> --}}
                  </div>
                </div>
                <div class="row" style="margin-top:16px; opacity:50%;">
                  <div class="col-lg-12"><b>Time slots</b></div>
                </div>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-lg-6 g-3" style="margin-top:-10px;">
                  @foreach($theatre->slots as $sl)
                  @php
                  $slotStartTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->start_time))->format('H:i'); // 24-hour format 
                  $slotEndTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->end_time))->format('H:i'); // 24-hour format 
                  @endphp
                  <div class="col" style="margin-bottom: -10px;">
                    <button style="width: 100%; cursor: none; background-color:rgb(233, 238, 233)" class="btn btn-sm btn-light rounded-pill">
                      <span style="font-size:12px;">&nbsp;&nbsp;{{$slotStartTime}} -</span><br><span style="font-size:12px;">{{$slotEndTime}}</span>
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
            </div>
          </div>
        </div>
        @endforeach
      </div>
    @endforeach
  </div>

  <!-- Services Slider Section -->
  <div class="container-fluid pt-3 py-2" style="background-color: #ebe5d4; margin-top: 30px;">
    <div class="text-center mb-4">
      <!---<button class="btn btn-light rounded-pill px-4 py-2 mb-2">WHAT WE OFFER</button> -->
      <h2 class="fw-bold fs-1">Our Services</h2>
      <p>We also provide decorations, cake, food & beverages, gifting items to make your celebration memorable</p>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" style="margin-bottom: 30px;">
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/beverage.png')}}" class="card-img-top" alt="Beverage" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Beverage</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/cakes.png')}}" class="card-img-top" alt="Cakes" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Cakes</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/flowers.png')}}" class="card-img-top" alt="Flowers" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Flowers</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{URL::asset('assets/img/home/gifts.png')}}" class="card-img-top" alt="Gifts" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Gifts</h5>
            <p class="card-text">
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- How it works Section -->
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

  <!-- Testimonials Section -->
  <div class="container-fluid py-2 bg-dark">
    <div class="row">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-6">
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
      <div class="col-lg-3">
      </div>
    </div>
  </div>

  {{-- 
  <a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal1" id="openModelBtn">Click to open Modal</a>
  <button type="button" class="btn btn-secondary" id="openModel">Open</button>

  <div id="modalHolder">
    <div class="modal fade exampleModal" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div> 
  --}}

</div>

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      {{-- $('#exampleModal1').removeClass('slick-initialized slick-slider');
      $('#openModel').on('click', function() {
        $('#exampleModal1').addClass('slick-initialized slick-slider');
        $('#exampleModal1').modal('show');
      }) --}}
    });

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

      if ($('#city_id').val() == "" && $('#branch_id').val() == "") {
        $('.select_now').addClass('disabled');
      } else {
        $('.select_now').removeClass('disabled');
      }
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
          , "city_id": city_id
        , }
        , success: function(data) {
          $('#branch_id').append('<option>Select Branch</option>')
          $(data).each(function(key, value) {
            $('#branch_id').append('<option value=' + value.id + '>' + value.branch_name + '</option>')
          });
        }
      });
    })

  </script>
@endsection

