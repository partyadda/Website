<nav class="navbar navbar-expand-lg" aria-label="Fifth navbar example">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{URL::asset('assets/img/logo.webp')}}" alt="Party Adda" width="74" height="74">
        </a>
       
      
        <a class="nav-link" href="{{ url('/branch/aecslayout')}}">AECS Layout</a> 
        <a class="nav-link" href="{{ url('/branch/jpnagar')}}">JP Nagar</a>
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
                <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('services') }}">Our Services</a></li>-->
                <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About Us</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="mybookings">My Bookings</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="{{ url('gallery') }}">Gallery</a></li> -->
                <li class="nav-item"><a class="nav-link" href="{{ url('faq') }}">FAQs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('blog') }}">Blog</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="{{ url('pricing') }}">Pricing</a></li> -->
                <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact Us</a></li>
                
                @if(Request::is('/') || Request::is('services') || Request::is('about') || Request::is('gallery') || Request::is('faq') || Request::is('refund') || Request::is('privacy') || Request::is('terms') || Request::is('contact') || Request::is('pricing') || Request::is('faq') || Request::is('gallery') || Request::is('about') || Request::is('blog'))
                <li class="nav-item ms-md-3">
                    <a class="nav-link btn button-custom rounded-pill px-3 px-lg-4 px-xxl-5" href="{{ url('/') }}#book_now_section">Book Now</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>