{{-- PartyAdda Footer --}}
<style>
/* PartyAdda Footer - White Theme */

.party-footer {
    font-family: 'Montserrat', sans-serif;
    background: #FFFFFF;
    color: #000000;
    padding: 28px 0 22px;
    font-size: 14px;
    line-height: 1.7;
}

/* Celebration Text */
.party-footer .footer-celebrations {
    color: #000000;
    font-size: 15px;
    font-weight: 600;
    text-align: center;
    line-height: 1.8;
}

/* Divider */
.party-footer .footer-divider {
    border: 0;
    border-top: 1px solid #E0E0E0;
    opacity: 1;
    margin: 20px 0;
}

/* Footer Grid */
.party-footer .footer-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1.3fr;
    gap: 18px;
    align-items: center;
}

/* Footer Links */
.party-footer .footer-location,
.party-footer .footer-policy a {
    color: #000000;
    text-decoration: none;
    font-weight: 500;
}

.party-footer .footer-location:hover,
.party-footer .footer-policy a:hover {
    color: #000000;
    text-decoration: underline;
}

/* Location */
.party-footer .footer-location {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.party-footer .footer-location svg {
    flex-shrink: 0;
    color: #000000;
}

/* Policy Links */
.party-footer .footer-policy {
    display: flex;
    flex-wrap: wrap;
    gap: 8px 14px;
    justify-content: flex-end;
}

/* Copyright */
.party-footer .footer-copy {
    color: #000000;
    font-weight: 400;
}

/* Tablet */
@media (max-width: 991px) {
    .party-footer .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .party-footer .footer-policy {
        justify-content: flex-start;
    }
}

/* Mobile */
@media (max-width: 575px) {
    .party-footer {
        padding: 24px 0;
        font-size: 13px;
    }

    .party-footer .footer-grid {
        grid-template-columns: 1fr;
        gap: 14px;
        text-align: center;
    }

    .party-footer .footer-location {
        justify-content: center;
    }

    .party-footer .footer-policy {
        justify-content: center;
    }

    .party-footer .footer-celebrations {
        font-size: 14px;
    }
}
</style>

<a href="https://wa.me/918217575597"
   class="whatsapp-buttons"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Chat with PartyAdda on WhatsApp">
    <img src="{{ URL::asset('assets/img/whatsapp-icon.webp') }}"
         alt="WhatsApp PartyAdda"
         width="55" height="55">
</a>

<footer class="party-footer footer-lower">
    <div class="container">
        <div class="footer-celebrations">
            Private Theatre Celebrations in Bangalore
            <span aria-hidden="true"> | </span> Birthdays
            <span aria-hidden="true"> | </span> Anniversaries
            <span aria-hidden="true"> | </span> Bride-to-Be
            <span aria-hidden="true"> | </span> Baby Showers
            <span aria-hidden="true"> | </span> Mom-to-Be
            <span aria-hidden="true"> | </span> Private Screenings
        </div>

        <hr class="footer-divider">

        <div class="footer-grid">
            <div class="footer-copy">&copy; {{ date('Y') }} PartyAdda</div>

            <div>
                <a class="footer-location"
                   href="https://maps.app.goo.gl/LaXeL6FeGRS3MGpG7"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="AECS Layout, Brookefield location on Google Maps">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    AECS Layout, Brookefield
                </a>
            </div>

            <div>
                <a class="footer-location"
                   href="https://maps.app.goo.gl/b1Y1KR5tBHyGmrtJA"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="JP Nagar location on Google Maps">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    Outer Ring Road, JP Nagar
                </a>
            </div>

            <nav class="footer-policy" aria-label="Footer policies">
                <a href="{{ url('refund') }}">Refund Policy</a>
                <a href="{{ url('terms') }}">Terms</a>
                <a href="{{ url('privacy') }}">Privacy Policy</a>
            </nav>
        </div>
    </div>
</footer>

{{-- Existing site scripts and page-specific behaviour --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" ></script>
    <script src="{{URL::asset('assets/js/ityped.min.js')}}"></script>
    <!-- slick javascript cdn -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@if(Request::is('gallery'))
	
	<script type="text/javascript" src="{{URL::asset('assets/js/demo.js')}}"></script>
	<!-- Magnific Popup core JS file -->
	<script type="text/javascript" src="{{URL::asset('assets/js/jquery.magnific-popup.js')}}" ></script>
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}" defer>

	<script language="javascript">
$(document).ready(function() {
$('#swarupGallery').mycaptcha({
width: '100',
navHolder: '#navHolder',
nextText: '',
prevText: '',
coloum: 100,
gutterSpace: 20,
});
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

window.ityped.init(document.querySelector('.ityped'), {
strings: data.map(item => stripHTML(item)), // Strip HTML for iTyped rendering
loop: true,
onFinished: function() {
const element = document.querySelector('.ityped');
element.innerHTML = data[window.ityped.cursor.index]; // Re-insert HTML
}
});

}
});

function stripHTML(html) {

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
var currentDate = selectedDate ? new Date(selectedDate) : new Date();

const month_name = currentDate.toLocaleString('default', { month: 'long' });
var day = ("0" + currentDate.getDate()).slice(-2);
var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
var year = currentDate.getFullYear();

var formattedDate = year + "-" + month + "-" + day;
var formattedDate_name = `${day}-${month_name}-${year}`;

$('#calendar').val(formattedDate);
document.getElementById('calendar-value').innerText = formattedDate_name;

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
 $(this).removeClass('selected');
 $(this).attr('disabled', 'disabled').css({'border':'3px solid red','color':'#34265c', 'cursor':'not-allowed'});
} else {
   $(this).removeAttr('disabled');
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

setMinDate();
updateDate();

$('#calendar').change(function() {
updateDate(this.value);
});
});


</script>

<script>
$(document).ready(function() {
});
$(document).ready(function() {
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

@elseif(Request::is('overview'))
<script>




function topFunction() {
document.body.scrollTop = 0; // For Safari
document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
@endif
