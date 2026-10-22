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
					<h3 class="mb-0">View All Add-Ons</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page">Add-Ons</li>
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
						  <h3 class="card-title">Manage Add-Ons</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Add-On Name</th>
								<th>Category</th>
								<th>Image</th>
								<th>Status</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    @foreach($addonsWithAssets as $addon)
    							<tr class="align-middle">
    								<td>{{ ++$row }}</td>
    								<td>{{$addon->name}}<br><small>{{$addon->details}}</small></td>
    								<td>{{$addon->category}}</td>
    						    	<td>
    								    @foreach($addon->assets as $asset)
    										<img src="{{URL::asset('assets/img/'.$asset->foldername.'/'.$asset->filename) }}" style="width:100px;height:100px;">
    								    @endforeach
    								</td>
    								<td>@if($addon->enabled == 1)<span class="badge text-bg-success">Active</span>@else <span class="badge text-bg-danger">Inactive</span> @endif</td>
    								<td>
    									<a href="{{route('admin.addon',$addon->id)}}"  class="btn btn-primary" name="edit" id="edit" value="Edit"><i class="bi bi-pencil"></i> Edit</a>
    								    @if($addon->enabled == 1)
    									    <a href='{{ route('admin.suspend_add-on', ['id' => $addon->id ]) }}'  class="btn btn-warning"  id="suspend" ><i class="bi bi-hand-thumbs-down"></i> Suspend</a>
    									@else
    									<a href='{{ route('admin.suspend_add-on', ['id' => $addon->id ]) }}'  class="btn btn-success"  id="suspend" ><i class="bi bi-hand-thumbs-up"></i> Unsuspend</a>
    									@endif
    								</td>
    							 </tr>
                            @endforeach
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Add-On Name</th>
								<th>Category</th>
								<th>Image</th>
								<th>Status</th>
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