@extends('includes.layout')
@section('title','Contact Party Adda AECS layout, Marthahalli, ITPL Main Road, Near white Field, Bangalore')
@section('content')
<div class="container-fluid border-top">
   <div class="container">
      <div class="row">
         <div class="col-md-5">
            <div class="summary-content p-3  p-md-4 mb-4 h-100">
               <div class="fs-5 fw-bold mb-4">Contact Us</div>
               <p >Help us understand your requirements. Please provide the following details</p>
               <hr>
               <form>
                  <div class="row mb-4">
                     <div class="col">
                        <div data-mdb-input-init class="form-outline">
                           <input type="text" id="form6Example1" class="form-control" />
                           <label class="form-label" for="form6Example1">First name</label>
                        </div>
                     </div>
                     <div class="col">
                        <div data-mdb-input-init class="form-outline">
                           <input type="text" id="form6Example2" class="form-control" />
                           <label class="form-label" for="form6Example2">Last name</label>
                        </div>
                     </div>
                  </div>
                  <!-- Email input -->
                  <div data-mdb-input-init class="form-outline mb-4">
                     <input type="email" id="form6Example5" class="form-control" />
                     <label class="form-label" for="form6Example5">Email</label>
                  </div>
                  <!-- Number input -->
                  <div data-mdb-input-init class="form-outline mb-4">
                     <input type="number" id="form6Example6" class="form-control" />
                     <label class="form-label" for="form6Example6">Phone</label>
                  </div>
                  <!-- Message input -->
                  <div data-mdb-input-init class="form-outline mb-4">
                     <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                     <label class="form-label" for="form6Example7">Additional information</label>
                  </div>
                  <!-- Submit button -->
                  <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Submit</button>
               </form>
            </div>
         </div>
 
         <div class="col-md-7">
            <a href="javascript:void(0)" class="back-btn text-decoration-none mt-5" onclick="goBack()">
               <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
               </svg>
               Back
            </a>        
        <div class="container">
               <div class="row-fluid">
                  <div class="span8">
                     <h3>Connect With Us</h3>
                     <strong>support@partyadda.com</strong></br>
                     <abbr title="Phone">P:</abbr> +91 82175 75597
                     <h3>Reach Us</h3>
                  </div>
               </div>
                  <div class="row">
                     <div class="col-md text-right">
                        <address>
                           <strong>@AECS Layout</strong></br>
                           2nd Floor, AECS Layout Main Road, C Block, Brookefield, Kundalahalli, Marthahalli-560 037</br> 
                        </address>
                        <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15552.440209371141!2d77.7174706!3d12.9648091!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae13c62c018159%3A0x7981998149d252e4!2sPartyAdda%20Private%20Theatre!5e0!3m2!1sen!2sin!4v1725796052443!5m2!1sen!2sin"></iframe>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md text-right">
                        <address>
                           <strong>@JP Nagar</strong><br>
                           3rd Floor, No. 10, Dr Puneeth Rajkumar Rd, Dollar Layout, Phase 4, J. P. Nagar, Bengaluru,560078<br>
                        </address>
                        <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.0275856426106!2d77.59370047358777!3d12.905947716317277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae158ab1d2bad3%3A0xb6d8118732b152d3!2sPartyAdda%20Private%20Theatre!5e0!3m2!1sen!2sin!4v1763984348273!5m2!1sen!2sin"></iframe>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">
   <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M9 2.25V15.75" stroke="#404040" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      <path d="M4.5 6.75L9 2.25L13.5 6.75" stroke="#404040" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
   </svg>
</button>
<a href="https://wa.me/" class="whatsapp-buttons" aria-label="WhatsApp"><img src="resources/img/whatsapp-icon.png" /></a>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
   function goBack() {
      window.history.back()
   }
</script>