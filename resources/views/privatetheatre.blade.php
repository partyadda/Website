@extends('includes.layout')
@section('title','Private Theatre')
@section('content')

<style>
  /*
  .time-slot-selection .available {
       border: 3px solid green !important;
  }
  */
  .time-slot-selection .available.selected {
    border: 3px solid #00ff38 !important;
    /* Use !important to override other styles */
    background: #00ff38;
    /*This is parrot green;*/
    color: black;
    font-style: bold;
  }

  .align-back {
    display: flex;
    justify-content: space-between;
    margin: 13px 0 20px;
  }

  .time-slot-selection .available.disabled {
    border: 3px solid red !important;
    background: #e9e3f5 !important;
  }

  /* Optional: Style for disabled button */
  button.disabled {
    background-color: red;
    color: white;
    cursor: not-allowed;
  }

  .imageScale {
    /* Image is scaled to fill the container. Aspect ratio IS maintained */
    object-fit: cover;
    width: 100%;
    aspect-ratio: 4/3;
  }
</style>

<div class="package-main package-list row my-4">
  <div class="row">
      
    <div class="col-lg-12">
      <div class="align-back">
          
        <a href="javascript:void(0)" class="back-btn text-decoration-none mt-2" onclick="goBack();">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="24" width="24" 
          xmlns="http://www.w3.org/2000/svg">
           <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
          </svg> {{--  Back --}}
        </a>
        <label class="fs-5 d-md-block slot_name fw-bold">
          {{$theatre_by_id->name}}
        </label>
        <label class="fs-5 d-md-block d-none slot_name">&nbsp;</label>
      </div>
    </div>
  </div>
  
