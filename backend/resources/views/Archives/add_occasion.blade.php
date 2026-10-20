@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">Add a New Occasion</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Occasions</li>
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
                            <form action="{{ isset($occasion) ? route('admin.update_occasion', ['id' => $occasion->id ]) : route('admin.create_occasion')}}" method="post" enctype="multipart/form-data">
							@csrf						
    							<div class="card-body">
    								<div class="row g-3"> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Decoration Name<font color="red">*</font></label> 
    										<input type="text" class="form-control" id="name" name="name" placeholder="Ex: Birthday" value="{{$occasion->name ?? ''}}" required>
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Person#1 Lable Name<font color="red">*</font></label> 
    										<input type="text" class="form-control" id="person1" name="person1" placeholder="Birthday Person Name" value="{{$occasion->person1 ?? ''}}" required>
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Person#2 Lable Name</label> 
    										<input type="text" class="form-control" id="person2" name="person2" placeholder="Your name" value="{{$occasion->person2 ?? ''}}">
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">No.Of Person</label> 
    										<input type="text" class="form-control" id="noofperson" name="noofperson" placeholder="No. Of. Person" value="{{$occasion->noofperson ?? ''}}">
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="mb-12"> <label for="basic-url" class="form-label">Details<font color="red">*</font></label>
    										<div class="input-group"> <span class="input-group-text">Info</span> <textarea class="form-control" id="detail " name="detail" aria-label="With textarea">{{$occasion->detail ?? ''}}</textarea> </div>
    									</div>
    									<div class="col-md-12"> <label for="validationCustom04" class="form-label">Occasion Photo</label> 
    										<input type="file" class="form-control" id="photo" name="photo">
    									</div> <!--end::Col--> <!--begin::Col-->
    									@if(isset($asset))
												@php
                                                    $imagePath = public_path('assets/img/' . ($asset->foldername ?? '') . '/' . ($asset->filename ?? ''));
                                                @endphp
            									@if(file_exists($imagePath) && !empty($asset->filename))
                                                    <img src="{{ URL::asset('assets/img/' . $asset->foldername . '/' . $asset->filename) }}" style="width:100px; height:100px;">
                                                @endif
                                                @endif
    								</div>
    							</div> <!--end::Body--> <!--begin::Footer-->
    							<div class="card-footer"> <button class="btn btn-info" type="submit">Create Occasion</button> </div> <!--end::Footer-->
    						</form>
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			  <!--begin::Row-->
			</div> <!--end::Container-->
		</div> <!--end::App Content-->
	</main> <!--end::App Main--> <!--begin::Footer-->
@endsection