<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail;
use App\Models\booking;
use App\Models\slot;
use App\Models\customer;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;

class overviewController extends Controller
{
  function overview($branch_id = NULL)
  {
    $data['coupon_codes'] = NULL;
    if ($branch_id != NULL) {
      $data['coupon_codes'] =  Discount::where(['branch_id' => $branch_id, 'enabled' => 1, ['valid_until', '>=', now()->format('Y-m-d')]])->get();
    }
    return view('overview', $data);
  }
    
    function email(Request $request){
        // return $request;
       
        $details = [
            'booking_name' => $request->input('booking_name'),
            'whatsapp_name' => $request->input('whatsapp_name'),
        ];

        //Mail::to('afzal_209@hotmail.com')->send(new sendmail($details));
        return response()->json(['success' => 'Email sent successfully']);
    }
    
    function customer(Request $request){
    // return $request;
    //$customer = customer::where('phone',$request->number)->where('email',$request->email)->first();
    $customer = customer::where('phone', $request->number)->first();
        if ($customer === null) {
           // user doesn't exist
            $customer_save = new customer();
            $customer_save->customer_name = $request->Booking_Name;
            $customer_save->email = $request->email;
            $customer_save->phone =$request->number;
            $customer_save->wherefrom = 'Online';
            $customer_save->referred_by = $request->ref_by;
            $customer_save->save();
      //$customer_show = customer::select('id')->where('phone',$request->number)->where('email',$request->email)->first();
      $customer_show = customer::select('id')->where('phone', $request->number)->first();
        }
        else{

      //$customer_show = customer::select('id')->where('phone',$request->number)->where('email',$request->email)->first();
      $customer_show = customer::select('id')->where('phone', $request->number)->first();

      // dd($customer_show);
      // $customer_update = customer::find($customer_show);
      // // dd($customer_update);
      // $customer_update->customer_name = $request->Booking_Name;
      // $customer_update->email = $request->email;
      // $customer_update->phone =$request->number;
      // $customer_update->update();

      customer::where('id', $customer_show->id)->update([
                'customer_name' => $request->Booking_Name,
                'email' => $request->email,
                'phone' => $request->number,
            ]);
            // dd($customer_update);
        }
        return response()->json($customer_show);
    }
    
    function date_check(Request $request){
        // return $request;
        $date_current = date('Y-m-d',strtotime($request->formmatted));
    $theatre_id = $request->theatre_id;
    // print_r($date_current);
    // $booking = Booking::where('date','=',$date_current) ->pluck('slot');
    $booking = slot::from('slot as sl')->join('booking as bk', 'sl.id', '=', 'bk.slot_id')->where([['bk.date', '=', $date_current], ['theatre_id', '=', $theatre_id]])
      ->select(DB::raw("CONCAT(DATE_FORMAT(sl.start_time, '%h:%i %p'), ' - ', DATE_FORMAT(sl.end_time, '%h:%i %p')) as time_range"))->whereIn('bk.booking_status', Helper::BOOKING_STATUS_CHECK_ARRAY)->pluck('time_range');

    $booking24 = slot::from('slot as sl')->join('booking as bk', 'sl.id', '=', 'bk.slot_id')->where([['bk.date', '=', $date_current], ['theatre_id', '=', $theatre_id]])
      ->select(DB::raw("CONCAT(DATE_FORMAT(sl.start_time, '%H:%i'), ' - ', DATE_FORMAT(sl.end_time, '%H:%i')) as time_range"))->whereIn('bk.booking_status', Helper::BOOKING_STATUS_CHECK_ARRAY)->pluck('time_range');
         $bookedCount = $booking->count();
        // print_r($booking);
        // $arr = array();
        // foreach($booking as $book){
        //     $err['date'] = $book['slot_time'];
        //     array_push($arr,$err);
           
        // }
        //  print_r($arr);
        return response()->json([
            'booking' => $booking,
            'booking24' => $booking24,
            'bookedCount' => $bookedCount,
            ]);
        
    }
}