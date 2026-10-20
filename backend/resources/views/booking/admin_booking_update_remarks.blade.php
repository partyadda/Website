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
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="error_div_main"></button>
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
                <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}"/>
                <div class="row" style="margin-top: 16px">
              
                @if(date("Y-m-d") >= $booking->date )
                        
                    <div class="col-lg-12">
                    <label for="payment_screenshot" class="form-label">Pre booking Notes</label> 
                           <textarea class="form-control" name="payment_screenshot" id="payment_screenshot" readonly rows="6" maxlength="240"  placeholder="Enter" 
                            required>{{ old('payment_screenshot') ?? $booking->payment_screenshot }}</textarea>
                    </div>         
                     <div class="col-lg-12">
                      <label for="total_amount" class="form-label">Total Payment</label> 
                      <input type="number" class="form-control" name="total_amount" id="total_amount" min="1" step="1" placeholder="Enter" 
                      value="{{ old('total_amount')  ?? $booking->total_amount }}"/>
                    </div>  
                    <div class="col-lg-12">
                    <label for="remarks_or_notes" class="form-label">Post Celebration Notes</label> 
               <textarea class="form-control" name="remarks_or_notes" id="remarks_or_notes" rows="6" maxlength="240"
                    placeholder="Enter" >{{ old('remarks_or_notes') ?? $booking->remarks_or_notes ?? "Actual People: 
Customised cake : 
Gift : 
Water bottle 250 ml: 
Discount:  
Photography: 
Cleaning Charges: 
Payment : 
Remarks:
"}}</textarea>

                  </div> 

                        @else
                    
                    <div class="col-lg-12">
                    <label for="payment_screenshot" class="form-label">Pre booking Notes</label> 
                            <textarea class="form-control" name="payment_screenshot" id="payment_screenshot" rows="6" maxlength="240" placeholder="Enter" 
                            required>{{ old('payment_screenshot') ?? $booking->payment_screenshot }}</textarea>
                    </div> 

                        @endif
        

                  <div class="col-lg-12" style="margin-top: 16px"> 
                    <input class="btn btn-info" type="submit" value="Update"/>
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

