@extends('includes.layout')
@section('title','Booking')

@section('content')
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">All Theatre Bookings</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Bookings
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
            <h3 class="card-title">Booking Orders</h3>
          </div> <!-- /.card-header -->
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <label for="basic-url" class="form-label">
                  Select Date Range<font color="red">*</font>
                </label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon3">
                    <i class="bi bi-calendar"></i>
                  </span>
                  <button type="button" class="form-control" id="date_range_filter">
                    {{ $date_filterUI ?? 'Select Date Range'}}
                  </button>
                  <form action="{{ route('admin.booking') }}" method="GET">
                    <input type="hidden" class="form-control" id="booking_date_filter" name="booking_date_filter"
                      required readonly value="{{ $date_filter ?? '' }}" />
                    <button type="submit" class="btn btn-primary" id="btn_date_filter">
                      <i class="bi bi-files"></i> Submit
                    </button>
                  </form>
                </div>
              </div>
              <div class="col-md-3">
                <label for="basic-url" class="form-label">
                  &nbsp;
                </label>
                <div class="input-group">
                  <form action="{{ route('admin.booking.sendMail') }}" method="GET">
                    <input type="hidden" class="form-control" id="btn_send_mail_date_filter" name="btn_send_mail_date_filter"
                      required readonly value="{{ $date_filter ?? '' }}" />
                    <button type="submit" class="btn btn-primary" id="btn_send_mail">
                      <i class="bi bi-files"></i> Send To Admin
                    </button>
                  </form>
                </div>
              </div>
              <div class="col-md-3">
                <label for="basic-url" class="form-label">
                  &nbsp;
                </label>
                <div class="input-group">
                  <form action="{{ route('admin.booking.cakeOrders') }}" method="GET">
                    <input type="hidden" class="form-control" id="view_cake_order_date_filter" name="view_cake_order_date_filter"
                      required readonly value="{{ $date_filter ?? '' }}" />
                    <button type="submit" class="btn btn-primary" id="btn_view_cake_order">
                      <i class="bi bi-files"></i> View Cake Order
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <br>

            @include('includes.inc_booking_table')
            
            

          </div> <!-- /.card-body -->
          <!--                        <div class="card-footer clearfix"> -->
          <!--	<a href="javascript:void(0)" class="btn btn-sm btn-primary float-start">Manage Theatre</a> -->
          <!--	<a href="javascript:void(0)" class="btn btn-sm btn-secondary float-end">View All Orders</a>-->
          <!--</div> -->
          <!-- /.card-footer -->
        </div> <!-- /.card -->

      </div> <!-- /.Start col -->
      <!-- Start col -->

    </div> <!-- /.row (main row) -->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
@endsection