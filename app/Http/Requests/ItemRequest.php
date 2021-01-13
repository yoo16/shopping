<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ItemRequest extends FormRequest
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
            'name' => 'required|string',
            'code' => 'required|string',
            'price' => 'required|min:0|integer',
            'amount' => 'min:0|integer',
        ];
    }

    public function messages()
    {
        return [
            //'name.required' => Lang::get('messages.name_required'),
            'name.required' => ':messages.name_required',
            'code.required' => ':messages.code_required',
            'price.required' => ':messages.price_required',
            'price.integer' => ':messages.price_integer',
            'amount.min' => ':messages.amount_min',
        ];
    }

}
