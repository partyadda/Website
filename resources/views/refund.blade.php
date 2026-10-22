@extends('includes.layout')

@section('title', 'Private Theaters for Celebration and Surprises')
@section('keyword', 'private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description', 'PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')

@section('content')
<style>
    .cancellation-policy {
        font-family: 'Montserrat', sans-serif;
        color: #000;
    }

    .cancellation-policy .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-top: 8px !important;
        padding: 0;
        color: inherit;
        font-size: 14px;
    }

    .cancellation-policy h1 {
        margin: 12px 0 !important;
        font-size: clamp(20px, 3vw, 26px) !important;
    }

    .cancellation-policy .updated-date {
        margin: 8px 0;
        font-size: 12px;
    }

    .cancellation-policy .content-text {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.6;
    }

    .cancellation-policy .unorder-list {
        margin-bottom: 12px;
        padding-left: 20px;
    }

    .cancellation-policy .list-item {
        margin-bottom: 6px;
        padding: 0;
    }

    .cancellation-policy .list-item:last-child,
    .cancellation-policy .list-item:last-child p {
        margin-bottom: 0;
    }
</style>

    <div class="container py-2 cancellation-policy">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="fs-3 fw-bold my-4">Cancellation &amp; Refund Policy</h1>

                <div class="content-seprater"></div>

                <p class="updated-date">
                    Last updated on <time datetime="2024-11-13">Oct 13, 2026</time>
                </p>

                <p class="content-text">
                    Varda Enterprises believes in helping its customers as far as possible,
                    and has therefore a liberal cancellation policy. Under this policy:
                </p>

                <ul class="unorder-list">
                    <li class="list-item">
                        <p class="content-text list-text">
                            An advance amount is collected towards the confirmation of your booking.
                        </p>
                    </li>

                    <li class="list-item">
                        <p class="content-text list-text">
                            This advance amount is fully refundable (except convenience charges
                            of payment gateway, if any) if booking is cancelled or we are informed
                            about through WhatsApp (+91 82175 75597) chat, at least 72 hours before
                            the slot time.
                        </p>
                    </li>

                    <li class="list-item">
                        <p class="content-text list-text">
                            Partyadda (Varda Enterprises) does not offer refunds for any
                            cancellations made after the 72-hour window. We also do not offer
                            refunds for no-shows or late arrivals.
                        </p>
                    </li>

                    <li class="list-item">
                        <p class="content-text list-text">
                            In case of any Refunds approved by the Varda Enterprises,
                            it’ll take 6-8 days for the refund to be processed to the end customer.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection