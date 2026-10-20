<a href="https://wa.me/+918217575597" class="whatsapp-buttons" target="_blank" aria-label="WhatsApp"><img
  src="{{URL::asset('assets/img/whatsapp-icon.webp')}}" /></a>
@if(Request::is('/') || Request::is('home/*') || Request::is('homeTest'))
<footer>
  <div class="container">
    {{-- <div class="row" style="margin-top: -10px;">
         <div class="col-sm-2 text-center text-md-start">
           <img src="{{URL::asset('assets/img/logo.webp')}}" alt="Party Adda" width="90" height="90" />
           <!-- <p align="justify" class="fs-14 mt-3">Enjoy the presence of your loved ones by indulging in the pleasure of watching movies or other exciting content on a large screen</p> -->
        </div> 
        <div class="col-sm-6">
          <div class="row pl-0 pr-0" style="padding: 0px;"> 
            <a href="{{ env('APP_URL') }}about" class="col text-decoration-none">About Us</a>
            <a href="{{ env('APP_URL') }}contact" class="col text-decoration-none">Contact</a>
            <a href="{{ env('APP_URL') }}gallery" class="col text-decoration-none">Gallery</a>
            <a href="{{ env('APP_URL') }}faq" class="col text-decoration-none">FAQs</a>  
          </div>
        </div> 
        <div class="col-sm-4">
           <!-- <h6 class="fw-bold mb-md-4 mb-3">Reach Us</h6> -->
           <p class="d-flex">
               <a href="https://maps.app.goo.gl/LaXeL6FeGRS3MGpG7">
              <svg stroke="currentColor" class="me-3" style="width:50px" fill="currentColor" stroke-width="0"
                 viewBox="0 0 1024 1024" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                 <path
                    d="M515.664-.368C305.76-.368 128 178.4 128 390.176c0 221.76 206.032 448.544 344.624 607.936.528.64 22.929 25.52 50.528 25.52h2.449c27.6 0 49.84-24.88 50.399-25.52 130.064-149.52 320-396.048 320-607.936C896 178.4 757.344-.368 515.664-.368zm12.832 955.552c-1.12 1.12-2.753 2.369-4.193 3.409-1.472-1.008-3.072-2.288-4.255-3.408l-16.737-19.248C371.92 785.2 192 578.785 192 390.176c0-177.008 148.224-326.56 323.664-326.56 218.528 0 316.336 164 316.336 326.56 0 143.184-102.128 333.296-303.504 565.008zm-15.377-761.776c-106.032 0-192 85.968-192 192s85.968 192 192 192 192-85.968 192-192-85.968-192-192-192zm0 320c-70.576 0-129.473-58.816-129.473-129.408 0-70.576 57.424-128 128-128 70.624 0 128 57.424 128 128 .032 70.592-55.903 129.408-126.527 129.408z">
                 </path>
              </svg></a>
              3rdFloor, AECS Layout Main Road <br>C Block, Brookefield, Bengaluru - 37
           </p>
        </div>
        
        <div class="col-sm-2 ms-auto">
           <!-- <h6 class="fw-bold mb-md-4 mb-3">Social Media</h6> -->
           <div class="d-flex flex-wrap">
              <!-- <a href="https://www.facebook.com/share/3XEEeEv4Ds8KVP8T/?mibextid=qi2Omg" target="_blank" class="me-3 mb-3"><img src="{{URL::asset('assets/img/facebook.png')}}" style="width:40px;height:40px;" alt="Party Adda"  /></a> -->
              <a href="https://www.instagram.com/partyadda.com_?igsh=bmVqOW9vNTQ5ZWk=" target="_blank" class="me-3 mb-3"><img src="{{URL::asset('assets/img/instagram.webp')}}" style="width:40px;height:40px;" alt="Party Adda"  /></a>
              <a href="https://wa.me/+918217575597" target="_blank" class="me-3 mb-3"><img src="{{URL::asset('assets/img/whatsapp.webp')}}" style="width:40px;height:40px;" alt="Party Adda"  /></a>
              <!-- <a href="mailto:office@partyadda.com" target="_blank" class="me-3 mb-3"><img src="{{URL::asset('assets/img/mailblack.png')}}" style="width:40px;height:40px;" alt="Party Adda"  /></a>                -->
           </div>
        </div>
      
     </div>
       --}}
  </div>
