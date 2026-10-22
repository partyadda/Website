@extends('includes.layout')
@section('title','Edit Package')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Edit Package</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Edit Package
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
            id="error_div_main"></button>
          @foreach($errors->all() as $er)
          <span><i class="icon-arrow-right5"></i> {{ $er }}</span> <br>
          @endforeach
        </div>
        @endif

        <div class="card card-success card-outline mb-4">
          <div class="card-header">
            <h3 class="card-title">Edit Package</h3>
          </div>
          <div class="card-body">
            <div class="row">
              @isset($package)
              <form action="{{ route('admin.package.update') }}" method="POST" id="package_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="package_id" id="package_id" value="{{ $package->id }}" />

                <div class="row g-3">
                  <div class="col-lg-6">
                    <label for="package_name" class="form-label">Package Name <font color="red">*</font></label>
                    <input type="text" class="form-control" name="package_name" id="package_name" max="250"
                      placeholder="Enter" value="{{ old('package_name', $package->package_name)  ?? ''}}" required />
                  </div>

                  <div class="col-lg-6">
                    <label for="title" class="form-label">Package Title <font color="red">*</font></label>
                    <input type="text" class="form-control" name="title" id="title" max="60"
                      placeholder="Enter" value="{{ old('title', $package->title)  ?? ''}}" required />
                  </div>

                   <div class="col-lg-4">
                    <label for="branch_id" class="form-label">Branch <font color="red">*</font></label>
                    <select class="form-select" id="branch_id" name="branch_id">
                      <option value="">Select</option>
                      @foreach ($branches as $branch)
                         <option value="{{ $branch->id }}" {{ old('branch_id', $package->branch->id) == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for="theatre_id" class="form-label">Theatre <font color="red">*</font></label>
                    <select class="form-select" id="theatre_id" name="theatre_id">
                      <option value="">Select</option>
                       @foreach ($branch_theaters as $theatre)
                         <option value="{{ $theatre->id }}" {{ old('theatre_id', $package->theatre->id) == $theatre->id ? 'selected' : '' }}>{{ $theatre->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for="decoration_id" class="form-label">Decoration <font color="red">*</font></label>
                    <select class="form-select" id="decoration_id" name="decoration_id">
                      <option value="">Select</option>
                      @foreach ($decorations as $decoration)
                         <option value="{{ $decoration->id }}" {{ old('theatre_id', $package->decoration->id) == $decoration->id ? 'selected' : '' }}>{{ $decoration->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-lg-3">
                    <label for="package_amount" class="form-label">Package Amount <font color="red">*</font></label>
                    <input type="number" class="form-control" name="package_amount" id="package_amount" min="1" step="1"
                      placeholder="Enter" value="{{ old('package_amount', $package->package_amount)  ?? ''}}"
                      required oninput="this.reportValidity()"/>
                  </div>

                  <div class="col-lg-3">
                    <label for="advance_amount" class="form-label">Advance Amount <font color="red">*</font></label>
                    <input type="number" class="form-control" name="advance_amount" id="advance_amount" min="1" step="1"
                      placeholder="Enter" value="{{ old('advance_amount', $package->advance_amount)  ?? ''}}"
                      required oninput="this.reportValidity()"/>
                  </div>

                  <div class="col-lg-3">
                    <label for="people_allowed" class="form-label">People Allowed <font color="red">*</font></label>
                    <input type="number" class="form-control" name="people_allowed" id="people_allowed" min="1" step="1"
                      placeholder="Enter" value="{{ old('people_allowed', $package->people_allowed)  ?? ''}}"
                      required oninput="this.reportValidity()"/>
                  </div>

                  <div class="col-lg-3">
                    <label for="max_people" class="form-label">Max People<font color="red">*</font></label>
                    <input type="number" class="form-control" name="max_people" id="people_allowed" min="1" step="1"
                      placeholder="Enter" value="{{ old('max_people', $package->max_people)  ?? ''}}" required oninput="this.reportValidity()"/>
                  </div>
                  
               <div class="col-lg-3" style="margin-top: 16px">
                    <label for="payment_screen_shot" class="form-label">Payment Screenshot</label>
                    <input type="file" name="payment_screen_shot" id="payment_screen_shot">
                </div>

                  <div class="col-lg-12">
                    <label for="SEO_keywords" class="form-label">SEO Keywords</label>
                    <textarea class="form-control" name="SEO_keywords" id="SEO_keywords" rows="4" maxlength="400"
                      placeholder="Enter">{{ old('SEO_keywords', $package->SEO_keywords) }}</textarea>
                  </div>

                  <div class="col-lg-12">
                    <label for="google_review" class="form-label">Google Review</label>
                    <textarea class="form-control" name="google_review" id="google_review" rows="4" maxlength="4000"
                      placeholder="Enter">{{ old('google_review', $package->google_review) ?? ''}}</textarea>
                  </div>

                  <div class="col-lg-12">
                    <label for="other_option" class="form-label">Other option</label>
                    <textarea class="form-control" name="other_option" id="other_option" rows="7" maxlength="400"
                      placeholder="Enter">{{ old('other_option', $package->other_option) ?? ''}}</textarea>
                  </div>

                  <div class="col-lg-12">
                    <label for="short_desc" class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_desc" id="short_desc" rows="3" maxlength="1000"
                      placeholder="Enter">{{ old('short_desc', $package->short_desc) }}</textarea>
                  </div>

                  <div class="col-lg-12">
                    <label for="long_desc" class="form-label">Long Description</label>
                    <textarea class="form-control" name="long_desc" id="long_desc" rows="7" maxlength="4000"
                      placeholder="Enter">{{ old('long_desc', $package->long_desc) }}</textarea>
                  </div>

                  <div class="col-lg-3">
                    <input type="hidden" name="active" id="active" value="0" />
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="{{ old('active', $package->active) ?? 0 }}" {{ old('active', $package->active) == 1 ? 'checked' : ''}} />
                    <label class="form-check-label" for="active">Status Active </label>
                  </div>

                  <div class="col-lg-12" style="margin-top: 16px">
                    <button  class="btn btn-info" type="submit">Submit</button>
                  </div>
                </div>
              </form>

              @endisset
            </div>
          </div><!-- card-body -->
        </div><!-- card -->

      </div>
    </div><!-- row -->
  </div>
</div>
@endsection