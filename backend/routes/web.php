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

Route::get('/aggrement',function(){
    return view('aggrement');
});

// Route::post('/booking' , 'booking@index')->name('booking.index');

//Route::get('/aggrement/booking', [bookingController::class, 'index'])->name('booking_add');
Route::post('overview/sendmail', [overviewController::class, 'email'])->name('send_mail');
//Route::get('confirmPay',[bookingController::class, 'confirmPayment'])->name('confirm');


Route::get('/thank_you',[bookingController::class, 'thank_you'])->name('thank_you');

Route::post('/bookingpay', [bookingController::class, 'bookingpay'])->name('bookingpay');
Route::post('/phonepe-bookingpayconfirm',[bookingController::class, 'bookingpayCallback'])->name('booking.pay.confirm');*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\decorationController;
use App\Http\Controllers\cakeController;
use App\Http\Controllers\occasionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TimeSlotsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AdminBookingSlotsController;
use App\Http\Controllers\CalendarEventSyncController;

// Home Page Routes
// Route::view('/', 'index')->name('index');

// Route::group(['middleware' => ['isLoggedin']], function () {
    Route::get('/', [loginController::class,'index'])->name('index');
Route::post('/index/login',[loginController::class,'login'])->name('index.login');

// });

// Route::group(['middleware' => ['isAllowed']], function () {
    Route::get('/admin/dashboard', [homeController::class,'index'])->name('admin.dashboard');
    
    Route::get('/admin/report', [reportController::class,'index'])->name('admin.Reports');

// });

Route::get('admin/calEventManage', [CalendarEventSyncController::class, 'index'])->name('calendar.event.manage');


// Route::get('/index/banner', [homeController::class,'banner'])->name('index.banner');
Route::get('/admin/booking', [BookingController::class,'index'])->name('admin.booking');
Route::get('/admin/booking/invoice/{booking_id}', [BookingController::class, 'invoice'])->name('admin.booking.invoice');
Route::get('/admin/booking/send_mail', [BookingController::class, 'send_bookings_to_admin'])->name('admin.booking.sendMail');

Route::get('/admin/booking/cake-orders', [BookingController::class, 'view_cake_orders'])->name('admin.booking.cakeOrders');

Route::get('/admin/booking/today-booking', [BookingController::class, 'view_today_booking'])->name('admin.booking.todayBooking');


// Book Slots
Route::get('/admin/book-slots', [AdminBookingSlotsController::class, 'select_theater_or_package'])->name('admin.book-slots');
Route::get('/admin/book-theatre/{theatre_id}', [AdminBookingSlotsController::class, 'book_theater'])->name('admin.book-theatre');
Route::get('/admin/book-package/{package_id}', [AdminBookingSlotsController::class, 'book_package'])->name('admin.book-package');
Route::post('/admin/book-get-slots',  [AdminBookingSlotsController::class, 'slots_by_date_and_theater'])->name('admin.get-slots');
Route::post('/admin/book-theatre-store', [AdminBookingSlotsController::class, 'book_slot_store'])->name('admin.book-theatre-slot-store');
Route::post('/admin/book-package-store', [AdminBookingSlotsController::class, 'book_slot_store'])->name('admin.book-package-slot-store');
Route::get('/admin/booking/edit/remarks/{booking_id}', [AdminBookingSlotsController::class, 'edit_remarks'])->name('admin.booking.edit.remarks');
Route::post('/admin/booking/update/remarks',  [AdminBookingSlotsController::class, 'update_remarks'])->name('admin.booking.update.remarks');


//Theatre
Route::get('/admin/add_theater', [TheatreController::class,'index'])->name('admin.add_theater');
Route::get('/admin/city', [TheatreController::class,'city_branch'])->name('admin.city');
Route::post('/admin/create', [TheatreController::class,'create'])->name('admin.create');
Route::get('/admin/edit_theater/{id}', [TheatreController::class,'edit'])->name('admin.edit_theater');
Route::post('/admin/update_theater/{id}', [TheatreController::class,'update'])->name('admin.update_theater');
Route::get('/admin/view_theatres', [TheatreController::class,'view'])->name('admin.view_theatres');

