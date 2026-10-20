<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Dipesh79\LaravelPhonePe\LaravelPhonePe;
use Illuminate\Support\Str;
use App\Models\booking_addon;
use App\Models\customer;
use App\Models\branch;
use App\Models\branch_cake;
use App\Models\Discount;
use App\Helper\Helper;

use Exception;

class reportController extends Controller
{
  protected $helper;

  public function __construct(Helper $helper)
  {
    $this->helper = $helper;
  }

  public function index()
  {
    $dateRangeFilter = null;
    if (request()->has('booking_date_filter')) {
      $dateRangeFilter = request()->input('booking_date_filter');
    }
    $getFilterDates = $this->getFilterDates($dateRangeFilter);
    $startDate = $getFilterDates[0];
    $endDate =  $getFilterDates[1];

    $date_filterUI = date('d/m/Y', strtotime($startDate)) . " - " . date('d/m/Y', strtotime($endDate));
    $date_filter = $startDate . "," . $endDate;

    $sortedBranchIds = session('branch_ids', []);
    if ($sortedBranchIds == null) {
      return redirect()->route('index');
    } else {

      $branch = branch::select('branch_name', 'business_name', 'email', 'contactnumber', 'advance_amount')->where('id', $sortedBranchIds[0])->first();

      /*
      $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment'])->where('date', '>=', $startDate)->where('date', '<=', $endDate)->orderByDesc('date')->get();

      // Remove duplicate addons from each booking
      $booking->each(function ($book) {
        $book->addons = $book->addons->unique(function ($addon) {
          return $addon->addon->name;
        });
      });
      */
      $booking = $this->getBookingDetails("BOOKINGS", $dateRangeFilter);

      return view('booking', compact('booking', 'branch', 'date_filter', 'date_filterUI'));
    }
    // dd($sortedBranchIds[0]);
  }

  public function send_bookings_to_admin()
  {
    $dateRangeFilter = null;
    if (request()->has('btn_send_mail_date_filter')) {
      $dateRangeFilter = request()->input('btn_send_mail_date_filter');
    }
    $booking = $this->getBookingDetails("BOOKING_SEND_MAIL", $dateRangeFilter);

    $isMailTemplate = 1;
    $dateRange = $dateRangeFilter;

    $htmlData = view('includes.inc_booking_table', compact('booking', 'isMailTemplate', 'dateRange'))->render();

    $emailSubject = "Booking Details From - " . $dateRange;

    try {
      //"info@partyadda.com", "kris.vd@gmail.com"

    $this->helper->sendAdminMail(array("info@partyadda.com", "partyadda.37@gmail.com"), $emailSubject, $htmlData);

      //$this->helper->sendAdminMail(array($booking->theatre->branchs->email),  $emailSubject, $htmlData);
    } catch (\Exception $e) {
    }

    return redirect()->back()->with('success', 'Mail Sent Successfully');
  }

  public function view_cake_orders()
  {
    $dateRangeFilter = null;
    if (request()->has('view_cake_order_date_filter')) {
      $dateRangeFilter = request()->input('view_cake_order_date_filter');
    }

    $isSendMail = 0;
    if (request()->has('cake_order_send_mail')) {
      $isSendMail = request()->input('cake_order_send_mail');
    }

    $getFilterDates = $this->getFilterDates($dateRangeFilter);
    $startDate = $getFilterDates[0];
    $endDate =  $getFilterDates[1];

    $date_filter = $startDate . "," . $endDate;

    if ($isSendMail == 1) {
      $booking = $this->getBookingDetails("CAKE_ORDER_MAIL", $dateRangeFilter);
      $isMailTemplate = 1;
      $dateRange = $dateRangeFilter;

      $htmlData = view('includes.inc_booking_cake_order_table', compact('booking', 'isMailTemplate', 'dateRange'))->render();

      $emailSubject = "Cake_Order Details From - " . $dateRange;

      try {
        //"info@partyadda.com", "kris.vd@gmail.com"
        //  $this->helper->sendAdminMail(array("info@partyadda.com", "kris.vd@gmail.com"), $emailSubject, $htmlData);

            $this->helper->sendAdminMail(array("info@partyadda.com", "partyadda.37@gmail.com"), $emailSubject, $htmlData);


   //     $this->helper->sendAdminMail(array($booking->theatre->branchs->email), null, $htmlData);
      } catch (\Exception $e) {
      }
      return redirect()->back()->with('success', 'Mail Sent Successfully');
    } else {
      $booking = $this->getBookingDetails("CAKE_ORDER", $dateRangeFilter);

      return view('view_cake_orders', compact('booking', 'date_filter'));
    }
  }

