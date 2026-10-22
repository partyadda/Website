@extends('includes.layout')
@section('title','Update Remarks')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Update Remarks</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Update Remarks
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
            <h3 class="card-title">Update Remarks</h3>
          </div>
          <div class="card-body">
            <div class="row">
              
              @isset($booking)
              <form action="{{ route('admin.booking.update.remarks') }}" method="post" id="booking_form">
                @csrf
                <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}" />
                <div class="row" style="margin-top: 16px">

                  <div class="col-lg-12">
                    <label for="pre_booking_remarks" class="form-label">Pre Booking Remarks</label>
                    <textarea class="form-control" name="pre_booking_remarks" id="pre_booking_remarks" rows="4"
                      maxlength="1900"
                      placeholder="Enter">{{ old('pre_booking_remarks') ?? $booking->pre_booking_remarks ?? ""}}</textarea>
                  </div>

                  <div class="col-lg-12" style="margin-top: 16px;">
                    <label for="remarks_or_notes" class="form-label">Remarks/Notes</label>
                    <textarea class="form-control" name="remarks_or_notes" id="remarks_or_notes" rows="4"
                      maxlength="1900"
                      placeholder="Enter">{{ old('remarks_or_notes') ?? $booking->remarks_or_notes ?? ""}}</textarea>
                  </div>

                  {{-- 
                  @if(date("Y-m-d") > $booking->date )
                  <div class="col-lg-12">
                    <label for="payment_screenshot" class="form-label">Pre booking Notes</label>
                    <textarea class="form-control" name="payment_screenshot" id="payment_screenshot" readonly rows="6"
                      maxlength="240" placeholder="Enter"
                      required>{{ old('payment_screenshot') ?? $booking->payment_screenshot }}</textarea>
                  </div>
                  <div class="col-lg-12">
                    <label for="total_amount" class="form-label">Total Payment</label>
                    <input type="number" class="form-control" name="total_amount" id="total_amount" min="1" step="1"
                      placeholder="Enter" value="{{ old('total_amount')  ?? $booking->total_amount }}" />
                  </div>
                  <div class="col-lg-12">
                    <label for="remarks_or_notes" class="form-label">Post Celebration Notes</label>
                    <textarea class="form-control" name="remarks_or_notes" id="remarks_or_notes" rows="6"
                      maxlength="240"
                      placeholder="Enter">{{ old('remarks_or_notes') ?? $booking->remarks_or_notes ?? ""}}</textarea>
                  </div>

                  @else
                  <div class="col-lg-2">
                    <label for="new_starttime" class="form-label">Actual Start</label>
                    <input class="form-control" type="time" id="new_starttime" name="new_starttime"
                      value="{{ old('new_starttime') ?? $booking->new_starttime }}">
                  </div>

                  <div class="col-lg-2">
                    <label for="new_endttime" class="form-label">Actual End</label>
                    <input class="form-control" type="time" id="new_endttime" name="new_endttime"
                      value="{{ old('new_endttime') ?? $booking->new_endttime }}">
                  </div>

                  <div class="col-lg-2">
                    <label for="is_cancelled" class="form-label">Cancelled<font color="red">*</font></label>
                    <input type="number" class="form-control" name="is_cancelled" id="is_cancelled" maxlength="1"
                      min="0" step="1" max="1" placeholder="Enter 1 0r 0"
                      value="{{ old('is_cancelled') ?? $booking->is_cancelled }}" />
                  </div>

                  <div class="col-lg-3">
                    <label for="branch_cake_id" class="form-label">Cake <font color="red">*</font></label>
                    <select class="form-select" id="branch_cake_id" name="branch_cake_id">
                      <option value="">Choose...</option>
                      @isset($theater->branch->branch_cakes)
                      @foreach ($theater->branch->branch_cakes as $cake)
                      @if($cake->cake != NULL)
                      <option value="{{ $cake->id }}" {{ (old('branch_cake_id')==$cake->id ? 'selected' : '') }}
                        data-amount="{{ $cake->price }}">{{ $cake->cake->cakename }} - ₹{{ $cake->price }}</option>
                      @endif
                      @endforeach
                      @endisset
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <label for="name_on_cake" class="form-label">Name on cake <font color="red">*</font></label>
                    <input type="text" class="form-control" name="name_on_cake" id="name_on_cake" maxlength="12"
                      placeholder="Enter" value="{{ old('name_on_cake') ?? $booking->name_on_cake }}" />
                  </div>

                  <div class="col-lg-3">
                    <label for="cake_extra_amount" class="form-label">Cake Amount <font color="red">*</font></label>
                    <input type="number" class="form-control" name="cake_extra_amount" id="cake_extra_amount" min="1"
                      step="1" placeholder="Enter"
                      value="{{ old('cake_extra_amount') ?? $booking->cake_extra_amount }}" />

                  </div>
                  <div class="col-lg-12">
                    <label for="payment_screenshot" class="form-label">Pre booking Notes</label>
                    <textarea class="form-control" name="payment_screenshot" id="payment_screenshot" rows="6"
                      maxlength="240" placeholder="Enter"
                      required>{{ old('payment_screenshot') ?? $booking->payment_screenshot }}</textarea>
                  </div>
                  @endif 
                  --}}

                  <div class="col-lg-12" style="margin-top: 16px">
                    <input class="btn btn-info" type="submit" value="Update" />
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