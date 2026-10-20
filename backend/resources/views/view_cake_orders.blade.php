@extends('includes.layout')
@section('title','Booking Cake Orders')

@section('content')
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Booking Cake Orders</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Cake Orders
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
            <h3 class="card-title">Cake Orders</h3>

            <div style="float: right;">
              <form action="{{ route('admin.booking.cakeOrders') }}" method="GET">
                <input type="hidden" class="form-control" id="view_cake_order_date_filter" name="view_cake_order_date_filter" required readonly value="{{ $date_filter ?? '' }}" />
                <input type="hidden" class="form-control" value="1" name="cake_order_send_mail"/>
                <button type="submit" class="btn btn-primary" id="btn_view_cake_order_date_filter">
                  <i class="bi bi-files"></i> Send To Admin
                </button>
              </form>
            </div>
          </div> <!-- /.card-header -->
          <div class="card-body">
            
            @include('includes.inc_booking_cake_order_table')

          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.Start col -->
    </div> <!-- /.row (main row) -->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
@endsection