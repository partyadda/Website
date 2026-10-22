@extends('includes.layout')
@section('title','Booking Details')

@section('content')
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Booking Detail e</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Booking Details
          </li>
        </ol>
      </div>
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<div class="app-content">
  <!--begin::Container-->
  
  @include('includes.inc_session_success')

  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <!-- Start col -->
      <div class="col-lg-12 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Booking Details</h3>

            <div style="float: right;">
              <form action="{{ route('admin.booking.todayBooking') }}" method="GET">
                  
                <input type="hidden" class="form-control" id="view_Today_date_filter" name="view_Today_date_filter" required readonly value="{{ $date_filter ?? '' }}" />
                
                <input type="hidden" class="form-control" value="1" name="today_booking_send_mail"/>
                <button type="submit" class="btn btn-primary" id="btn_view_today_booking_date_filter">
                  <i class="bi bi-files"></i> Send To Admin
                </button>
              </form>
            </div>
            
            
          </div> <!-- /.card-header -->
          
         <!--          <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FKolkata&showCalendars=0&src=NTY5YTQzZGZjNGE1MWUxYmFhNDQ2MDlhODgzZjllOGU2YTA3ZGY1ODBhMTVlYzgzMGRlOTRjZjYzYzI0NmE0ZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23f4511e" style="border:solid 1px #777" height="600" frameborder="0" scrolling="no"></iframe>
         -->
         
          
          <div class="card-body">
            @include('includes.inc_today_booking_table')

          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.Start col -->
    </div> <!-- /.row (main row) -->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
@endsection