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
					<h3 class="mb-0">View All Cities</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page">Cities</li>
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
								<th>City Name</th>
								<th>No.Of. Branches</th>
								<!--<th>No.Of. Theatres</th>-->
								<th>Status</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    @foreach($cities as $city)
    						    <tr class="align-middle">
    						       
    							    <td style="text-align: center; vertical-align: middle;">{{ ++$row }}</td>
    								<td style="text-align: center; vertical-align: middle;">{{$city->city_name}}</td>
    								<td style="text-align: center; vertical-align: middle;">{{$city->branch_count }}</td>
    							
    								<td style="text-align: center; vertical-align: middle;">@if($city->enabled == 1)<span class="badge text-bg-success">Active</span>@else <span class="badge text-bg-danger">Inactive</span> @endif</td>
    								<td style="text-align: center; vertical-align: middle;">		
    										<a href="{{route('admin.city',$city->id)}}" class="btn btn-info" name="edit" value="Edit"><i class="bi bi-pencil"></i> Edit</button> 
    										<a href="{{route('admin.view_city_branchs',$city->id)}}"  class="btn btn-default border border-success" name="view_branches" id="view_branches" value="View Branches"><i class="bi bi-building"></i> View Branches</a> <br><br>
    										<a href="{{route('admin.view_city_theatre',$city->id)}}"  class="btn btn-default border border-success" name="view_theatres" id="view_theatres" value="View Theatres"><i class="bi bi-building"></i> View Theatres</a> 
    										
										    @if($city->enabled == 1)
											    <a href='{{ route('admin.suspend_city', ['id' => $city->id,'status'=> 0 ]) }}'  class="btn btn-warning"  id="suspend" ><i class="bi bi-hand-thumbs-down"></i> Suspend</a>
											@else
											<a href='{{ route('admin.suspend_city', ['id' => $city->id,'status' => 1 ]) }}'  class="btn btn-success"  id="suspend" ><i class="bi bi-hand-thumbs-up"></i> Unsuspend</a>
											@endif
    								</td>
    							 </tr>
                            @endforeach
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>City Name</th>
								<th>No.Of. Branches</th>
								<!--<th>No.Of. Theatres</th>-->
								<th>Status</th>
								<th>Action</th>
							 </tr
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