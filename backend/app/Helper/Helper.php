<?php

namespace App\Helper;

use Exception;

class Helper {

  public function sendAdminMail($emailArray, $subject = "Booking Details", $bodyContent) {
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
}