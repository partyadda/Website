@extends('includes.layout')
@php
        $isEdit = $booking->exists;
        $title = $isEdit ? 'Edit Package' : 'Book Package';
        $selectedDecorationId = old('decoration_id', $booking->decoration_id ?? $package->decoration?->id);
        $selectedCake = $package->package_cakes?->firstWhere('cake_id', $booking->cake_id);
        $selectedCakeId = old('package_cake_id', $isEdit ? $selectedCake?->id : null);
        $hasOldAddonSelection = old('_addon_selection_present') === '1';
        $selectedAddonIds = $hasOldAddonSelection
                ? (array) old('package_addon_ids', [])
                : (array) ($booking->addon_ids ?? []);
@endphp

@section('title', $title)

@section('content')

<style>
        .admin-package-form { font-family: 'Montserrat', sans-serif; font-size: 14px; line-height: 1.5; }
        .admin-package-form .app-content-header { padding: 8px 6px; }
        .admin-package-form .app-content { padding: 6px; }
        .admin-package-form .row { --bs-gutter-x: 12px; row-gap: 8px; }
        .admin-package-form .breadcrumb { margin-bottom: 0; font-size: 13px; }
        .admin-package-form h1 { margin: 0; font-size: 22px; font-weight: 700; }
        .admin-package-form h5 { margin-bottom: 4px; font-size: 16px; font-weight: 700; }
        .admin-package-form .card { margin-bottom: 10px; }
        .admin-package-form .card-header, .admin-package-form .card-body { padding: 10px; }
        .admin-package-form .card-title { margin: 0; font-size: 16px; font-weight: 700; }
        .admin-package-form .form-label { margin-bottom: 4px; font-size: 13px; }
        .admin-package-form .form-control, .admin-package-form .form-select { min-height: 36px; padding-top: 6px; padding-bottom: 6px; font-family: inherit; font-size: 14px; }
        .admin-package-form .form-control { padding-left: 8px; padding-right: 8px; }
        .admin-package-form .form-select { padding-left: 8px; padding-right: 32px; }
        .admin-package-form .btn { padding: 7px 12px; font-family: inherit; font-size: 13px; }
        .admin-package-form .table > :not(caption) > * > * { padding: 4px 6px; font-size: 13px; }