  private function getFilterDates($dateRangeFilter)
  {
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d');

    if ($dateRangeFilter != null) {
      $dateRange = $dateRangeFilter;
      try {
        $dateRangeArray = explode(",", $dateRange);
        $startDate = date('Y-m-d', strtotime(trim($dateRangeArray[0])));
        $endDate = date('Y-m-d', strtotime(trim($dateRangeArray[1])));
      } catch (\Exception $e) {
      }
    }
    return array($startDate, $endDate);
  }

  private function getBookingDetails($type, $dateRangeFilter)
  {
    $getFilterDates = $this->getFilterDates($dateRangeFilter);
    $startDate = $getFilterDates[0];
    $endDate =  $getFilterDates[1];

    $booking = null;

    try {
      $sortedBranchIds = session('branch_ids', []);
      $branchId = null;
      if ($sortedBranchIds != null) {
        $branchId = $sortedBranchIds[0];
      }

      if ($branchId != NULL) {
        $bookingData = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment'])->where('date', '>=', $startDate)->where('date', '<=', $endDate)->orderByDesc('date');

        if ($bookingData != null) {
          if ($type == "BOOKING_SEND_MAIL") {
            $booking = $bookingData->take(25)->get();
          } else if ($type == "CAKE_ORDER_MAIL") {
            $booking = $bookingData->take(30)->get();
          } else {
            $booking = $bookingData->get();
          }
        }

        // Remove duplicate addons from each booking
        $booking->each(function ($book) {
          $book->addons = $book->addons->unique(function ($addon) {
            return $addon->addon->name;
          });
        });

        foreach ($booking as $book) {
          if ($book->cake_id != NULL) {
            $book->branch_cake  = branch_cake::where(["branch_id" => $book->theatre->branch_id, "cake_id" => $book->cake_id])->first();
          }
        }
        if ($type == "CAKE_ORDER") {
        }
      }
    } catch (\Exception $e) {
    }
    return $booking;
  }

  public function customer_bookings($id)
  {
    $sortedBranchIds = session('branch_ids', []);
    if ($sortedBranchIds == null) {
      return redirect()->route('index');
    } else {
      $branch = branch::select('branch_name', 'business_name', 'email', 'contactnumber', 'advance_amount')->where('id', $sortedBranchIds[0])->first();
      $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon'])->where('customer_id', $id)->get();

      // Remove duplicate addons from each booking
      $booking->each(function ($book) {
        $book->addons = $book->addons->unique(function ($addon) {
          return $addon->addon->name;
        });
      });
      // dd($booking);
      return view('booking', compact('booking', 'branch'));
    }
    // dd($sortedBranchIds[0]);
  }


