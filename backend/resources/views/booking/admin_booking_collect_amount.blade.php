@extends('includes.layout')
@section('title','Collect Amount')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Collect Amount</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Collect Amount
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
            <h3 class="card-title">Collect Amount</h3>
          </div>
          <div class="card-body">
            <div class="row">

              @isset($booking)
              
              <form action="{{ route('admin.booking.billing.collect.amount.update') }}" method="post" id="booking_form"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}" />
                <input type="hidden" name="nav_type" id="nav_type" value="{{ $nav_type }}" />
                <input type="hidden" name="collect_amount_prev" id="collect_amount_prev"
                  value="{{ old('collect_amount_prev', $booking->billing_paid_amount) ?? 0 }}" />

                <div class="row" style="margin-top: 16px">
                  <div class="col-lg-12">
                    {!! $html !!}
                  </div>
                </div>

                <div class="row">
                  <div class="col order-2 order-md-1 order-lg-2">
                    <div class="row">
                      <div class="col-lg-3" style="margin-top: 16px">
                        <label for="collect_amount" class="form-label">Collect Amount</label>
                        <input type="number" class="form-control" name="collect_amount" id="collect_amount" min="1"
                          step="1" placeholder="Enter"
                          value="{{ old('collect_amount', '') }}" />
                      </div>

                      <div class="col-lg-3" style="margin-top: 16px">
                        <label for="payment_reference" class="form-label">Payment Type <font color="red">*</font></label>
                        <select class="form-select" id="payment_reference" name="payment_reference">
                          {{-- <option value="">Choose...</option> --}}

                          <option value="PA_HDFC" 
                          @if(old('payment_reference', $booking->payment_reference)=='PA_HDFC') selected
                            @endif 
                            data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/PA_HDFC') }}.jpeg">Party Adda HDFC</option>
                          <option value="PA_Kotak" @if(old('payment_reference', $booking->payment_reference)=='PA_Kotak' )
                            selected @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/PA_Kotak') }}.jpeg">Varda Enterprise</option>
                          <option value="Sahana" @if(old('payment_reference', $booking->payment_reference)=='Sahana' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Sahana') }}.jpeg">Sahana</option>
                          <option value="Krishna" @if(old('payment_reference', $booking->payment_reference)=='KrisVentures' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/KrisVentures') }}.jpeg">KrisVentures</option>
                          <option value="Devendra" @if(old('payment_reference', $booking->payment_reference)=='Devendra' )
                            selected @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Devendra') }}.jpeg">Devendra</option>
                       
                        <option value="Akshay" @if(old('payment_reference', $booking->payment_reference)=='Akshay' )
                            selected @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Akshay') }}.jpeg">Akshay</option>
                            
                          <option value="Ravi" @if(old('payment_reference', $booking->payment_reference)=='Ravi' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Ravi') }}.jpeg">Ravi</option>
                                  <option value="Ravi" @if(old('payment_reference', $booking->payment_reference)=='Parames' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Parames') }}.jpeg">Parames</option>
                          <option value="Pradeep" @if(old('payment_reference', $booking->payment_reference)=='Pradeep' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/pradeep') }}.jpeg">Pradeep</option>
                          <option value="UPI" @if(old('payment_reference', $booking->payment_reference)=='UPI' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/UPI') }}.jpeg">UPI</option>
                          
                          <option value="CASH" @if(old('payment_reference', $booking->payment_reference)=='CASH' ) selected
                            @endif>Cash</option>
                         <option value="Krishna" @if(old('payment_reference', $booking->payment_reference)=='Krishna' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Krishna') }}.jpeg">Krishna</option>
                            <option value="Other" @if(old('payment_reference', $booking->payment_reference)=='Other' ) selected
                            @endif data-qr ="{{ env('APP_URL') }}{{ Storage::url('qr/Other') }}.jpeg">Other</option>
                        </select>
                      </div>

<!--                  <div class="col-lg-6" style="margin-top: 16px">
                        <label for="payment_reference_old" class="form-label">Payment Reference (If Any)</label>
                        <input type="text" class="form-control" name="payment_reference" id="payment_reference"
                          maxlength="200" placeholder="Enter" value="{{ old('payment_reference') }}" />
                      </div>
            -->

                      <div class="col-lg-3" style="margin-top: 16px">
                        <label for="payment_screen_shot" class="form-label">Payment Screenshot</label>
                        <input type="file" name="payment_screen_shot" id="payment_screen_shot">
                      </div>

                      <div class="col-lg-12" style="margin-top: 16px">
                        <label for="remarks_or_notes" class="form-label">Remarks/Notes</label>
                        <textarea class="form-control" name="remarks_or_notes" id="remarks_or_notes" rows="6"
                          maxlength="1900"
                          placeholder="Enter">{{ old('remarks_or_notes') ?? $booking->remarks_or_notes ?? ""}}</textarea>
                      </div>

                      @if($isSuperAdmin || $amount_data->balance_amount > 0)
                      <div class="col-lg-12" style="margin-top: 16px">
                        <input class="btn btn-info" type="submit" value="Submit" />
                      </div>
                      @endif

                    </div>
                  </div>
                  <div class="col-auto order-1 order-md-2 order-lg-2" id="qr_display" style="margin-top: 16px; display:none;">
                    {{-- @if(isset($booking->payment_reference))
                    <a href="{{ Storage::url('qr/').$booking->payment_reference }}.jpeg" target="_blank">
                      <img src="{{ Storage::url('qr/').$booking->payment_reference }}.jpeg" alt="Qr" width="200">
                    </a>
                    @endif --}}
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