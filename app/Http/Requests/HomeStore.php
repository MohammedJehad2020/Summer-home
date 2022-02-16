<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        return [
        'image'=> 'required',
        'Price' => 'required',
        'Size' => 'required',
        'City' => 'required',
        'Bedrooms_count' => 'required' ,
        'Bathrooms_Count' => 'required',
        'Description' => 'required' ,
        'Sales_agent_name' => 'required',
        ];
    }
}