  /*public function generateUniqueId()
    {
        // Get the current date in Ymd format
        $date = Carbon::now()->format('Ymd');

        // Query the database to get the latest ID that matches the date
        $lastId = DB::table('booking')
            ->where('booking_id', 'like', $date . '%')
            ->latest('booking_id')
            ->value('booking_id');

        // Determine the next sequence number
        if ($lastId) {
            // Extract the last 4 digits and increment
            $lastSequence = (int) substr($lastId, -4);
            $newSequence = $lastSequence + 1;
        } else {
            // Start with sequence 1 if no record exists for today
            $newSequence = 1;
        }

        // Pad the sequence to 4 digits
        $sequence = str_pad($newSequence, 4, '0', STR_PAD_LEFT);

        // Combine the date and sequence for the final ID
        return $date . $sequence;
    }

    function index(Request $request){

        $decoration_string = $request->decoration_name;

    // Remove HTML tags to get a clean decoration_string
    $decoration_string = str_replace("Special Ad-On", "", $decoration_string);

    // Remove HTML tags to get a clean decoration_string
    $cleandecoration_string = strip_tags($decoration_string, '<br>');

    // Explode the decoration_string by the <br> tag to create an array
    $array1 = array_filter(array_map('trim', explode('<br>', $cleandecoration_string)));

    // Convert the array to a comma-separated decoration_string
    $addons = implode(", ", $array1);

    // // Output the comma-separated decoration_string
    // // echo $addons;

    $date = date('Y-m-d',strtotime($request->calender));
    $name  = $request->Booking_Name;
    $mobile = $request->Whatsapp_Name;
    $email = $request->Email_ID;
    $final_price = $request->total;
    $date1 = $date;
    $theatre = $request->name;
    $cake_id = $request->cake_id;
    $addons1 = $addons;
    $No_people = $request->input_number;
    $slot = $request->slot;
    $decoration = $request->decoration;
    $nick_name = $request->nick_name;
    $your_name = $request->your_name;
    $partner_name = $request->partner_name;    


    $book_id = $this->generateUniqueId();
    
    
    // print_r($date);
    $Booking = new booking();
    $Booking->booking_id = $book_id;
    $Booking->name  = $name;
    $Booking->mobile = $mobile;
    $Booking->email = $email;
    $Booking->final_price = $final_price;
    $Booking->date = $date1;
    $Booking->theatre = $theatre;
    $Booking->cake = $cake_id;
    $Booking->addons = $addons1;
    $Booking->No_people = $No_people;
    $Booking->slot = $slot;
    $Booking->decoration = $decoration;
    $Booking->nick_name = $nick_name;
    $Booking->your_name = $your_name;
    $Booking->partner_name = $partner_name;
    $Booking->save();

        // return $request;
        $merchantId = 'M22VOVOXXHDUD';

$apiKey = '4da51867-93e0-4471-b76e-4aa01efd1548';
$redirectUrl = route('confirm');
$order_id = uniqid(); 

 
$transaction_data = array(
    'merchantId' => "$merchantId",
    'merchantTransactionId' => "$order_id",
    "merchantUserId"=>$order_id,
    'amount' => 100 * 100,
    'redirectUrl'=>"$redirectUrl",
    'redirectMode'=>"POST",
    'callbackUrl'=>"$redirectUrl",
   "paymentInstrument"=> array(    
    "type"=> "PAY_PAGE",
  )
);

$encode = json_encode($transaction_data);
                $payloadMain = base64_encode($encode);
                $salt_index = 1; //key index 1
                $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
                $sha256 = hash("sha256", $payload);
                $final_x_header = $sha256 . '###' . $salt_index;
                $request = json_encode(array('request'=>$payloadMain));
                // echo $request_payment;
                // exit;

                $curl = curl_init();
                // var_dump($curl);
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => $request,
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
     "X-VERIFY: " . $final_x_header,
     "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
// print_r($curl);

curl_close($curl);
if ($err) {
    $err = curl_error($curl);
}
else{
    $order_id = uniqid(); 
    // echo 'yes';
    // exit;
    $res = json_decode($response);
    // print_r($res);
    $data = [
        'amount' => 1,
        'transaction_id' => $order_id,
        'payment_status' => 'PAYMENT_PENDING',
        'response_msg'=>$response,
        'providerReferenceId'=>'',
        'merchantOrderId'=>'',
        'checksum'=>''
        ];
        
        Payment::create($data);
    // print_r($res);
    // exit;
    if(isset($res->code) && ($res->code=='PAYMENT_INITIATED')){
 
        $payUrl=$res->data->instrumentResponse->redirectInfo->url;
       
       return redirect()->away($payUrl);
         }
         else{
            //HANDLE YOUR ERROR MESSAGE HERE
                     dd('ERROR : ' . $res);
            }

}

        
        // return response()->json(['doneMessage' => 'yes']);

    }


    public function confirmPayment(Request $request) {
        
        if($request->code == 'PAYMENT_SUCCESS')
    {
        $transactionId = $request->transactionId;
        $merchantId=$request->merchantId;
       $providerReferenceId=$request->providerReferenceId;
       $merchantOrderId=$request->merchantOrderId;
       $checksum=$request->checksum;
       $status=$request->code;
       
       //Transaction completed, You can add transaction details into database
    
    
       $data = [
    'providerReferenceId' => $providerReferenceId,
    'checksum' => $checksum,
    
    ];
    if($merchantOrderId !=''){
     $data['merchantOrderId']=$merchantOrderId;
    }
    
    Payment::where('transaction_id', $transactionId)->update($data); 
         
       return view('thank_you');
    
    }else{
    
        //HANDLE YOUR ERROR MESSAGE HERE
        dd('ERROR : ' .$request->code. ', Please Try Again Later.');
    }
}
    
    function thank_you(){
        return view('/thank_you');
    }*/

