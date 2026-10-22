@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">@if(isset($editaddoncategories)) Update Category @else Add a Add-On Category @endif</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add-Ons</li>
						</ol>
					</div>
				</div> <!--end::Row-->
			</div> <!--end::Container-->
		</div> <!--end::App Content Header--> <!--begin::App Content-->
		<div class="app-content"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row g-4"> <!--begin::Col-->
					<div class="col-md-12"> <!--begin::Quick Example-->
						<div class="card card-success card-outline mb-4"> <!--begin::Header-->
							<div class="card-header">
								<div class="card-title">Please enter all <font color="red">*</font>marks fields</div>
							</div> <!--end::Header--> <!--begin::Body-->
							<form action="{{ isset($editaddoncategories) ? route('admin.update_addoncat', ['id' => $editaddoncategories->id ]) : route('admin.create_addoncat')}}" method="POST">
							@csrf
							    <div class="card-body">
    								<div class="row g-3"> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Add-On Category Name</label> 
    										<input type="text" class="form-control" id="name" name="name" placeholder="Ex: M - 09:00 To 11:00" value="{{$editaddoncategories->name ?? ''}}">
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Enable/Disable?</label><br/> 
    										<input type="checkbox" class="form-check-input" value="1" id="enabled" name="enabled" {{ isset($editaddoncategories) && $editaddoncategories->enabled == 1 ? 'checked' : '' }}> 
    										<label class="form-check-label" for="invalidCheck">Enable</label>
    									</div> <!--end::Col--> <!--begin::Col-->
    								</div>
							    </div> <!--end::Body--> <!--begin::Footer-->
							    <div class="card-footer"> <button class="btn btn-info" type="submit">@if(isset($editaddoncategories)) Update Category @else Create Add-On Category @endif</button> </div> <!--end::Footer-->
                            </form>
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			  <!--begin::Row-->
			  <div class="row">
				 <div class="col-md-12">
					<div class="card mb-12">
					   <div class="card-header">
						  <h3 class="card-title">Add-On Categories</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Category Name</th>
								<th>Status</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    @foreach($addoncategories as $category)						      
    							<tr class="align-middle">
    								<td>{{ ++$row }}</td>
    								<td>{{$category->name}}</td>
    								<td>@if($category->enabled == 1)<span class="badge text-bg-success">Active</span>@else <span class="badge text-bg-danger">Inactive</span> @endif</td>
    								<td>		
    									<a href="{{route('admin.edit_addoncat',$category->id)}}"  class="btn btn-info" name="edit" value="Edit"><i class="bi bi-pencil"></i> Edit</a> 
    									@if($category->enabled == 1)
									<a href="{{route('admin.suspend_addoncat',$category->id)}}" class="btn btn-warning" id="suspend"><i class="bi bi-hand-thumbs-down"></i>Suspend</a>
									@else
									<a href="{{route('admin.suspend_addoncat',$category->id)}}" class="btn btn-success" id="suspend"><i class="bi bi-hand-thumbs-up"></i>Unuspend</a>
									@endif
    								
    								</td>
    							 </tr>
							 @endforeach
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Category Name</th>
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

			</div> <!--end::Container-->
		</div> <!--end::App Content-->
	</main> <!--end::App Main--> <!--begin::Footer-->
@endsection