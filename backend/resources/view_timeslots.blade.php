@extends('includes.layout')
@section('title','View Theaters')

@section('content')
	<main class="app-main"> <!--begin::App Content Header-->
		<div class="app-content-header"> <!--begin::Container-->
			<div class="container-fluid"> <!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">@if(isset($slots_u)) Update Time Slot @else Add a New Time Slot @endif</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Time Slots</li>
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
							<form action="{{ isset($slots_u) ? route('admin.update_timeslots', ['id' => $slots_u->id ]) : route('admin.create_timeslots')}}" method="POST">
							     @csrf
							
							<div class="card-body">
								<div class="row g-3"> <!--begin::Col-->
									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Time Slot Name</label> 
										<input type="text" class="form-control" id="name" name="name" placeholder="Ex: M - 09:00 To 11:00" value="{{ $slots_u->name ?? '' }}">
									</div> <!--end::Col--> <!--begin::Col-->
									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Start Time</label> <select class="form-select" id="start_time" name="start_time">
											<option selected disabled value="">Choose...</option>
											<option value="1:00" {{ isset($slots_u) && $slots_u->start_time == '01:00:00' ? 'selected' : '' }}>1:00</option>
											<option value="1:30" {{ isset($slots_u) && $slots_u->start_time == '01:30:00' ? 'selected' : '' }}>1:30</option>
											<option value="2:00" {{ isset($slots_u) && $slots_u->start_time == '02:00:00' ? 'selected' : '' }}>2:00</option>
											<option value="3:30" {{ isset($slots_u) && $slots_u->start_time == '03:30:00' ? 'selected' : '' }}>3:30</option>
											<option value="4:00" {{ isset($slots_u) && $slots_u->start_time == '04:00:00' ? 'selected' : '' }}>4:00</option>
											<option value="4:30" {{ isset($slots_u) && $slots_u->start_time == '04:30:00' ? 'selected' : '' }}>4:30</option>
											<option value="5:00" {{ isset($slots_u) && $slots_u->start_time == '05:00:00' ? 'selected' : '' }}>5:00</option>
											<option value="5:30" {{ isset($slots_u) && $slots_u->start_time == '05:30:00' ? 'selected' : '' }}>5:30</option>
											<option value="6:00" {{ isset($slots_u) && $slots_u->start_time == '06:00:00' ? 'selected' : '' }}>6:00</option>
											<option value="6:30" {{ isset($slots_u) && $slots_u->start_time == '06:30:00' ? 'selected' : '' }}>6:30</option>
											<option value="7:00" {{ isset($slots_u) && $slots_u->start_time == '07:00:00' ? 'selected' : '' }}>7:00</option>
											<option value="7:30" {{ isset($slots_u) && $slots_u->start_time == '07:30:00' ? 'selected' : '' }}>7:30</option>
											<option value="8:00" {{ isset($slots_u) && $slots_u->start_time == '08:00:00' ? 'selected' : '' }}>8:00</option>
											<option value="8:30" {{ isset($slots_u) && $slots_u->start_time == '08:30:00' ? 'selected' : '' }}>8:30</option>
											<option value="9:00" {{ isset($slots_u) && $slots_u->start_time == '09:00:00' ? 'selected' : '' }}>9:00</option>
											<option value="9:30" {{ isset($slots_u) && $slots_u->start_time == '09:30:00' ? 'selected' : '' }}>9:30</option>
											<option value="10:00" {{ isset($slots_u) && $slots_u->start_time == '10:00:00' ? 'selected' : '' }}>10:00</option>
											<option value="10:30" {{ isset($slots_u) && $slots_u->start_time == '10:30:00' ? 'selected' : '' }}>10:30</option>
											<option value="11:00" {{ isset($slots_u) && $slots_u->start_time == '11:00:00' ? 'selected' : '' }}>11:00</option>
											<option value="11:30" {{ isset($slots_u) && $slots_u->start_time == '11:30:00' ? 'selected' : '' }}>11:30</option>
											<option value="12:00" {{ isset($slots_u) && $slots_u->start_time == '12:00:00' ? 'selected' : '' }}>12:00</option>
											<option value="12:30" {{ isset($slots_u) && $slots_u->start_time == '12:30:00' ? 'selected' : '' }}>12:30</option>
											<option value="13:00" {{ isset($slots_u) && $slots_u->start_time == '13:00:00' ? 'selected' : '' }}>13:00</option>
											<option value="13:30" {{ isset($slots_u) && $slots_u->start_time == '13:30:00' ? 'selected' : '' }}>13:30</option>
											<option value="14:00" {{ isset($slots_u) && $slots_u->start_time == '14:00:00' ? 'selected' : '' }}>14:00</option>
											<option value="14:30" {{ isset($slots_u) && $slots_u->start_time == '14:30:00' ? 'selected' : '' }}>14:30</option>
											<option value="15:00" {{ isset($slots_u) && $slots_u->start_time == '15:00:00' ? 'selected' : '' }}>15:00</option>
											<option value="15:30" {{ isset($slots_u) && $slots_u->start_time == '15:30:00' ? 'selected' : '' }}>15:30</option>
											<option value="16:00" {{ isset($slots_u) && $slots_u->start_time == '16:00:00' ? 'selected' : '' }}>16:00</option>
											<option value="16:30" {{ isset($slots_u) && $slots_u->start_time == '16:30:00' ? 'selected' : '' }}>16:30</option>
											<option value="17:00" {{ isset($slots_u) && $slots_u->start_time == '17:00:00' ? 'selected' : '' }}>17:00</option>
											<option value="17:30" {{ isset($slots_u) && $slots_u->start_time == '17:30:00' ? 'selected' : '' }}>17:30</option>
											<option value="18:00" {{ isset($slots_u) && $slots_u->start_time == '18:00:00' ? 'selected' : '' }}>18:00</option>
											<option value="18:30" {{ isset($slots_u) && $slots_u->start_time == '18:30:00' ? 'selected' : '' }}>18:30</option>
											<option value="19:00" {{ isset($slots_u) && $slots_u->start_time == '19:00:00' ? 'selected' : '' }}>19:00</option>
											<option value="19:30" {{ isset($slots_u) && $slots_u->start_time == '19:30:00' ? 'selected' : '' }}>19:30</option>
											<option value="20:00" {{ isset($slots_u) && $slots_u->start_time == '20:00:00' ? 'selected' : '' }}>20:00</option>
											<option value="20:30" {{ isset($slots_u) && $slots_u->start_time == '20:30:00' ? 'selected' : '' }}>20:30</option>
											<option value="21:00" {{ isset($slots_u) && $slots_u->start_time == '21:00:00' ? 'selected' : '' }}>21:00</option>
											<option value="21:30" {{ isset($slots_u) && $slots_u->start_time == '21:30:00' ? 'selected' : '' }}>21:30</option>
											<option value="22:00" {{ isset($slots_u) && $slots_u->start_time == '22:00:00' ? 'selected' : '' }}>22:00</option>
											<option value="22:30" {{ isset($slots_u) && $slots_u->start_time == '22:30:00' ? 'selected' : '' }}>22:30</option>
											<option value="23:00" {{ isset($slots_u) && $slots_u->start_time == '23:00:00' ? 'selected' : '' }}>23:00</option>
											<option value="23:30" {{ isset($slots_u) && $slots_u->start_time == '23:30:00' ? 'selected' : '' }}>23:30</option>
											<option value="24:00" {{ isset($slots_u) && $slots_u->start_time == '24:00:00' ? 'selected' : '' }}>24:00</option>
										</select>
									</div> <!--end::Col--> <!--begin::Col-->
									<div class="col-md-4"> <label for="validationCustom04" class="form-label">End Time</label> <select class="form-select" id="end_time" name="end_time">
											<option selected disabled value="">Choose...</option>
											<option value="1:00" {{ isset($slots_u) && $slots_u->end_time == '01:00:00' ? 'selected' : '' }}>1:00</option>
											<option value="1:30" {{ isset($slots_u) && $slots_u->end_time == '01:30:00' ? 'selected' : '' }}>1:30</option>
											<option value="2:00" {{ isset($slots_u) && $slots_u->end_time == '02:00:00' ? 'selected' : '' }}>2:00</option>
											<option value="3:30" {{ isset($slots_u) && $slots_u->end_time == '03:30:00' ? 'selected' : '' }}>3:30</option>
											<option value="4:00" {{ isset($slots_u) && $slots_u->end_time == '04:00:00' ? 'selected' : '' }}>4:00</option>
											<option value="4:30" {{ isset($slots_u) && $slots_u->end_time == '04:30:00' ? 'selected' : '' }}>4:30</option>
											<option value="5:00" {{ isset($slots_u) && $slots_u->end_time == '05:00:00' ? 'selected' : '' }}>5:00</option>
											<option value="5:30" {{ isset($slots_u) && $slots_u->end_time == '05:30:00' ? 'selected' : '' }}>5:30</option>
											<option value="6:00" {{ isset($slots_u) && $slots_u->end_time == '06:00:00' ? 'selected' : '' }}>6:00</option>
											<option value="6:30" {{ isset($slots_u) && $slots_u->end_time == '06:30:00' ? 'selected' : '' }}>6:30</option>
											<option value="7:00" {{ isset($slots_u) && $slots_u->end_time == '07:00:00' ? 'selected' : '' }}>7:00</option>
											<option value="7:30" {{ isset($slots_u) && $slots_u->end_time == '07:30:00' ? 'selected' : '' }}>7:30</option>
											<option value="8:00" {{ isset($slots_u) && $slots_u->end_time == '08:00:00' ? 'selected' : '' }}>8:00</option>
											<option value="8:30" {{ isset($slots_u) && $slots_u->end_time == '08:30:00' ? 'selected' : '' }}>8:30</option>
											<option value="9:00" {{ isset($slots_u) && $slots_u->end_time == '09:00:00' ? 'selected' : '' }}>9:00</option>
											<option value="9:30" {{ isset($slots_u) && $slots_u->end_time == '09:30:00' ? 'selected' : '' }}>9:30</option>
											<option value="10:00" {{ isset($slots_u) && $slots_u->end_time == '10:00:00' ? 'selected' : '' }}>10:00</option>
											<option value="10:30" {{ isset($slots_u) && $slots_u->end_time == '10:30:00' ? 'selected' : '' }}>10:30</option>
											<option value="11:00" {{ isset($slots_u) && $slots_u->end_time == '11:00:00' ? 'selected' : '' }}>11:00</option>
											<option value="11:30" {{ isset($slots_u) && $slots_u->end_time == '11:30:00' ? 'selected' : '' }}>11:30</option>
											<option value="12:00" {{ isset($slots_u) && $slots_u->end_time == '12:00:00' ? 'selected' : '' }}>12:00</option>
											<option value="12:30" {{ isset($slots_u) && $slots_u->end_time == '12:30:00' ? 'selected' : '' }}>12:30</option>
											<option value="13:00" {{ isset($slots_u) && $slots_u->end_time == '13:00:00' ? 'selected' : '' }}>13:00</option>
											<option value="13:30" {{ isset($slots_u) && $slots_u->end_time == '13:30:00' ? 'selected' : '' }}>13:30</option>
											<option value="14:00" {{ isset($slots_u) && $slots_u->end_time == '14:00:00' ? 'selected' : '' }}>14:00</option>
											<option value="14:30" {{ isset($slots_u) && $slots_u->end_time == '14:30:00' ? 'selected' : '' }}>14:30</option>
											<option value="15:00" {{ isset($slots_u) && $slots_u->end_time == '15:00:00' ? 'selected' : '' }}>15:00</option>
											<option value="15:30" {{ isset($slots_u) && $slots_u->end_time == '15:30:00' ? 'selected' : '' }}>15:30</option>
											<option value="16:00" {{ isset($slots_u) && $slots_u->end_time == '16:00:00' ? 'selected' : '' }}>16:00</option>
											<option value="16:30" {{ isset($slots_u) && $slots_u->end_time == '16:30:00' ? 'selected' : '' }}>16:30</option>
											<option value="17:00" {{ isset($slots_u) && $slots_u->end_time == '17:00:00' ? 'selected' : '' }}>17:00</option>
											<option value="17:30" {{ isset($slots_u) && $slots_u->end_time == '17:30:00' ? 'selected' : '' }}>17:30</option>
											<option value="18:00" {{ isset($slots_u) && $slots_u->end_time == '18:00:00' ? 'selected' : '' }}>18:00</option>
											<option value="18:30" {{ isset($slots_u) && $slots_u->end_time == '18:30:00' ? 'selected' : '' }}>18:30</option>
											<option value="19:00" {{ isset($slots_u) && $slots_u->end_time == '19:00:00' ? 'selected' : '' }}>19:00</option>
											<option value="19:30" {{ isset($slots_u) && $slots_u->end_time == '19:30:00' ? 'selected' : '' }}>19:30</option>
											<option value="20:00" {{ isset($slots_u) && $slots_u->end_time == '20:00:00' ? 'selected' : '' }}>20:00</option>
											<option value="20:30" {{ isset($slots_u) && $slots_u->end_time == '20:30:00' ? 'selected' : '' }}>20:30</option>
											<option value="21:00" {{ isset($slots_u) && $slots_u->end_time == '21:00:00' ? 'selected' : '' }}>21:00</option>
											<option value="21:30" {{ isset($slots_u) && $slots_u->end_time == '21:30:00' ? 'selected' : '' }}>21:30</option>
											<option value="22:00" {{ isset($slots_u) && $slots_u->end_time == '22:00:00' ? 'selected' : '' }}>22:00</option>
											<option value="22:30" {{ isset($slots_u) && $slots_u->end_time == '22:30:00' ? 'selected' : '' }}>22:30</option>
											<option value="23:00" {{ isset($slots_u) && $slots_u->end_time == '23:00:00' ? 'selected' : '' }}>23:00</option>
											<option value="23:30" {{ isset($slots_u) && $slots_u->end_time == '23:30:00' ? 'selected' : '' }}>23:30</option>
											<option value="24:00" {{ isset($slots_u) && $slots_u->end_time == '24:00:00' ? 'selected' : '' }}>24:00</option>
										</select>
									</div> <!--end::Col--> <!--begin::Col-->
									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Day Part</label> <select class="form-select" id="DayPart" name="DayPart">
											<option selected disabled value="">Choose...</option>
											<option value="M" {{ isset($slots_u) && $slots_u->DayPart == 'M' ? 'selected' : '' }}>Morning</option>
											<option value="A" {{ isset($slots_u) && $slots_u->DayPart == 'A' ? 'selected' : '' }}>Afternoon</option>
											<option value="E" {{ isset($slots_u) && $slots_u->DayPart == 'E' ? 'selected' : '' }}>Evening</option>
											<option value="N" {{ isset($slots_u) && $slots_u->DayPart == 'N' ? 'selected' : '' }}>Night</option>
										</select>
									</div> <!--end::Col--> <!--begin::Col-->
									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Percentage</label> 
										<input type="text" class="form-control" id="Percentage" value="{{ $slots_u->Percentage ?? '' }}" name="Percentage" placeholder="Percentage without % Symbol">
									</div> <!--end::Col--> <!--begin::Col-->
									<div class="col-md-4"> <label for="validationCustom04" class="form-label">Enable/Disable?</label><br/> 
										<input class="form-check-input" type="checkbox" value="1" id="enabled" name="enabled" {{ isset($slots_u) && $slots_u->enabled == 1 ? 'checked' : '' }}> <label class="form-check-label" for="invalidCheck">Enable</label>
									</div> <!--end::Col--> <!--begin::Col-->
								</div>
							</div> <!--end::Body--> <!--begin::Footer-->
							<div class="card-footer"> 
							<button class="btn btn-info" type="submit">@if(isset($slots_u)) Update Time Slot @else Create Time Slot @endif</button> </div>
							
							</form>
							<!--end::Footer-->
						</div> <!--end::Input Group--> <!--begin::Horizontal Form-->
					</div> <!--end::Col--> <!--begin::Col-->
				</div> <!--end::Row-->
			  <!--begin::Row-->
			  <div class="row">
				 <div class="col-md-12">
					<div class="card mb-12">
					   <div class="card-header">
						  <h3 class="card-title">Time Slots</h3>
					   </div>
					   <!-- /.card-header -->
					<div class="card-body">
					   <table id="myTable" style="margin:20px auto" class="table table-striped" >
						  <thead>
							 <tr>
								<th>Sl.No</th>
								<th>Slot Name</th>
								<th>Start & End Time</th>
								<th>DayPart</th>
								<th>Percentage</th>
								<th>Action</th>
							 </tr>
						  </thead>
						  <tbody>
	                       @php 
						   $row = 0;
						   @endphp
						   @foreach($slots as $slot)
							<tr class="align-middle">
                                <td>{{++$row}}</td>
								<td>{{$slot->name}}<br>@if($slot->enabled == 1)<span class="badge text-bg-success">Active</span> @else <span class="badge text-bg-info">Inactive</span> @endif</td>
								<td><b>Start Time : </b>{{$slot->start_time}}<br><b>End Time : </b>{{$slot->end_time}}<br><b>Duration : </b> : {{$slot->duration}}</td>
								<td>{{$slot->DayPart}}</td>
								<td>{{$slot->Percentage}}%</td>  
								<td>		
								    <a href="{{route('admin.timeslot',$slot->id)}}" class="btn btn-primary" id="services"><i class="bi bi-pencil"></i> Edit</a>
								    @if($slot->enabled == 1)
									<a href="{{route('admin.suspend_timeslots',$slot->id)}}" class="btn btn-warning" id="suspend"><i class="bi bi-hand-thumbs-down"></i>Suspend</a>
									@else
									<a href="{{route('admin.suspend_timeslots',$slot->id)}}" class="btn btn-success" id="suspend"><i class="bi bi-hand-thumbs-up"></i>Unuspend</a>
									@endif
								</td>
							 </tr>
							@endforeach 
						  </tbody>
						  <tfoot>
							 <tr>
								<th>Sl.No</th>
								<th>Slot Name</th>
								<th>Start & End Time</th>
								<th>DayPart</th>
								<th>Percentage</th>
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