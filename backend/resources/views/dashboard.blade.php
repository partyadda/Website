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
                        <h3 class="card-title">Last 10 Bookings done through the website</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool"
                                data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i
                                    data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button"
                                class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button>
                        </div>
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        @include('includes.inc_booking_table')
                    </div> <!-- /.card-body -->
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