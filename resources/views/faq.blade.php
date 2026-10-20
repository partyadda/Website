@extends('includes.layout')
@section('title','Partyadda - queries doubts | Birthday, anniversaries, bride-to-be, kids birthday, first birthdays, and mom-to-be celebrations')
@section('content')
      
      <div class="container-fluid border-top">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="summary-content p-3  p-md-4  mb-4 h-100">
                     <div class="fs-5 fw-bold mb-4">Frequently Asked Questions (FAQs)</div>
                     <hr>
						<div class="accordion" id="accordionPanelsStayOpenExample">
						  <div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingOne">
							  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">Which movies or shows can we watch? Can we play our own videos?</button>
							</h2>
							<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
							  <div class="accordion-body">
								Yes, you can connect your OTT accounts or phone through Chromecast and play content of your choice. Please note that we do NOT provide any movies or shows or OTT account. We just do the setup for you using your own content and accounts. We don't support pendrives and laptops for casting or watching movies.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Illegal/Prohibited contents are not allowed. We do not take any liability for such cases.</button>
							</h2>
							<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
							  <div class="accordion-body">
								Customers must not stream any content which is illegal/prohibited as per Indian laws. We will not be liable for any consequences that arise out of violation of this condition and we will not allow such customers to book with us again.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingThree">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">Refund Policy</button>
							</h2>
							<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
							  <div class="accordion-body">
								Hours Before the slot time. No refund for bookings which are less than 72 hrs from payment time.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingFour">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">In case of any technical interruption from our end, appropriate refund will be provided.</button>
							</h2>
							<div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
							  <div class="accordion-body">
								If there is any failure in working of the projector, laptop, internet access or sound system - we will reimburse the paid amount after deducting the rent for the period of time before interruption.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-headingFive">
							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">You are responsible for your belongings</button>
							</h2>
							<div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
							  <div class="accordion-body">
								We will not be responsible in case of loss of personal belongings of any nature. Customers must take care of their belongings.
							  </div>
							</div>
							
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingSix">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">The booking period includes set up and check out time</button>
    							</h2>
    							<div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
    							    <div class="accordion-body">Customers must vacate the theater along with all their belongings on or before the end time.</div>
    							</div>
						    </div>

							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingSeven">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">Customers must not make any changes to the configuration of technical equipment.</button>
    							</h2>
    							<div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
    							    <div class="accordion-body">Customers should not make adjustments or modifications to the set up of projector, screen, laptop and sound system. If any changes is required, we will do it from our end.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingEight">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">Couples below 18 years of age are not allowed to book the theater</button>
    							</h2>
    							<div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
    							    <div class="accordion-body">Aadhaar card/DL is checked for all bookings and underage couples are not permitted to book. Minor group bookings are permitted.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingNine">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">Customers will be liable to pay in case of any damage to the theater caused by them</button>
    							</h2>
    							<div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNine">
    							    <div class="accordion-body">If there is any damage to any of the technical or non technical item in the theater including the walls, lights, seating, etc. the customers will have to pay for it.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingTen">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">Cleaning fee up to Rs 1000 will be charged in cases where significant cleaning would be required after check out</button>
    							</h2>
    							<div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTen">
    							    <div class="accordion-body">In cases where cleaners would be required to clean the garbage, left overs and other wastes after the customers check out, the customers will have to pay appropriate cleaning fee.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingEleven">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEleven" aria-expanded="false" aria-controls="panelsStayOpen-collapseEleven">Restricted consumption</button>
    							</h2>
    							<div id="panelsStayOpen-collapseEleven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEleven">
    							    <div class="accordion-body">Customers are not allowed to smoke, consume alcoholic beverages or any illegal substance inside the theater. Appropriate action would be taken against such customers.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingTwelve">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwelve" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwelve">Pets are strictly not allowed inside the theatre</button>
    							</h2>
    							<div id="panelsStayOpen-collapseTwelve" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwelve">
    							    <div class="accordion-body">Pets are strictly not allowed inside the theatre</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingThirteen">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThirteen" aria-expanded="false" aria-controls="panelsStayOpen-collapseThirteen">What about Photography and Fog entry?</button>
    							</h2>
    							<div id="panelsStayOpen-collapseThirteen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThirteen">
    							    <div class="accordion-body">Photoshoot and Fog Entry can be added online while booking. You can also add these On-Spot on day of booking.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingFouteen">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFouteen" aria-expanded="false" aria-controls="panelsStayOpen-collapseFouteen">Are the seats recliners?</button>
    							</h2>
    							<div id="panelsStayOpen-collapseFouteen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFouteen">
    							    <div class="accordion-body">Small theaters with up to 4 seating capacity have all recliner seating while bigger theaters with more than 4 people seating capacity have recliners on the front and non-recliner sofas on the back.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingFifteen">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFifteen" aria-expanded="false" aria-controls="panelsStayOpen-collapseFifteen">What about food and beverages? Is outside food allowed?</button>
    							</h2>
    							<div id="panelsStayOpen-collapseFifteen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFifteen">
    							    <div class="accordion-body">All our branches have delicious food and beverages menu which differs from branch to branch. You can also carry your own food or order food online. We will provide cutlery (chargeable).</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingSixteen">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSixteen" aria-expanded="false" aria-controls="panelsStayOpen-collapseSixteen">Are washrooms available?</button>
    							</h2>
    							<div id="panelsStayOpen-collapseSixteen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSixteen">
    							    <div class="accordion-body">Yes all our branches have neat and tidy washrooms.</div>
    							</div>
						    </div>
							<div class="accordion-item">
    							<h2 class="accordion-header" id="panelsStayOpen-headingSeventeen">
    							  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeventeen" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeventeen">Are Decorations Customizable?</button>
    							</h2>
    							<div id="panelsStayOpen-collapseSeventeen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeventeen">
    							    <div class="accordion-body">Decorations will be as per the photos and videos shown in website. Essential customization and personalization like Neon Lights, LED Name Board, etc. will be done as per the chosen occasion. Balloon colors are not Customizable</div>
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
    