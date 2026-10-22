<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <title>@yield('title')</title>
    <meta name="robots"
          content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <meta name="keywords" content="@yield('keyword')">
    <meta name="description" content="@yield('description')">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="PartyAdda">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image"
          content="https://partyadda.com/public/assets/img/logo.png">

    <!-- Facebook Publisher -->
    <meta property="article:publisher"
          content="https://www.facebook.com/people/Party-Adda-Private-Theatre/61557507302516/">

    <!-- Favicon -->
    <link rel="icon" type="image/png"
          href="https://partyadda.com/public/assets/img/logo.png">

    <!-- Google Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

    <!-- Swiper -->
    <link rel="stylesheet"
          href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Slick Carousel -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- jSuites -->
    <link rel="stylesheet"
          href="https://jsuites.net/v4/jsuites.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- PartyAdda Main CSS -->
    <link rel="stylesheet"
          href="{{ URL::asset('assets/css/style.css') }}">

    <!-- Google Analytics GA4 -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id=G-579485BX51">
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-579485BX51');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];

            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });

            var f = d.getElementsByTagName(s)[0];
            var j = d.createElement(s);
            var dl = l !== 'dataLayer' ? '&l=' + l : '';

            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;

            f.parentNode.insertBefore(j, f);

        })(
            window,
            document,
            'script',
            'dataLayer',
            'GTM-55RZ6VHZ'
        );
    </script>

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe
            src="https://www.googletagmanager.com/ns.html?id=GTM-55RZ6VHZ"
            height="0"
            width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>

    <!-- Navigation -->
    @include('includes.navbar')

    <!-- Main Content -->
    <main class="container-fluid border-top">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('includes.footer')

</body>
</html>