  public function generateUniqueId($length)
  {
    return strtoupper(Str::random($length));
  }


  function bookingpay(Request $request)
  {
    // return $request;
    //throw new Exception('Something went wrong!');
    $phonepe = new LaravelPhonePe();
    $decoration_string = $request->decoration_name;
    // Remove HTML tags to get a clean decoration_string
    $decoration_string = str_replace("Special Ad-On", "", $decoration_string);

    $ad_id = $request->addon_id;
    $ad_amt = $request->addon_amount;
    // Remove HTML tags to get a clean decoration_string
    $cleanad_string = strip_tags($ad_id, '<br>');
    $cleanad_string_amt = strip_tags($ad_amt, '<br>');
    // Explode the decoration_string by the <br> tag to create an array
    $array1 = array_filter(array_map('trim', explode('<br>', $cleanad_string)));
    $array1_amt = array_filter(array_map('trim', explode('<br>', $cleanad_string_amt)));
    // Convert the array to a comma-separated decoration_string
    $addons = implode(", ", $array1);

    $book_id = $this->generateUniqueId(8);
    $transaction_id = $this->generateUniqueId(18);

    $data = array(
      'addon_id' => $array1,
      'addon_amount' => $array1_amt,
    );

    //  dd($data);
    if ($request->cake_id === 'null') {
      $cake_id = null;
    } else {
      $cake_id = $request->cake_id;
    }

    if ($request->decoration === 'null') {
      $decoration = null;
    } else {
      $decoration = $request->decoration;
    }
    if ($request->discount_id === 'null') {
      $discount_id = null;
    } else {
      $discount_id = $request->discount_id;
    }


    $Booking = new booking();
    // $Booking->booking_id = $book_id;
    $Booking->customer_id = $request->customer_id;

    $Booking->final_price = $request->total;
    $Booking->discountid = $discount_id;
    $Booking->date = date('Y-m-d', strtotime($request->calender));
    // $Booking->slot_time = $request->time;
    $Booking->theatre = $request->theatre_id;
    $Booking->cake = $cake_id;
    // $Booking->addons = $addons;
    $Booking->No_people = $request->input_number;
    $Booking->slot = $request->slot_id;
    $Booking->decoration = $request->decoration_id;
    // $Booking->nick_name = $request->nick_name;
    $Booking->your_name = $request->your_name;
    $Booking->partner_name = $request->partner_name;

    if ($Booking->save()) {
      $booking_id = $Booking->id;

      for ($i = 0; $i < count($data['addon_id']); $i++) {
        $booking_addon = new booking_addon();
        //  dd($data['addon_amount']);
        $booking_addon->booking_id = $booking_id;
        $booking_addon->addon_id = $data['addon_id'][$i];
        $booking_addon->amount = $data['addon_amount'][$i];
        $booking_addon->save();
      }

      $data = [
        'bookingid' => $booking_id,
        'amount' => $request->total,
        'transactionid' => $transaction_id,
        'status' => '1',
        'paymentgateway' => 'phonepe',
        'response_msg' => 'Payment success',
        //'providerReferenceId'=>'',
        //'merchantOrderId'=>'',
        //'checksum'=>''
      ];
      // return $data;
      Payment::create($data);
    }

    // amount, phone number, callback URL, unique merchant transaction id
    $url = $phonepe->makePayment(/*$request->total*/$request->advance, $request->Whatsapp_Name, env('PHONEPE_CALLBACK_URL'), $transaction_id);
    return redirect()->away($url);
  }

