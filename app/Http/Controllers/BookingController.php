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
use App\Models\Discount;
use App\Models\cake;
use App\Models\customer;
use App\Models\CronJobTest;
use Razorpay\Api\Api;
use App\Repositories\PackageRepo;

use Session;
use Exception;
use Illuminate\Auth\Events\Verified;

use App\Helper\Helper;

class bookingController extends Controller
{
  protected $rzrApi, $pckg, $helper;

  public function __construct(PackageRepo $pckg, Helper $helper)
  {
    $this->rzrApi = new Api(env('RAZOR_API_KEY'), env('RAZOR_API_SECRET'));
    $this->pckg = $pckg;
    $this->helper = $helper;
  }

  public function verify_and_get_coupon_code($branch_id, $coupon_code)
  {
    $getCouponCode = Discount::where(['promocode' => $coupon_code, 'branch_id' => $branch_id, 'enabled' => 1, ['valid_until', '>=', now()->format('Y-m-d')]])->first();

    return response()->json(['status' => $getCouponCode != NULL && isset($getCouponCode->discount_id), 'coupon_data' => $getCouponCode]);
  }

  public function agreement(Request $request)
  {
    $subTotalAmount = $request->sub_total;
    $paybleAmount = $request->advance;
    $paybleAmountInPaise = $paybleAmount * 100;

    $customer = customer::find($request->customer_id);

    if ($request->has('package_id')) {
      $data['is_package'] = 1;
      $data['package_booking'] = json_encode($this->pckg->getPackageBookingSession());
    } else {
      $data['is_package'] = 0;
    }

    //$sample = $this->rzrApi->order->create(array('receipt' => '123', 'amount' => 101, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
    //$createOrderArray = array('receipt' => '123', 'amount' => $paybleAmountInPaise, 'currency' => 'INR');
    //$rzrPayOrder = $this->rzrApi->order->create($createOrderArray);

    //$data['rzr_order_id'] = $rzrPayOrder->id ?? NULL;
    $data['customer'] = $customer;
    $data['paybleAmount'] = $paybleAmount;
    $data['paybleAmountInPaise'] = $paybleAmountInPaise;

    return view('agreement', $data);
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

  function book_now_before_payment(Request $request)
  {
    try {
      return DB::transaction(function () use ($request) {

        $ad_id = strip_tags($request->addon_id, '<br>');
        $ad_amt = strip_tags($request->addon_amount, '<br>');

        $addonIds = array_filter(array_map('trim', explode('<br>', $ad_id)));
        $addonAmounts = array_filter(array_map('trim', explode('<br>', $ad_amt)));

        $transaction_id = NULL;

        // Store relevant data in session to access it in the callback function
        $cake_id = NULL;
        if (isset($request->cake_id) && $request->cake_id != NULL && $request->cake_id != '' && $request->cake_id != '0' && $request->cake_id != 0) {
          $cake_id = $request->cake_id;
        }

        $decoration_id = NULL;
        if (isset($request->decoration_id) && $request->decoration_id != NULL && $request->decoration_id != '' && $request->decoration_id != '0' && $request->decoration_id != 0) {
          $decoration_id = $request->decoration_id;
        }

        $checkForExisting = booking::where(
            [
              'theatre_id' => $request->theatre_id,
            'slot_id' => $request->slot_id,
              'date' => date('Y-m-d', strtotime($request->calender))
            ]
        )->whereIn('booking_status', Helper::BOOKING_STATUS_CHECK_ARRAY)->whereNotIn('customer_id', [$request->customer_id])->get();

        if (isset($checkForExisting) && count($checkForExisting) > 0) {
          return response()->json(['success' => false, 'errMsg' => 'Slot is already booked, Please select other available slot and book']);
        }

        $discount_id = $request->discount_id;
        $promocode = NULL;
        if (isset($discount_id)) {
          $getCouponCode = Discount::where(['discount_id' => $discount_id])->first();
          if (isset($getCouponCode)) {
            $promocode = $getCouponCode->promocode;
          }
        }

        $noOfGuests = 0;
        if (isset($request->input_number) && $request->input_number != NULL && $request->input_number != '') {
          $noOfGuests = $request->input_number;
        }

        $Booking = new booking();
        $Booking->customer_id = $request->customer_id;
        $Booking->final_price = $request->total;
        $Booking->discountid = $discount_id;
        $Booking->promocode = $promocode;
        $Booking->date = date('Y-m-d', strtotime($request->calender));
        $Booking->No_people = $noOfGuests;
        $Booking->theatre_id = $request->theatre_id;
        $Booking->cake_id = $cake_id;
        $Booking->name_on_cake = $request->name_on_cake;
        $Booking->slot_id =  $request->slot_id;
        $Booking->decoration_id = $decoration_id;
        $Booking->your_name =  $request->your_name;
        $Booking->partner_name = $request->partner_name;

        $Booking->booking_status = 0;
        $Booking->payment_status = "Created";
        $Booking->sms_sent = 0;
        $Booking->cal_event_id = NUll;

        $booking_id = NULL;
        $payment_id = NULL;

        if ($Booking->save()) {
          $booking_id = $Booking->id;
          $addon_ids = $addonIds;
          $addon_amounts = $addonAmounts;

          foreach ($addon_ids as $index => $addon_id) {
            $booking_addon = new booking_addon();
            $booking_addon->booking_id = $booking_id;
            $booking_addon->addon_id = $addon_id;
            $booking_addon->amount = $addon_amounts[$index] ?? 0;
            $booking_addon->save();
          }

          // Save payment information
          $paymentData = [
            'bookingid' => $booking_id,
            'amount' => 0,
            'transactionid' => $transaction_id,
            'status' => '0',
            'paymentgateway' => 'razorpay',
            'response_msg' => 'Payment Pending',
          ];

          $payment_id = Payment::create($paymentData)->payment_id;
        }

        if ($booking_id != NULL && $payment_id != NULL) {
          //$sample = $this->rzrApi->order->create(array('receipt' => '123', 'amount' => 101, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

          $subTotalAmount = $request->total;
          $paybleAmount = $request->advance;
          $paybleAmountInPaise = $paybleAmount * 100;

          $this->pckg->updateBilling($booking_id);

          $customer = customer::find($request->customer_id);

          $rarPayNotes = array('padda_booking_id' => $booking_id, 'padda_payment_id' => $payment_id, 'customer_id' => $customer->id);
          $receipt = "PADA-" . $booking_id . "-" . $payment_id;
          $createOrderArray = array('receipt' => $receipt, 'amount' => $paybleAmountInPaise, 'currency' => 'INR', 'notes' => $rarPayNotes);
          $rzrPayOrder = $this->rzrApi->order->create($createOrderArray);

          return response()->json(['success' => true, 'booking_id' => $booking_id, 'payment_id' => $payment_id, 'customer' => $customer, 'paybleAmount' => $paybleAmount, 'paybleAmountInPaise' => $paybleAmountInPaise, 'rzr_order_id' => $rzrPayOrder->id]);
        } else {
          return response()->json(['success' => false, 'errMsg' => 'Something went wrong']);
        }
      });
    } catch (\Exception $e) {
      return response()->json(['success' => false, 'errMsg' => $e->getMessage()]);
      //return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  function update_booking_payment_init_status(Request $request)
  {
    $booking_id = $request->booking_id;
    $booking = booking::where('id', $booking_id)->get()->first();
    if ($booking->booking_status != 1) {
      $bookingUpdate = ['payment_status' => 'Payment Initiated'];
      booking::where('id', $booking_id)->update($bookingUpdate);
    }
    return response()->json(['success' => true]);
  }

  function update_payment_status(Request $request)
  {
    $is_package = $request->is_package;
    $booking_id = $request->booking_id;
    $payment_id = $request->payment_id;
    $payment_status = "";
    if ($request->payment_status == "SUCCESS") {
      $payment_status = 'Payment success';
    } else if ($request->payment_status == "MODEL_CLOSED") {
      $payment_status = 'Payment Initiated';
    } else if ($request->payment_status == "FAILED") {
      $payment_status = 'Payment Failed';
    }

    session(['customer_id' => $request->customer_id]);
    session(['booking_id' => $booking_id]);
    session(['payment_id' => $payment_id]);
    session(['is_package' => $is_package]);

    $razorpay_payment_id = $request->razorpay_payment_id;
    $razorpay_order_id = $request->razorpay_order_id;
    $razorpay_signature = $request->razorpay_signature;

    if (isset($razorpay_payment_id)) {
      try {
        $payment = $this->rzrApi->payment->fetch($razorpay_payment_id);
        //$json = json_encode($payment->toArray());

        if ($payment['status'] != "captured") {
          try {
            $response = $payment->capture(array('amount' => $payment['amount']));
          } catch (Exception $e) {
          }
        }

        try {
          // Verify the payment
          $attributes = array(
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_signature' => $razorpay_signature
          );
          $verify = $this->rzrApi->utility->verifyPaymentSignature($attributes);
        } catch (Exception $e) {
        }


        if (isset($payment) && $payment['amount'] != null) {
          $amountPaid = (int) ($payment['amount'] / 100);

          if ($amountPaid > 0) {
            $paymentData = [
              'amount' => $amountPaid,
              'transactionid' => $razorpay_payment_id,
              'status' => '1',
              'paymentgateway' => 'razorpay',
              'response_msg' => 'Payment success',
            ];
            //Payment::find($payment_id)->update($paymentData);
            Payment::where('payment_id', $payment_id)->update($paymentData);

            $bookingUpdate = [
              'booking_status' => 1,
              'payment_status' => 'Payment success'
            ];
            booking::where('id', $booking_id)->update($bookingUpdate);

            $this->pckg->updateBilling($booking_id);

            session(['customer_id' => $request->customer_id, 'is_paid' => 1, "paid_amount" => $amountPaid]);

            try {
              $book = Booking::with(['customer', 'theatre.branchs', 'cake', 'slot', 'decoration', 'payment', 'addons.addon'])->where('id', '=', $booking_id)->first();

              $htmlData = view('emails.admin_email', compact('book'))->render();

              $this->helper->sendAdminMail(array($book->theatre->branchs->email), $htmlData);
            } catch (Exception $e) {
            }
          }
        }
      } catch (Exception $e) {
        //return  $e->getMessage();
        //Session::put('error',$e->getMessage());
        //return redirect()->back();
      }
    } else {
      $booking = booking::where('id', $booking_id)->get()->first();
      if ($booking->booking_status != 1) {
        $bookingUpdate = ['payment_status' => $payment_status];
        booking::where('id', $booking_id)->update($bookingUpdate);
      }
      session(['is_paid' => 0]);
    }
    session(['is_redirect_after_payment' => 1]);
    return redirect()->route('thank_you');
  }

  function bookingpay(Request $request)
  {
    //\Log::info('Payment details received:', $request->all());
    // $phonepe = new LaravelPhonePe();

    // Prepare addons and amounts without saving anything yet
    $ad_id = strip_tags($request->addon_id, '<br>');
    $ad_amt = strip_tags($request->addon_amount, '<br>');

    $addon_ids = array_filter(array_map('trim', explode('<br>', $ad_id)));
    $addon_amounts = array_filter(array_map('trim', explode('<br>', $ad_amt)));

    // Generate transaction ID (without booking ID yet)
    $transaction_id = $request->razorpay_payment_id; //$this->generateUniqueId(18);

    if (isset($request->razorpay_payment_id)) {
      try {
        $payment = $this->rzrApi->payment->fetch($request->razorpay_payment_id);
        $response = $payment->capture(array('amount' => $payment['amount']));

        // Verify the payment
        $attributes = array(
          'razorpay_payment_id' => $request->razorpay_payment_id,
          'razorpay_order_id' => $request->razorpay_order_id,
          'razorpay_signature' => $request->razorpay_signature
        );
        $this->rzrApi->utility->verifyPaymentSignature($attributes);
      } catch (Exception $e) {
        //return  $e->getMessage();
        //Session::put('error',$e->getMessage());
        //return redirect()->back();
      }
    }

    // Store relevant data in session to access it in the callback function
    $cake_id = NULL;
    if (isset($request->cake_id) && $request->cake_id != NULL && $request->cake_id != '') {
      $cake_id = $request->cake_id;
    }

    $decoration_id = NULL;
    if (isset($request->decoration_id) && $request->decoration_id != NULL && $request->decoration_id != '') {
      $decoration_id = $request->decoration_id;
    }

    session([
      'customer_id' => $request->customer_id,
      'final_price' => $request->total,
      'discount_id' => $request->discount_id === 'null' ? null : $request->discount_id,
      'date' => date('Y-m-d', strtotime($request->calender)),
      'theatre_id' => $request->theatre_id,
      'cake_id' => $cake_id, //$request->cake_id === 'null' ? null : $request->cake_id,
      'slot_id' => $request->slot_id,
      'decoration_id' => $decoration_id, //$request->decoration_id,
      'your_name' => $request->your_name,
      'partner_name' => $request->partner_name,
      'addons' => $addon_ids,
      'addon_amounts' => $addon_amounts,
      'transaction_id' => $transaction_id,
      'razorpay_payment_id' => $request->razorpay_payment_id,
      'razorpay_order_id' => $request->razorpay_order_id,
      'razorpay_signature' => $request->razorpay_signature
    ]);

    // Redirect to PhonePe payment URL
    // $url = $phonepe->makePayment($request->advance, $request->Whatsapp_Name, env('PHONEPE_CALLBACK_URL'), $transaction_id);
    // return redirect()->away($url);
    // response()->json(['success' => true]);

    return redirect()->route('thank_you');
  }

  function bookingpayCallback(Request $request)
  {
    $phonepe = new LaravelPhonePe();
    $response = $phonepe->getTransactionStatus($request->all());

    if ($response === true) {
      // Payment Success - Create booking and save all details
      $booking = new booking();
      $booking->customer_id = session('customer_id');
      $booking->final_price = session('final_price');
      $booking->discountid = session('discount_id');
      $booking->date = session('date');
      $booking->theatre_id = session('theatre_id');
      $booking->cake_id = session('cake_id');
      $booking->slot_id = session('slot_id');
      $booking->decoration_id = session('decoration_id');
      $booking->your_name = session('your_name');
      $booking->partner_name = session('partner_name');

      if ($booking->save()) {
        // Save addon details if any
        $booking_id = $booking->id;
        $addon_ids = session('addons');
        $addon_amounts = session('addon_amounts');

        foreach ($addon_ids as $index => $addon_id) {
          $booking_addon = new booking_addon();
          $booking_addon->booking_id = $booking_id;
          $booking_addon->addon_id = $addon_id;
          $booking_addon->amount = $addon_amounts[$index] ?? 0;
          $booking_addon->save();
        }

        // Save payment information
        $paymentData = [
          'bookingid' => $booking_id,
          'amount' => session('final_price'),
          'transactionid' => session('transaction_id'),
          'status' => '1',
          'paymentgateway' => 'phonepe',
          'response_msg' => 'Payment success',
        ];
        Payment::create($paymentData);

        // Clear session data
        session()->forget([
          'customer_id',
          'final_price',
          'discount_id',
          'date',
          'theatre_id',
          'cake_id',
          'slot_id',
          'decoration_id',
          'your_name',
          'partner_name',
          'addons',
          'addon_amounts',
          'transaction_id'
        ]);

        // Redirect to Thank You page
        return redirect()->route('thank_you');
      }
    } else {
      // Payment Failed
      return redirect()->back()->with('error', 'Payment Failed.');
    }
  }


  // function thank_you(){

  //      $Booking = new booking();
  //     $Booking->customer_id = session('customer_id');
  //     $Booking->final_price = session('final_price');
  //     $Booking->discountid = session('discount_id');
  //     $Booking->date = session('date');
  //     $Booking->No_people = 0;
  //     $Booking->theatre_id = session('theatre_id');
  //     $Booking->cake_id = session('cake_id');
  //     $Booking->slot_id = session('slot_id');
  //     $Booking->decoration_id = session('decoration_id');
  //     $Booking->your_name = session('your_name');
  //     $Booking->partner_name = session('partner_name');

  //     if ($Booking->save()) {
  //         // Save addon details if any
  //         $booking_id = $Booking->id;
  //         $addon_ids = session('addons');
  //         $addon_amounts = session('addon_amounts');

  //         foreach ($addon_ids as $index => $addon_id) {
  //             $booking_addon = new booking_addon();
  //             $booking_addon->booking_id = $booking_id;
  //             $booking_addon->addon_id = $addon_id;
  //             $booking_addon->amount = $addon_amounts[$index] ?? 0;
  //             $booking_addon->save();
  //         }

  //         // Save payment information
  //         $paymentData = [
  //             'bookingid' => $booking_id,
  //             'amount' => session('final_price'),
  //             'transactionid' => session('transaction_id'),
  //             'status' => '1',
  //             'paymentgateway' => 'phonepe',
  //             'response_msg' => 'Payment success',
  //         ];
  //         Payment::create($paymentData);

  //         // Clear session data
  //         session()->forget([
  //             'customer_id', 'final_price', 'discount_id', 'date', 'theatre_id',
  //             'cake_id', 'slot_id', 'decoration_id', 'your_name', 'partner_name',
  //             'addons', 'addon_amounts', 'transaction_id'
  //         ]);

  //         // Redirect to Thank You page
  //         // return redirect()->route('thank_you');
  //     }
  //     return view('thank_you');
  // }

  function thank_you()
  {
    $is_redirect_after_payment = 0;
    if (session()->has('is_redirect_after_payment') && session('is_redirect_after_payment') == 1) {
      $is_redirect_after_payment = 1;
    }

    if ($is_redirect_after_payment == 1) {
      $customer_id = session('customer_id');
      $isPaid = 0;
      $paidAmount = 0;
      if (session()->has('is_paid') && session('is_paid') == 1) {
        $isPaid = 1;
        $paidAmount = session('paid_amount');
      }

      $customer = customer::find($customer_id);
      $data['customer'] = $customer;
      $data['is_paid'] = $isPaid;
      $data['paid_amount'] = $paidAmount;

      $is_package = 0;
      if (session()->has('is_package') && session('is_package') == 1) {
        $is_package = 1;
        $data['booking_data'] = $this->pckg->getPackageBookingSession();
      }

      $this->pckg->resetPackageBookingSession();
      $data['is_package'] = $is_package;
    }

    session()->forget([
      'customer_id',
      'booking_id',
      'payment_id',
      'is_paid',
      'paid_amount',
      'is_redirect_after_payment',
      'is_package'
    ]);

    if ($is_redirect_after_payment == 1) {
      if ($is_package == 1) {
        return view('thank-you', $data);
      } else {
        return view('thank_you', $data);
      }
    }
    return redirect()->route('index');
  }

  public function cron_job_execute()
  {
    try {
      $croData = [
        'cron_test' => "TestData",
        'cron_time' => now()
      ];

      CronJobTest::create($croData);
      return "Done";
    } catch (Exception $e) {
      return  $e->getMessage();
    }
  }

  /*
  function thank_you()
  {
    $isBookingProcessed = 0;
    if (session()->has('booking_processed') && session('booking_processed') == true) {
      $isBookingProcessed = 1;
    }

    if ($isBookingProcessed == 0) {
      // Create new booking
      $Booking = new booking();
      $Booking->customer_id = session('customer_id');
      $Booking->final_price = session('final_price');
      $Booking->discountid = session('discount_id');
      $Booking->date = session('date');
      $Booking->No_people = 0;
      $Booking->theatre_id = session('theatre_id');
      $Booking->cake_id = session('cake_id');
      $Booking->slot_id = session('slot_id');
      $Booking->decoration_id = session('decoration_id');
      $Booking->your_name = session('your_name');
      $Booking->partner_name = session('partner_name');

      if ($Booking->save()) {
        // Save addon details if any
        $booking_id = $Booking->id;
        $addon_ids = session('addons');
        $addon_amounts = session('addon_amounts');

        foreach ($addon_ids as $index => $addon_id) {
          $booking_addon = new booking_addon();
          $booking_addon->booking_id = $booking_id;
          $booking_addon->addon_id = $addon_id;
          $booking_addon->amount = $addon_amounts[$index] ?? 0;
          $booking_addon->save();
        }

        // Save payment information
        $paymentData = [
          'bookingid' => $booking_id,
          'amount' => session('final_price'),
          'transactionid' => session('transaction_id'),
          'status' => '1',
          'paymentgateway' => 'razorpay', //phonepe
          'response_msg' => 'Payment success',
        ];
        Payment::create($paymentData);

        // Clear session data
        session()->forget([
          'customer_id',
          'final_price',
          'discount_id',
          'date',
          'theatre_id',
          'cake_id',
          'slot_id',
          'decoration_id',
          'your_name',
          'partner_name',
          'addons',
          'addon_amounts',
          'transaction_id',
          'razorpay_payment_id',
          'razorpay_order_id',
          'razorpay_signature'
        ]);

        // Set flag to indicate booking has been processed
        session(['booking_processed' => true]);

        // Redirect to Thank You page
        return redirect()->route('thank_you');
      }
    } else {
      session()->forget(['booking_processed']);
    }

    // Load the Thank You page view
    return view('thank_you');
  }*/
}