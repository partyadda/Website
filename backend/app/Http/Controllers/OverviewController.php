<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail;
use App\Models\booking;
use App\Models\slot;
use App\Models\customer;
use Illuminate\Support\Facades\DB;
class overviewController extends Controller
{
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
        $customer = customer::where('phone',$request->number)->where('email',$request->email)->first();
        if ($customer === null) {
           // user doesn't exist
            $customer_save = new customer();
            $customer_save->customer_name = $request->Booking_Name;
            $customer_save->email = $request->email;
            $customer_save->phone =$request->number;
            $customer_save->referred_by = $request->ref_by;
            $customer_save->save();
            $customer_show = customer::select('customer_id')->where('phone',$request->number)->where('email',$request->email)->first();
        }
        else{
            $customer_show = customer::select('customer_id')->where('phone',$request->number)->where('email',$request->email)->first();
        }
        return response()->json($customer_show);
    }
    
    function date_check(Request $request){
        // return $request;
        $date_current = date('Y-m-d',strtotime($request->formmatted));
        // print_r($date_current);
        // $booking = Booking::where('date','=',$date_current) ->pluck('slot');
        $booking = slot::from('slot as sl')->join('booking as bk','sl.id','=','bk.slot')->where('bk.date','=',$date_current)
          ->select(DB::raw("CONCAT(DATE_FORMAT(sl.start_time, '%h:%i %p'), ' - ', DATE_FORMAT(sl.end_time, '%h:%i %p')) as time_range"))->pluck('time_range');
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
            'bookedCount' => $bookedCount,
            ]);
        
    }
}
