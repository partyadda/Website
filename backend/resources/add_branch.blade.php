@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">@if(isset($branch_u)) Update a Branch @else Add a New Branch @endif</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">
								General Form
							</li>
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
                            <form action="{{ isset($branch_u) ? route('admin.update_branch', ['id' => $branch_u->id ]) : route('admin.create_branch')}}" method="post">
							@csrf			
							
						
    							<div class="card-body">
    								<div class="mb-3"> <label for="basic-url" class="form-label">Branch Name<font color="red">*</font></label>
    									<div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-building-fill-add"></i></span> <input type="text" class="form-control"  id="branch_name" name="branch_name" aria-describedby="basic-addon3 basic-addon4" value="{{$branch_u->branch_name ?? ''}}"> </div>
    								</div>
    								<div class="mb-3"> <label for="basic-url" class="form-label">Business Name<font color="red">*</font></label>
    									<div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-building-fill-add"></i></span> <input type="text" class="form-control" id="business_name" name="business_name" aria-describedby="basic-addon3 basic-addon4" value="{{$branch_u->business_name ?? ''}}"> </div>
    								</div>
    								<div class="mb-3"> <label for="basic-url" class="form-label">Advance Amount<font color="red">*</font></label>
    									<div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="advance_amount" name="advance_amount" aria-label="Amount (to the nearest dollar)" value="{{$branch_u->advance_amount ?? ''}}"> <span class="input-group-text">.00</span> </div>
    								</div>
    								<div class="mb-3"> <label for="basic-url" class="form-label">Decoration Amount<font color="red">*</font></label>
    									<div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="decoration_amount" name="decoration_amount" aria-label="Amount (to the nearest dollar)" value="{{$branch_u->decoration_amount ?? ''}}"> <span class="input-group-text">.00</span> </div>
    								</div>
    								<div class="mb-3"> <label for="basic-url" class="form-label">Cancellation Terms<font color="red">*</font></label>
    									<div class="input-group"> <span class="input-group-text">Terms</span> <textarea class="form-control" id="cancellation_terms" name="cancellation_terms " aria-label="With textarea">{{$branch_u->cancellation_terms ?? ''}}</textarea> </div>
    								</div>
    								<div class="row g-3"> <!--begin::Col-->                                            
    									<div class="col-md-6"> <label for="basic-url" class="form-label">Email<font color="red">*</font></label><div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-envelope"></i></span> <input type="email" class="form-control" id="email" name="email" placeholder="Please enter Valid Email" value="{{$branch_u->email ?? ''}}" required> </div></div>
    									<div class="col-md-6"> <label for="basic-url" class="form-label">Contact Number<font color="red">*</font></label><div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-telephone-outbound"></i></span> <input type="text" class="form-control" id="contactnumber" name="contactnumber" value="{{$branch_u->contactnumber ?? ''}}" placeholder="Please enter Valid 10Digit Mobile Number" required></div></div>
    									<div class="mb-12"> <label for="basic-url" class="form-label">Branch Address<font color="red">*</font></label>
    										<div class="input-group"> <span class="input-group-text">Address</span> <textarea class="form-control" id="address " name="address " aria-label="With textarea">{{$branch_u->address ?? ''}}</textarea> </div>
    									</div>
    									<div class="col-md-4"> <label for="validationCustom01" class="form-label">GMap Location </label> <input type="email" class="form-control" id="gmap_loc" name="gmap_loc" placeholder="Please enter GMap Location Co-Ordinates" value="{{$branch_u->gmap_loc ?? ''}}"></div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom02" class="form-label">Review Rating</label> <input type="text" class="form-control" id="review_rating" name="review_rating" placeholder="Please enter Review Rating" value="{{$branch_u->review_rating ?? ''}}" ></div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">City</label> <select class="form-select" id="city_id" name="city_id" required>
    											<option selected disabled value="">Choose...</option>
    											<option>...</option>
    											@foreach($city as $c)
    											<option value="{{$c->id}}">{{$c->city_name}}</option>
    											@endforeach
    										</select>
    										<div class="invalid-feedback">
    											Please select a valid City.
    										</div>
    									</div> <!--end::Col--> <!--begin::Col-->
    
    									<h3>Decoration - <small><font color="blue" size="4px;">Without Assign the cake also Branch can be created. In the View Branches you please assign/modify the Cakes</font></small></h3>
    									<div  class="col-md-12">
    									    <div class="row" id="decoration_div">
    									        <div class="col-md-4"> <label for="validationCustom04" class="form-label">Occasion</label> <select class="form-select" id="decoration_id" name="decoration_id[]">
    											<option selected disabled value="">Choose...</option>
    											@foreach($branch_data as $br)
    											@foreach($br->decorations as $dec)
    											<option value="{{$dec->id}}">{{$dec->detail}}</option>
    											@endforeach
    											@endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    								
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Sequence</label> 
    									
    									<input type="text" name="dec_sec[]" id="dec_sec" class="form-control" />
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-4"> <label for="validationCustom04" class="form-label">&nbsp;</label> <br>
    										<a href="javascript:void(0)" class="btn btn-info" type="submit" onclick="addRow('decoration')">+ Assign Occasion</a> 
    										<div class="invalid-feedback">
    											Please select a valid City.
    										</div>
    									</div> <!--end::Col--> <!--begin::Col-->
    									        
    									        
    									    </div>
    									    
    									</div>
    									
    
    									<h3>Cakes - <small><font color="blue" size="4px;">Without Assign the cake also Branch can be created. In the View Branches you please assign/modify the Cakes</font></small></h3>
    									<div  class="col-md-12">
    									    <div class="row" id="cake_div">
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Cake</label> <select class="form-select" id="cake_id" name="cake_id[]">
    											<option selected disabled value="">Choose...</option>
    											@foreach($branch_data as $br)
    											@foreach($br->cakes as $ck)
    											<option value="{{$ck->id}}">{{$ck->cakename}}</option>
    											@endforeach
    											@endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Sequence</label> 
    									<!--<select class="form-select" id="sequence" name="sequence">-->
    									<!--		<option selected disabled value="">Choose...</option>-->
    									<!--		<option>...</option>-->
    									<!--	</select>-->
    									
    									<input type="text" name="sequence_cake[]" id="sequence_cake" class="form-control" />
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom01" class="form-label">Price</label> <input type="text" class="form-control" id="price_cake" name="price_cake[]" placeholder="Please enter Price in Rs"></div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">&nbsp;</label> <br>
    									<a href="javascript:void(0)" class="btn btn-info" type="submit" onclick="addRow('cake')">+ Assign Cake</a> 
    										<!--<button class="btn btn-info" type="submit">+ Assign Cake</button> -->
    									</div> <!--end::Col--> <!--begin::Col-->
                                        </div>
                                        </div>
    									<h3>Add-Ons - <small><font color="blue" size="4px;">Without Assign the cake also Branch can be created. In the View Branches you please assign/modify the Cakes</font></small></h3>
    									<div  class="col-md-12">
    									    <div class="row" id="addon_div">
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Add-On</label> <select class="form-select" id="addon_id" name="addon_id[]">
    											<option selected disabled value="">Choose...</option>
    											<option>...</option>@foreach($branch_data as $br)
    											@foreach($br->addons as $add)
    											<option value="{{$add->id}}">{{$add->name}}</option>
    											@endforeach
    											@endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">Sequence</label> 
    									<!--<select class="form-select" id="sequence" name="sequence">-->
    									<!--		<option selected disabled value="">Choose...</option>-->
    									<!--		<option>...</option>-->
    									<!--	</select>-->
    									<input type="text" name="sequence_addon[]" id="sequence_addon" class="form-control" />
    									</div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom01" class="form-label">Price</label> <input type="text" class="form-control" id="price_addon" name="price_addon[]" placeholder="Please enter Price in Rs"></div> <!--end::Col--> <!--begin::Col-->
    									<div class="col-md-3"> <label for="validationCustom04" class="form-label">&nbsp;</label> <br>
    									<a href="javascript:void(0)" class="btn btn-info" type="submit" onclick="addRow('addon')">+ Assign Add-On</a> 
    										<!--<button class="btn btn-info" type="submit">+ Assign Add-On</button> -->
    									</div> <!--end::Col--> <!--begin::Col-->
                                        </div>
                                        </div>
    
    									<div class="col-12">
    										<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="enabled" name="enabled" required> <label class="form-check-label" for="invalidCheck">Publish</label>
    										</div>
    									</div> <!--end::Col-->
    								</div> <!--end::Row-->
    							</div> <!--end::Body--> <!--begin::Footer-->
    							<div class="card-footer"> <button class="btn btn-info" type="submit">@if(isset($branch_u)) Update Branch @else Create Branch @endif</button> </div> <!--end::Footer-->
							</form>
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			</div> <!--end::Container-->
		</div> <!--end::App Content-->
		<div class="decoration_div_clone" style="display:none">
		    <div class="col-md-4 decoration_div_id">
		        
		    
		     <label for="validationCustom04" class="form-label">Occasion</label> <select class="form-select" id="decoration_id" name="decoration_id[]">
    											<option selected disabled value="">Choose...</option>
    											@foreach($branch_data as $br)
    											@foreach($br->decorations as $dec)
    											<option value="{{$dec->id}}">{{$dec->detail}}</option>
    											@endforeach
    											@endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    									</div>
    									
    									<div class="cake_div_clone" style="display:none">
		    <div class="col-md-3 cake_div_id">
		        
		    
		     <label for="validationCustom04" class="form-label">Cake</label> <select class="form-select" id="cake_id" name="cake_id[]">
    											<option selected disabled value="">Choose...</option>
    											@foreach($branch_data as $br)
    											@foreach($br->cakes as $ck)
    											<option value="{{$ck->id}}">{{$ck->cakename}}</option>
    											@endforeach
    											@endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    									</div>
    									
    									<div class="addon_div_clone" style="display:none">
		    <div class="col-md-3 addon_div_id">
		        
		    
		    <label for="validationCustom04" class="form-label">Add-On</label> <select class="form-select" id="addon_id" name="addon_id[]">
    											<option selected disabled value="">Choose...</option>
    											<option>...</option>@foreach($branch_data as $br)
    											@foreach($br->addons as $add)
    											<option value="{{$add->id}}">{{$add->name}}</option>
    											@endforeach
    											@endforeach
    										</select>
    									</div> <!--end::Col--> <!--begin::Col-->
    									</div>
	</main> <!--end::App Main--> <!--begin::Footer-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
 var div = $("#decoration_div");
 var divCake = $("#cake_div");
 var divAddon = $("#addon_div");
  var index = 1;	
	var i = 1;
