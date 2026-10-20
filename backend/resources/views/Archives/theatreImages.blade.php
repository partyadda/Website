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
                        <h3 class="mb-0">Manage {{($theatre->name ?? '')}} Theatre Images</h3>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Theatres</li>
                           <li class="breadcrumb-item active" aria-current="page">Manage Images</li>
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

                        <div class="col-md-12"> <!--begin::Quick Example-->
                            <div class="card card-success card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Please enter all <font color="red">*</font>marks fields</div>
                                </div>
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
                                <form action="{{ isset($asset_data) ? route('admin.update_asset', ['id' => $asset_data->lookup_id, 'asset_id' => $asset_data->id]) : route('admin.insert_asset', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                
                                <div class="card-body">
                                    <div class="row g-3"> <!--begin::Col-->    
                                     
											<div class="col-md-6"> 
												<label for="basic-url" class="form-label">Image<font color="red">*</font></label>
												<div class="input-group"> 
													<span class="input-group-text" id="basic-addon3"><i class="bi bi-file-arrow-up-fill"></i></span> 
													<input type="file" class="form-control" id="image" name="image" @if(!isset($asset_data)) required @endif > 
												</div>
												@if(isset($asset_data))
												@php
                                                    $imagePath = public_path('assets/img/' . ($asset_data->foldername ?? '') . '/' . ($asset_data->filename ?? ''));
                                                @endphp
            									@if(file_exists($imagePath) && !empty($asset_data->filename))
                                                    <img src="{{ URL::asset('assets/img/' . $asset_data->foldername . '/' . $asset_data->filename) }}" style="width:100px; height:100px;">
                                                @endif
                                                @endif
											</div>
										   <div class="col-md-3"> 
												<label for="basic-url" class="form-label">Sequence<font color="red">*</font></label>
												<div class="input-group"> 
													<span class="input-group-text" id="basic-addon3"><i class="bi bi-card-checklist"></i></span> 
													<input type="text" class="form-control" id="sequenceno" name="sequenceno" placeholder="Enter Priroty Number" value="{{ $asset_data->sequenceno ?? '' }}" required> 
												</div>
											</div>
										   <div class="col-md-3"> 
												<label for="basic-url" class="form-label">Status<font color="red">*</font></label>
												<div class="input-group"> 
													<span class="input-group-text" id="basic-addon3"><i class="bi bi-circle-half"></i></span> 
													<select class="form-select" id="enabled" name="enabled" required>
														<option value="">Choose Option</option>
														    <option value="1" {{ isset($asset_data) && $asset_data->enabled == 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ isset($asset_data) && $asset_data->enabled == 0 ? 'selected' : '' }}>Inactive</option>
													</select>
												</div>
											</div>
											
									</div>
								</div>
								@if(isset($asset_data))
                                <div class="card-footer"> <button class="btn btn-info" type="submit">Update Image</button> </div>
                                @else
                                 <div class="card-footer"> <button class="btn btn-info" type="submit">Add Image</button> </div>
                                @endif
                                </form>
                                <!--end::Footer-->
                            </div> <!--end::Input Group--> <!--begin::Horizontal Form-->
                        </div> <!--end::Col--> <!--begin::Col-->



                     <div class="col-md-12">
                        <div class="card mb-12">
                           <div class="card-header">
                              <h3 class="card-title">View & Manage {{($theatre->name ?? '')}} Thetre Images</h3>
                           </div>
                           <!-- /.card-header -->
						<div class="card-body">
                           <table id="myTable" style="margin:20px auto" class="table table-striped" >
                              <thead>
                                 <tr>
                                    <th>Sl.No</th>
                                    <!-- <th>Theatre Name</th> -->
									<th>Image</th>
                                    <th>Sequence No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                    @php
                                        $row_cntr = 0;
                                    @endphp
                                    @foreach($asset as $at)
        								<tr class="align-middle">
                                            <td>{{ ++$row_cntr }}</td>
                                            <!-- <td>{{$at->description}}</td> -->
                                            <td><img src="{{URL::asset('assets/img/'.$at->foldername.'/'.$at->filename)}}" style="width:100px;height:100px;"></td>
                                            <td>{{$at->sequenceno}}</td>
                                            <td>@if($at->enabled == 1)<span class="badge text-bg-primary">Active</span>@else<span class="badge text-bg-danger">Inactive</span>@endif </td>
                                            <td>		
            									<a href="{{route('admin.edit_asset',['id' => $at->lookup_id,'asset_id'=>$at->id])}}" class="btn btn-default border border-success"  id="edit_image" ><i class="bi bi-spellcheck"></i> Edit</a>
            									    @if($at->enabled == 1)
                										<a href="{{route('admin.asset_status',['ass_id' => $at->id,'id'=>$at->lookup_id ])}}"  class="btn btn-danger"  id="suspend" ><i class="bi bi-hand-thumbs-down"></i> Suspend</a>
                										@else
                										<a href="{{route('admin.asset_status', ['ass_id' => $at->id,'id'=>$at->lookup_id ]) }}"  class="btn btn-success"  id="suspend" ><i class="bi bi-hand-thumbs-up"></i> Unsuspend</a>
            										@endif
        									</td>
                                         </tr>
                                     @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>Sl.No</th>
                                    <!-- <th>Theatre Name</th> -->
									<th>Image</th>
                                    <th>Sequence No</th>
                                    <th>Status</th>
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