@extends('includes.layout')

@section('title', 'Initiate Refund')

@section('content')
    <style>
        .refund-page {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        .refund-page .app-content-header { padding: 8px 6px; }
        .refund-page .app-content { padding: 6px; }
        .refund-page h1 { margin: 0; font-size: 22px; font-weight: 700; }
        .refund-page .breadcrumb { margin-bottom: 0; font-size: 13px; }
        .refund-page .card { margin-bottom: 10px; }
        .refund-page .card-header, .refund-page .card-body { padding: 10px; }
        .refund-page .card-title { margin: 0; font-size: 16px; font-weight: 700; }
        .refund-page .form-label { margin-bottom: 4px; font-size: 13px; }
        .refund-page .form-control { min-height: 36px; padding: 6px 8px; font-family: inherit; font-size: 14px; }
        .refund-page .btn { padding: 7px 12px; font-family: inherit; font-size: 13px; }
        .refund-page .advance-amount { display: inline-block; padding: 3px 6px; border-radius: 4px; }
    </style>

    <div class="refund-page">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row align-items-center gy-1">
                    <div class="col-sm-6">
                        <h1>Initiate Refund</h1>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="Breadcrumb">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Initiate Refund</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close" id="error_div_main"></button>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h2 class="card-title">Initiate Refund</h2>
                    </div>
                    <div class="card-body">
                        @isset($booking)
                            <form action="{{ route('admin.booking.refund.initiate.update') }}"
                                  method="POST" id="booking_refund_form">
                                @csrf
                                <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}">
                                <input type="hidden" name="nav_type" id="nav_type" value="{{ $nav_type ?? '' }}">

                                <div class="row g-2">
                                    <div class="col-12">
                                        <span class="text-bg-info advance-amount">
                                            Advance Amount: ₹ {{ $booking->payment?->amount ?? '-' }}
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <label for="refund_amount" class="form-label">
                                            Refund Amount <span class="text-danger" aria-hidden="true">*</span>
                                        </label>
                                        <input type="number"
                                               class="form-control @error('refund_amount') is-invalid @enderror"
                                               name="refund_amount" id="refund_amount"
                                               min="1" step="1" inputmode="numeric"
                                               placeholder="Enter refund amount"
                                               value="{{ old('refund_amount', '') }}"
                                               aria-invalid="{{ $errors->has('refund_amount') ? 'true' : 'false' }}"
                                               @error('refund_amount') aria-describedby="refund_amount_error" @enderror
                                               required>
                                        @error('refund_amount')
                                            <div class="invalid-feedback" id="refund_amount_error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="remarks_or_notes" class="form-label">Remarks / Notes</label>
                                        <textarea class="form-control @error('remarks_or_notes') is-invalid @enderror"
                                                  name="remarks_or_notes" id="remarks_or_notes"
                                                  rows="3" maxlength="240" placeholder="Enter remarks or notes"
                                                  aria-invalid="{{ $errors->has('remarks_or_notes') ? 'true' : 'false' }}"
                                                  @error('remarks_or_notes') aria-describedby="remarks_or_notes_error" @enderror
                                        >{{ old('remarks_or_notes', $booking->remarks_or_notes ?? '') }}</textarea>
                                        @error('remarks_or_notes')
                                            <div class="invalid-feedback" id="remarks_or_notes_error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-info" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p class="mb-0" role="status">Booking details are unavailable.</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
