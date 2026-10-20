@extends('includes.layout')
@section('title','Add Add-Ons')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">@if(isset($addon)) Update Add-On @else Add a New Add-On @endif</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add-On</li>
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
                                <form action="{{ isset($addon) ? route('admin.update_addon', ['id' => $addon->id ]) : route('admin.create_add-on')}}" method="POST" enctype="multipart/form-data">
                                @csrf							    
    								<div class="row g-3"> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Add-On Name<font color="red">*</font></label> 
    										<input type="text" class="form-control" id="name" name="name" value="{{$addon->name ?? ''}}" placeholder="Ex: Party Props">
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Add-On Photo<font color="red">*</font></label> 
    										<input type="file" class="form-control" id="photo" name="photo">
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> 
    									    <label for="validationCustom04" class="form-label">Add-On Category<font color="red">*</font></label> 
    									    <select class="form-select" id="category" name="category" required>
    											<option selected disabled value="">Choose...</option>
    										    @foreach($addoncat as $add)
    										    <option value="{{$add->name}}" {{ isset($addon) && $addon->category == $add->name ? 'selected' : '' }}>{{$add->name}}</option>
    										    @endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Sequence</label> 
    										<input type="text" class="form-control" id="sequence" name="sequence" placeholder="Ex: 1" value="{{$addon->sequence ?? ''}}">
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="mb-12"> <label for="basic-url" class="form-label">Details<font color="red">*</font></label>
    										<div class="input-group"> <span class="input-group-text"><i class="bi bi-list-stars"></i></span> <textarea class="form-control" id="details" name="details" aria-label="With textarea">{{$addon->details ?? ''}}</textarea> </div>
    									</div>
    									<div class="col-md-12"> <label for="validationCustom04" class="form-label">Add-On Enable/Disable?</label> 
    										<div class="form-check"> <input class="form-check-input" type="checkbox" id="enabled" name="enabled"  value="1"
    										{{ isset($addon) && $addon->enabled == 1 ? 'checked' : '' }}> <label class="form-check-label" for="invalidCheck">Publish</label></div>
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
							<div class="card-footer"> <button class="btn btn-info" type="submit">@if(isset($addon)) Update Addon @else Create Add-On @endif</button> </div> <!--end::Footer-->
							 </form>
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			  <!--begin::Row-->
			</div> <!--end::Container-->
		</div> <!--end::App Content-->
	</main> <!--end::App Main--> <!--begin::Footer-->
@endsection