</footer>
@endif
<div class="footer-lower text-white">
  <div class="container">
     <div class="row gy-3">
        <div class="col-md-3">
           Copyright &copy; <script>
              //document.write(new Date().getFullYear())
           </script>2024 Party Adda
         </div>
         
           <div class="col-md-3">
              <a href="https://maps.app.goo.gl/LaXeL6FeGRS3MGpG7" style="margin-top:-10px">
              <svg stroke="currentColor" class="me-3" style="width:20px" fill="white" stroke-width="1"
                 viewBox="0 0 1024 1024" height="26" xmlns="http://www.w3.org/2000/svg">
                 <path
                    d="M515.664-.368C305.76-.368 128 178.4 128 390.176c0 221.76 206.032 448.544 344.624 607.936.528.64 22.929 25.52 50.528 25.52h2.449c27.6 0 49.84-24.88 50.399-25.52 130.064-149.52 320-396.048 320-607.936C896 178.4 757.344-.368 515.664-.368zm12.832 955.552c-1.12 1.12-2.753 2.369-4.193 3.409-1.472-1.008-3.072-2.288-4.255-3.408l-16.737-19.248C371.92 785.2 192 578.785 192 390.176c0-177.008 148.224-326.56 323.664-326.56 218.528 0 316.336 164 316.336 326.56 0 143.184-102.128 333.296-303.504 565.008zm-15.377-761.776c-106.032 0-192 85.968-192 192s85.968 192 192 192 192-85.968 192-192-85.968-192-192-192zm0 320c-70.576 0-129.473-58.816-129.473-129.408 0-70.576 57.424-128 128-128 70.624 0 128 57.424 128 128 .032 70.592-55.903 129.408-126.527 129.408z">
                 </path>
              </svg>
              </a>
              <span style="margin-left: -20px;">AECS Layout Main Road, Brookefield</span> 
      
         </div>
           <div class="col-md-3">
              <a href="https://maps.app.goo.gl/LaXeL6FeGRS3MGpG7" style="margin-top:-10px">
              <svg stroke="currentColor" class="me-3" style="width:20px" fill="white" stroke-width="1"
                 viewBox="0 0 1024 1024" height="26" xmlns="http://www.w3.org/2000/svg">
                 <path
                    d="M515.664-.368C305.76-.368 128 178.4 128 390.176c0 221.76 206.032 448.544 344.624 607.936.528.64 22.929 25.52 50.528 25.52h2.449c27.6 0 49.84-24.88 50.399-25.52 130.064-149.52 320-396.048 320-607.936C896 178.4 757.344-.368 515.664-.368zm12.832 955.552c-1.12 1.12-2.753 2.369-4.193 3.409-1.472-1.008-3.072-2.288-4.255-3.408l-16.737-19.248C371.92 785.2 192 578.785 192 390.176c0-177.008 148.224-326.56 323.664-326.56 218.528 0 316.336 164 316.336 326.56 0 143.184-102.128 333.296-303.504 565.008zm-15.377-761.776c-106.032 0-192 85.968-192 192s85.968 192 192 192 192-85.968 192-192-85.968-192-192-192zm0 320c-70.576 0-129.473-58.816-129.473-129.408 0-70.576 57.424-128 128-128 70.624 0 128 57.424 128 128 .032 70.592-55.903 129.408-126.527 129.408z">
                 </path>
              </svg>
              </a>
              <span style="margin-left: -20px;">Outer Ring Road, JP Nagar</span> 
      
         </div>
       
        <div class="col text-md-end">
              
           <a href="{{ env('APP_URL') }}refund" class="fw-bold text-white text-decoration-none" aria-label="Refund Policy"
              title="Refund Policy">
           Refund Policy
           </a>
           
           <a href="{{ env('APP_URL') }}terms" class="fw-bold text-white text-decoration-none" aria-label="Terms and Conditions"
              title="Terms and Conditions">
           Terms
           </a>
           <a href="{{ env('APP_URL') }}privacy" class="fw-bold text-white text-decoration-none" aria-label="Privacy Policy"
              title="Privacy Policy">
           Privacy Policy
           </a>
    
        </div>
     </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" ></script>
