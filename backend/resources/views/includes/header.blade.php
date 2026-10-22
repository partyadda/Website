{{-- Load once in the shared admin layout head. --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('assets/css/partyAdda.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('assets/css/daterangepicker.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<style>
    body { font-family: 'Montserrat', sans-serif; font-size: 14px; line-height: 1.5; }
    input, select, textarea, button, .btn { font-family: inherit; }
    .app-content { padding: 6px; }
    .app-content-header { padding: 8px 6px; }
    .app-content .row { --bs-gutter-x: 12px; }
    .app-content .card { margin-bottom: 10px; }
    .app-content .card-header, .app-content .card-body, .app-content .card-footer { padding: 8px 10px; }
    .app-content h1 { font-size: clamp(20px, 3vw, 26px); margin-bottom: 8px; }
    .app-content .card-title { font-size: 16px; line-height: 1.4; margin: 0; }
    .app-content p { margin-bottom: 8px; }
    .app-content .table { margin-bottom: 8px; font-size: 13px; }
    .app-content .table > :not(caption) > * > * { padding: 4px 6px; line-height: 1.4; vertical-align: middle; }
    .app-content .form-label { margin-bottom: 4px; font-size: 13px; }
    .app-content .form-control, .app-content .form-select { min-height: 36px; padding-top: 6px; padding-bottom: 6px; font-size: 14px; }
    .app-content .form-control { padding-left: 8px; padding-right: 8px; }
    .app-content .form-select { padding-left: 8px; padding-right: 32px; }
    .app-content .btn { padding: 7px 12px; font-size: 13px; line-height: 1.4; }
    .app-content .dataTables_wrapper .dataTables_filter,
    .app-content .dataTables_wrapper .dataTables_length { margin-bottom: 6px; font-size: 13px; }
    .app-content .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 4px 8px; }
    .app-footer { padding: 8px 12px; font-size: 12px; line-height: 1.5; }
    .daterangepicker { font-family: 'Montserrat', sans-serif; font-size: 13px; }
</style>