<div class="row">
  <div class="mb-6 col-md-5" style="margin-top: -26px;">
    <div class="package-images">
      @foreach($theatre_by_id->assets as $cars)
      <div><img src="{{URL::asset('assets/img/'.$cars->foldername.'/'.$cars->filename)}}" class="imageScale" alt="{{$theatre_by_id->name}}" loading="lazy"></div>
      @endforeach
    </div>
  </div>

  <div class="mb-4 col-md-7" >
    <div class="row" style="margin-top: -6px;">
      <div class="col-lg-7">
        
        <div class="select-date mb-2" >
          <div class="fw-bold me-2">Select Date</div>
          <div class="flex-grow-1">
            <input id="calendar" class="form-control" type="date" />
          </div>
        </div>
        
        <input type="hidden" name="slot_time" value="" id="slot_time">
        <input type="hidden" name="slot_id" value="" id="slot_id">
        <input type="hidden" name="theatre_id" value="{{$theatre_by_id->id}}" id="theatre_id" />
        <input type="hidden" id="per_amount_hidden" name="per_amount_hidden" value="" />
       
       <div>
           <center  style="margin-top: 20px;margin-bottom: 20px;">
              <span  class="seat-available fs-8 text-green pill py-2 px-3 ms-auto1" style="background-color:rgb(233, 238, 233)">Slots Available</span>
            </center>
        </div>
        
        <div class="fw-bold mb-2" style="display: none;">Choose a time slot for <b id="calendar-value"></b></div>
      
      <div class="time-slot-selection row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3">
          
          @foreach($theatre_by_id->slots as $sl)
              @php
              $slotStartTime = \Carbon\Carbon::createFromTimestamp(strtotime($sl->start_time))->format('H:i'); // 24-hour format for easier comparison
              @endphp
              
              <div class="col-3 text-nowrap "  style="margin-bottom:-16px;margin-right:-10px;">
                  
                <button  class="btn btn-sm available" data-id="{{$sl->id}}" data-start-time="{{ $slotStartTime }}" 
                title="@if($sl->Percentage <= 99)Short Duration @endif">
                  
                  <input type="hidden" id="per_hidden" name="per_hidden" value="{{$sl->Percentage}}" />
                  
                  <span style="text-align: center; color:black; " class="time_slot">
                      {{ $slotStartTime }} - {{ \Carbon\Carbon::createFromTimestamp(strtotime($sl->end_time))->format('H:i') }}</span>
                </button>
              </div>
          @endforeach
        </div>
        <div>
          <center style="margin-top: 30px;">
            <div>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary rounded-pill button-custom rounded-pill px-3 px-lg-4 px-xxl-5 proceed">
                    Pay <b id="advance_amount" >{{$advance_amount}}</b> Advance to Book</a>
            </div>
          </center>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const buttons = document.querySelectorAll('.time-slot-selection button');
          const dateInput = document.getElementById('calendar');

          // Set the default date input to today
          const today = new Date();
          dateInput.value = today.toISOString().split('T')[0];

          function updateSlotAvailability() {
            const selectedDate = new Date(dateInput.value);
            const isToday = selectedDate.toDateString() === today.toDateString();

            buttons.forEach(button => {
              const startTime = button.getAttribute('data-start-time');
              const [startHours, startMinutes] = startTime.split(':').map(Number);

              // Reset button state
              button.disabled = false;
              button.classList.remove('disabled');

              // Disable past slots if the selected date is today
              if (isToday) {
                const currentHours = today.getHours();
                const currentMinutes = today.getMinutes();

                if (startHours < currentHours || (startHours === currentHours && startMinutes <= currentMinutes)) {
                  button.disabled = true;
                  button.classList.add('disabled');
                }
              }
            });
          }

          // Initialize slot availability on page load
          updateSlotAvailability();

          // Update slot availability on date change
          dateInput.addEventListener('change', updateSlotAvailability);
        });

      </script>

      <div class="col-lg-5" style="">
        <input type="hidden" name="display_name" id="display_name" value="{{$theatre_by_id->displayname}}" />
        
        <div class="d-flex info my-1">
          <button type="button" class="btn btn-secondary rounded-pill text-nowrap" data-bs-toggle="tooltip" data-bs-placement="top" title="Maximum Capacity">
            Max {{$theatre_by_id->max_people}} people
          </button>
          <button type="button" class="btn btn-secondary rounded-pill text-nowrap" data-bs-toggle="tooltip" data-bs-placement="top" title="">
            @if($theatre_by_id->decoration_included == 0)
            Decoration <b>{{$theatre_by_id->branchs->decoration_amount}}</b>
            @else
            Decoration <b>Free</b> 
            @endif
          </button>

          @if($theatre_by_id->decoration_included == 0)
          <input type="hidden" name="decoration_amount" id="decoration_included" value="0" />
          <input type="hidden" name="decoration_amount" id="decoration_amount" value="{{$theatre_by_id->branchs->decoration_amount}}" />
          @else
          <input type="hidden" name="decoration_amount" id="decoration_included" value="1" />
          <input type="hidden" name="decoration_amount" id="decoration_amount" value="0" />
          @endif

          <input type="hidden" id="min_people" value="{{$theatre_by_id->peopleallowed}}" />
          <input type="hidden" id="max_people" value="{{$theatre_by_id->max_people}}" />
        </div>
           <div class="total_amount">
          {{-- <div style="margin-bottom: -8px;"><b class="fs-5">{{$theatre_by_id->displayname}}</b>
          </div> </br> --}}
          <b id="full_amount">₹ {{$theatre_by_id->price}}</b> 
          <b id="short_duration_amount" style="display: none;">₹ {{$theatre_by_id->price}}</b> for up to {{$theatre_by_id->peopleallowed}} people
        </div>
        
           <div class="extra_count">
              <!-- Including Taxes |--> <b>₹ {{$theatre_by_id->extra_person_price}}</b> for each extra guest </br> </br>
                *Food and Beverages Available </br>
    			*Refunds for cancellations made at least 72 hours in advance.
          </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade exampleModal" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Short Duration Discount</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    //$('#exampleModal1').removeClass('slick-initialized slick-slider');
    localStorage.clear();
    localStorage.setItem('theatre_id', $('#theatre_id').val());
    //update()
  });

  $('.ms-auto1').text($('.available:not(:disabled)').length + ' ' + 'Slots Available')

  //$('.description_main1').html($('#description').val());

  $('.time_slot').each(function(key, value) {
    let now = new Date();

    // Get the full current time in a consistent format
    let currentHours = now.getHours();
    let currentMinutes = now.getMinutes();
    let currentTimeObj = new Date(now.getFullYear(), now.getMonth(), now.getDate(), currentHours, currentMinutes);

    // Extract `firstTime` text and convert to Date object
    let text = $(value).text();
    let firstTime = text.split(" - ")[0]; // e.g., "09:00 AM"

    // Parse `firstTime` to a Date object
    let [time, period] = firstTime.split(" ");
    let [firstHours, firstMinutes] = time.split(":").map(Number);

    // Convert to 24-hour format if necessary
    if (period === "PM" && firstHours !== 12) firstHours += 12;
    if (period === "AM" && firstHours === 12) firstHours = 0;

    let firstTimeObj = new Date(now.getFullYear(), now.getMonth(), now.getDate(), firstHours, firstMinutes);

    // Compare times
    console.log(firstTimeObj)
    if (firstTimeObj < currentTimeObj) {
      // console.log(`The time ${firstTime} is greater than the current time ${currentTime}`);
      // Add your logic here when firstTime is greater
      $('.available').attr('disabled', 'disabled').css({
        'border': '3px solid red'
        , 'color': 'black'
      }).addClass('selected');
    } else {
      // console.log('else');
      // console.log(firstTime)
      // console.log(`The time ${firstTime} is not greater than the current time ${currentTime}`);
      // Add your logic here when firstTime is not greater

      $('.available').removeAttr('disabled');
      // $(this).removeClass('selected');
      $('.available').removeClass('selected').css('border', '3px solid green');
    }
  })

  document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.available');

    buttons.forEach(function(button) {
      button.addEventListener('click', function() {
        // Remove 'selected' class from all buttons
        buttons.forEach(btn => btn.classList.remove('selected'));

        // Add 'selected' class to the clicked button
        this.classList.add('selected');
      });
    });

    // Prevent losing focus when clicking outside
    document.addEventListener('click', function(event) {
      const isButtonClick = event.target.closest('.available');
      if (!isButtonClick) {
        // Keep the selected class if the click is outside
        buttons.forEach(btn => {
          if (btn.classList.contains('selected')) {
            btn.classList.add('selected');
          }
        });
      }
    });
  });

  var extra_c = $('.extra_count').text().match(/\d+/)[0];
  if (extra_c > 1) {
    $('.extra_count').text();
  } else {
    $('.extra_count').text('Including Taxes |  No Extra Person allowed');
  }

  $('.available').on('click', function() {
    $('.modal-body').text('');
    console.log('yes');

    $('#slot_time').val('');
    $('#slot_id').val('');
    $('#per_amount_hidden').val('');

    var total_count = $('.total_amount').text().match(/\d+/)[0];
    var slot_time = $(this).find('span').text();
    var slot_id = $(this).attr('data-id');
    var per_hidden = $(this).find('#per_hidden').val();
    $('#slot_time').val(slot_time);
    $('#slot_id').val(slot_id);
    $('#per_amount_hidden').val(per_hidden);

    if (per_hidden <= 99) {
      var result = Math.ceil((parseInt(total_count) * parseInt(per_hidden)) / 100);
      console.log(total_count);
      $('.modal-body').text(`Since you've booked a slot with a shorter duration, the price has been reduced from ` + total_count + ' to ' + result);

      $('#full_amount').hide();
      $('#short_duration_amount').show();
      $('#short_duration_amount').text('₹ ' + result);

      $('#exampleModal1').modal('show');
    } else {
      $('#full_amount').show();
      $('#short_duration_amount').hide();
      $('#short_duration_amount').text('');
    }
  })

  function getValue() {
    var branch_id = '{{$theatre_by_id->branch_id}}';

    var href_a = $(location).attr("href");
    var sub = href_a.substr(0, 34);
    if ($('#slot_time').val() == '') {
      alert('select time Slot');
    } else {
      localStorage.removeItem('name');
      localStorage.removeItem('calender');
      localStorage.removeItem('time');
      localStorage.removeItem('total');
      localStorage.removeItem('advance');
      localStorage.removeItem('slot');
      localStorage.removeItem('min_people');
      localStorage.removeItem('max_people');
      localStorage.removeItem('display_name');
      localStorage.removeItem('per_amount_hidden');

      var name = $('.slot_name').text();
      var calender = $('#calendar-value').text();
      var advance_amount = $('#advance_amount').text();
      var total_amount = $('.total_amount').text();
      var total = total_amount.match(/\d+/)[0];
      var advance = advance_amount.match(/\d+/)[0];
      var total_seat = $('.seat-available').text().match(/\d+/)[0];
      var decoration_included = $('#decoration_included').val();
      var decoration_amount = $('#decoration_amount').val();
      var display_name_text = $('#display_name').val();
      var display_name = display_name_text;
      var per_amount_hidden = $('#per_amount_hidden').val();
      var time = $('#slot_time').val();
      var extra_count = '';
      if (extra_c == 0) {
        extra_count = 0;
      } else {
        extra_count = $('.extra_count').text().match(/\d+/)[0];
      }
      localStorage.setItem('name', name);
      localStorage.setItem('calender', calender);
      localStorage.setItem('time', time);
      localStorage.setItem('total', total);
      localStorage.setItem('advance', advance);
      localStorage.setItem('total_seat', $('#min_people').val());
      localStorage.setItem('slot', total_seat);
      localStorage.setItem('extra_count', extra_count);
      localStorage.setItem('min_people', $('#min_people').val());
      localStorage.setItem('max_people', $('#max_people').val());
      localStorage.setItem('slot_id', $('#slot_id').val());
      localStorage.setItem('theatre_id', $('#theatre_id').val());
      localStorage.setItem('branch_id', branch_id);
      localStorage.setItem('decoration_included', decoration_included);
      localStorage.setItem('decoration_amount', decoration_amount);
      localStorage.setItem('display_name', display_name);
      localStorage.setItem('per_amount_hidden', per_amount_hidden);

      window.location.href = '{{ env('APP_URL') }}' + 'overview/' + branch_id;
    }
  }
  $('.proceed').on('click', getValue);

  function goBack() {
    window.history.back()
  }

</script>
@endsection