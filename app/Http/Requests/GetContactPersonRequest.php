<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetContactPersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return auth()->check();    //when auth added use this line
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'person_name'=>'nullable|string',
            'customer_name'=>'nullable|string'
            //
        ];
    }
}