function addRow(action){
    // alert('yes');
    if(action == 'decoration'){
        index++
    var $divData = $('.decoration_div_clone').find('.decoration_div_id'),
    $divNew = $divData.clone();
    
    var dropdrown = $divNew;
    var sequences = $("<div class='col-md-4'>").html('<label for="validationCustom04" class="form-label">Sequence</label> <input type="text" name="dec_sec[]" id="dec_sec" class="form-control" />');
	var assign_button = $("<div class='col-md-4'>").html('<label for="validationCustom04" class="form-label">&nbsp;</label> <br> <a href="javascript:void(0)" class="btn btn-info" type="submit" onclick="addRow(\'decoration\')">+ Assign Occasion</a>');
    div.append(dropdrown).append(sequences).append(assign_button);
    }
    else if(action == 'cake'){
        index++
        
        var $divDataCake = $('.cake_div_clone').find('.cake_div_id'),
    $divNewCake = $divDataCake.clone();
    
    var dropdrowncake = $divNewCake;
    
    var sequences = $("<div class='col-md-3'>").html('<label for="validationCustom04" class="form-label">Sequence</label> <input type="text" name="sequence_cake[]" id="sequence_cake" class="form-control" />');
    var prices = $("<div class='col-md-3'>").html('<label for="validationCustom04" class="form-label">Price</label> <input type="text" name="price_cake[]" id="price_cake" class="form-control" placeholder="Please enter Price in Rs" />');
    
    var assign_button = $("<div class='col-md-3'>").html('<label for="validationCustom04" class="form-label">&nbsp;</label> <br> <a href="javascript:void(0)" class="btn btn-info" type="submit" onclick="addRow(\'cake\')">+ Assign Cake</a>');
    divCake.append(dropdrowncake).append(sequences).append(prices).append(assign_button);
        // console.log(action);
    }
    else if(action == 'addon'){
         index++
        
        var $divDataAddon = $('.addon_div_clone').find('.addon_div_id'),
    $divNewAddon = $divDataAddon.clone();
    
    var dropdrownaddon = $divNewAddon;
    
    var sequences = $("<div class='col-md-3'>").html('<label for="validationCustom04" class="form-label">Sequence</label> <input type="text" name="sequence_addon[]" id="sequence_addon" class="form-control" />');
    var prices = $("<div class='col-md-3'>").html('<label for="validationCustom04" class="form-label">Price</label> <input type="text" name="price_addon[]" id="price_addon" class="form-control" placeholder="Please enter Price in Rs" />');
    
    var assign_button = $("<div class='col-md-3'>").html('<label for="validationCustom04" class="form-label">&nbsp;</label> <br> <a href="javascript:void(0)" class="btn btn-info" type="submit" onclick="addRow(\'addon\')">+ Assign Add-On </a>');
    
    
    divAddon.append(dropdrownaddon).append(sequences).append(prices).append(assign_button);
    
    
    }
    
}
</script>
@endsection