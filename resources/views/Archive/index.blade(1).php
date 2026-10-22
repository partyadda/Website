@extends('includes.layout')
@section('title','Celebrate birthdays, anniversaries, bride-to-be, kids birthdays, 1st birthday and mom-to-be moments with unforgettable experiences!')
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
<div class="row"
  style="background-image: linear-gradient(to bottom right, #34265c,#161125); padding-top:1px;padding-bottom:1px;">
  <marquee direction="left" loop="">
    <div style="color:yellow; font-size:22px;"> {{ $coupon_code->description }}, Use code <b>{{ $coupon_code->promocode
}}<b /></div>
  </marquee>
</div>
@endisset
<div class="row">
  <!-- Main banner Section -->
  <div class="main-banner">
    <!--  <div class="container d-inline-flex flex-row">
<h1 class="ityped fw-bold fs-4 text-dark">
</h1>
</div> -->
    @foreach($home_banner as $home_ban)
    <img src="{{URL::asset('assets/img/'.$home_ban->foldername.'/'.$home_ban->filename)}}" class="img-fluid w-100"
      loading="lazy" />
    @endforeach
  </div>
  <!-- Main banner Section -->
  <div class="my-4" id="book_now_section">
    @foreach($theatre_carousel->chunk(4) as $chunk)
    <div class="row gy-4">
      @foreach($chunk as $theatre)
        
        @if($theatre->branch_id == 1)
             <div class="col-md-3 px-md-2">
        @else
            <div class="col-md-4 px-md-2">
        @endif
          
          <!-- Updated column size to show 3 cards per row -->
          <div class="card bg-white">
            <div class="card-body px-0">
              <div class="theatre-slider">
                @foreach($theatre->assets as $asset)
                <div>
                  <div class="theatre-list position-relative">
                    <img src="{{$asset->image_url}}" class="img-fluid" alt="{{$asset->filename}}"
                      style="width:100%;height:340px;" />
                    <div class="btn-group btn-group-sm position-absolute" role="group"
                      style='top:-1px; left:12px; background-color: transparent;'>
                      <a href="{{$theatre->video_url}}" target="_blank" class="btn button-custom rounded-circle shadow" title="Watch Video">
                         <i class="fas fa-video"></i>
                      </a>
                 
                      <a href="https://api.whatsapp.com/send?text=Check out the details and lets make an online booking at: %0A {{ route('privatetheatre', ['name' => $theatre->name]) }} %0ATheater Name: {{$theatre->name}} %0ABase Price: {{$theatre->price}} %0AExtra person Price: {{$theatre->extra_person_price}} %0AScreen: {{$theatre->videodetails}}"
                        target="_blank" class="btn button-custom rounded-circle shadow" title="Share on WhatsApp">
                        {{-- <i class="fab 2fa fa-whatsapp"></i> --}}<i class="fas fa-share-alt"></i>
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="container align-items-center" style="margin-top:10px;">
                <div class="row">
                  <h5 style="margin-left:0px;" class="card-title float-start"><span
                      class="fs-6 fw-bold">{{$theatre->name}}</span></h5>
                </div>
                <div class="row" style="margin-top:-10px;">
                  <div class="col">
                    <span style="font-size:12px;">{{ $theatre->displayname }}</span>
                  </div>
                </div>
                
                <!-- packages start here -->
                @isset($theatre->packages)
                @if(count($theatre->packages) > 0)
                <div class="row">
                  <div class="col-lg-12"><b>Packages</b></div>
                </div>
                <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 g-2" style="margin-top:2px;">
                  @foreach($theatre->packages as $pckg)
                  @php
                  $packageName = str_replace(" ","-", $pckg->package_name);
                  @endphp
                  <div class="col" style="margin-top:6px;">
                    <a class="btn btn-outline-dark btn-sm rounded-pill w-100 py-2"
                      style="text-align: center; font-size:10px; padding:6px; width: 100%;"
                      href="{{ route('package.booking', ['package_name' => $packageName, 'package_id' => $pckg->id]) }}">
                        {{ $pckg->decoration->name }}</a>
                  </div>
                  @endforeach
                </div>
                
                <!-- Build you own start here -->

                <div class="row" style="margin-top:5px;">
                  <div class="col-lg-12">
                    <div class="row" style="margin-bottomp:6px;margin-top:10px; ">
                      <div class="col-lg-12"><b>Build Your Own</b> </div>
                    </div>
                    <div>
                      <div>
                        <a class="btn btn-sm  btn-outline-dark rounded-pill fw-bold"
                          style="text-align: center;  padding:3px; width: 50%;" 
                          href="{{ route('privatetheatre', ['name' => $theatre->name]) }}">₹ {{ $theatre->price }}</a>
                          for up to {{ $theatre->peopleallowed }} ppl
                      </div>
                    </div>
                    
                    <!-- Badges: Max People & Decoration -->
                    <div class="d-flex gap-2 mb-3 flex-wrap">
                      <span class="badge rounded-pill" style="background-color:#f0f0f0; color:#333; font-size:11px;">
                        Max {{ $theatre->max_people }} people
                      </span>
                      @if ($theatre->decoration_included == "1")
                        <span class="badge rounded-pill" style="background-color:#e6f4ea; color:#137333; font-size:11px;">
                          Decoration <b>Free</b>
                        </span>
                      @else
                        <span class="badge rounded-pill" style="background-color:#fff3cd; color:#856404; font-size:11px;">
                          Decoration <b>₹{{ $theatre->branchs->decoration_amount }}</b>
                        </span>
                      @endif
                       @if ($theatre->peopleallowed == $theatre->max_people)
                          <span class="text-center text-muted mb-3" style="font-size:12px;">More than {{ $theatre->peopleallowed }} people not allowed </span>
                      @else
                          <span class="text-center text-muted mb-3" style="font-size:12px;"><b>₹{{ $theatre->extra_person_price }}</b> per extra person after {{ $theatre->peopleallowed }} people </span>
                      @endif
                    </div>
                  </div>
                </div>
                @if($isMobile)
                {{-- <marquee scrollamount=3> --}}
                <div style="margin-top:5px; background-color: yellow; padding:-1px; border-radius: 5px; font-size:X-small; font-family: Arial, Helvetica, sans-serif;">
                  <b>Save upto 25%</b> with our all-in-one bundles including decorations, cake, fog entry, LED name display, welcome drinks, and more!
                </div>
                {{-- </marquee> --}}
                @endif
                @endif
                @endisset
                {{-- <div class="row" style="margin-top:5px;">
<span style="font-size:11px;">Refund eligible if canceled 72 hours in advance of slot time.</span>
</div> --}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
    @if(!$isMobile)
    <div class="container-fluid pt-3 py-2" style="margin-top:-30px; margin-bottom:-16px">
      <div style="background-color: yellow; padding:1px; border-radius: 5px;  font-size: 1.1em; font-family: Arial, Helvetica, sans-serif;">
        <span class="discount">
          <b>Save upto 25% </b>with our package bundles which includes decorations, cake, fog entry, LED name display, welcome drinks, and more!
        </span>
      </div>
    </div>
    @endif
    <!-- Services Slider Section -->
    
    <div class="container-fluid pt-3 py-2" style="margin-bottom:36px;">
    
      <div class="text-center mb-4">
        <!---<button class="btn btn-light rounded-pill px-4 py-2 mb-2">WHAT WE OFFER</button> -->
        <h2 class="fw-bold fs-1">Our Services</h2>
        We also provide decorations, cake, food & beverages, gifting items to make your celebration memorable
      </div>
    
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-5">
        <div class="col">
          <div class="card">
            <img src="{{URL::asset('assets/img/home/beverage.webp')}}" loading="lazy" class="card-img-top" alt="Beverage"
              loading="lazy">
            <div class="card-body">
              <h5 class="card-title text-center">Beverage</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="{{URL::asset('assets/img/home/cakes.webp')}}" loading="lazy" class="card-img-top" alt="Cakes"
              loading="lazy">
            <div class="card-body">
              <h5 class="card-title text-center">Cakes</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="{{URL::asset('assets/img/home/360degselfie.jpg')}}" loading="lazy" class="card-img-top" alt="Selfie point"
              loading="lazy">
            <div class="card-body">
              <h5 class="card-title text-center">Selfie point</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="{{URL::asset('assets/img/home/flowers.webp')}}" loading="lazy" class="card-img-top" alt="Flowers"
              loading="lazy">
            <div class="card-body">
              <h5 class="card-title text-center">Flowers</h5>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="{{URL::asset('assets/img/home/gifts.webp')}}" loading="lazy" class="card-img-top" alt="Gifts"
              loading="lazy">
            <div class="card-body">
              <h5 class="card-title text-center">Gifts</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- How it works Section -->
    <div class="container-fluid py-2" style="margin-top:10px; margin-bottom: -16px">
      <div class="text-center mb-4">
        <h2 class="fw-bold fs-1">How It Works</h2>
      </div>
      <div class="row text-center gy-3" style="margin-bottom: 30px;">
        <!-- Step 1 -->
        <div class="col-md-3">
          <div class="how-it-works-item d-flex align-items-center">
            <div class="icon">
              <img src="{{URL::asset('assets/img/theatre_Icon4how.png')}}" alt="Theatre Icon"
                class="img-fluid larger-icon">
            </div>
            <div class="text-right ms-auto position-relative">
              <h6 class="text-uppercase text-warning">Step#1</h6>
              <p class="text-white">Select Package</p>
              <a href="{{ url('/') }}#book_now_section" class="book-now"><i
                  class="fas fa-angle-double-right arrow-icon"></i>Book Now</a>
            </div>
          </div>
        </div>
        <!-- Step 3 -->
        <div class="col-md-3">
          <div class="how-it-works-item d-flex align-items-center">
            <div class="icon">
              <img src="{{URL::asset('assets/img/decoration_Icon4how.png')}}" alt="Decoration Icon"
                class="img-fluid larger-icon">
            </div>
            <div class="text-right ms-auto position-relative">
              <h6 class="text-uppercase text-warning">Step#2</h6>
              <p class="text-white">Select Decoration</p>
              <!-- Double Arrow Icon -->
              <a href="{{ url('/') }}#book_now_section" class="book-now"><i
                  class="fas fa-angle-double-right arrow-icon"></i>Book Now</a>
            </div>
          </div>
        </div>
        <!-- Step 2 -->
        <div class="col-md-3">
          <div class="how-it-works-item d-flex">
            <div class="icon">
              <img src="{{URL::asset('assets/img/timeslot_Icon4how.png')}}" alt="Timeslot Icon"
                class="img-fluid larger-icon">
            </div>
            <div class="text-right ms-auto position-relative">
              <h6 class="text-uppercase text-warning">Step#3</h6>
              <p class="text-white">Choose Date & Time</p>
              <a href="{{ url('/') }}#book_now_section" class="book-now"><i
                  class="fas fa-angle-double-right arrow-icon"></i> Book Now</a>
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
              <a href="{{ url('/') }}#book_now_section" class="book-now"><i
                  class="fas fa-angle-double-right arrow-icon"></i> Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonials Section -->
    <div class="container-fluid bg-dark" style="margin-top:-10px; margin-bottom: -16px">
      <div class="row">
        {{-- <div class="col-lg-3">
</div> --}}
        <div class="pt-2">
          <div class="text-center mb-1">
            <h2 class="fs-1 text-light">Testimonials</h2>
          </div>
          <div class="carousel-item text-center p-1 text-light">
            <blockquote class="blockquote text-center">
              <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i> Had been to the Opera one for a friend's surprise
                birthday party! It was amazing! The movie experience was sooo goooooood. The staff were really kind
                and helpful.</p>
              <br="">Sunflower
                <p class="client-review-stars">
                  <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                    class="fas fa-star"></i> <i class="fas fa-star"></i>
                </p </blockquote>
          </div>
          <div id="client-testimonial-carousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item text-center p-1  text-light">
                <blockquote class="text-center">
                  <p class="mb-0"><i class="fa fa-quote-left"></i>Last weekend, we hosted our daughter's birthday at Party Adda, AECS Layout. The ambiance and setup were ultimate. They have multiple theatres, and we chose the Opera, the biggest theatre with the screen, as we had around 23 guests, including kids. PartyAdda team was very supportive. They make the celebration special with arrangements like fog entry, cold fire entry, disco lights for dance, 360-degree selfie videos and the photographer captured all the best moments beautifully. They provide welcome drink and some little snacks like samosa/nuggets/French fries. They helped with a customised cake of our choice, and it was very delicious. They can also help with food catering at an additional cost.Overall, we enjoyed it to the core. This was a surprise for our daughter and her friends. They all enjoyed to the core. The kids jumped, danced, sang, screamed what not! We didn`t realise how the 3-hour slot went by. We had the best birthday celebrations, like a one-click order!</p>
                  <br />Divya Srinivas
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                      class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p </blockquote>
              </div>
              <div class="carousel-item text-center p-1 text-light">
                <blockquote class="text-center">
                  <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i> Thanks to Party Adda ❤️ . Your service was very much
                    appreciated . Decoration was lovely and hygienic theater . Everything was well arranged . Thanks ❤️
                  </p>
                  <br />Neha Asthana
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                      class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p </blockquote>
              </div>
              <div class="carousel-item text-center p-1 text-light">
                <blockquote class="blockquote text-center">
                  <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i> Excellent place to celebrate special occasions with
                    friends and family. Friendly staff. Neat and tidy place. Awesome experience with great time spent with
                    affordable cost ���</p>
                  <br />Venkatkishore Raju Chinna
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                      class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p </blockquote>
              </div>
              <div class="carousel-item text-center p-1 text-light">
                <blockquote class="blockquote text-center">
                  <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i>I must say, the experience was outstanding. Their
                    attention to detail, wide range of services, and exceptional customer service made the entire process
                    smooth and enjoyable. I highly recommend Party Adda to anyone looking for a hassle-free and memorable
                    event planning experience</p>
                  <br />V Nallamothula
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                      class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p </blockquote>
              </div>
              <div class="carousel-item active text-center p-1 text-light">
                <blockquote class="blockquote text-center">
                  <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i> strongly recommend to choose PartyAdda for your special
                    celebrations to make it more special.The decoration was excellent, best quality video and audio
                    experience. The private theater was simply awesome. We didn't even notice how we spent 2 hours. ...
                    ���❤️�</p>
                  <br>Chandan Kumar Raj
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                      class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p>
                </blockquote>
              </div>
              <div class="carousel-item text-center p-1  text-light">
                <blockquote class="blockquote text-center">
                  <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i> The vibe and the decoration are amazing for both family
                    and friends. Amazing place to celebrate any occasion.</p>
                  <br />Chandrankith  Sai Kalmat. P
                  <p class="client-review-stars">
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                      class="fas fa-star"></i> <i class="fas fa-star"></i>
                  </p </blockquote>
              </div>
              <div class="carousel-item text-center p-1 text-light">
                <blockquote class="blockquote text-center">
                  <p class="mb-0" style="font-size: 14px;"><i class="fa fa-quote-left"></i> Had been to the Opera one for a friend's surprise
                    birthday party! It was amazing! The movie experience was sooo goooooood. The staff were really kind
                    and helpful.</p>
                  <br="">Sunflower
                    <p class="client-review-stars">
                      <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                        class="fas fa-star"></i> <i class="fas fa-star"></i>
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
      {{-- <div class="col-lg-3">
</div> --}}
    </div>
  </div>
  
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'>
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    {
      {
        --$('#exampleModal1').removeClass('slick-initialized slick-slider');
        $('#openModel').on('click', function() {
          $('#exampleModal1').addClass('slick-initialized slick-slider');
          $('#exampleModal1').modal('show');
        }) --
      }
    }
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
      slidesPerView: 4,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },
    });
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
      url: "{{ url('index/city') }}",
      type: "GET",
      data: {
        "_token": "{{ csrf_token() }}",
        "city_id": city_id,
      },
      success: function(data) {
        $('#branch_id').append('<option>Select Branch</option>')
        $(data).each(function(key, value) {
          $('#branch_id').append('<option value=' + value.id + '>' + value.branch_name + '</option>')
        });
      }
    });
  })
</script>
@endsection