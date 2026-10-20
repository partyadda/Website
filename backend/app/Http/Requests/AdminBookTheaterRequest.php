<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBookTheaterRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $input = $this->all();

    $packageRule = [];
    $isPackageBooking = 0;
    if (isset($input['is_package_booking']) && $input['is_package_booking'] == 1) {
      $packageRule['package_id'] = 'required|integer';
      $isPackageBooking = 1;
    }

    $allRules = [
      'theater_id' => 'required|integer',
      'branch_id' => 'required|integer',
      'extra_person_price' => 'required|integer',
      'max_people' => 'required|integer',
      'peopleallowed' => 'required|integer',
      'peopleallowed' => 'required|integer',
      'decoration_included' => 'required|integer',
      'decoration_amount' => 'required|integer',

      'admin_booking_date' => 'required|string',
      'theater_slot_id' => 'required|string',
      'decoration_needed' => 'required|integer',
      'customer_name' => 'required|string|max:25',
      'customer_phone' => 'required|string|min:10|max:10',
      //'customer_email' => 'required|email|max:50',
      'no_of_guest' => 'required|integer',
            
      'payment_type' => 'required|string',
      'payment_advance' => 'required|integer|min:1',
      'payment_confirmed_by_id' => 'required|integer',
      'payment_confirmed_by' => 'required|string',
    ];

    $rules = array_merge($packageRule, $allRules);

    $decorationNeeded = 0;
    if (isset($input['decoration_needed'])) {
      $decorationNeeded = $input['decoration_needed'];
    }
    
    if ($decorationNeeded == 1) {
      $rules['decoration_id'] = 'required|integer';
      $rules['decoration_noofperson'] = 'required|integer';

      if (isset($input['decoration_id'])) {
        $rules['person_one'] = 'required|string|max:25';
      }
      
      $decorationNoOfperson = 0;
      if (isset($input['decoration_noofperson'])) {
        $decorationNoOfperson = $input['decoration_noofperson'];
      }
      if ($decorationNoOfperson > 1) {
        $rules['person_two'] = 'required|string|max:25';
      }

      if ($isPackageBooking === 1) {
        $rules['package_cake_id'] = 'required|integer';
      } else {
        $rules['branch_cake_id'] = 'required|integer';
      }
      $rules['name_on_cake'] = 'required|string|max:25';
    }

    if (isset($input['payment_type']) && $input['payment_type'] != "CASH") {
      $rules['payment_screen_shot'] = 'required|file|mimes:jpeg,gif,png,jpg,webp,bmp,pdf|max:4096';
    }

    return $rules;
  }

  public function attributes()
  {
    return  [
      'admin_booking_date' => 'booking date',
      'theater_slot_id' => "theater slot",
      'branch_cake_id' => 'cake',
      'package_cake_id' => 'cake',
      'decoration_needed' => "decoration include"
    ];
  }
}