Route::get('/admin/view_theatres/{id}/{status}', [TheatreController::class,'status'])->name('admin.status');

Route::delete('/admin/view_theatres_delete/{id}', [TheatreController::class,'delete'])->name('admin.delete');
Route::get('/admin/theatreImages/{id}', [TheatreController::class,'image'])->name('admin.image');

Route::get('/admin/theatreImages/{id}/{asset_id}', [TheatreController::class,'edit_asset'])->name('admin.edit_asset');
Route::post('/admin/theatreImages/{id}/insert', [TheatreController::class, 'insert_asset'])->name('admin.insert_asset');
Route::post('/admin/theatreImages/{id}/{asset_id}/update', [TheatreController::class, 'update_asset'])->name('admin.update_asset');

Route::get('/admin/theatreImages1/{ass_id}/{id}', [TheatreController::class,'asset_status'])->name('admin.asset_status');

//Cake
Route::get('/admin/add_cake', [CakeController::class,'index'])->name('admin.add_cake');
Route::post('/admin/create_cake', [CakeController::class,'create'])->name('admin.create_cake');
Route::get('/admin/view_cakes', [CakeController::class,'view'])->name('admin.view_cakes');
Route::get('/admin/edit_cake/{id}', [CakeController::class,'cake'])->name('admin.edit_cake');
Route::post('/admin/update_cake/{id}', [CakeController::class,'update'])->name('admin.update_cake');
Route::get('/admin/suspend_cake/{id}', [CakeController::class,'suspend'])->name('admin.suspend_cake');

//Branch
Route::get('/admin/add_branch', [BranchController::class,'index'])->name('admin.add_branch');
Route::post('/admin/create_branch', [BranchController::class,'create'])->name('admin.create_branch');
Route::get('/admin/view_branches', [BranchController::class,'view'])->name('admin.view_branches');
Route::get('/admin/branch/{id}', [BranchController::class,'branch'])->name('admin.branch');
Route::post('/admin/update_branch/{id}', [BranchController::class,'update'])->name('admin.update_branch');
Route::get('/admin/branch_status/{id}/{status}', [BranchController::class,'suspend'])->name('admin.branch_status');

//Occasion
Route::get('/admin/add_occasion', [OccasionController::class,'index'])->name('admin.add_occasion');
Route::post('/admin/create_occasion', [OccasionController::class,'create'])->name('admin.create_occasion');
Route::get('/admin/view_occasions', [OccasionController::class,'view'])->name('admin.view_occasions');
Route::get('/admin/edit_occasion/{id}', [OccasionController::class,'occasion'])->name('admin.edit_occasion');
Route::post('/admin/update_occasion/{id}', [OccasionController::class,'update'])->name('admin.update_occasion');
Route::get('/admin/suspend_occasion/{id}', [OccasionController::class,'suspend'])->name('admin.suspend_occasion');

//Add-On
Route::get('/admin/add_add-on', [AddonController::class,'index'])->name('admin.add_add-on');
Route::post('/admin/create_add-on', [AddonController::class,'create'])->name('admin.create_add-on');
Route::get('/admin/view_add-on_category', [AddonController::class,'category'])->name('admin.view_add-on_category');
Route::get('/admin/view_add-ons', [AddonController::class,'view'])->name('admin.view_add-ons');
Route::get('/admin/addon/{id}', [AddonController::class,'addon'])->name('admin.addon');
Route::post('/admin/update_addon/{id}', [AddonController::class,'update'])->name('admin.update_addon');
Route::get('/admin/suspend_add-on/{id}', [AddonController::class,'suspend'])->name('admin.suspend_add-on');
//AddOn Category
Route::get('/admin/view_addoncat', [AddonController::class,'addoncat'])->name('admin.view_addoncat');
Route::get('/admin/edit_addoncat/{id}', [AddonController::class,'edit_addoncat'])->name('admin.edit_addoncat');
Route::post('/admin/create_addoncat', [AddonController::class,'create_addoncat'])->name('admin.create_addoncat');
Route::post('/admin/update_addoncat/{id}', [AddonController::class,'update_addoncat'])->name('admin.update_addoncat');
Route::get('/admin/suspend_addoncat/{id}', [AddonController::class,'suspend_addoncat'])->name('admin.suspend_addoncat');

