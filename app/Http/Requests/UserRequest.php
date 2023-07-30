<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => ["required", "string", "min:5", "max:50"],
            "email" => ["required", "unique:users,email", "email"],
            "role" => ["required", "string"],
            "password" => ["required", Password::defaults(), "confirmed"],
            "contact" => ["nullable", "string", "min:10", "max:15"],
            "description" => ["nullable", "string", "min:10", "max:255"],
            "job" => ["nullable", "string", "min:5", "max:50"],
        ];
    }
}
