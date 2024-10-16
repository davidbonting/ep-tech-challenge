<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewClientRequest extends FormRequest
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
            'name' => 'required|max:190',
            'email' => 'required_without:phone|nullable|email:rfc,dns',
            // regex only contain digits, spaces and a plus sign
            'phone' =>  'required_without:email|nullable|regex:/^[\d\s+]+$/',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'email' => $this->email ?: null,
            'phone' => $this->phone ?: null,
        ]);
    }
}
