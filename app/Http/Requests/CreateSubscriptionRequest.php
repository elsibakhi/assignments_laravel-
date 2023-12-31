<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
    
            "plan_id" => ["required", "integer", "exists:plans,id"], // exists:plans,id i check it bellow but i will remine it
            "months" => ["required", "integer", "min:1", "max:12"],


        ];
    }
}
