@extends('includes.layout')
@section('title','View City Theatre')

@section('content')
	<main class="app-main">
		<!--begin::App Content Header-->
		<!--<div class="app-content-header">-->
		   <!--begin::Container-->
		<!--   <div class="container-fluid">-->
			  <!--begin::Row-->
		<!--	  <div class="row">-->
		<!--		 <div class="col-sm-6">-->
		<!--			<h3 class="mb-0">View {{$city_theatre->city->city_name}} City Theatre</h3>-->
		<!--		 </div>-->
		<!--		 <div class="col-sm-6">-->
		<!--			<ol class="breadcrumb flosat-sm-end">-->
		<!--			   <li class="breadcrumb-item"><a href="#">Home</a></li>-->
		<!--			   <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.view_theatres')}}">View Theatre</a></li>-->
		<!--			</ol>-->
		<!--		 </div>-->
		<!--	  </div>-->
			  <!--end::Row-->
		<!--   </div>-->
		   <!--end::Container-->
		<!--</div>-->
		
		 <div class="app-content-header">
                   <!--begin::Container-->
                   <div class="container-fluid">
                      <!--begin::Row-->
                      <div class="row">
                         <div class="col-sm-6">
                            <h3 class="mb-0">View {{$city_theatre->city->city_name}} City Theatre</h3>
                         </div>
                         <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                               <li class="breadcrumb-item"><a href="#">Home</a></li>
                               <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.view_theatres')}}">View Theatre</a></li>
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
                                  <h3 class="card-title">Please click on the Action Button to manage the Theatres</h3>
                               </div>
                               <!-- /.card-header -->
    							<div class="card-body">
                               <table id="myTable" style="margin:20px auto" class="table table-striped" >
                                  <thead>
                                     <tr>
                                        <th>Sl.No</th>
                                        <th>Name</th>
                                        <th>Branch</th>
                                        <th>Details</th>
                                        <th>People & Price</th>
                                        
                                     </tr>
                                  </thead>
                                  <tbody>
    								
    								    @php
    								    $i = 1;
    								    @endphp
    								    @foreach($city_theatre->theatres as $th)
    								    <tr class="align-middle">
                                        <td>{{$i}}</td>
                                        <td>{{$th->name}}<br>{{$th->displayname}}<br>
                                        @if($th->status == 1)<span class="badge text-bg-success">Active</span>@else <span class="badge text-bg-danger">Inactive</span> @endif</td>
                                        <td>{{$city_theatre->branch_name}}</td>
                                        <td>{!! $th->description !!}</td>
                                        <td>Max People : {{$th->max_people}}<br>People Allowed : {{$th->peopleallowed}}<br>Base Price : &#8377; {{$th->price}}/-<br>Extra Guest : &#8377; {{$th->extra_person_price}}/-</td>
                                        
    									</tr>
    									@php
    									$i++;
    									@endphp
    									@endforeach
    									
                                     
    								
                                  </tbody>
                                  <tfoot>
                                     <tr>
                                        <th>Sl.No</th>
                                        <th>Name</th>
                                        <th>City & Branch</th>
                                        <th>Details</th>
                                        <th>People & Price</th>
                                        
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