<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "id" => "required|exists:products,id", // obavezan, mora da postoji u tabeli products taj id
            "amount" => "required|min:1"
        ];
    }
}