  function bookingpayCallback(Request $request)
  {
    $phonepe = new LaravelPhonePe();
    $response = $phonepe->getTransactionStatus($request->all());
    if ($response == true) {
      // Payment Success

      //UPDATE DB RECORDS HERE

      $localStorageKeys = [
        'name',
        'calender',
        'time',
        'Booking_Name',
        'input_number',
        'Whatsapp_Name',
        'Email_ID',
        'form_select_lg',
        'coupon_code',
        'extra',
        'cake_price',
        'cake_name',
        'decoration_price',
        'decoration_name',
        'total',
        'sub_total',
        'advance',
        'slot',
        'decoration',
        'nick_name',
        'your_name',
        'partner_name'
      ];
      return redirect()->route('thank_you')->with('localStorageKeys', $localStorageKeys);
    } else {
      // Payment Failed
      return redirect()->back()->with('error', 'Payment Failed.');
    }
  }

  function thank_you()
  {
    return view('/thank_you');
  }

  function invoice($booking_id)
  {
    $booking = booking::with(['customer', 'theatre.branch_data', 'cake', 'slot', 'decoration', 'addons.addon', 'payment', 'package'])->where('id', $booking_id)->first();

    if (!isset($booking_id) || !isset($booking)) {
      return redirect()->route('admin.dashboard');
    }

    $branch_cake = NULL;
    if ($booking->cake_id != NULL) {
      $branch_cake = branch_cake::where(["branch_id" => $booking->theatre->branch_id, "cake_id" => $booking->cake_id])->first();
    }

    //echo json_encode($booking);
    //exit;

    $data['booking'] = $booking;
    $data['branch_cake'] = $branch_cake;
    $data['is_package'] = $is_package = $booking->package_id != NULL && $booking->package_id > 0;

    $baseAmount = 0;
    $extraPersonAmount = 0;
    $decorationAmount = 0;
    $cakeAmount = 0;
    $addOnTotalAmount = 0;
    $discountAmount = 0;
    $subTotalAmount = 0;
    $balanceAmount = 0;
    $advancePaidAmount = $booking->payment->amount;

    if ($is_package) {
      $baseAmount = $booking->package->package_amount;
      $cakeAmount = $booking->cake_extra_amount;
    } else {
      $baseAmount = $booking->theatre->price;

      if ($booking->decoration_id != NULL && $booking->theatre->decoration_included != 1) {
        $decorationAmount = $booking->theatre->branch_data->decoration_amount;
      }

      if (isset($booking->cake_id) && $booking->cake_id != NULL && $booking->cake_id > 0) {
        $cakeAmount = $branch_cake->price;
      }
    }

    if ($booking->No_people > $booking->theatre->peopleallowed) {
      $extraPersonAmount =  $booking->theatre->extra_person_price * ($booking->No_people - $booking->theatre->peopleallowed);
    }

    $addOnsWithZeroAmount = [];
    if (isset($booking->addons) && count($booking->addons) > 0) {
      foreach ($booking->addons as $addon) {
        $addOnTotalAmount = $addOnTotalAmount + $addon->amount;
        if ($addon->amount == 0) {
          $addOnsWithZeroAmount[] = $addon->addon->name;
        }
      }
    }

    $subTotalAmount = ($baseAmount + $extraPersonAmount + $decorationAmount + $cakeAmount + $addOnTotalAmount);

    if (isset($booking->discountid) && $booking->discountid != NULL && $booking->discountid > 0) {
      $couponCode = Discount::where(['discount_id' => $booking->discountid])->first();
      if (isset($couponCode)) {
        if ($couponCode->discount_type == "FLAT") {
          $discountAmount = $couponCode->discount;
        } else if ($couponCode->discount_type == "PERCENTAGE") {
          $discountAmount = $baseAmount * ($couponCode->discount / 100);
        }
      }
    }

    $balanceAmount = $subTotalAmount - $advancePaidAmount - $discountAmount;

    $amountData['base_amount'] = $baseAmount;
    $amountData['extra_person_amount'] = $extraPersonAmount;
    $amountData['discount_amount'] = $discountAmount;
    $amountData['sub_total'] = $subTotalAmount;
    $amountData['balance_amount'] = $balanceAmount;

    $data['amountData'] = json_decode(json_encode($amountData));
    $data['addOnsWithZeroAmount'] = $addOnsWithZeroAmount;

    return view('invoice', $data);
  }
}