</style>
<div class="admin-package-form">

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        {{ $title }}
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
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        id="error_div_main"></button>
                        @foreach($errors->all() as $er)
                        <span><i class="icon-arrow-right5"></i> {{ $er }}</span> <br>
                        @endforeach
                    </div>
                    @endif

                    <div id="error_div">
                    </div>

                    <div class="card card-success card-outline mb-2">
                        <div class="card-header">
                            <h3 class="card-title" id="card_title">Package Booking - {{ $package->package_name }} - {{
                            $base_amount }} </h3>
                        </div>

                        <div class="card-body">

                            <div id="booking_form_container">
                                <form action="{{ route('admin.book-package-slot-store') }}" method="post" enctype="multipart/form-data" id="booking_form">
                                @csrf

                                @if($isEdit)
                                @method('PUT')
                                @endif

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="admin_booking_date" class="form-label">
                                                Select Booking Date <span class="text-danger" aria-hidden="true">*</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">
                                                    <i class="bi bi-calendar"></i>
                                                </span>
                                                {{-- <button type="button" class="form-control" id="admin_booking_date_selection">
                                                Select Date
                                                </button> --}}
                                                <input type="text" class="form-control text-center" id="admin_booking_date"
                                                name="admin_booking_date" required readonly value="{{ old('admin_booking_date', $booking->date_formatted) ?? '' }}"
                                                placeholder="Select Date" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="theater_slot_id" class="form-label">Select Slot <span class="text-danger" aria-hidden="true">*</span></label>
                                            <select class="form-select" id="theater_slot_id" name="theater_slot_id" required>
                                                <option value="">Choose...</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="new_starttime" class="form-label">Actual Start</label>
                                            <input class="form-control" type="time" id="new_starttime" name="new_starttime"
                                            value="{{ old('new_starttime', $booking->new_starttime) ?? '' }}">
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="new_endtime" class="form-label">Actual End</label>
                                            <input class="form-control" type="time" id="new_endtime" name="new_endtime"
                                            value="{{ old('new_endtime', $booking->new_endtime ?? $booking->new_endttime) ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:8px;">
                                        <h5 style="color:blue;">Customer Details</h5>
                                        <input type="hidden" name="is_edit" id="is_edit" value="{{ $isEdit ? '1' : '0' }}" />
                                        <input type="hidden" name="booking_id" id="booking_id" value="{{ $isEdit ? $booking->id : 0}}" />

                                        <input type="hidden" name="theater_slot_id_local" id="theater_slot_id_local"
                                        value="{{ old('theater_slot_id', old('theater_slot_id_local', $booking->slot_id)) ?? '' }}" />
                                        <input type="hidden" name="is_package_booking" id="is_package_booking" value="1" />
                                        <input type="hidden" name="package_id" id="package_id" value="{{ $package->id }}" />
                                        <input type="hidden" name="theater_id" id="theater_id" value="{{ $package->theatre_id }}" />
                                        <input type="hidden" name="branch_id" id="branch_id" value="{{ $package->branch_id }}" />

                                        <input type="hidden" name="extra_person_price" id="extra_person_price"
                                        value="{{ $package->extra_person_charge }}" />
                                        <input type="hidden" name="max_people" id="max_people" value="{{ $package->max_people }}" />
                                        <input type="hidden" name="peopleallowed" id="peopleallowed" value="{{ $package->people_allowed }}" />

                                        <input type="hidden" name="decoration_included" id="decoration_included" value="1" />
                                        <input type="hidden" name="decoration_amount" id="decoration_amount" value="{{ $decoration_amount ?? 0 }}" />
                                        <input type="hidden" name="decoration_noofperson" id="decoration_noofperson"
                                        value="{{ $package->decoration?->noofperson ?? 0 }}" />

                                        <input type="hidden" name="base_amount" id="base_amount" value="{{ $base_amount }}" />

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="customer_name" class="form-label">Customer Full Name <span class="text-danger" aria-hidden="true">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="customer_name" id="customer_name" required minlength="3"
                                                maxlength="25" placeholder="Enter" value="{{ old('customer_name', $booking->customer?->customer_name) }}" />
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="customer_phone" class="form-label">Customer Phone No <span class="text-danger" aria-hidden="true">*</span>
                                                </label>
                                                <input type="tel" inputmode="tel" pattern="[+]?[0-9]{10,13}" required class="form-control" name="customer_phone" id="customer_phone" minlength="10"
                                                maxlength="13" placeholder="Enter" value="{{ old('customer_phone', $booking->customer?->phone) }}" {{ $isEdit ? 'readonly' : '' }} style="{{ $isEdit ? 'background-color: #e9ecef; opacity: 1; cursor: not-allowed;' : '' }}"/>
                                            </div>

                                            {{--
                                            <div class="col-lg-4">
                                            <label for="customer_email" class="form-label">Customer Email Id </label>
                                            <input type="email" class="form-control" name="customer_email" id="customer_email" maxlength="30" placeholder="Enter"
                                            value="{{ old('customer_email', $booking->customer?->email) }}"/>
                                            </div>
                                            --}}
                                            <div class="col-lg-4">
                                                <label for="no_of_guest" class="form-label">No.Of Guests <span class="text-danger" aria-hidden="true">*</span></label>
                                                <select class="form-select" id="no_of_guest" name="no_of_guest" required>
                                                @for ($i = 2; $i <= $package->max_people; $i++)
                                                    <option value="{{ $i }}" {{ (old('no_of_guest', $booking->No_people) == $i ? 'selected' : '' ) }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>


                                        </div>

                                        <div class="row" style="margin-top:8px;">

                                            <div class="col-lg-4" style="display: none;">
                                                <label for="decoration_needed" class="form-label">Decoration Include <span class="text-danger" aria-hidden="true">*</span>
                                                </label>
                                                <select class="form-select" id="decoration_needed" name="decoration_needed">
                                                    <option value="1" selected>Yes</option>
                                                    {{-- <option value="0">No</option> --}}
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Customer Details -->

                                    <div class="row" style="margin-top:8px;" id="decoration_container">
                                        <h5 style="color:blue;">Decoration</h5>
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <label for="decoration_id" class="form-label">Decoration <span class="text-danger" aria-hidden="true">*</span></label>
                                                {{--
                                                <select class="form-select" id="decoration_id" name="decoration_id" required>
                                                <option value="{{ $package->decoration->id }}" data-decoration="{{ $package->decoration }}"
                                                selected>{{ $package->decoration->name }}</option>
                                                </select>
                                                --}}
                                                <select class="form-select" id="decoration_id" name="decoration_id" required>
                                                @isset($package->package_decorations)
                                                @foreach ($package->package_decorations as $package_decor)
                                                @if($package_decor->decoration != NULL)
                                                    <option value="{{ $package_decor->decoration->id }}"
                                                    data-decoration="{{ $package_decor->decoration }}"
                                                    @selected((string) $selectedDecorationId === (string) $package_decor->decoration->id)>
                                                    {{ $package_decor->decoration->name }}</option>
                                                    @endif
                                                    @endforeach
                                                    @endisset
                                                    </select>
                                                </div>

                                                <div class="col-lg-4" id="person_one_div">
                                                    <label for="person_one" class="form-label"><span id="person_one_label">Partner name</span>
                                                        <span class="text-danger" aria-hidden="true">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="person_one" id="person_one" maxlength="12"
                                                    placeholder="Enter" value="{{ old('person_one', $booking->partner_name) }}" />
                                                </div>

                                                <div class="col-lg-4" id="person_two_div"
                                                style="display:  {{ ($package->decoration?->noofperson > 1) ? 'block' : 'none' }};">
                                                    <label for="person_two" class="form-label"><span id="person_two_label">Your name</span>
                                                        <span class="text-danger" aria-hidden="true">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="person_two" id="person_two" maxlength="12"
                                                    placeholder="Enter" value="{{ old('person_two', $booking->your_name) }}" />
                                                </div>

                                            </div>
                                        </div><!-- Decoration -->

                                        <!-- Cake -->
                                        <div class="row" style="margin-top:8px;" id="cake_container">
                                            <h5 style="color:blue;">Cake</h5>
                                            <div class="col-lg-4">
                                                <label for="package_cake_id" class="form-label">Cake <span class="text-danger" aria-hidden="true">*</span></label>
                                                <select class="form-select" id="package_cake_id" name="package_cake_id" required>
                                                    <option value="">Choose...</option>
                                                    @isset($package->package_cakes)
                                                    @foreach ($package->package_cakes as $cake)
                                                    @if($cake->cake != NULL)
                                                    <option value="{{ $cake->id }}"
                                                    @selected((string) $selectedCakeId === (string) $cake->id)
                                                    data-amount="{{ $cake->extra_amount }}">{{ $cake->cake->cakename }} - ₹ {{ $cake->extra_amount
                                                    }}</option>
                                                    @endif
                                                    @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="name_on_cake" class="form-label">Name on cake <span class="text-danger" aria-hidden="true">*</span></label>
                                                <input type="text" class="form-control" name="name_on_cake" id="name_on_cake" maxlength="25"
                                                placeholder="Enter" value="{{ old('name_on_cake', $booking->name_on_cake) }}" />
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="cake_extra_amount" class="form-label">Cake Customized Amount</label>
                                                <input type="number" class="form-control" name="cake_extra_amount" id="cake_extra_amount" min="0"
                                                step="1" placeholder="Enter" value="{{ old('cake_extra_amount', ($booking->cake_extra_amount ?? '0'))  ?? '0' }}" />
                                            </div>
                                        </div> <!-- Cake -->

                                        <!-- AddOns -->
                                        <div class="row" style="margin-top:8px;" id="addon_container">
                                            <h5 style="color:blue;">AddOns</h5>
                                            <input type="hidden" name="_addon_selection_present" value="1">
                                            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-2">
                                            @foreach ($package->package_addons as $addon)
                                            @if($addon->addon != NULL)
                                                <div class="col">
                                                    <div style="width: 100%;">
                                                        <input class="form-check-input" type="checkbox" name="package_addon_ids[]"
                                                        id="package_addon_ids{{ $addon->id }}" value="{{ $addon->id }}"
                                                        @checked(
                                                        in_array((string) $addon->id, array_map('strval', $selectedAddonIds), true)
                                                        || $addon->included_in_package == 1
                                                        || (!$hasOldAddonSelection && $addon->isSelected == 1)
                                                        )
                                                        data-amount="{{ $addon->extra_amount }}" data-info="{{ $addon->addon->name }}
                                                        - ₹ {{ $addon->extra_amount }}" @disabled($addon->included_in_package == 1)/>
                                                        @if ($addon->included_in_package == 1)
                                                        <input type="hidden" name="package_addon_ids[]" value="{{ $addon->id }}">
                                                        @endif
                                                        <label class="form-check-label" for="package_addon_ids{{ $addon->id }}">{{ $addon->addon->name }}:₹{{
                                                        $addon->extra_amount }} </label>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div><!-- AddOns -->
                                        <div class="row" style="margin-top:8px;">
                                            <div class="row" style="margin-top:8px;">
                                                <div class="col-lg-3">
                                                    <label for="cleaning_charge_amount" class="form-label">Cleaning Charges</label>
                                                    <input type="number" class="form-control" name="cleaning_charge_amount" id="cleaning_charge_amount" min="0"
                                                    step="1" placeholder="Enter" value="{{ old('cleaning_charge_amount', ($booking->billing?->cleaning_charge_amount ?? '0'))  ?? '0' }}" />
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="extra_time_amount" class="form-label">Extra Time Charge</label>
                                                    <input type="number" class="form-control" name="extra_time_amount" id="extra_time_amount" min="0"
                                                    step="1" placeholder="Enter" value="{{ old('extra_time_amount', ($booking->billing?->extra_time_amount ?? '0'))  ?? '0' }}" required/>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="photo_print_amount" class="form-label">Photo Print Amount</label>
                                                    <input type="number" class="form-control" name="photo_print_amount" id="photo_print_amount" min="0" step="1" placeholder="Enter" value="{{ old('photo_print_amount', ($booking->billing?->photo_print_amount ?? '0'))  ?? '0' }}" required/>
                                                </div>


                                                <div class="col-lg-3">
                                                    <label for="special_discount_amount" class="form-label">Deductions*(If Any)</label>
                                                    <input type="number" class="form-control" name="special_discount_amount" id="special_discount_amount" min="0" step="1" placeholder="Enter" value="{{ old('special_discount_amount', ($booking->billing?->special_discount_amount ?? '0'))  ?? '0' }}" required/>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label for="pre_booking_remarks" class="form-label">Pre Booking Remarks </label>
                                                    <textarea class="form-control" name="pre_booking_remarks" id="pre_booking_remarks" maxlength="1900"
                                                    placeholder="Enter">{{old('pre_booking_remarks', $booking->pre_booking_remarks) }}</textarea>
                                                </div>
                                            </div>

                                            <h5 style="color:blue; margin-top:8px;">Payment</h5>
                                            <div class="row">
                                                <div class="col-lg-4" hidden>
                                                    <label for="payment_type" class="form-label">Payment Type <span class="text-danger" aria-hidden="true">*</span></label>
                                                    <select class="form-select" id="payment_type" hidden="" name="payment_type">
                                                    {{-- <option value="">Choose...</option> --}}
                                                        <option value="CASH">Cash</option>
                                                        <option value="UPI" @if(old('payment_type', $booking->payment_type)=='UPI' ) selected @endif>UPI</option>
                                                        <option value="ONLINE" @if(old('payment_type', $booking->payment_type)=='ONLINE' ) selected @endif>Online</option>
                                                        </select>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="payment_advance" class="form-label">Advance Payment</label>
                                                            <input type="number" class="form-control" name="payment_advance" id="payment_advance" min="1"
                                                            step="1" placeholder="Enter" value="{{ old('payment_advance', $booking->payment?->amount)  ?? 999 }}" />
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <label for="coupon_code_id" class="form-label">Discount </label>
                                                            <select class="form-select" id="coupon_code_id" name="coupon_code_id">
                                                                <option value="">Choose...</option>
                                                                @if($coupon_codes != NULL)
                                                                @foreach ($coupon_codes as $coupon)
                                                                <option value="{{ $coupon->discount_id }}" {{ (old('coupon_code_id', $booking->discountid)==$coupon->discount_id ?
                                                                'selected' : '') }} data-coupon="{{ $coupon }}">{{ $coupon->name }} - {{ $coupon->promocode }}
                                                                - ₹ {{ $coupon->discount }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-3" hidden="">
                                                            <label for="payment_reference" class="form-label">Payment Reference (If Any)</label>
                                                            <input type="text" class="form-control" name="payment_reference" id="payment_reference"
                                                            maxlength="80" placeholder="Enter" value="{{ old('payment_reference') }}" />
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="payment_confirmed_by" class="form-label">Booking By</label>
                                                            <input type="text" class="form-control" name="payment_confirmed_by" id="payment_confirmed_by"
                                                            maxlength="25" value="{{ old('payment_confirmed_by', $booking->payment_confirmed_by) ?? session('username') }}" readonly
                                                            style="background-color:#FBFBFB;" />
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top:8px;">
                                                        <div class="col-lg-12">
                                                            <label for="remarks_or_notes" class="form-label">Remarks/Notes</label>
                                                            <textarea class="form-control" name="remarks_or_notes" id="remarks_or_notes" maxlength="1900" placeholder="Enter">{{ old('remarks_or_notes', $booking->remarks_or_notes) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div style="margin-top:8px;">
                                                        <input class="btn btn-info" type="button" value=" {{ $isEdit ? 'View Summary & Update' : 'View Summary & Book' }}" id="view_summary" />
                                                    </div>
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
                                                            <td>₹ <span id="theatre_amount_summary">{{ $base_amount }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Decoration</th>
                                                            <td>₹ <span id="decoration_amount_summary"></span></td>
                                                        </tr>
                                                        <tr id="extra_person_row">
                                                            <th>Extra Person Charges <span id="extra_person_count"
                                                            style="font-size: small; font-weight: 100;"></span></th>
                                                            <td>₹ <span id="extra_person_amount_summary"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Cake</th>
                                                            <td>₹ <span id="cake_amount_summary"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Special Ad-On <span id="add_ons" style="font-size: small; font-weight: 100;"></span></th>
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

                                            <div style="margin-top:8px;">
                                                <input class="btn btn-secondary" type="button" value="Edit Booking" id="edit_booking" /> &nbsp;&nbsp;
                                                <input class="btn btn-info" type="button" value="Confirm Booking" id="book_now" />
                                            </div>
                                        </div>

                                    </div><!-- card-body -->
                                </div><!-- card -->

                            </div>
                        </div><!-- row -->
                    </div>
                </div>
            </div>
            @endsection
