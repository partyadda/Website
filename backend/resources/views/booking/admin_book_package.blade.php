@extends('includes.layout')
@section('title','Book Package')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Book Package</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Book Package
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

        <div id="error_div">
        </div>

        <div class="card card-success card-outline mb-4">
          <div class="card-header">
            <h3 class="card-title" id="card_title">Package Booking - {{ $package->package_name }}</h3>
          </div>
          <div class="card-body">

            <div id="booking_form_container">
              <form action="{{ route('admin.book-package-slot-store') }}" method="post" enctype="multipart/form-data" id="booking_form">
                @csrf			
                <div class="row">
                  <div class="col-lg-4"> 
                    <label for="admin_booking_date" class="form-label">
                      Select Booking Date <font color="red">*</font>
                    </label>
                    <div class="input-group"> 
                      <span class="input-group-text" id="basic-addon3">
                        <i class="bi bi-calendar"></i>
                      </span>
                      {{-- <button type="button" class="form-control" id="admin_booking_date_selection">
                          Select Date
                      </button> --}}
                      <input type="text" class="form-control text-center" id="admin_booking_date" name="admin_booking_date" required readonly value="{{ old('admin_booking_date') ?? '' }}" placeholder="Select Date"/> 
                    </div>
                  </div>
                  <div class="col-lg-8"> 
                    <label for="theater_slot_id" class="form-label">Select Slot <font color="red">*</font></label> 
                    <select class="form-select" id="theater_slot_id" name="theater_slot_id">
                      <option value="">Choose...</option>
                    </select>
                  </div>         
                </div>
                
                <div class="row" style="margin-top: 20px">
                  <h5 style="color:blue;">Customer Details</h5>
                  <input type="hidden" name="theater_slot_id_local" id="theater_slot_id_local" value="{{ old('theater_slot_id_local') ?? '' }}"/>
                  <input type="hidden" name="is_package_booking" id="is_package_booking" value="1"/>
                  <input type="hidden" name="package_id" id="package_id" value="{{ $package->id }}"/>
                  <input type="hidden" name="theater_id" id="theater_id" value="{{ $package->theatre_id }}"/>
                  <input type="hidden" name="branch_id" id="branch_id" value="{{ $package->branch_id }}"/>
                  <input type="hidden" name="extra_person_price" id="extra_person_price" value="{{ $package->theatre->extra_person_price }}"/>
                  <input type="hidden" name="max_people" id="max_people" value="{{ $package->theatre->max_people }}"/>
                  
                    @if ($package->id == 17)
                    <input type="hidden" name="peopleallowed" id="peopleallowed" value="10"/>
                    @else
                    <input type="hidden" name="peopleallowed" id="peopleallowed" value="{{ $package->theatre->peopleallowed }}"/>
                    @endif

                  <input type="hidden" name="decoration_included" id="decoration_included" value="1"/>
                  <input type="hidden" name="decoration_amount" id="decoration_amount" value="0"/>
                  <input type="hidden" name="decoration_noofperson" id="decoration_noofperson" value="{{ $package->decoration->noofperson }}"/>

                  <div class="row">
                    <div class="col-lg-4">
                      <label for="customer_name" class="form-label">Customer Full Name <font color="red">*</font></label> 
                      <input type="text" class="form-control" name="customer_name" id="customer_name" minlength="3" maxlength="25" placeholder="Enter" value="{{ old('customer_name') }}"/>
                    </div>
                    <div class="col-lg-4">
                      <label for="customer_phone" class="form-label">Customer Phone No <font color="red">*</font></label> 
                      <input type="number" class="form-control" name="customer_phone" id="customer_phone" minlength="10" maxlength="10" placeholder="Enter" value="{{ old('customer_phone') }}"/>
                    </div>
                    
                <!--    <div class="col-lg-4">
                      <label for="customer_email" class="form-label">Customer Email Id </label> 
                      <input type="email" class="form-control" name="customer_email" id="customer_email" maxlength="30" placeholder="Enter" 
                      value="{{ old('customer_email') }}"/>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 16px;">
                     --> 
                    <div class="col-lg-4">
                      <label for="no_of_guest" class="form-label">No.Of Guests <font color="red">*</font></label> 
                      <select class="form-select" id="no_of_guest" name="no_of_guest">
                        @for ($i = 2; $i <= $package->theatre->max_people; $i++)
                        <option value="{{ $i }}" {{ (old('no_of_guest') == $i ? 'selected' : '') }}>{{ $i }}</option>
                        @endfor
                      </select>
                    </div>    
                    <div class="col-lg-4" style="display: none;">
                      <label for="decoration_needed" class="form-label">Decoration Include <font color="red">*</font></label> 
                      <select class="form-select" id="decoration_needed" name="decoration_needed">
                        <option value="1" selected>Yes</option>
                        {{-- <option value="0">No</option> --}}
                      </select>
                    </div>            
                  </div>
                </div><!-- Customer Details -->

                <div class="row" style="margin-top: 20px;" id="decoration_container">
                  <h5 style="color:blue;">Decoration</h5>
                  <div class="row">
                    <div class="col-lg-4">
                      <label for="decoration_id" class="form-label">Decoration <font color="red">*</font></label> 
                      <select class="form-select" id="decoration_id" name="decoration_id">
                        <option value="{{ $package->decoration->id }}" data-decoration="{{ $package->decoration }}" selected>{{ $package->decoration->name }}</option>              
                      </select>
                    </div>   
                    <div class="col-lg-4" id="person_one_div">
                      <label for="person_one" class="form-label"><span id="person_one_label">Partner name</span> <font color="red">*</font></label> 
                      <input type="text" class="form-control" name="person_one" id="person_one" maxlength="25" placeholder="Enter" value="{{ old('person_one') }}"/>
                    </div> 
                    <div class="col-lg-4" id="person_two_div" style="display:  {{ ($package->decoration->noofperson > 1) ? 'block;' : 'none;' }};">
                      <label for="person_two" class="form-label"><span id="person_two_label">Your name</span> <font color="red">*</font></label> 
                      <input type="text" class="form-control" name="person_two" id="person_two" maxlength="25" placeholder="Enter" value="{{ old('person_two') }}" />
                    </div>              
                  </div>
                </div><!-- Decoration -->

                <div class="row" style="margin-top: 20px" id="cake_container">
                  <h5 style="color:blue;">Cake</h5>
                  <div class="row">
                    <div class="col-lg-4">
                      <label for="package_cake_id" class="form-label">Cake <font color="red">*</font></label> 
                      <select class="form-select" id="package_cake_id" name="package_cake_id">
                      <option value="">Choose...</option>
                        <option value="999" {{ (old('package_cake_id') == 999 ? 'selected' : '') }} data-amount="0">
                          Customised- Enter Remarks</option>   
                        @isset($package->package_cakes)
                        @foreach ($package->package_cakes as $cake)
                          @if($cake->cake != NULL) 
                          <option value="{{ $cake->id }}" {{ (old('package_cake_id') == $cake->id ? 'selected' : '') }} data-amount="{{  $cake->extra_amount }}">
                          {{ $cake->cake->cakename }} - ₹ {{ $cake->extra_amount }}</option>
                          @endif
                          
                        @endforeach
                        @endisset                   
                        
                       
                      </select>
                    </div>   
                    <div class="col-lg-3">
                      <label for="name_on_cake" class="form-label">Name on cake <font color="red">*</font></label> 
                      <input type="text" class="form-control" name="name_on_cake" id="name_on_cake" maxlength="25" placeholder="Enter" value="{{ old('name_on_cake') }}" />
                    </div>             
                 
                  
                   <div class="col-lg-5">
                        Actual Customer required timing
                        <div class="input-group"> 
                           
                            <label for="new_starttime">Start time:</label>
                            <input class="form-control" type="time" id="new_starttime" name="new_starttime" value="{{ old('new_starttime') ?? '' }}">
                            
                            <label for="new_endtime">End time:</label>
                            <input class="form-control" type="time" id="new_endtime" name="new_endtime"  value="{{ old('new_endttime') ?? '' }}">
                        </div>
                    </div>
                   </div>
                </div><!-- Cake -->

                <div class="row" style="margin-top: 20px" id="addon_container">
                  <h5 style="color:blue;">AddOns</h5>
                  <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-2">
                    @foreach ($package->package_addons as $addon)
                    @if($addon->addon != NULL) 
                    <div class="col"> 
                      <div style="width: 100%;"> 
                        <input class="form-check-input" type="checkbox" name="package_addon_ids[]" id="package_addon_ids{{ $addon->id }}" value="{{ $addon->id }}" {{ (collect(old('package_addon_ids'))->contains($addon->id)) || $addon->included_in_package == 1 ? 'checked':'' }} data-amount="{{  $addon->extra_amount }}" data-info="{{ $addon->addon->name }} - ₹ {{ $addon->extra_amount }}"  {{ ($addon->included_in_package == 1 ? 'readonly' : '') }}/>     
                        <label class="form-check-label" for="package_addon_ids[]">{{ $addon->addon->name }} - ₹ {{ $addon->extra_amount }}</label>
                      </div>
                    </div>
                    @endif
                    @endforeach   
                  </div>
                </div><!-- AddOns -->

                <div class="row" style="margin-top: 20px">
                  <h5 style="color:blue;">Payment</h5>
                  <div class="row">
                    <div class="col-lg-4">
                      <label for="payment_type" class="form-label">Payment Type <font color="red">*</font></label> 
                      <select class="form-select" id="payment_type" name="payment_type">
                        <option value="">Choose...</option>
                        <option value="CASH" @if(old('payment_type') == 'CASH') selected @endif>Cash</option>
                        <option value="NETBANKING" @if(old('payment_type') == 'NETBANKING') selected @endif>NetBanking</option>
                        <option value="UPI" @if(old('payment_type') == 'UPI') selected @endif>UPI</option>
                      </select>
                    </div>    
                    <div class="col-lg-4">
                      <label for="payment_advance" class="form-label">Advance Payment</label> 
                      <input type="number" class="form-control" name="payment_advance" id="payment_advance" min="1" step="1" placeholder="Enter" 
                      value="{{ old('payment_advance')  ?? 999 }}"/>
                    </div>
                    <div class="col-lg-4">
                      <label for="coupon_code_id" class="form-label">Discount </label> 
                      <select class="form-select" id="coupon_code_id" name="coupon_code_id">
                        <option value="">Choose...</option>
                        @if($coupon_codes != NULL) 
                        @foreach ($coupon_codes as $coupon)
                          <option value="{{ $coupon->discount_id }}" {{ (old('coupon_code_id') == $coupon->discount_id ? 'selected' : '') }} data-coupon="{{ $coupon }}">{{ $coupon->name }} - {{ $coupon->promocode }} - ₹ {{ $coupon->discount }}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 16px">
                    <div class="col-lg-4">
                      <label for="payment_reference" class="form-label">Payment Reference (If Any)</label> 
                      <input type="text" class="form-control" name="payment_reference" id="payment_reference" maxlength="80" placeholder="Enter" value="{{ old('payment_reference') }}"/>
                    </div>
                    <div class="col-lg-4">
                      <input type="hidden" class="form-control" name="payment_confirmed_by_id" id="payment_confirmed_by_id" value="{{ session('user_id') }}"/>
                      <label for="payment_confirmed_by" class="form-label">Payment Confirmed By <font color="red">*</font></label> 
                      <input type="text" class="form-control" name="payment_confirmed_by" id="payment_confirmed_by" maxlength="25" placeholder="Enter" value="{{ old('payment_confirmed_by') ?? session('username') }}" readonly style="background-color:#FBFBFB;"/>
                    </div>
                  </div>
                  
                 <div class="row" style="margin-top: 16px">
                    <div class="col-lg-12">
                      <label for="payment_screenshot" class="form-label">Pre Booking Remarks </label> 
                    <textarea class="form-control" name="payment_screenshot" id="payment_screenshot" maxlength="240" 
                             placeholder="Enter">{{ old('payment_screenshot') }}</textarea>
                   </div>
                  </div>       
                  
                <!--  <div class="row" style="margin-top: 16px">
                    <div class="col-lg-12">
                      <label for="remarks_or_notes" class="form-label">Remarks/Notes</label> 
                      <textarea class="form-control" name="remarks_or_notes" rows="5" id="remarks_or_notes" maxlength="240" placeholder="Enter">{{ old('remarks_or_notes') }}</textarea>
                    </div> 
                  </div>
                  --> 
                  
                </div>

                <div style="margin-top: 40px;"> 
                  <input class="btn btn-info" type="button" value="View Summary & Book"  id="view_summary"/>
                </div>

              </form>
            </div>

            <div id="booking_summary_container" style="display:none;">
              <h5 style="color:blue;">Summary</h5>

              <div class="row">
                <div class="col-lg-6"> 
                  <table class="table table-bordered">
                    <tr>
                      <th>Base Price</th>
                      <td>₹ <span id="theatre_amount_summary">{{ $package->package_amount }}</span></td>
                    </tr>
                    <tr>
                      <th>Decoration</th>
                      <td>₹ <span id="decoration_amount_summary"></span></td>
                    </tr>
                    <tr id="extra_person_row">
                      <th>Extra Person Charges <span id="extra_person_count" style="font-size: small; font-weight: 100;"></span></th>
                      <td>₹ <span id="extra_person_amount_summary"></span></td>
                    </tr>
                    <tr>
                      <th>Cake</th>
                      <td>₹ <span id="cake_amount_summary"></span></td>
                    </tr>
                     <tr>
                      <th>Actual Start Time</th>
                      <td><span id="new_starttime_summary"></span></td>
                    </tr>
                    <tr>
                      <th>Actual End Time</th>
                      <td><span id="new_endtime_summary"></span></td>
                    </tr>
                    <tr>
                      <th>Special Ad-On <span id="add_ons" style="font-size: small; font-weight: 100;"></th>
                      <td>₹ <span id="add_on_amount_summary"></span></td>
                    </tr>
                    <tr class="table-success">
                      <th>Subtotal</th>
                      <td>₹ <span id="subtotal_amount_summary" style="font-weight: 400;"></span></td>
                    </tr>
                    <tr>
                      <th>Advance Amount</th>
                      <td>₹ <span id="advance_amount_summary"></span></td>
                    </tr>
                    <tr>
                      <th>Discount Amount</th>
                      <td>₹ <span id="discount_amount_summary"></span></td>
                    </tr>
                    <tr class="table-success">
                      <th>Balance Amount</th>
                      <td>₹ <span id="balance_amount_summary" style="font-weight: 400;"></span></td>
                    </tr>
                  </table>
                </div>
              </div>

              <div style="margin-top: 30px;"> 
                <input class="btn btn-secondary" type="button" value="Edit Booking" id="edit_booking"/> &nbsp;&nbsp;
                <input class="btn btn-info" type="button" value="Confirm Booking" id="book_now"/>
              </div>
            </div>

          </div><!-- card-body -->
        </div><!-- card -->
          
      </div>
    </div><!-- row -->
  </div>
</div>
@endsection

