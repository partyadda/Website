<?php

namespace App\Helper;

use Exception;

class Helper {

  const PAYMENT_STATUS_PENDING = "0";
  const PAYMENT_STATUS_PAID = "1";

  const BOOKING_STATUS_INIT = 0;    // Created / Payment Failed / Payment Initiated
  const BOOKING_STATUS_SUCCESS = 1; // Payment success and Booked
  const BOOKING_STATUS_CANCEL = 2;  // Booking Cancelled
  const BOOKING_STATUS_REFUND_INIT = 3;     // Refund Initiated 
  const BOOKING_STATUS_REFUND_COMPLETE = 4; // Refund Completed 
  const BOOKING_STATUS_NO_SHOW = 5; // Booking No show
  const BOOKING_STATUS_RE_SCHEDULED = 6; // Booking Re Scheduled

  const BOOKING_STATUS_CHECK_ARRAY = [self::BOOKING_STATUS_SUCCESS, self::BOOKING_STATUS_RE_SCHEDULED];

  public function sendAdminMail(array $emailArray, string $bodyContent,  string $subject = "Booking Details")
  {
    try {
      $to = implode(', ', $emailArray);

      $message = $bodyContent;
      
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";


      // More headers
      //$headers .= 'From: Party Adda <booking@partyadda.com>' . "\r\n";
      //$headers .= 'Cc: myboss@example.com' . "\r\n";

      $headers .= 'From: Party Adda <booking@partyadda.com>' . "\r\n" .
        'Reply-To: <info@partyadda.com>' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

      if($subject == NULL ||  trim($subject) === '') {
        $subject =  "Booking Details";
      }

      mail($to, $subject, $message, $headers, '-fbooking@partyadda.com');

      //mail($to, $subject, $message, $headers);
    } catch (Exception $e) {

    }
  }
  public static function getZeroIfNotSet(?int $value): Int
  {
    if (isset($value) && $value > 0) {
      return $value;
    }
    return 0;
  }
  public static function getAmountForBilling(?int $masterAmount, ?int $bookedAmount)
  {
    if (self::getZeroIfNotSet($bookedAmount) > 0) {
      return $bookedAmount;
    }
    return $masterAmount;
  }
}