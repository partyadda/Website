<?php

//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*use App\Http\Controllers\bookingController;
use App\Http\Controllers\overviewController;
use App\Http\Controllers\decorationController;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/overview', function () {
    return view('overview');
});


Route::get('/select-occasion', function () {
    return view('select-occasion');
});

Route::get('/select-cake', function () {
    return view('select-cake');
});

Route::get('/select-decoration', function () {
    return view('select-decoration');
});

Route::get('/agreement',function(){
    return view('agreement');
});


//Route::get('/agreement/booking', [bookingController::class, 'index'])->name('booking_add');
Route::post('overview/sendmail', [overviewController::class, 'email'])->name('send_mail');
//Route::get('confirmPay',[bookingController::class, 'confirmPayment'])->name('confirm');

*/
// Route::get('/thank_you',[bookingController::class, 'thank_you'])->name('thank_you');

// Route::post('/bookingpay', [bookingController::class, 'bookingpay'])->name('bookingpay');
// Route::post('/phonepe-bookingpayconfirm',[bookingController::class, 'bookingpayCallback'])->name('booking.pay.confirm');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\decorationController;
use App\Http\Controllers\cakeController;
use App\Http\Controllers\occasionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\CalendarEventSyncController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TestEmailController;

// Home Page Routes
// Route::view('/', 'index')->name('index');

 Route::post('/booking' , 'booking@index')->name('booking.index');

Route::get('/testEmail', [TestEmailController::class, 'index'])->name('index');
Route::get('/', [homeController::class,'index'])->name('index');

Route::get('/branch/{branch_name?}', [homeController::class,'index'])->name('index');

Route::get('/homeTest', [homeController::class, 'indexPackage'])->name('indexPackage');
Route::get('/index/banner', [homeController::class,'banner'])->name('index.banner');
Route::get('/index/city', [homeController::class,'city_branch'])->name('index.city');
Route::get('/index/branch', [homeController::class,'branch_theatre'])->name('index.branch');
Route::get('/privatetheatre/{name}', [homeController::class,'home'])->name('privatetheatre');
Route::post('/privatetheatre/date', [OverviewController::class, 'date_check'])->name('privatetheatre.date');
Route::get('gallery', [homeController::class, 'gallery'])->name('gallery');


// Overview Route

Route::get('/overview/{branch_id?}', [OverviewController::class, 'overview'])->name('overview');
Route::post('/overview/sendmail', [OverviewController::class, 'email'])->name('overview.send_mail');
Route::post('/overview/customer', [OverviewController::class, 'customer'])->name('overview.customer');
// Occasion and Cake Selection Routes
// Route::view('/select-occasion', 'select-occasion')->name('select.occasion');
Route::get('/select-occasion/{id}', [OccasionController::class,'index'])->name('select.occasion');
Route::post('/select-occasion/decoration_type', [OccasionController::class,'decoration_type'])->name('occasion.decoration_type');

// Route::view('/select-cake', 'select-cake')->name('select.cake');
Route::get('/select-cake/{id}', [CakeController::class,'index'])->name('select.cake');
Route::get('/select-cake/categ', [CakeController::class,'category'])->name('select.cake.categ');
// Route::view('/select-decoration', 'select-decoration')->name('select.decoration');
Route::get('/select-decoration/{id}', [DecorationController::class,'index'])->name('select.decoration');

// Agreement Route
//Route::view('/agreement', 'agreement')->name('agreement');
Route::post('agreement', [BookingController::class, 'agreement'])->name('agreement');
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index'])->name('razorpay-payment');
Route::post('razorpay-pay-store', [RazorpayPaymentController::class, 'store'])->name('razorpay-store');
Route::get('cron_job_execute', [BookingController::class, 'cron_job_execute'])->name('cron_job_execute');

// Booking Routes
Route::post('/booking/pay', [BookingController::class, 'bookingpay'])->name('booking.pay');
Route::post('/book-now', [BookingController::class, 'book_now_before_payment'])->name('book-now');
Route::post('/payment-status', [BookingController::class, 'update_payment_status'])->name('payment-status');
Route::post('/bookingpayconfirm', [BookingController::class, 'bookingpayCallback'])->name('booking.pay.confirm');
Route::get('/thank-you', [BookingController::class, 'thank_you'])->name('thank_you');

Route::get('verify-and-get-coupon-code/{branch_id}/{coupon_code}', [BookingController::class, 'verify_and_get_coupon_code'])->name('booking.verify.coupon_code');
Route::post('update_booking_payment_init_status', [BookingController::class, 'update_booking_payment_init_status'])->name('booking.update.payment_init_status');


Route::get('calEventSync', [CalendarEventSyncController::class, 'index'])->name('calendar.event.sync');

/*************** Expense *****************/
//Route::get('/{package_name}/{package_id}', [PackageController::class, 'handle_seo_url'])->name('package.SEO');
Route::get('/{package_name}/{package_id}',  [PackageController::class, 'package_booking'])->name('package.booking');
Route::group(['prefix' => 'package/booking/'], function () {
  //Route::get('/{package_id}',  [PackageController::class, 'package_booking'])->name('package.booking');
  Route::post('get-slots',  [PackageController::class, 'package_slotsby_date_and_theater'])->name('package.booking.get_slots');
  Route::post('update_customer_details',  [PackageController::class, 'update_customer_details'])->name('package.booking.update_customer_details');
  Route::post('book_package',  [PackageController::class, 'hold_book_package'])->name('package.booking.hold_book_package');
  Route::post('book_package_now',  [PackageController::class, 'book_package_now'])->name('package.booking.book_package_now');
});



Route::get('/about', function () {
    return view('about');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/refund', function () {
    return view('refund');
});


Route::get('/privacy', function () {
    return view('privacy');
});

// Route::get('/overview', function () {
//     return view('overview');
// });

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/mybookings', function () {
    return view('mybookings');
});

Route::get('/gallery', function () {
     return view('gallery');
 });

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/contact', function () {
    return view('contact');
});