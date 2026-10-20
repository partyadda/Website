<!DOCTYPE html>
<html lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Party Adda - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Party Adda, Bangalore">
    <meta name="author" content="Microsharp Technologies, Bangalore - https://www.microsharp.net">
    <meta name="description" content="">
    <meta name="keywords" content=""><!--end::Primary Meta Tags--><!--begin::Fonts-->
        @include('includes.header')
</head>

<body  class="@if(Request::is('/') )login-page bg-body-secondary @else layout-fixed sidebar-expand-lg bg-body-tertiary @endif" >
    @if(Request::is('/'))
      <div class="login-box">
   @else
    <div class="app-wrapper"> <!--begin::Header-->
      @include('includes.navbar')
      @include('includes.aside')
      <main class="app-main"> <!--begin::App Content Header-->
    @endif
        @yield('content')
   @if(Request::is('/'))
    </div>
    @else
    </main>
    @include('includes.footer')
    </div>
    @endif
</body>

</html>