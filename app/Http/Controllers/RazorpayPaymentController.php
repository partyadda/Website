<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;

class RazorpayPaymentController extends Controller
{
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {   
      $api = new Api(env('RAZOR_API_KEY'), env('RAZOR_API_SECRET'));

      $createOrderArray = array('receipt' => '123', 'amount' => 101, 'currency' => 'INR');

      //$rzrPayOrder = $api->order->create(array('receipt' => '123', 'amount' => 101, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
      
      $payment = $api->payment->fetch('pay_PRZTNgD5dITqBP');
      //$json = json_encode($payment->toArray());
      //echo $json;
      //dd($payment);

      //$rzrPayOrder = $api->order->create($createOrderArray);
      //echo $rzrPayOrder->id;
      //dd($rzrPayOrder);
      $data['rzr_order_id'] = NULL; //$rzrPayOrder->id;

      return view('razorpayView', $data);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //echo json_encode($input);
        //exit;
        //rzp_live_TmkIyy35G9hjET
        //$api = new Api("rzp_live_TmkIyy35G9hjET", "liuoszsvhQoNeQQI2Z1Yuear");
  
        $api = new Api("rzp_test_8PUMGbu2Ir6Lyq", "Dw7n4M7nU3kbRf1ndvpbA0Ii");
  
        //
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        //$payment = $api->payment->fetch('pay_PRZTNgD5dITqBP');
        //dd($payment);
        echo json_encode($payment);
        exit;
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                //$response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                $response = $payment->capture(array('amount'=>$payment['amount'])); 
                echo "I am Inside";
            } catch (Exception $e) {
                return  $e->getMessage();
                //Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        exit;
          
        //Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
