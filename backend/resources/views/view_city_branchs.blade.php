@extends('includes.layout')
@section('title','View City Branch')

@section('content')
	<main class="app-main">
		<!--begin::App Content Header-->
		<div class="app-content-header">
		   <!--begin::Container-->
		   <div class="container-fluid">
			  <!--begin::Row-->
			  <div class="row">
				 <div class="col-sm-6">
					<h3 class="mb-0">View {{$city_branchs->city->city_name}} City Branch</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.view_branches')}}">View Branchs</a></li>
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
						  <h3 class="card-title">Please click on the Action Button to manage the Cities</h3>
					   </div>
					   <!-- /.card-header -->
					   @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @elseif(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
						<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Branch Name</th>
								<th>Business Name</th>
								<th>Email</th>
								<th>Contact Number</th>
								<th>Address</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    
						     @foreach($city_branchs as $city_branch)
						     
						        <tr class="align-middle">
                                    <td>{{ ++$row }}</td>
                                    <td>{{$city_branch->branch_name}}</td>
                                    <td>{{$city_branch->business_name }}</td>
                                    <td>{{$city_branch->email }}</td>
                                    <td>{{$city_branch->contactnumber }}</td>
                                    <td>{{$city_branch->address }}</td>
                                </tr>
                            @endforeach
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Branch Name</th>
								<th>Business Name</th>
								<th>Email</th>
								<th>Contact Number</th>
								<th>Address</th>
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