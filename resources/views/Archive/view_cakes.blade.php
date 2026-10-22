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
					<h3 class="mb-0">View All Cakes</h3>
				 </div>
				 <div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
					   <li class="breadcrumb-item"><a href="#">Home</a></li>
					   <li class="breadcrumb-item active" aria-current="page">Cakes</li>
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
						  <h3 class="card-title">Manage Cakes</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Cake</th>
								<th>Image</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
						    @php
						        $row = 0;
						    @endphp
						    @foreach($cakesWithAssets as $cake)
    							<tr class="align-middle">
        							<td>{{ ++$row }}</td>
                                    <td>{{$cake->cakename}}</td>
    								<td>
    								    @foreach($cake->assets as $asset)
    								    <img src="{{URL::asset('assets/img/'.$asset->foldername.'/'.$asset->filename) }}" style="width:100px;height:100px;">
    								    @endforeach
    								    </td>
    								<td><a href="{{route('admin.edit_cake',$cake->id)}}" class="btn btn-primary" name="edit" id="edit" value="Edit"><i class="bi bi-pencil"></i> Edit</a></td>
    							 </tr>
                            @endforeach							 
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Cake</th>
								<th>Image</th>
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