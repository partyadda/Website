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
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Customer Name</th>
								<th>Customer Details</th>
								<th>Category</th>
								<th>Referred By & From</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						      @php 
						      $no = 0;
						      @endphp
						      @foreach($customers as $cust)
							<tr class="align-middle">
								<td>{{++$no}}</td>
								<td>{{$cust->customer_name}}<br>Since : <span class="badge text-bg-success">{{$cust->created_at}}</span></td>
								<td>{{$cust->email}}<br>{{$cust->phone}}</td>
								<td>{{$cust->category}}</td>
								<td>{{$cust->referred_by}} @if($cust->wherefrom)  & {{$cust->wherefrom}} @endif</td>
								<td>		
										<a href="{{route('admin.customer_bookings',$cust->id)}}"  class="btn btn-primary"  id="services" ><i class="bi bi-files"></i> View Bookings</a>
								</td>
							 </tr>
							 @endforeach
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Customer Name</th>
								<th>Customer Details</th>
								<th>Category</th>
								<th>Referred By & From</th>
								<th>Action</th>
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