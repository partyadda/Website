@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main">
		<!--begin::App Content Header-->
		<div class="app-content-header">
		   <!--begin::Container-->
		   <div class="container-fluid">
			  <!--begin::Row-->
			  <div class="row">
				 <div class="col-sm-6">
					<h3 class="mb-0">View All Customers</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page">Customers</li>
					</ol>
				 </div>
			  </div>
			  <!--end::Row-->
		   </div>
		   <!--end::Container-->
		</div>
		<!--end::App Content Header--> <!--begin::App Content-->
		<div class="app-content">
		   <!--begin::Container-->
		   <div class="container-fluid">
			  <!--begin::Row-->
			  <div class="row">
				 <div class="col-md-12">
					<div class="card mb-12">
					   <div class="card-header">
						  <h3 class="card-title">Manage Customers</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:5px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th width="3%">Sl.No</th>
								<th>Name</th>
								<th width="10%">Phone</th>
								<th width="7%">Where From</th>
								<th width="10%">Since</th>
								<th width="10%">Action</th>
							 </tr>
						  </thead>
						  <tbody>
						      @php 
						      $no = 0;
						      @endphp
						      @foreach($customers as $cust)
							<tr class="align-middle">
								<td>{{$cust->id}}</td>
								<td>{{$cust->customer_name}}</td>
								<td>{{$cust->phone}}</td>
								<td>@if($cust->wherefrom) {{$cust->wherefrom}} @endif</td>
								<td><span class="badge text-bg-success">{{$cust->created_at}}</span> </td>
								<td>
								    <a href="{{route('admin.customer_bookings',$cust->id)}}"  
										class="btn btn-sm btn-outline-dark rounded-pill padding:-5px; border border-success" 
										id="services" >
										    <i class="bi bi-files"></i> View Bookings</a>
								</td>
							 </tr>
							 @endforeach
						  </tbody>
						  <tfoot>
							<tr>
								<th width="3%">Sl.No</th>
								<th>Name</th>
								<th width="10%">Phone</th>
								<th width="7%">Where From</th>
								<th width="10%">Since</th>
								<th width="20%">Action</th>
							 </tr>
						  </tfoot>
					   </table>
					</div>
					<!-- /.card-body -->
				 </div>
				 <!-- /.card -->
			  </div>
			  <!-- /.col -->
		   </div>
		   <!--end::Row-->
		</div>
		<!--end::Container-->
	</main> <!--end::App Main--> <!--begin::Footer-->
@endsection