@extends('includes.layout')
@section('title','Dashboard')
@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    @include('includes.inc_session_success')
    <div class="container-fluid">
        <!--begin::Row 
<div class="row">
<div class="col-lg-12 connectedSortable">
<div class="card">
<div class="card-header">
<h3 class="card-title">Actions to be performed</h3>
<div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i
data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool"
data-lte-toggle="card-remove">
<i class="bi bi-x-lg"></i> </button> </div>
</div> <!-- /.card-header 
<div class="card-body p-0">
<div class="table-responsive">
</div>
</div>
</div>
</div>
</div> 
</br>
-->
        <!--begin::Row-->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Last 20 Bookings done through the website</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool"
                                data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i
                                    data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button"
                                class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button>
                        </div>
                    </div> <!-- /.card-header -->
                    
                    <div class="card-body">
                        @include('includes.inc_booking_table')
                    </div> <!-- /.card-body -->
    
              <!-- Start col -->
  
        <div class="col-md-12">
        
        <div class="info-box mb-3 "> <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                <div class="info-box-content"> <span class="info-box-text">Highest Booking Theatre</span> <span
                        class="info-box-number">{{$theatreWithMaxBookings->name}} -
                        {{$theatreWithMaxBookings->total_bookings}}</span> </div> 
                        
            </div> 
            <div class="info-box mb-3 "> <span class="info-box-icon"> <i class="bi bi-heart-fill"></i>
                </span>
                <div class="info-box-content"> <span class="info-box-text">Highest Revenue Theatre</span> <span
                        class="info-box-number">{{$theatreWithMaxRevenue->name}} - &#8377;
                        {{$theatreWithMaxRevenue->total_revenue}}/-</span> </div>
                        
            </div> 
            <div class="info-box mb-3 "> <span class="info-box-icon"> <i class="bi bi-cloud-download"></i>
                </span>
                <div class="info-box-content"> <span class="info-box-text">Highest Repeated Customers</span> <span
                        class="info-box-number">{{$theatreWithMaxCustomer->name}} -
                        {{$theatreWithMaxCustomer->total_bookings}}</span> </div> 
            </div>
            <div class="info-box mb-3 "> <span class="info-box-icon"> <i class="bi bi-chat-fill"></i> </span>
                <div class="info-box-content"> <span class="info-box-text">Lowest Revenue Theatre</span> <span
                        class="info-box-number">{{$theatreWithLowserCustomer->name }} -
                        {{$theatreWithLowserCustomer->total_bookings}}</span> </div> 
            </div>
           
            <!-- /.info-box -->
            <!-- <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Support</h3>
                                    <div class="card-tools">Till 31st Dec 2025</div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-success fs-2"> <i class="nav-icon bi bi-box-seam-fill"></i></p>
                                        <p class="d-flex flex-column text-end">partyadda.com@gmail.com<span class="text-secondary">Email 24X7X365</span> </p>
                                    </div> 
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-info fs-2"> <i class="nav-icon bi bi-box-seam-fill"></i></p>
									<p class="d-flex flex-column text-end"> +91 821 757 5597<span class="text-secondary">Email 24X7X365</span> </p>
                                    </div> 
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <p class="text-danger fs-2"> <i class="nav-icon bi bi-box-seam-fill"></i></p>
                                                                                <p class="d-flex flex-column text-end">https://partyadda.com<span class="text-secondary">Email 24X7X365</span> </p>
                                    </div> 
                                </div>    -->

        </div>
                    
                    
                    
                    
                    <!--   <div class="card-footer clearfix"> 
<a href="{{ route('admin.view_theatres')}}" class="btn btn-sm btn-primary float-start">Manage Theatres</a> 
<a href="{{ route('admin.booking')}}" class="btn btn-sm btn-secondary float-end">View All Orders</a>
</div> <!-- /.card-footer -->
                
                </div> <!-- /.card -->
            </div> <!-- /.Start col -->
        </div> <!-- /.row (main row) -->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
@endsection