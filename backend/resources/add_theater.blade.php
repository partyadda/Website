@extends('includes.layout')
@section('title','Add Theater')

@section('content')
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Add a New Theatre</h3>
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
                                <form action="{{ route('admin.create') }}" method="POST">
                                     @csrf
                                <div class="card-body">
                                    <div class="row g-3"> <!--begin::Col-->
                                        <div class="col-md-6"> <label for="basic-url" class="form-label">Theatre Name<font color="red">*</font></label>
                                            <div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-camera-reels-fill"></i></span> <input type="text" class="form-control"  id="name" name="name" aria-describedby="basic-addon3 basic-addon4"> </div>
                                        </div>
                                        <div class="col-md-6"> <label for="basic-url" class="form-label">Display Name<font color="red">*</font></label>
                                            <div class="input-group"> <span class="input-group-text" id="basic-addon3"><i class="bi bi-camera-video"></i></span> <input type="text" class="form-control"  id="displayname" name="displayname" aria-describedby="basic-addon3 basic-addon4"> </div>
                                        </div>
                                    </div>
									<div class="row g-3"> <!--begin::Col-->          
										<div class="col-md-4"> <label for="basic-url" class="form-label">Base Price<font color="red">*</font></label><div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="price" name="price" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span></div></div>
										<div class="col-md-4"> <label for="basic-url" class="form-label">Extra Guest Price<font color="red">*</font></label><div class="input-group"> <span class="input-group-text">&#8377;</span> <input type="text" class="form-control" id="extra_person_price" name="extra_person_price" aria-label="Amount (to the nearest dollar)"> <span class="input-group-text">.00</span></div></div>
										<div class="col-md-4"> <label for="validationCustom04" class="form-label">Decoration Included?</label> <select class="form-select" id="decoration_included" name="decoration_included" required>
												<option selected disabled value="">Choose...</option>
												<option>Yes</option>
												<option>No</option>
											</select>
										</div> <!--end::Col--> <!--begin::Col-->										
									</div>
									<div class="row g-3"> <!--begin::Col-->                                            
										<div class="col-md-6"> <label for="basic-url" class="form-label">Max People<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-people"></i></span> <input type="text" class="form-control" id="max_people" name="max_people"></div></div>
										<div class="col-md-6"> <label for="basic-url" class="form-label">Max People<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-people-fill"></i></span> <input type="text" class="form-control" id="peopleallowed" name="peopleallowed"></div></div>
									</div>
									<div class="row g-3"> <!--begin::Col-->
										<div class="col-md-3"> 
										<label for="validationCustom04" class="form-label">City</label> 
										    <select class="form-select" id="city_id" name="city_id" required>
    											<option selected disabled value="">Choose City</option>
    											@foreach($city as $ct)
    											<option value="{{$ct->city_id}}">{{$ct->city_name}}</option>
    											@endforeach
											</select>
										</div> <!--end::Col--> <!--begin::Col-->
										<div class="col-md-3"> 
										    <label for="validationCustom04" class="form-label">Branch</label> 
										    <select class="form-select" id="branch_id" name="branch_id" required> </select>
										</div> <!--end::Col--> <!--begin::Col-->
										<div class="col-md-3"> <label for="basic-url" class="form-label">Audio Details<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-speaker"></i></span> <input type="text" class="form-control" id="audiodetails" name="audiodetails" > </div></div>
										<div class="col-md-3"> <label for="basic-url" class="form-label">Video Details<font color="red">*</font></label><div class="input-group"> <span class="input-group-text"><i class="bi bi-fullscreen"></i></span> <input type="text" class="form-control" id="videodetails" name="videodetails"> </div></div>
                                            @foreach($slot as $st)
                                            @endforeach
										@php
                                            $groupedSlots = $slot->groupBy('DayPart');
                                        @endphp
                                        <center><h3>Time Slots</h3></center>
										<div class="col-md-12"> 
    										@if(isset($groupedSlots['M']))
                                                <h3>Morning (M)</h3>
                                                @foreach($groupedSlots['M'] as $morningSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$morningSlot->id}}"  name="slot_id[]">
                                                      <label class="form-check-label" for="inlineCheckbox1">{{$morningSlot->name}} ({{$morningSlot->duration}} hrs - {{$morningSlot->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(isset($groupedSlots['A']))
                                                <h3>Afternoon (A)</h3>
                                                @foreach($groupedSlots['A'] as $afternoonSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$afternoonSlot->id}}" name="slot_id[]">
                                                      <label class="form-check-label" for="inlineCheckbox1">{{$afternoonSlot->name}} ({{$afternoonSlot->duration}} hrs - {{$afternoonSlot->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(isset($groupedSlots['E']))
                                                <h3>Evening (E)</h3>
                                                @foreach($groupedSlots['E'] as $eveningSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$eveningSlot->id}}" name="slot_id[]">
                                                      <label class="form-check-label" for="inlineCheckbox1">{{$eveningSlot->name}} ({{$eveningSlot->duration}} hrs - {{$st->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(isset($groupedSlots['N']))
                                                <h3>Night (N)</h3>
                                                @foreach($groupedSlots['E'] as $nightSlot)
                                                    <div class="form-check form-check-inline" style="width:30%;">
                                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$nightSlot->id}}" name="slot_id[]">
                                                      <label class="form-check-label" for="inlineCheckbox1">{{$nightSlot->name}} ({{$nightSlot->duration}} hrs - {{$st->Percentage}}%)</label>
                                                    </div>
                                                @endforeach
                                            @endif                                            
                                        </div>
									</div>
									<div class="mb-12"> <label for="basic-url" class="form-label">Description<font color="red">*</font></label>
										<div class="input-group"> <span class="input-group-text"><i class="bi bi-list-stars"></i></span> <textarea class="form-control" id="cancellation_terms " name="description" aria-label="With textarea"></textarea> </div>
									</div>

									<div class="col-12">
										<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="enabled" name="enabled" required> <label class="form-check-label" for="invalidCheck">Publish</label>
										</div>
									</div> <!--end::Col-->
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button class="btn btn-info" type="submit">Create Theatre</button> </div> <!--end::Footer-->
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
    
    $('#city_id').on('change',function(){
    // console.log($(this).val());
     $('#branch_id').html('');
    var city_id = $(this).val();
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
                    // console.log(value.address);
                    $('#branch_id').append('<option value='+value.id+'>'+value.branch_name+'</option>')
                });


            }
        });
})
});
</script>