<script src="{{URL::asset('assets/js/ityped.min.js')}}"></script>
<!-- slick javascript cdn -->


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js" async="true"></script>
<script src="https://jsuites.net/v4/jsuites.js" async="true"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" async="true"></script>

@if(Request::is('gallery'))
{{-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<script type="text/javascript" src="{{URL::asset('assets/js/demo.js')}}" async="true"></script>
<!-- Magnific Popup core JS file -->
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.magnific-popup.js')}}"  async="true"></script>
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}" async="true">

<script language="javascript">
 $(document).ready(function() {
   //alert('d');
   $('#swarupGallery').mycaptcha({
       width: '100',
       navHolder: '#navHolder',
       nextText: '',
       prevText: '',
       coloum: 100,
       gutterSpace: 20,
     });
   //$(".group2").colorbox({rel:'group2', transition:"fade"});
 });
</script>
@endif

@if(Request::is('/') || Request::is('about') || Request::is('homeTest'))
<script src="{{URL::asset('assets/js/owl.js')}}"></script>
<script>
  $(document).ready(function(){
      $('.theatre-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      speed: 1000,
      infinite: true,
      autoplaySpeed: 10000,
      autoplay: true,
      // centerMode:true,
  });
  $('.reviews-slider').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      speed: 300,
      infinite: true,
      autoplaySpeed: 5000,
      autoplay: true,
      centerMode: true,
      responsive: [{
              breakpoint: 991,
              settings: {
                  slidesToShow: 2,
              }
          },
          {
              breakpoint: 767,
              settings: {
                  slidesToShow: 1,
              }
          }
      ]
  });
  });
    $.ajax({
           url: "{{ url('/index/banner') }}",
           type: "GET",
           data: {
               "_token": "{{ csrf_token() }}",
           },
           success: function(data) {
               console.log(data);
               // console.log(data['doneMessage']);
               // $(data).each(function(key,value){
                   // console.log(value)
                   // window.ityped.init(document.querySelector('.ityped'), {
                   //   strings: [ value.description
                   //   ],
                   //   loop: true
                   //   })
               // })
                window.ityped.init(document.querySelector('.ityped'), {
               strings: data.map(item => stripHTML(item)), // Strip HTML for iTyped rendering
               loop: true,
               onFinished: function() {
                   // After typing animation finishes, re-insert HTML
                   const element = document.querySelector('.ityped');
                   element.innerHTML = data[window.ityped.cursor.index]; // Re-insert HTML
               }
           });



           }
       });
  function stripHTML(html) {
      console.log(html);
       var div = document.createElement("div");
       div.innerHTML = html;
       return div.textContent || div.innerText || "";
   }

  $('.fade').slick({
  dots: false,
  infinite: true,
  speed: 500,
  fade: true,
  autoplay: true,
  cssEase: 'linear'
  });
