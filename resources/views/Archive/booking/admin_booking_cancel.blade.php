@extends('includes.layout')
@section('title','Update Remarks')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Cancel Booking</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Cancel Booking
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
            <h3 class="card-title">Cancel Booking</h3>
          </div>
          <div class="card-body">
            <div class="row">
              @isset($booking)

              <form action="{{ route('admin.booking.cancel') }}" method="post" id="booking_cancel_form">
                @csrf
                <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}" />
                <input type="hidden" name="is_cancelled" id="is_cancelled" value="1" />
                <input type="hidden" name="nav_type" id="nav_type" value="{{ $nav_type }}" />
                <div class="row" style="margin-top: 16px">
                  <div class="col-lg-12">
                    <label for="remarks_or_notes" class="form-label">Remarks Notes</label>
                    <textarea class="form-control" name="remarks_or_notes" id="remarks_or_notes" rows="6"
                      maxlength="240"
                      placeholder="Enter">{{ old('remarks_or_notes') ?? $booking->remarks_or_notes ?? ""}}</textarea>
                  </div>

                  <div class="col-lg-12" style="margin-top: 16px">
                    <input class="btn btn-info" type="submit" value="Cancel" />
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