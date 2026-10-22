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
class bookingController extends Controller
{
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

    public function generateUniqueId($length){
        return strtoupper(Str::random($length));
    }


    function bookingpay(Request $request){
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
            'addon_id' =>$array1,
            'addon_amount' => $array1_amt,
            );
        
        //   dd($data);
        if($request->cake_id === 'null'){
            $cake_id = null;
        }
        else{
            $cake_id = $request->cake_id;
        }
        
        if($request->decoration === 'null'){
            $decoration = null;
        }
        else{
            $decoration = $request->decoration;
        }
        if($request->discount_id === 'null'){
            $discount_id = null;
        }
        else{
            $discount_id = $request->discount_id;
        }
        
        
        $Booking = new booking();
        // $Booking->booking_id = $book_id;
        $Booking->customer_id = $request->customer_id;
        
        $Booking->final_price = $request->total;
        $Booking->discountid = $discount_id;
        $Booking->date = date('Y-m-d',strtotime($request->calender));
        // $Booking->slot_time = $request->time;
        $Booking->theatre_id = $request->theatre_id;
        $Booking->cake_id = $cake_id;
        // $Booking->addons = $addons;
        $Booking->No_people = $request->input_number;
        $Booking->slot_id = $request->slot_id;
        $Booking->decoration_id = $request->decoration_id;
        // $Booking->nick_name = $request->nick_name;
        $Booking->your_name = $request->your_name;
        $Booking->partner_name = $request->partner_name;
    //   dd(count($data['addon_id']));
    if(count($data['addon_id']) == 0){
        if($Booking->save()){
            $booking_id = $Booking->id;
            $data = [
                'bookingid' => $booking_id,
                'amount' => $request->total,
                'transactionid' => $transaction_id,
                'status' => '1',
                'paymentgateway' => 'phonepe',
                'response_msg'=>'Payment success',
                //'providerReferenceId'=>'',
                //'merchantOrderId'=>'',
                //'checksum'=>''
            ];
            // return $data;
            Payment::create($data);
        }
    }
    else{
        if($Booking->save()){
             $booking_id = $Booking->id;
             
             for($i = 0 ; $i < count($data['addon_id']); $i++){
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
                'response_msg'=>'Payment success',
                //'providerReferenceId'=>'',
                //'merchantOrderId'=>'',
                //'checksum'=>''
            ];
            // return $data;
            Payment::create($data);
        }
    }
        

        // amount, phone number, callback URL, unique merchant transaction id
        $url = $phonepe->makePayment(/*$request->total*/$request->advance, $request->Whatsapp_Name, env('PHONEPE_CALLBACK_URL'), $transaction_id);
        return redirect()->away($url);
    }

    function bookingpayCallback(Request $request){
        $phonepe = new LaravelPhonePe();
        $response = $phonepe->getTransactionStatus($request->all());
        if($response == true){
            // Payment Success
            
            //UPDATE DB RECORDS HERE
            
            $localStorageKeys = [
                'name', 'calender', 'time', 'Booking_Name', 'input_number',
                'Whatsapp_Name', 'Email_ID', 'form_select_lg', 'coupon_code',
                'extra', 'cake_price', 'cake_name', 'decoration_price',
                'decoration_name', 'total', 'sub_total', 'advance',
                'slot', 'decoration', 'nick_name', 'your_name', 'partner_name'
            ];
            return redirect()->route('thank_you')->with('localStorageKeys', $localStorageKeys);
        } else {
            // Payment Failed
            return redirect()->back()->with('error', 'Payment Failed.');       
        }

    }

    function thank_you(){
        return view('/thank_you');
    }
}
