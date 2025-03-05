<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "email" => "required|string", // if(!isset($_POST['email'] && is_string($_POST['email'])
            "subject" => "required|string",
            "description" => "required|min:5"
        ];
    }
}
