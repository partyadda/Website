@extends('includes.layout')
@section('title','Packages')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">View Packages</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            View Packages
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  @include('includes.inc_session_success')
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
            <h3 class="card-title">View Packages</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <table id="myTable" style="auto" class="table table-striped table-responsive table-sm">
                <thead>
                  <tr class="fs-7">
                    <th width="1%">#</th>
                    <th width="5%">Name</th>
                    <th width="20%">Title</th>
                    <th>Short desc</th>
                    
                    <th width="5%">SEO</th>
                    <thwidth="25%">other_option</th>
                    <th>google_review</th>
                    <th>long_desc</th>
                    <th width="5%">Actn</th>
                  </tr>
                </thead>
                <tbody class="fs-7">
                  @forelse ($packages as $pkg)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pkg->package_name }}</td>
                    <td>{{ $pkg->title }}</td>
                    <td>
                        <!--{{ $pkg->short_desc }}-->
                        
                        </td>
                    <td>
                        <!--
                        {{ $pkg->SEO_keywords }}
                        -->
                        </td>
                    <td>{{ $pkg->other_option }}</td>
                    <td><!--
                    
                        {{ $pkg->google_review }}
                        --></td>
                    <td><!--
                     {{ $pkg->long_desc }}
                     -->
                    </td>
                    <td>
                      <a href="{{ route('admin.package.edit', ['id' => $pkg->id]) }}" >
                        <span class="badge rounded-pill bg-primary px-2 py-1">Edit</span>
                      </a>
                    </td>
                  </tr>
                  @empty
                    <tr class="text-center">
                      <td colspan="8"> No records found </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->

      </div>
    </div><!-- row -->
  </div>
</div>
@endsection