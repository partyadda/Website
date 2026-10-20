@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">@if(isset($city_u)) Update-City @else Add a New City @endif</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">City</li>
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
							<form action="{{ isset($city_u) ? route('admin.update_city', ['id' => $city_u->id ]) : route('admin.create_city')}}" method="post">
							    
							@csrf
							<div class="card-body">
									<div class="row g-3"> <!--begin::Col-->                                            
										<div class="col-md-3"> <label for="validationCustom01" class="form-label">City Name</label> <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Please enter City Name" value="{{$city_u->city_name ?? ''}}"></div> <!--end::Col--> <!--begin::Col-->
										<div class="col-12">
											<div class="form-check"> <input class="form-check-input" type="checkbox" value="1" id="enabled" name="enabled" {{ isset($city_u) && $city_u->enabled == 1 ? 'checked' : '' }}> <label class="form-check-label" for="invalidCheck"  >Publish</label>
											</div>
										</div> <!--end::Col-->
									</div> <!--end::Row-->
								</div> <!--end::Body--> <!--begin::Footer-->
								<div class="card-footer"> <button class="btn btn-info" type="submit">@if(isset($city_u)) Update a City @else Create City @endif</button> </div> <!--end::Footer-->
								</form>
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			</div> <!--end::Container-->
		</div> <!--end::App Content-->
	</main> <!--end::App Main--> <!--begin::Footer-->
@endsection