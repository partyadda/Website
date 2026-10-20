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
					<h3 class="mb-0">View All Branches</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page">Branches</li>
					   <li class="breadcrumb-item active" aria-current="page">View</li>
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
						  <h3 class="card-title">Manage Branches</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Branch Name</th>
								<th>Business Details</th>
								<th>Services</th>
								<th>Charges</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    @foreach($branches as $branch)						
    							<tr class="align-middle">
    								<td>{{ ++$row }}</td>
    								<td>{{$branch->branch_name}}<br>@if($branch->enabled == 1)<span class="badge text-bg-success">Active</span>@else <span class="badge text-bg-danger">Inactive</span> @endif</td>
    								<td>{{$branch->business_name}}<br>{{$branch->email}}<br>+91 {{$branch->contactnumber}}</td>
    								<td>Theatres : {{$branch->theatres->count()}}<br>Occasions : {{$branch->decorations->count()}}<br>Cakes : {{$branch->cakes->count()}} <br>Add-Ons : {{$branch->addons->count()}} </td>
    								<td>Advance Amount:  &#8377; {{$branch->advance_amount}}/- <br>Decoration Price:  &#8377; {{$branch->decoration_amount}}/-</td>
    								<td>		
    									<a href="" class="btn btn-default border border-success" name="theatre" id="theatre" value="View Theatres"><i class="bi bi-person-video3"></i> View Assigned Theatres</a> <br><br>
    									<a href="{{route('admin.branch',$branch->id)}}" class="btn btn-info" name="edit" value="Edit"><i class="bi bi-pencil"></i> Edit</a>
    									<a href="" class="btn btn-primary" name="services" id="services" value="Services"><i class="bi bi-files"></i> View Services</a><br><br>
										    @if($branch->enabled == 1)
											    <a href='{{ route('admin.branch_status', ['id' => $branch->id,'status'=> 0 ]) }}'  class="btn btn-warning"  id="suspend" ><i class="bi bi-hand-thumbs-down"></i> Suspend</a>
											@else
											<a href='{{ route('admin.branch_status', ['id' => $branch->id,'status' => 1 ]) }}'  class="btn btn-success"  id="suspend" ><i class="bi bi-hand-thumbs-up"></i> Unsuspend</a>
											@endif
    								</td>
    							 </tr>
                            @endforeach
						</tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Branch Name</th>
								<th>Business Details</th>
								<th>Services</th>
								<th>Charges</th>
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