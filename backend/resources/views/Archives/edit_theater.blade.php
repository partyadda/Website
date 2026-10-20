@extends('includes.layout')
@section('title','Edit Theater')

@section('content')
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit a Theatre</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Theatre</li>
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
                                <form action="{{ route('admin.update_theater', $theatre->id) }}" method="POST">
                                     @csrf
                                <div class="card-body">
                                    <div class="row g-3"> <!--begin::Col-->
                                        <div class="col-md-6"> <label for="basic-url" class="form-label">Theatre Name<font color="red">*</font></label>
                                            <div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-camera-reels-fill"></i></span> <input type="text" class="form-control"  id="name" name="name" value="{{$theatre->name}}" aria-describedby="basic-addon3 basic-addon4"> </div>
                                        </div>
                                        <div class="col-md-6"> <label for="basic-url" class="form-label">Display Name<font color="red">*</font></label>
                                            <div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-camera-video"></i></span> <input type="text" class="form-control"  id="displayname" name="displayname" value="{{$theatre->displayname}}" aria-describedby="basic-addon3 basic-addon4"> </div>
                                        </div>
                                    </div>
									<div class="row g-3"> <!--begin::Col-->          
										<div class="col-md-4"> <label for="basic-url" class="form-label">Base Price<font color="red">*</font></label><div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="price" name="price" value="{{$theatre->price}}" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span></div></div>
										<div class="col-md-4"> <label for="basic-url" class="form-label">Extra Guest Price<font color="red">*</font></label><div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="extra_person_price" name="extra_person_price" value="{{$theatre->extra_person_price}}" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span></div></div>
                                        <div class="col-md-4"> <label for="validationCustom04" class="form-label">Decoration Included?</label> <select class="form-select" id="decoration_included" name="decoration_included" required>
												<option selected disabled value="">Choose...</option>
												<option value="1" @if($theatre->decoration_included == '1') selected @endif>Yes</option>
												<option value="0" @if($theatre->decoration_included == '0') selected @endif>No</option>
											</select>
										</div> <!--end::Col--> <!--begin::Col-->										
									</div>
									<div class="row g-3"> <!--begin::Col-->                                            
										<div class="col-md-6"> <label for="basic-url" class="form-label">Max People<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-people"></i></span> <input type="text" class="form-control" id="max_people" name="max_people" value="{{$theatre->max_people}}"></div></div>
										<div class="col-md-6"> <label for="basic-url" class="form-label">Max People<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-people-fill"></i></span> <input type="text" class="form-control" id="peopleallowed" name="peopleallowed" value="{{$theatre->peopleallowed}}"></div></div>
									</div>
									<!--<div class="row g-3"> <!--begin::Col-->
									<!--	<div class="col-md-6"> <label for="basic-url" class="form-label">Base Price<font color="red">*</font></label><div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="price" name="price" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span></div></div>-->
									<!--	<div class="col-md-6"> <label for="basic-url" class="form-label">Extra Guest Price<font color="red">*</font></label><div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="extra_person_price" name="extra_person_price" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span></div></div>-->
									<!--</div>-->
									<div class="row g-3"> <!--begin::Col -->
										<div class="col-md-3">
										     <label for="validationCustom04" class="form-label">City</label> 
										     <select class="form-select" id="city_id" name="city_id" required onchange="get_branch_city($(this),{{$theatre->branch_id}})">
												<option selected disabled value="">Choose...</option>
												@foreach($city as $ct)
												<option value="{{$ct->id}}" @if($theatre->branchs->city_id == $ct->id) selected @endif>{{$ct->city_name}}</option>
												@endforeach
											</select>
										</div> <!--end::Col--> <!--begin::Col-->
                                        <input type="hidden" name="branch_id_hidden" id="branch_id_hidden" value="{{$theatre->branch_id}}" />
                                        <input type="hidden" name="city_id_hidden" id="city_id_hidden" value="{{$theatre->branchs->city_id}}" />
										<div class="col-md-3"> <label for="validationCustom04" class="form-label">Branch</label> <select class="form-select" id="branch_id" name="branch_id" required>
											</select>
										</div> <!--end::Col--> <!--begin::Col-->
										<div class="col-md-3"> <label for="basic-url" class="form-label">Audio Details<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-speaker"></i></span> <input type="text" class="form-control" id="audiodetails" name="audiodetails" value="{{$theatre->audiodetails}}"> </div></div>
										<div class="col-md-3"> <label for="basic-url" class="form-label">Video Details<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-fullscreen"></i></span> <input type="text" class="form-control" id="videodetails" name="videodetails" value="{{$theatre->videodetails}}"> </div></div>
                								<!--		<div class="col-md-4"> <label for="validationCustom04" class="form-label">Time Slots</label> <select class="form-select" multiple id="name" name="slot_id[]">-->
                								<!--				<option selected disabled value="">Choose...</option>-->
                								<!--				@foreach($slot as $st)-->
                												
                								<!--				<option value="{{$st->id}}"-->
                								<!--				@foreach($theatre->slots as $th_sl)-->
                                                <!--    @if($th_sl->pivot->slot_id == $st->id) selected @endif-->
                                                <!--@endforeach-->
                								<!--				>{{$st->name}} ({{$st->duration}}-{{$st->Percentage}}%)</option>-->
                								<!--				@endforeach-->
                								<!--			</select>-->
                								<!--		</div> -->
										@php
										    $groupedSlots = $slot->groupBy('DayPart');
                                        @endphp
										<div class="col-md-12"> 
										    <center><h3>Time Slots</h3></center>
    										@if(isset($groupedSlots['M']))
                                                <h3>Morning (M)</h3>
                                                @foreach($groupedSlots['M'] as $morningSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$morningSlot->id}}" value="{{$morningSlot->id}}"  name="slot_id[]"
                                                        @foreach($theatre->slots as $th_sl)
                                                            @if($th_sl->pivot->slot_id == $morningSlot->id) checked @endif
                                                        @endforeach>
                                                      <label class="form-check-label" for="inlineCheckbox{{$morningSlot->id}}">{{$morningSlot->name}} ({{$morningSlot->duration}} hrs - {{$morningSlot->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(isset($groupedSlots['A']))
                                                <h3>Afternoon (A)</h3>
                                                @foreach($groupedSlots['A'] as $afternoonSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$afternoonSlot->id}}" value="{{$afternoonSlot->id}}" name="slot_id[]"  
                                                        @foreach($theatre->slots as $th_sl)
                                                            @if($th_sl->pivot->slot_id == $afternoonSlot->id) checked @endif
                                                        @endforeach>
                                                      <label class="form-check-label" for="inlineCheckbox{{$afternoonSlot->id}}">{{$afternoonSlot->name}} ({{$afternoonSlot->duration}} hrs - {{$afternoonSlot->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(isset($groupedSlots['E']))
                                                <h3>Evening (E)</h3>
                                                @foreach($groupedSlots['E'] as $eveningSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$eveningSlot->id}}" value="{{$eveningSlot->id}}" name="slot_id[]"
                                                       @foreach($theatre->slots as $th_sl)
                                                            @if($th_sl->pivot->slot_id == $eveningSlot->id) checked @endif
                                                        @endforeach>
                                                      <label class="form-check-label" for="inlineCheckbox{{$eveningSlot->id}}">{{$eveningSlot->name}} ({{$eveningSlot->duration}} hrs - {{$st->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(isset($groupedSlots['N']))
                                                <h3>Night (N)</h3>
                                                @foreach($groupedSlots['N'] as $nightSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$nightSlot->id}}" value="{{$nightSlot->id}}" name="slot_id[]"
                                                       @foreach($theatre->slots as $th_sl)
                                                            @if($th_sl->pivot->slot_id == $nightSlot->id) checked @endif
                                                        @endforeach>
                                                      <label class="form-check-label" for="inlineCheckbox{{$nightSlot->id}}">{{$nightSlot->name}} ({{$nightSlot->duration}} hrs - {{$st->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
									</div>
									<div class="mb-12"> <label for="basic-url" class="form-label">Description<font color="red">*</font></label>
										<div class="input-group"> <span class="input-group-text"><i class="bi bi-list-stars"></i></span> <textarea class="form-control" id="cancellation_terms " name="description" aria-label="With textarea">{{$theatre->description}}</textarea> </div>
									</div>

									<div class="col-12">
										<div class="form-check"> <input class="form-check-input" type="checkbox" value="1" id="enabled" name="enabled" 
										@if($theatre->status == 1) checked @else '' @endif ><label class="form-check-label" for="invalidCheck">Publish</label>
										</div>
									</div> <!--end::Col-->
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button class="btn btn-info" type="submit">Update Theatre</button> </div> <!--end::Footer-->
                                    </form>
                            </div> <!--end::Input Group--> <!--begin::Horizontal Form-->
                        </div> <!--end::Col--> <!--begin::Col-->
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
    @endsection
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    get_branch_city($('#city_id_hidden'),$('#branch_id_hidden'));
    // $('#city_id').on('change',function(){
    // console.log($(this).val());
   
// })
});


 function get_branch_city(val,id){
     console.log(val)
     $('#branch_id').html('');
    var city_id = $(val).val();
    var branch_id = $(id).val();
    $.ajax({
            url: "{{ url('admin/city') }}",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "city_id" :  city_id,
                
            },
            success: function(data) {
                // console.log(data);
                // console.log(data['doneMessage']);
                $('#branch_id').append('<option>Select Branch</option>')
                  $(data).each(function(key, value) {
                      var select = '';
                      if(branch_id == value.id){
                          select = 'selected';
                      }
                      else{
                          select = '';
                      }
                    // console.log(value.address);
                    $('#branch_id').append('<option value='+value.id+' '+select+'>'+value.branch_name+'</option>')
                });


            }
        });
    }
</script>