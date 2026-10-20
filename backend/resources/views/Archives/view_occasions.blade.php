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
					<h3 class="mb-0">View All Occasions</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page">Occasions</li>
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
						  <h3 class="card-title">Manage Occasions</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Occasion Name</th>
								<th>Image</th>
								<th>Lables</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    @foreach($occasionsWithAssets as $occasion)
							<tr class="align-middle">
    							<td>{{ ++$row }}</td>
								<td>{{$occasion->name}}<br><small>{{$occasion->detail}}</small></td>
								<td>
								    @foreach($occasion->assets as $asset)
    								    <img src="{{URL::asset('assets/img/'.$asset->foldername.'/'.$asset->filename) }}" style="width:100px;height:100px;"></td>
    							    @endforeach
								<td>Lable#1 : {{$occasion->person1}} <br>Lable#2 {{$occasion->person2}}</td>
								<td>
								    <a href="{{route('admin.edit_occasion',$occasion->id)}}" class="btn btn-primary" name="edit" id="edit" value="Edit"><i class="bi bi-pencil"></i> Edit</a></td>
								</td>
							 </tr>
                            @endforeach							 
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Occasion Name</th>
								<th>Image</th>
								<th>Lables</th>
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