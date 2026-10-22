@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">@if(isset($cake)) Update Cake @else Add a New Cake @endif</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Cakes</li>
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
							<div class="card-body">
                                <form action="{{ isset($cake) ? route('admin.update_cake', ['id' => $cake->id ]) : route('admin.create_cake')}}" method="POST" enctype="multipart/form-data">
                                @csrf							    
    								<div class="row g-3"> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Cake Name<font color="red">*</font></label> 
    										<input type="text" class="form-control" id="cakename" name="cakename" placeholder="Ex: Strawberry" value="{{$cake->cakename ?? ''}}" required>
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Cake Photo<font color="red">*</font></label> 
    										<input type="file" class="form-control" id="photo" name="photo" @if(!isset($cake)) required @endif>
    									</div> <!--end::Col--> <!--begin::Col-->
    				                    <div class="col-md-4">
    				                        @if(isset($cake))
												@php
                                                    $imagePath = public_path('assets/img/' . ($asset->foldername ?? '') . '/' . ($asset->filename ?? ''));
                                                @endphp
            									@if(file_exists($imagePath) && !empty($asset->filename))
                                                    <img src="{{ URL::asset('assets/img/' . $asset->foldername . '/' . $asset->filename) }}" style="width:100px; height:100px;">
                                                @endif
                                                @endif
    				                    </div>
    									
    								</div>
    							
							</div> <!--end::Body--> <!--begin::Footer-->
							<div class="card-footer"> <button class="btn btn-info" type="submit">@if(isset($cake))Update Cake @else Create Cake @endif</button> </div> <!--end::Footer-->
							</form>
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			  <!--begin::Row-->
			</div> <!--end::Container-->
		</div> <!--end::App Content-->
	</main> <!--end::App Main--> <!--begin::Footer-->
@endsection