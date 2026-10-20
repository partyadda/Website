@extends('includes.layout')
@section('title','PartyAdda brings your celebrations to life with a private cinema experience.')
@section('content')
     
      <div class="main-banner">
         <div class="container d-inline-flex   flex-column">
            <h1 class="ityped fw-bold fs-1 text-white"></h1>
            <a href="{{ url('/') }}#book_now_section" class="btn btn-light rounded-pill flex-auto px-lg-5 fw-bolder py-2">
            Book Now
            </a>
         </div>
         <img src="https://www.partyadda.com/assets/img/theatre/Opera1.jpg" style="width:200px; height:400px !important;" alt="About Party Adda">
      </div>
      <div class="container-fluid" >
        <div style="text-align: center;">
            <P><b>From Selfie Walls to Private Cinemas — Celebrate Like Never Before!</b></P>
        </div>
         <div class=""> <!-- py-md-5 Removed this class by Sachin-->
         
              <p class="highlight">Make your special moments truly unforgettable with <span class="highlight">PartyAdda</span>'s private cinema setups, beautiful decorations, delicious food, and lively DJ lights and vibrant selfie walls.</p>
              
            <div class="fade whybuyus">
               <div>
                  <div class="row gy-4">
                     <div class="col-md-6">
                       <p>Our thoughtfully designed packages are budget-friendly and customized to make your celebrations unforgettable.</p>
<p>Enjoy movies and songs on a stunning big screen, surrounded by loved ones. Capture priceless selfies at vibrant selfie walls and have fun at our 360-degree selfie booth.</p>

                  <div class=" mb-4">

                     <span class="fs-6"> Perfect for Every Occasion:</span>

                     <ul>
                        <li>Birthdays</li>
                        <li>Anniversaries</li>
                        <li>Baby showers (mom-to-be)</li>
                        <li>Bachelorette parties (bride-to-be or groom-to-be)</li>
                        <li>Romantic dates or Proposals</li>
                     </ul>
                  </div>

                  <p>We handle every detail with care to ensure your day is seamless and stress-free. Sit back, relax, and let <span class="highlight">PartyAdda</span> help you create cherished memories!</p>

               </div>
               <div class="col-md-6">
                  <img src="https://www.partyadda.com/assets/img/theatre/Opera1.jpg"
                     style="width:90% !important; height:350px !important; border-radius:10%" alt="Party Ka adda">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- 
      <div class="find-us">
         <div class="container">
            <div class="fs-1 fw-bold mb-4">How does Private Theater Celebration work?</div>
            <p>
            
            
               Private Theatre celebration is a very new concept pioneered by Party Adda. Guests can book private theaters for celebrating birthdays, anniversaries, date night, bride to be, etc and enjoy watching their favorite movies, shows, photos and videos on the big screen. Guests can also enjoy delicious food and beverages, and add other services like Cakes, Gifts, Photoshoot, etc. Party Adda private theaters make celebrations easy, affordable, fun and memorable.
            </p>
            <div class="text-center mt-5">
               <a class="btn button-custom rounded-pill px-3 px-lg-5" href="{{ url('/') }}#book_now_section">Book Now</a>
            </div>
         </div>
      </div>
       -->
<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
   function goBack() {
      window.history.back()
   }
</script>