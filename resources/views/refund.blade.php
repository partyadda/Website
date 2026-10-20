@extends('includes.layout')
@section('title','Party Adda liberal cancellation policy')
@section('content')
<div class="container">
    <a href="javascript:void(0)" class="back-btn text-decoration-none mt-5" onclick="goBack()">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
            height="24" width="24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                clip-rule="evenodd"></path>
        </svg>
        Back
    </a>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="fs-3 fw-bold my-4">Cancellation &amp; Refund Policy</div>
    <div class="content-seprater"></div>
    <p class="updated-date">Last updated on on Nov 13 2024</p>
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
				This advance amount is fully refundable (except convenience charges of payment gateway, if any) if booking is cancelled or we are informed about through WhatsApp (+91 82175 75597) chat, at least 72 hours before the slot time.                    
                </p>
            </li>
            <li class="list-item">
                <p class="content-text list-text">
                    Partyadda (Varda Enterprises) does not offer refunds for any cancellations made after the 72-hour window. We also do not offer refunds for no-shows or late arrivals.
                </p>
            </li>
            <li class="list-item">
                <p class="content-text list-text">
                    In case of any Refunds approved by the
                    Varda Enterprises, it’ll take
                    6-8 days for the refund to
                    be processed to the end customer.
                </p>
            </li>
        </ul>
        </div>
        
            <!--
            
			<p align="justify">PartyAdda (Varda Enterprises) money refund policy is designed to provide customers with flexibility and peace of mind. If a customer needs to cancel their private theater booking, PartyAdda offers a refund according to the following guidelines</p>
            <p align="justify">An advance amount of 599/- is collected towards the confirmation of your booking.</p>
            <p align="justify">This advance amount is fully refundable (except convenience charges of payment gateway, if any) if booking is cancelled or we are informed about through WhatsApp (+91 82175 75597) chat, at least 72 hours before the slot time.</p>
            <p align="justify">Refund is usually initiated within 24 hours and takes maximum 5-7 days to be completed.</p>
            <p align="justify">Please note that we do not offer refunds for any cancellations made after the 72-hour window. We also do not offer refunds for no-shows or late arrivals.</p>
            
            -->
<!-- Micro Team Remove this                
            <div class="fs-3 fw-bold my-4">Definitions</div>
            <b>For the purposes of this Refund Policy:</b>
            <p align="justify">Company (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to PartyAdda (Varda Enterprise), 3rd Floor, C Block, AECS Layout, Kundalahalli, Brookefield, Bengaluru, Karnataka 560037</p>
            <p align="justify">Website refers to PartyAdda, accessible from www.PartyAdda.com</p>
            <div class="fs-3 fw-bold my-4">Contact Us</div>
            <p align="justify">If you have any questions or concerns about our refund policy, please do not hesitate to contact us. We are always happy to help!</p>
            <b>By email: admin@PartyAdda.com</b>
-->            
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection