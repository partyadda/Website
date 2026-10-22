<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageCreateRequest extends FormRequest
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
    
    $rules = [
      'package_id' => 'required|integer',
      'package_name' => 'required|string|max:255',
      'title' => 'required|string|max:60',
      'branch_id' => 'required|integer',
      'theatre_id' => 'required|integer',
      'decoration_id' => 'required|integer',
      'package_amount' => 'required|integer|min:1',
      'advance_amount' => 'required|integer|min:1',
      'people_allowed' => 'required|integer|min:1',
      'max_people' => 'required|integer|min:1',
      'SEO_keywords' => 'sometimes|nullable|string|max:400',
      'google_review' => 'sometimes|nullable|string|max:4000',
      'other_option' => 'sometimes|nullable|string|max:400',
      'short_desc' => 'sometimes|nullable|string|max:1000',
      'long_desc' => 'sometimes|nullable|string|max:4000',
    ];
    
    return $rules;
  }

  public function attributes()
  {
    return  [
      'title' => 'Package title',
      'branch_id' => 'Branch',
      'theater_id' => 'Theatre',
      'decoration_id' => 'Decoration',
      'SEO_keywords' => 'SEO keywords',
    ];
  }
}