</script>
@elseif(Request::is('home/*') || Request::is('privatetheatre/*'))
<script>
  // Create a new calendar
 $(document).ready(function(){

   function updateDate(selectedDate = null) {

       var theatre_id = 0;
       try {
         theatre_id = localStorage.getItem('theatre_id');
         if(theatre_id != undefined && theatre_id != '' && theatre_id != '0') {
          theatre_id = $('#theatre_id').val();
         }
       } catch (e) {
          console.log(e); // Logs the error
       }
       // Use the selected date or default to today if no date is selected
       var currentDate = selectedDate ? new Date(selectedDate) : new Date();

       // Get the full month name
       const month_name = currentDate.toLocaleString('default', { month: 'long' });
       var day = ("0" + currentDate.getDate()).slice(-2);
       var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
       var year = currentDate.getFullYear();

       // Format the date as YYYY-MM-DD
       var formattedDate = year + "-" + month + "-" + day;
       // Format the date as DD-Month-YYYY
       var formattedDate_name = `${day}-${month_name}-${year}`;

       // Set the date input to the formatted date
       $('#calendar').val(formattedDate);
       // $("#startDate").attr("min", formattedDate);
       // Display the formatted date in the desired format
       document.getElementById('calendar-value').innerText = formattedDate_name;

       // Make the AJAX request with the formatted date
       $.ajax({
           url: "{{ url('privatetheatre/date') }}",
           type: "POST",
           data: {
               "_token": "{{ csrf_token() }}",
               "formmatted": formattedDate_name,
               "theatre_id": theatre_id
           },
           success: function(data) {
               let booking = data.booking24; //data.booking;
               let bookedCount = data.bookedCount;
               var slot_c = $('.available').length;

               var blockDate = '22-December-2024';

               $('.available').each(function(){
                   let timeSlot = $(this).find('span').text().trim();
                   if (booking.includes(timeSlot) || formattedDate_name == blockDate) {
                     //$(this).attr('disabled', 'disabled').css({'border':'3px solid red','background-color':'red','color':'white'});
                     $(this).removeClass('selected');
                     $(this).attr('disabled', 'disabled').css({'border':'3px solid red','color':'#34265c', 'cursor':'not-allowed'});
                   } else {
                       $(this).removeAttr('disabled');
                       //$(this).removeClass('selected');
                       $(this).removeClass('selected').css('border', '3px solid green');
                       $(this).css('cursor', 'auto');
                   }
               });


               var len = $('.available:disabled').length;

               len = slot_c - len;
               $('.seat-available').text(len + ' Slots Available');
           }
       });
   }

function setMinDate() {
       var today = new Date();
       var day = ("0" + today.getDate()).slice(-2);
       var month = ("0" + (today.getMonth() + 1)).slice(-2);
       var year = today.getFullYear();
       var formattedDate = year + "-" + month + "-" + day;
       $('#calendar').attr("min", formattedDate);
   }

   // Set the min date on document ready
   setMinDate();
   // Run the function on document ready
   updateDate();

   // Run the function whenever the date input changes
   $('#calendar').change(function() {
       updateDate(this.value);
   });
});


</script>
<script>
  // window.ityped.init(document.querySelector('.ityped'), {
  //     strings: ['Cake, food, gifts, photoshoot, fog effect, and much more',
  //         'Book for birthdays, anniversaries, romantic dates, etc.',
  //         'India`s #1 Private Theater Celebration space.'
  //     ],
  //     loop: true
  // })
</script>
<script>
  $(document).ready(function() {
      // $('.reviews-slider').slick({
      //     slidesToShow: 2,
      //     slidesToScroll: 1,
      //     arrows: true,
      //     dots: false,
      //     speed: 300,
      //     infinite: true,
      //     autoplaySpeed: 5000,
      //     autoplay: true,
      //     centerMode: true,
      //     responsive: [{
      //             breakpoint: 991,
      //             settings: {
      //                 slidesToShow: 2,
      //             }
      //         },
      //         {
      //             breakpoint: 767,
      //             settings: {
      //                 slidesToShow: 1,
      //             }
      //         }
      //     ]
      // });
  });
  $(document).ready(function() {
      //$('.service-slider').slick({
      //     slidesToShow: 4,
      //     slidesToScroll: 1,
      //     arrows: true,
      //     dots: false,
      //     speed: 300,
      //     infinite: true,
      //     autoplaySpeed: 5000,
      //     autoplay: true,
      //     // centerMode:true,
      //     responsive: [{
      //             breakpoint: 991,
      //             settings: {
      //                 slidesToShow: 2,
      //             }
      //         },
      //         {
      //             breakpoint: 767,
      //             settings: {
      //                 slidesToShow: 1,
      //             }
      //         }
      //     ]
      // });
      // $('.theatre-slider').slick({
      //     slidesToShow: 1,
      //     slidesToScroll: 1,
      //     arrows: false,
      //     dots: true,
      //     speed: 300,
      //     infinite: true,
      //     autoplaySpeed: 5000,
      //     autoplay: true,
      //     // centerMode:true,
      // });
  });
  $('.fade').slick({
      dots: false,
      infinite: true,
      speed: 500,
      fade: true,
      autoplay: true,
      cssEase: 'linear'
  });
  $('.package-images').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 500,
      fade: true,
      autoplay: true,
      cssEase: 'linear'
  });
