<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAd extends FormRequest
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
            'title' => 'bail|required|min:2|max:100',
            'text' => 'bail|required|min:10',
            'name' => 'bail|required|min:2|max:50',
            'phone' => 'bail|required|min:4|max:20',
        ];
    }
}
