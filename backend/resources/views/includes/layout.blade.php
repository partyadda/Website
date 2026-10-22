@php
    $isLoginPage = Request::is('/');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Party Adda - @yield('title')</title>
    <meta name="title" content="Party Adda, Bangalore">
    <meta name="author" content="Party Adda, Bangalore">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keyword')">

    {{-- Shared styles and Montserrat are loaded once in this partial. --}}
    @include('includes.header')

    <style>
        /* Typography, table and card spacing belong in includes.header. */
        .compact-admin .app-main { min-width: 0; }
        .compact-admin .app-content-header { padding: 8px 6px; }
        .compact-admin .app-content { padding: 6px; }
        .compact-admin .app-content > .container-fluid { padding-right: 6px; padding-left: 6px; }
        .compact-admin .app-footer { padding: 8px 12px; }
        .compact-admin.login-page { padding: 12px; }
        .compact-admin .login-box { width: 360px; max-width: 100%; margin: 0; }
        .compact-admin .login-box .card-body { padding: 16px; }
    </style>
</head>

<body class="compact-admin {{ $isLoginPage ? 'login-page bg-body-secondary' : 'layout-fixed sidebar-expand-lg bg-body-tertiary' }}">
    @if ($isLoginPage)
        <div class="login-box">
            @yield('content')
        </div>
    @else
        <div class="app-wrapper">
            @include('includes.navbar')
            @include('includes.aside')

            <main class="app-main">
                @yield('content')
            </main>

            {{-- This partial renders the footer only on non-login routes. --}}
            @include('includes.footer')
        </div>
    @endif

    @if ($isLoginPage)
        {{-- Load shared scripts on login too; includes.footer must hide its footer on this route. --}}
        @include('includes.footer')
    @endif
</body>
</html>
