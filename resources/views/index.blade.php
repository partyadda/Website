@extends('includes.layout')
@section('title','Private Theatre Celebrations in Bangalore | PartyAdda')

@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')

@section('description','PartyAdda offers private theatre celebrations in Bangalore for birthdays, anniversaries, baby showers, surprise parties, and bride-to-be celebrations with customized packages and online booking.')

@section('content')

<!-- Shared stylesheets are loaded by includes.layout. -->
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
    }
    .how-it-works-item .larger-icon {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-right: 10px;
    }
    .how-it-works-item i.arrow-icon {
        font-size: 20px;
        color: white;
        right: 80px;
    }
    .how-it-works-item a.book-now {
        font-size: 16px;
        color: #ffca00;
        text-decoration: none;
        display: flex;
        gap: 6px;
        justify-content: center;
    }
    .arrow-icon {
        margin-top: 2px;
    }
    .book-now {
        margin-top: 2px;
    }
    #book_now_section .carousel-indicators {
        margin-bottom: -1.8rem !important;
    }
    /* ============================================
          CARD MODERN STYLING
          ============================================ */
    .card {
        border-radius: 20px !important;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }
    .card-img-top {
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
        object-fit: cover;
    }
    /* ============================================
          THEATRE SLIDER STYLES
          ============================================ */
    .theatre-slider {
        position: relative;
        width: 100%;
    }
    .theatre-slider .slick-slide {
        outline: none;
    }
    .theatre-slider .slick-slide img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        display: block;
    }
    .theatre-slider .slick-dots {
        bottom: 10px;
        z-index: 10;
    }
    .theatre-slider .slick-dots li button:before {
        color: white;
        font-size: 10px;
        opacity: 0.5;
    }
    .theatre-slider .slick-dots li.slick-active button:before {
        color: #ffca00;
        opacity: 1;
    }
    .theatre-slider img {
        max-width: 100%;
        height: auto;
        display: block;
    }
    .theatre-slider:not(.slick-initialized) .slick-slide:not(:first-child) {
        display: none;
    }
    /* ============================================
          5-IMAGE GALLERY - UNIFIED 2-COLUMN LAYOUT
          FOR ALL DEVICES (Mobile, Tablet, Laptop, Desktop)
          Structure:
          +-----------------+-----------------+
          |                 |      Img2       |
          |     Img1        |    (Row 1)      |
          |   (Row 1-2)     +-----------------+
          |                 |      Img4       |
          |                 |    (Row 2)      |
          +-----------------+-----------------+
          |     Img3        |      Img5       |
          |    (Row 3)      |    (Row 3)      |
          +-----------------+-----------------+
          ============================================ */
    .gallery-grid-5 {
        display: grid;
        /* Force exactly 2 columns of equal width everywhere */
        grid-template-columns: 1fr 1fr;
        /* Default height for mobile (smaller rows) */
        grid-template-rows: 160px 160px 160px;
        gap: 10px;
        max-width: 900px; /* Good max width for this layout */
        margin: 0 auto;
        padding: 0 10px;
    }
    /* --- PRECISE CELL PLACEMENT --- */
    /* Img 1: Tall Left (Spans Row 1 & 2) */
    .gallery-item-5[data-position="1"] {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
        height: 100%;
    }
    /* Img 2: Top Right (Row 1) */
    .gallery-item-5[data-position="2"] {
        grid-column: 2 / 3;
        grid-row: 1 / 2;
    }
    /* Img 4: Middle Right (Row 2) */
    .gallery-item-5[data-position="4"] {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }
    /* Img 3: Bottom Left (Row 3) */
    .gallery-item-5[data-position="3"] {
        grid-column: 1 / 2;
        grid-row: 3 / 4;
    }
    /* Img 5: Bottom Right (Row 3) */
    .gallery-item-5[data-position="5"] {
        grid-column: 2 / 3;
        grid-row: 3 / 4;
    }
    /* --- RESPONSIVE ROW HEIGHTS --- */
    /* Tablet (iPad, etc.) */
    @media (min-width: 768px) {
        .gallery-grid-5 {
            gap: 12px;
            padding: 0 15px;
            /* Increase row height for tablets */
            grid-template-rows: 220px 220px 220px;
        }
    }
    /* Laptop / Desktop */
    @media (min-width: 1024px) {
        .gallery-grid-5 {
            gap: 15px;
            padding: 0 20px;
            /* Full height for desktop screens */
            grid-template-rows: 240px 240px 240px;
        }
    }
    /* ============================================
          GALLERY ITEM STYLING & FITTING
          ============================================ */
    .gallery-item-5 {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, #f0f0f0 0%, #e8e8e8 100%);
    }
    .gallery-item-5:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }
    .gallery-image-5 {
        width: 100%;
        height: 100%;
        display: block;
        /* KEY: Fills the grid cell completely */
        object-fit: cover;
        object-position: center;
        transition: transform 0.4s ease, opacity 0.3s ease;
        animation: imageFadeIn 0.4s ease-in-out;
    }
    .gallery-item-5:hover .gallery-image-5 {
        transform: scale(1.08);
    }
    @keyframes imageFadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
    /* Overlay */
    .gallery-overlay-5 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 5;
    }
    .gallery-item-5:hover .gallery-overlay-5 {
        opacity: 1;
    }
    @media (max-width: 767px) {
        .gallery-item-5:active .gallery-overlay-5 {
            opacity: 1;
        }
    }
    /* Play Button */
    .gallery-play-btn-5 {
        background-color: #ffca00;
        border: none;
        border-radius: 50%;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    .gallery-play-btn-5:hover {
        transform: scale(1.15);
        background-color: #ffd700;
    }
    .gallery-play-btn-5:active {
        transform: scale(1.05);
    }
    .gallery-play-btn-5 i {
        color: #000;
        font-size: 22px;
    }
    @media (max-width: 767px) {
        .gallery-play-btn-5 {
            width: 50px;
            height: 50px;
        }
        .gallery-play-btn-5 i {
            font-size: 18px;
        }
    }
    @media (min-width: 768px) and (max-width: 1023px) {
        .gallery-play-btn-5 {
            width: 56px;
            height: 56px;
        }
        .gallery-play-btn-5 i {
            font-size: 20px;
        }
    }
    /* ============================================
          LIGHTBOX MODAL STYLES
          ============================================ */
    .lightbox-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        overflow: hidden;
        animation: fadeIn 0.3s ease;
    }
    .lightbox-content {
        margin: auto;
        display: block;
        max-width: 90%;
        max-height: 90%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 8px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease;
    }
    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10000;
        transition: color 0.3s ease, transform 0.2s ease;
        user-select: none;
    }
    .lightbox-close:hover {
        color: #ffca00;
        transform: rotate(90deg);
    }
    .lightbox-close:active {
        transform: rotate(90deg) scale(0.9);
    }
    .lightbox-prev,
    .lightbox-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 202, 0, 0.8);
        color: #000;
        font-size: 30px;
        font-weight: bold;
        border: none;
        padding: 15px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        z-index: 10000;
        user-select: none;
    }
    .lightbox-prev { left: 20px; }
    .lightbox-next { right: 20px; }
    .lightbox-prev:hover,
    .lightbox-next:hover {
        background-color: #ffca00;
        transform: translateY(-50%) scale(1.1);
    }
    .lightbox-prev:active,
    .lightbox-next:active {
        transform: translateY(-50%) scale(0.95);
    }
    @media (max-width: 767px) {
        .lightbox-content {
            max-width: 95%;
            max-height: 80%;
        }
        .lightbox-prev,
        .lightbox-next {
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .lightbox-prev { left: 10px; }
        .lightbox-next { right: 10px; }
        .lightbox-close {
            font-size: 30px;
            top: 10px;
            right: 15px;
        }
    }
    @media (min-width: 768px) and (max-width: 1023px) {
        .lightbox-content {
            max-width: 85%;
            max-height: 85%;
        }
        .lightbox-prev,
        .lightbox-next {
            font-size: 26px;
            padding: 12px 18px;
        }
        .lightbox-close {
            font-size: 36px;
        }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
    body.lightbox-open {
        overflow: hidden;
    }
    .gallery-image-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #ffca00;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        z-index: 1;
    }
    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
    .gallery-image-5[src=""],
    .gallery-image-5:not([src]) {
        background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .gallery-image-5[src=""]::after,
    .gallery-image-5:not([src])::after {
        content: "📷";
        font-size: 48px;
        opacity: 0.3;
    }
</style>
@isset($coupon_code)
    <div class="row"
        style="background-image: linear-gradient(to bottom right, #34265c,#161125); margin-top:12px; padding-top:1px;padding-bottom:1px;">
        <marquee direction="left" loop="">
            <div style="color:yellow; font-size:22px;"> {{ $coupon_code->description }}, Use code <b>{{ $coupon_code->promocode }}</b></div>
        </marquee>
    </div>
@endisset

<div class="row">

    <!-- Main banner Section -->
    <div class="main-banner">
        @foreach($home_banner as $home_ban)
            <img src="{{URL::asset('assets/img/'.$home_ban->foldername.'/'.$home_ban->filename)}}"
            class="img-fluid w-100" loading="lazy" />
        @endforeach
    </div>
    <!-- Main banner Section -->

</div>

@php
// Prefer the controller selection, then the branch filter, then the first displayed theatre.
// Never derive the gallery branch by mutating it inside the theatre loop.
$galleryBranchId = (int) ($branchid ?? $branch_id ?? request('branch_id')
?? optional($theatre_carousel->first())->branch_id ?? 1);
@endphp
<!-- Theatre Cards Section -->
<div class="my-4" id="book_now_section" >
    @foreach($theatre_carousel->chunk(4) as $chunk)
        <div class="row gy-4" >
            @foreach($chunk as $theatre)
                <div class="{{ $theatre->branch_id == 1 ? 'col-md-3' : 'col-md-4' }} px-md-2 d-flex"
                    style="{{ $theatre->branch_id == 1 ? 'margin-top:-20px;' : '' }}">
                    <div class="card bg-white h-100">
                        <!-- Theatre Image Slider -->
                        <div class="theatre-slider" data-theatre-id="{{$theatre->id}}">
                            @foreach($theatre->assets as $asset)

                                <div class="slider-item">
                                    <div class="card-title mt-n6" style="margin-left:15px;" >
                                        <h6 style="font-size:20px; white-space: normal;">{{$theatre->name}}</h6>
                                    </div>
                                    <!-- Theatre Name & Description -->
                                    <span class="text-muted mb-2" style="font-size:12px;">{{ $theatre->displayname }}</span>
                                    <div class="position-relative">
                                        <img src="{{$asset->image_url}}"  class="card-img-top"
                                        alt="{{$asset->filename}}" loading="lazy"
                                        onerror="this.onerror=null; this.src='{{URL::asset('assets/img/placeholder.jpg')}}';">
                                        <div class="btn-group btn-group-sm position-absolute" role="group"
                                            style='top:3px; right:12px; background-color: transparent;'>
                                            <a href="{{$theatre->video_url}}"
                                                target="_blank" rel="noopener noreferrer" class="btn button-custom rounded-circle shadow"
                                                title="Watch Video"><i class="fas fa-video"></i></a>

                                            <a href="https://api.whatsapp.com/send?text=Check out the details and lets make an online booking at: %0A {{ route('privatetheatre', ['name' => $theatre->name]) }} %0ATheater Name: {{$theatre->name}} %0ABase Price: {{$theatre->price}} %0AExtra person Price: {{$theatre->extra_person_price}} %0AScreen: {{$theatre->videodetails}}"
                                                target="_blank" rel="noopener noreferrer" class="btn button-custom rounded-circle shadow"
                                                title="Share on WhatsApp">
{{-- <i class="fab 2fa fa-whatsapp"></i> --}}<i class="fas fa-share-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Card Body Content -->
                        <div class="card-body d-flex flex-column" style="margin-top:-16px;">
                            <!-- Packages Section -->
                            @isset($theatre->packages)
                                @if(count($theatre->packages) > 0)
                                    <div class="mt-top">
                                        <div class="mb-2 text-center">Packages</div>
                                        <div class="row row-cols-2 g-2">
                                            @foreach($theatre->packages as $pckg)
                                                @php
                                                $packageName = str_replace(" ","-", $pckg->package_name);
                                                @endphp
                                                <div class="col">
                                                    <a href="{{ route('package.booking', ['package_name' => $packageName, 'package_id' => $pckg->id]) }}"
                                                        class="btn btn-outline-dark btn-sm rounded-pill w-100 text-nowrap" style="font-size:11px; ">
                                                        {{ $pckg->decoration->name }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endisset
                            <!-- Build you own start here -->
                            <div class="row" style="margin-top:5px;">
                                <div class="col-lg-12">
                                    <div class="row" style="margin-bottom:6px;margin-top:10px; ">
                                        <div class="col-lg-12">Build Your Own</div>
                                    </div>
                                    <div>
                                        <div>
                                            <a class="btn btn-sm  btn-outline-dark rounded-pill"
                                                style="text-align: center;  padding:3px; width: 50%;"
                                                href="{{ route('privatetheatre', ['name' => $theatre->name]) }}">₹ {{ $theatre->price }}</a>
                                            for up to {{ $theatre->peopleallowed }} ppl
                                        </div>
                                    </div>
                                    <!-- Badges: Max People & Decoration -->
                                    <div class="d-flex gap-2 mb-3 flex-wrap" style="margin-top:5px;">
                                        <span class="badge rounded-pill" style="background-color:#fff3cd; color:#856404; font-size:11px;">
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
                                        <!-- Extra Person Info -->
                                        @if ($theatre->peopleallowed == $theatre->max_people)
                                            <span class="text-center text-muted mb-3" style="font-size:12px;">More than {{ $theatre->peopleallowed }} people not allowed </span>
                                        @else
                                            <span class="text-center text-muted mb-3" style="font-size:12px;"><b>₹{{ $theatre->extra_person_price }}</b> per extra person after {{ $theatre->peopleallowed }} people </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Build you own end here -->
                            <!-- Mobile Discount Banner -->
                            @if($isMobile)
                                <div class="mt-3 p-2 rounded" style="background-color:#fffbea; border-left:4px solid #ffca00;">
                                    <small style="font-size:11px;"><b>Save up to 25%</b> with our all-in-one bundles!</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
<!-- Discount Banner Desktop -->
@if(!$isMobile)
    <div class="container-fluid pt-3 py-2" style="margin-top:-30px; margin-bottom:-16px">
        <div style="background-color: yellow; padding:10px; border-radius: 5px; font-size: 1.1em; font-family: Arial, Helvetica, sans-serif;">
            <span class="discount">
                <b>Save up to 25% </b>with our package bundles which includes decorations, cake, fog entry, LED name display, welcome drinks, and more!
            </span>
        </div>
    </div>
@endif
<!-- Celebration Gallery Section -->
<div class="container-fluid py-5" id="celebration-gallery" style="background-color: #f8f9fa;">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="font-size: 2.5rem;">
            Celebration <span style="color: #ffca00;">Gallery</span>
        </h2>
        <p class="text-muted">See how we've made thousands of celebrations truly memorable</p>
    </div>
    <!-- 5-Image Asymmetric Grid -->
    <div class="gallery-grid-5">
        @php
        // All available images
        $aecsGalleryImages = [
        'AECS (1).jpeg',
        'AECS (2).jpeg',
        'AECS (3).jpeg',
        'AECS (4).jpeg',
        'AECS (6).jpeg',
        'AECS (7).jpeg',
        'AECS (8).jpeg',
        'AECS (9).jpeg',
        'AECS (10).jpeg',
        'AECS (11).jpeg',
        'AECS (12).jpeg',
        'AECS (14).jpeg',
        'AECS (15).jpeg',
        'AECS (16).jpeg',
        'AECS (17).jpeg',
        'AECS (19).jpeg',
        'AECS (20).jpeg'
        ];
        // All available images
        $jpGalleryImages = [
        'JpNagar (1).jpeg',
        'JpNagar (3).jpeg',
        'JpNagar (4).jpeg',
        'JpNagar (7).jpeg',
        'JpNagar (8).jpeg',
        'JpNagar (13).jpeg',
        'JpNagar (14).jpeg',
        'JpNagar (15).jpeg',
        'JpNagar (16).jpeg'
        ];
        if ($galleryBranchId == 1)
        {
        $GalleryImagestoShow = $aecsGalleryImages;
        }
        else
        {
        $GalleryImagestoShow = $jpGalleryImages;
        }
        // Shuffle and take only 5 random images
        $galleryImages = collect($GalleryImagestoShow)->shuffle()->take(5)->toArray();
        @endphp
        @foreach($galleryImages as $index => $image)
            <div class="gallery-item-5" data-image-index="{{ $index }}" data-position="{{ $index + 1 }}">
                <img src="{{ URL::asset('assets/img/OurGallery/' . $image) }}"
                alt="Celebration {{ $index + 1 }}"
                class="gallery-image-5"
                loading="lazy"
                onerror="this.onerror=null; this.src='{{ URL::asset('assets/img/placeholder.jpg') }}';">
                <div class="gallery-overlay-5">
                    <button type="button" aria-label="Open gallery image" class="gallery-play-btn-5" onclick="openLightbox({{ $index }})">
                        <i class="fas fa-search-plus">
                        </i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Lightbox Modal -->
<div id="gallery-lightbox" class="lightbox-modal" role="dialog" aria-modal="true" aria-label="Celebration gallery" aria-hidden="true">
    <button type="button" class="lightbox-close" style="background:transparent;border:0;" aria-label="Close gallery" onclick="closeLightbox()">&times;</button>
    <img id="lightbox-image" class="lightbox-content" alt="Gallery Image">
    <button type="button" aria-label="Previous image" class="lightbox-prev" onclick="changeSlide(-1)">❮</button>
    <button type="button" aria-label="Next image" class="lightbox-next" onclick="changeSlide(1)">❯</button>
</div>
{{-- Services Slider Section
--}}


{{-- Testimonials Section startTestimonials Section end --}}

<!-- The supplied layout loads CSS only; these JavaScript dependencies are required here. -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
(function ($) {
    'use strict';

    $(function () {
        $('.theatre-slider').not('.slick-initialized').each(function () {
            if (typeof $.fn.slick !== 'function') return;
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                speed: 800,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 3000,
                cssEase: 'ease-in-out',
                adaptiveHeight: true,
                lazyLoad: 'ondemand',
                pauseOnHover: true,
                pauseOnFocus: true,
                responsive: [
                    { breakpoint: 768, settings: { autoplaySpeed: 2500 } },
                    { breakpoint: 480, settings: { autoplaySpeed: 2000 } }
                ]
            });
        });

        if ($('#description').length) $('.description_main').html($('#description').val());

        function updateSelection() {
            if ($('#city_id').length && $('#branch_id').length) {
                $('.select_now').toggleClass('disabled', !$('#city_id').val() || !$('#branch_id').val());
            }
        }
        updateSelection();
        let branchRequest;
        $(document).on('change', '#branch_id', updateSelection);
        $(document).on('change', '#city_id', function () {
            if (branchRequest) branchRequest.abort();
            const $branch = $('#branch_id').empty().append(new Option('Select Branch', ''));
            updateSelection();
            const cityId = $(this).val();
            if (!cityId) return;
            branchRequest = $.ajax({
                url: @json(url('index/city')),
                type: 'GET',
                data: { city_id: cityId },
                success: function (branches) {
                    branches.forEach(function (branch) {
                        $branch.append(new Option(branch.branch_name, branch.id));
                    });
                    updateSelection();
                }
            });
        });

        document.body.classList.add(window.matchMedia('(hover: none)').matches ? 'mobile-click' : 'desktop-hover');

        // Use exactly the same branch-specific pool as the server-rendered gallery.
        const allGalleryImages = @json(array_values($GalleryImagestoShow));
        const galleryBaseUrl = @json(rtrim(URL::asset('assets/img/OurGallery'), '/') . '/');
        const $items = $('#celebration-gallery .gallery-item-5');
        const $lightbox = $('#gallery-lightbox');
        let currentImageIndex = 0;
        let rotationTimer = null;
        let hovered = false;
        let lightboxOpen = false;
        let rotating = false;
        let usedImages = new Set();
        let pendingImage = null;
        let focusedElement = null;

        function stopAutoRotation() {
            clearInterval(rotationTimer);
            rotationTimer = null;
        }

        function rotateImage() {
            if (rotating || hovered || lightboxOpen || document.hidden || !$items.length) return;
            const displayed = $items.map(function () {
                return decodeURIComponent($(this).find('img').attr('src').split('/').pop());
            }).get();
            const available = allGalleryImages.filter(image => !displayed.includes(image));
            if (!available.length) return;
            let candidates = available.filter(image => !usedImages.has(image));
            if (!candidates.length) {
                usedImages.clear();
                candidates = available;
            }
            const filename = candidates[Math.floor(Math.random() * candidates.length)];
            const $image = $items.eq(Math.floor(Math.random() * $items.length)).find('img');
            const nextUrl = galleryBaseUrl + encodeURIComponent(filename);
            rotating = true;
            pendingImage = new Image();
            pendingImage.onload = function () {
                if (hovered || lightboxOpen || document.hidden) {
                    rotating = false;
                    return;
                }
                $image.fadeOut(400, function () {
                    // Lightbox/hover may have started during the fade.
                    if (!hovered && !lightboxOpen && !document.hidden) {
                        $image.attr({ src: nextUrl, alt: filename });
                        usedImages.add(filename);
                    }
                }).fadeIn(400, function () { rotating = false; });
            };
            pendingImage.onerror = function () { rotating = false; };
            pendingImage.src = nextUrl;
        }

        function startAutoRotation() {
            stopAutoRotation();
            if ($items.length && !hovered && !lightboxOpen && !document.hidden) {
                rotationTimer = setInterval(rotateImage, 10000);
            }
        }

        function showLightboxImage() {
            const $image = $items.eq(currentImageIndex).find('img');
            $('#lightbox-image').attr({ src: $image.attr('src'), alt: $image.attr('alt') });
        }

        window.openLightbox = function (index) {
            if (!$items.eq(index).length) return;
            focusedElement = document.activeElement;
            currentImageIndex = index;
            lightboxOpen = true;
            stopAutoRotation();
            showLightboxImage();
            $lightbox.show().attr('aria-hidden', 'false');
            $('body').addClass('lightbox-open');
            $lightbox.find('.lightbox-close').trigger('focus');
        };

        window.closeLightbox = function () {
            lightboxOpen = false;
            $lightbox.hide().attr('aria-hidden', 'true');
            $('body').removeClass('lightbox-open');
            if (focusedElement) focusedElement.focus();
            startAutoRotation();
        };

        window.changeSlide = function (direction) {
            if (!$items.length) return;
            currentImageIndex = (currentImageIndex + direction + $items.length) % $items.length;
            showLightboxImage();
        };

        $items.on('mouseenter', function () { hovered = true; stopAutoRotation(); })
            .on('mouseleave', function () { hovered = false; startAutoRotation(); });
        $(document).on('keydown', function (event) {
            if (!lightboxOpen) return;
            if (event.key === 'Escape') window.closeLightbox();
            if (event.key === 'ArrowLeft') { event.preventDefault(); window.changeSlide(-1); }
            if (event.key === 'ArrowRight') { event.preventDefault(); window.changeSlide(1); }
            if (event.key === 'Tab') {
                const controls = $lightbox.find('button').get();
                const first = controls[0];
                const last = controls[controls.length - 1];
                if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
                else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
            }
        });
        $lightbox.on('click', function (event) {
            if (event.target === this) window.closeLightbox();
        });
        document.addEventListener('visibilitychange', startAutoRotation);
        $(window).on('beforeunload', stopAutoRotation);
        startAutoRotation();
    });
})(jQuery);
</script>
@endsection
