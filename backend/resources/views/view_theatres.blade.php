    @extends('includes.layout')
    @section('title','View Theaters')
    
    @section('content')
             <!--end::Sidebar--> <!--begin::App Main-->
             <main class="app-main">
                <!--begin::App Content Header-->
                <div class="app-content-header">
                   <!--begin::Container-->
                   <div class="container-fluid">
                      <!--begin::Row-->
                      <div class="row">
                         <div class="col-sm-6">
                            <h3 class="mb-0">View All Theatres</h3>
                         </div>
                         <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                               <li class="breadcrumb-item"><a href="#">Home</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Theatres</li>
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
                                        <th>City & Branch</th>
                                        <th>Details</th>
                                        <th>People & Price</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
    								
    								    @php
    								    $i = 1;
    								    @endphp
    								    @foreach($theatre as $th)
    								    <tr class="align-middle">
                                        <td>{{$i}}</td>
                                        <td>{{$th->name}}<br>{{$th->displayname}}<br>
                                        @if($th->status == 1)<span class="badge text-bg-success">Active</span>@else <span class="badge text-bg-danger">Inactive</span> @endif</td>
                                        <td>{{$th->branchs->city->city_name}} & {{$th->branchs->branch_name}}</td>
                                        <td>{!! $th->description !!}</td>
                                        <td>Max People : {{$th->max_people}}<br>People Allowed : {{$th->peopleallowed}}<br>Base Price : &#8377; {{$th->price}}/-<br>Extra Guest : &#8377; {{$th->extra_person_price}}/-</td>
                                        <td>		
    											<a href="{{ route('admin.edit_theater', ['id' => $th->id ]) }}"  class="btn btn-info" ><i class="bi bi-pencil"></i> Edit</a> 
    											<a href="{{ route('admin.image', ['id' => $th->id ]) }}"  class="btn btn-default border border-success" name="theatre" id="theatre" ><i class="bi bi-camera"></i> Manage Images</a> <br><br>
    											
    											
    											
    											@if($th->status == 1)
    											<a href='{{ route('admin.status', ['id' => $th->id,'status'=> 0 ]) }}'  class="btn btn-warning"  id="suspend" ><i class="bi bi-hand-thumbs-down"></i> Suspend</a>
    											@else
    											<a href='{{ route('admin.status', ['id' => $th->id,'status' => 1 ]) }}'  class="btn btn-success"  id="suspend" ><i class="bi bi-hand-thumbs-up"></i> Unsuspend</a>
    											@endif
    											<form action="{{ route('admin.delete', ['id' => $th->id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
    											    @csrf
    @method('DELETE')
    											<button type="submit" class="btn btn-danger" name="delete" value="delete"><i class="bi bi-trash"></i> Delete</button> 
    											</button>
    											</form>
    											</div>
    									</td>
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
          </div>
          <!--end::App Content-->
          </main> <!--end::App Main--> <!--begin::Footer-->
          
    @endsection      