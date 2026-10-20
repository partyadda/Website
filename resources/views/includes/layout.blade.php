<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-579485BX51" async="true"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-579485BX51');
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>
    @include('includes.header')
    
    <meta name="description" content="Partyadda, a private theater in marthahalli book now for celebrate your special occassions, screening your own content, short movies, cricket live streaming"/>
      <meta name="Keywords" content="private theater, kids birtday, bride-to-be, teen parties, surprise birthday celebration, romantic late-night couple activities, private theater in marthahalli, small get-togethers, hangout spots for birthdays, private movie theater, place for celebration, party venue, munnekollal, mom-to-be, mini theaters, mini party hall, marthahalli, mahadevapura, party venues and ideas, itpl, hosting baby birthday, happy hours morning private movie theater, group party, fun places, first birthday, children birtday, celebration venue, birthday parties, birthday celebration, binge watch, best birthday places for couples or family budget-friendly celebration options in bangalore, bachelorette parties, bachelor, baby shower halls and locations, baby birthday venues, aecs layout, 1st birthday,varthur
" data-react-helmet="true"/>
    
      <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
      <link rel="canonical" href="https://partyadda.com/booknow.php"/>
     
      <meta name="google-site-verification" content="" />
      
      <meta property="og:site_name" content="PartyAdda brings your celebrations to life with a private cinema experience.">
      <meta property="og:title" content=@yield('title') />
      
      <meta property="og:description" content="Celebrate birthdays, anniversaries, bachelorette parties (bride-to-be or groom-to-be), romantic dates, mom-to-be celebrations, or baby showers in style. Enjoy your favorite movies on a stunning big screen, surrounded by loved ones, DJ lights, selfie walls, and a 360-degree selfie booth." />
      <meta property="og:image" content="https://partyadda.com/public/assets/img/logo.webp">
      <meta property="og:type" content="website" />
      
      <meta property="article:publisher" content="https://www.facebook.com/people/Party-Adda-Private-Theatre/61557507302516/"/>
      <link rel="icon" type="image/png" href="https://partyadda.com/public/assets/img/favicon.webp" />
     
     <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
       {{-- https://www.w3schools.com/icons/fontawesome5_intro.asp --}}

      @if(Request::is('gallery'))
      <!-- Magnific Popup core CSS file -->
          <link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}">
      @endif
</head>

<body>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-55RZ6VHZ');</script>
    <!-- End Google Tag Manager -->
    
    @include('includes.navbar')
    <div class="container-fluid border-top">
        @yield('content')
    </div>
    @include('includes.footer')
</body>

</html>