</script>
<!-- <script>
  document.addEventListener('DOMContentLoaded', function() {
      document.querySelector('.select-dropdown__button').addEventListener('click', function() {
          document.querySelector('.select-dropdown__list').classList.toggle('active');
      });

      document.querySelectorAll('.select-dropdown__list-item').forEach(function(item) {
          item.addEventListener('click', function() {
              var itemValue = this.getAttribute('data-value');
              var itemText = this.cloneNode(true);
              var span = itemText.querySelector('span');

              if (span) {
                  span.remove();
              }

              var itemTextContent = itemText.textContent.trim();
              var itemSpanContent = this.querySelector('span') ? this.querySelector('span')
                  .textContent.trim() : '';

              var formattedText = itemTextContent;
              if (itemSpanContent) {
                  formattedText += ' (<span style="color: red;">' + itemSpanContent + '</span>)';
              }

              document.querySelector('.select-dropdown__button span').innerHTML = formattedText;
              document.querySelector('.select-dropdown__button').setAttribute('data-value',
                  itemValue);
              document.querySelector('.select-dropdown__list').classList.toggle('active');
          });
      });
  });
  </script> -->
@elseif(Request::is('overview'))
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
{{-- var min_people = localStorage.getItem('min_people');
           var max_people = localStorage.getItem('max_people');

           // if(min_people == max_people || localStorage.getItem('extra_count') == 0){
           //     $('.number_of_people').hide()
           //     $('#ref_by_div').removeClass('col-md-3');
           //     $('#ref_by_div').addClass('col-md-6');
           // }
  document.querySelectorAll('.btn-number').forEach(function(button) {
      button.addEventListener('click', function(e) {
          // alert('yes');
          e.preventDefault();
          //  var extra = 300;
          const fieldName = this.getAttribute('data-field');
          const type = this.getAttribute('data-type');
          const input = document.querySelector(`input[name='${fieldName}']`);

          //    console.log(type);
          let currentVal = parseInt(input.value);

          if (!isNaN(currentVal)) {
              if (type === 'minus') {
               var count_t = parseInt($('.extra_count').text()) || 0;
               if (currentVal > min_people) {
                   count_t -= 1;

                   // Proceed with calculations if we are above min_people
                   var extraVal = $('.extra').text().match(/\d+/)[0];
                   var sub_tt = $('.sub_total').text().match(/\d+/)[0];
                   var tt = $('.balance').text().match(/\d+/)[0];

                   if (count_t === 0) {
                       $('.extra_count_div').hide();
                       $('.extra_count').hide();
                       $('.extra').hide();
                       $('.extra').text(0);
                       $('.extra_count').html('');
                       $('.balance').text(tt);
                       $('.sub_total').text(sub_tt);
                   } else {
                       var result_st = parseFloat(sub_tt) - parseInt(localStorage.getItem('extra_count'));
                       var result_tt = parseInt(tt) - parseInt(localStorage.getItem('extra_count'));
                       $('.extra_count').text(count_t + 'x' + localStorage.getItem('extra_count'));
                       $('.balance').text(result_tt);
                       $('.sub_total').text('₹' + ' ' + result_st);
                       $('.extra').text(parseInt(extraVal) - parseInt(localStorage.getItem('extra_count')));
                   }
               }

               // Handle the case where currentVal <= min_people
               if (currentVal <= min_people) {
                   $('.extra_count_div').hide();
                   $('.extra_count').hide();
                   $('.extra').hide();
                   $('.extra').text(0);
                   $('.extra_count').html('');
               }

               if (currentVal > parseInt(input.getAttribute('min'))) {
                   input.value = currentVal - 1;
                   input.dispatchEvent(new Event('change'));
               } else {
                   input.value = currentVal - 1;
                   input.dispatchEvent(new Event('change'));
               }

               if (parseInt(input.value) <= 1) {
                   this.setAttribute('disabled', true);
               }
           }
           else if (type === 'plus') {
               //   console.log(localStorage.getItem('extra_count'));
                  if (currentVal >= max_people) {
                      alert('limit cross');
                  } else {

                      var count_t = parseInt($('.extra_count').text()) || 0;
                      if (currentVal >= min_people) {
                          $('.extra_count_div').show();
                         $('.extra_count').show();
                         $('.extra').show();
                          let extraVal = parseInt($('.extra').text().replace(/[^0-9]/g, '')) ||
                              0; // Get numeric value from .extra

                          extraVal += parseInt(localStorage.getItem('extra_count')); // Add 300 to the current extra value
                           count_t += 1;
                          let subTotalText = $('.sub_total').text().replace(/[^0-9]/g,
                              ''); // Extract numeric part from .sub_total
                          let subTotal = parseFloat(subTotalText) + parseInt(localStorage.getItem('extra_count')); // Add 300 to the subtotal

                          let balanceText = $('.balance').text().replace(/[^0-9]/g,
                              ''); // Extract numeric part from .balance
                          let balance = parseInt(balanceText) + parseInt(localStorage.getItem('extra_count')); // Add 300 to the balance
                           $('.extra_count').text(count_t +'x'+localStorage.getItem('extra_count'));
                          // Update the text values
                          $('.balance').text('₹ ' + balance);
                          $('.sub_total').text('₹ ' + subTotal);
                          $('.extra').text('₹ ' + extraVal);
                      }

                      if (currentVal < parseInt(input.getAttribute('max'))) {
                          input.value = currentVal + 1;
                          input.dispatchEvent(new Event('change'));
                      }
                       // console.log(input.getAttribute('max'));
                      if (parseInt(input.value) === parseInt(input.getAttribute('max'))) {
                          this.setAttribute('disabled', true);
                      }
                  }
              }
          } else {
              input.value = 0;
          }
          // }
          // }

      });
  });

  document.querySelectorAll('.input_number').forEach(function(input) {
      input.addEventListener('focusin', function() {
          this.setAttribute('data-oldValue', this.value);
      });

      input.addEventListener('change', function() {
          // console.log('yes');
          const minValue = parseInt(this.getAttribute('min'));
          const maxValue = parseInt(this.getAttribute('max'));
          const valueCurrent = parseInt(this.value);
          const name = this.getAttribute('name');

          if (valueCurrent >= 1) {
              document.querySelector(`.btn-number[data-type='minus'][data-field='${name}']`)
                  .removeAttribute('disabled');
          } else {
              alert('Sorry, the minimum value was reached');
              this.value = this.getAttribute('data-oldValue');
          }

          if (valueCurrent <= maxValue) {
              document.querySelector(`.btn-number[data-type='plus'][data-field='${name}']`)
                  .removeAttribute('disabled');
          } else {
              alert('Sorry, the maximum value was reached');
              this.value = this.getAttribute('data-oldValue');
          }
      });

      input.addEventListener('keydown', function(e) {
          // Allow: backspace, delete, tab, escape, enter and .
          const allowedKeys = [46, 8, 9, 27, 13, 190];
          if (allowedKeys.includes(e.keyCode) ||
              // Allow: Ctrl+A
              (e.keyCode === 65 && e.ctrlKey === true) ||
              // Allow: home, end, left, right
              (e.keyCode >= 35 && e.keyCode <= 39)) {
              // let it happen, don't do anything
              return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });
  }); --}}

  // When the user scrolls down 20px from the top of the document, show the button
  //  window.onscroll = function() {scrollFunction()};

  //  function scrollFunction() {
  //  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
  //    mybutton.style.display = "block";
  //  } else {
  //    mybutton.style.display = "none";
  //  }
  //  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
</script>
@endif