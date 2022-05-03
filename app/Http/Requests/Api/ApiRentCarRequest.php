<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;
use JetBrains\PhpStorm\ArrayShape;

class ApiRentCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['user_id' => "string", 'car_id' => "string"])] public function rules(): array
    {
        return [
            'user_id' => 'required|exists:App\Models\User,id',
            'car_id' => 'required|exists:App\Models\Car,id',
        ];
    }


    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
