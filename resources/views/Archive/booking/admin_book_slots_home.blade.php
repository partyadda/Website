@extends('includes.layout')
@section('title','Book Theatre/Package')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Book Theatre/Package</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Book Theatre/Package
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

        <div class="card card-success card-outline mb-4">
          <div class="card-header">
            <h3 class="card-title">Select Theatre/Package to book</h3>
          </div>
          <div class="card-body">
            <div class="row">
              @isset($theaters)
              @foreach ($theaters as $theatre)
              <div class="col-lg-3">
                <div style="border: 1px solid #D3D3D3; border-radius: 4px; padding:6px;">
                  <b>{{ $theatre->name }}</b> - ₹ <b>{{ $theatre->price }}</b>
                  <a class="btn btn-sm btn-secondary" href="{{ route('admin.book-theatre', ['theatre_id' => $theatre->id]) }}">Book Now</a>
                  <hr/>
                  <b>Packages</b>
                  <br />
                  @isset($theatre->packages)
                  @foreach ($theatre->packages as $package)
                  <a href="{{ route('admin.book-package', ['package_id' => $package->id]) }}">{{ $package->package_name }}</a>
                  <br />
                  @endforeach
                  @endisset
                </div>
              </div>
              @endforeach
              @endisset
            </div>
          </div><!-- card-body -->
        </div><!-- card -->

      </div>
    </div><!-- row -->
  </div>
</div>
@endsection

