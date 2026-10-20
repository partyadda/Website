@extends('includes.layout')
@section('title','MyBookings')
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
         <div class="fs-3 fw-bold my-4">My Bookings</div>
         <p align="justify">This is a My Bookings Page... Needs to write the Contents</p>
         <ul>
            <li>
               <p align="justify"><strong>Necessary / Essential Cookies</strong></p>
               <p align="justify">Type: Session Cookies</p>
               <p align="justify">Administered by: Us</p>
               <p align="justify">Purpose: These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.</p>
            </li>
            <li>
               <p align="justify"><strong>Cookies Policy / Notice Acceptance Cookies</strong></p>
               <p align="justify">Type: Persistent Cookies</p>
               <p align="justify">Administered by: Us</p>
               <p align="justify">Purpose: These Cookies identify if users have accepted the use of cookies on the Website.</p>
            </li>
            <li>
               <p align="justify"><strong>Functionality Cookies</strong></p>
               <p align="justify">Type: Persistent Cookies</p>
               <p align="justify">Administered by: Us</p>
               <p align="justify">Purpose: These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.</p>
            </li>
         </ul>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function goBack() {
  window.history.back()
}

</script>