//City
Route::get('/admin/add_city', [CityController::class,'index'])->name('admin.add_city');
Route::post('/admin/create_city', [CityController::class,'create'])->name('admin.create_city');
Route::get('/admin/view_cities', [CityController::class,'view'])->name('admin.view_cities');
Route::get('/admin/view_city_branchs/{id}', [CityController::class,'view_city_branchs'])->name('admin.view_city_branchs');
Route::get('/admin/view_city_theatre/{id}', [CityController::class,'view_city_theatre'])->name('admin.view_city_theatre');
Route::get('/admin/city/{id}', [CityController::class,'city'])->name('admin.city');
Route::post('/admin/update_city/{id}', [CityController::class,'update'])->name('admin.update_city');

Route::get('/admin/suspend_city/{id}/{status}', [CityController::class,'suspend'])->name('admin.suspend_city');

//Customers
Route::get('/admin/view_customers', [CustomerController::class,'view'])->name('admin.view_customers');
Route::get('/admin/customer_bookings/{id}', [BookingController::class,'customer_bookings'])->name('admin.customer_bookings');

//Time Slots
Route::get('/admin/view_timeslots', [TimeSlotsController::class,'index'])->name('admin.view_timeslots');
Route::get('/admin/timeslot/{id}', [TimeSlotsController::class,'timeslot'])->name('admin.timeslot');
Route::post('/admin/create_timeslots', [TimeSlotsController::class,'create'])->name('admin.create_timeslots');
Route::get('/admin/suspend_timeslots/{id}', [TimeSlotsController::class,'suspend'])->name('admin.suspend_timeslots');
Route::post('/admin/update_timeslots/{id}', [TimeSlotsController::class,'update'])->name('admin.update_timeslots');

// Route::get('/index/branch', [homeController::class,'branch_theatre'])->name('index.branch');
// Route::get('/home/{id}', [homeController::class,'home'])->name('home');
// Route::post('/home/date', [OverviewController::class, 'date_check'])->name('home.date');

// // Overview Route

// Route::view('/overview', 'overview')->name('overview');
// Route::post('/overview/sendmail', [OverviewController::class, 'email'])->name('overview.send_mail');
// Route::post('/overview/customer', [OverviewController::class, 'customer'])->name('overview.customer');
// // Occasion and Cake Selection Routes
// // Route::view('/select-occasion', 'select-occasion')->name('select.occasion');
// Route::get('/select-occasion/{id}', [OccasionController::class,'index'])->name('select.occasion');
// Route::post('/select-occasion/decoration_type', [OccasionController::class,'decoration_type'])->name('occasion.decoration_type');

// // Route::view('/select-cake', 'select-cake')->name('select.cake');
// Route::get('/select-cake/{id}', [CakeController::class,'index'])->name('select.cake');
// Route::get('/select-cake/categ', [CakeController::class,'category'])->name('select.cake.categ');
// // Route::view('/select-decoration', 'select-decoration')->name('select.decoration');
// Route::get('/select-decoration/{id}', [DecorationController::class,'index'])->name('select.decoration');

// // Agreement Route
// Route::view('/aggrement', 'aggrement')->name('aggrement');

// // Booking Routes
// Route::post('/booking/pay', [BookingController::class, 'bookingpay'])->name('booking.pay');
// Route::post('/bookingpayconfirm', [BookingController::class, 'bookingpayCallback'])->name('booking.pay.confirm');
// Route::get('/thank-you', [BookingController::class, 'thank_you'])->name('thank_you');

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/terms', function () {
//     return view('terms');
// });

// Route::get('/services', function () {
//     return view('services');
// });

// Route::get('/refund', function () {
//     return view('refund');
// });


// Route::get('/privacy', function () {
//     return view('privacy');
// });

// Route::get('/overview', function () {
//     return view('overview');
// });

// Route::get('/pricing', function () {
//     return view('pricing');
// });

// Route::get('/mybookings', function () {
//     return view('mybookings');
// });

// Route::get('/gallery', function () {
//     return view('gallery');
// });

// Route::get('/faq', function () {
//     return view('faq');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });