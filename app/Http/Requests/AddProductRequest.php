<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
                "name" => "required|string|unique:products",
                "description" => "required|string|min:6",
                "amount" => "required|integer",
                "price" => "required|integer",
                "image" => "required|string"

        ];
    }
}
