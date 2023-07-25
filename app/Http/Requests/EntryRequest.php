<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'user_email' => 'required|email',
            'action' => 'required|string',
            'other' => 'required|string',
            'location' => 'required|string',
            'incoming_cable' => 'required|string',
            'incoming_buffer' => 'required|string',
            'incoming_core' => 'required|string',
            'outgoing_cable' => 'required|string',
            'outgoing_buffer' => 'required|string',
            'outgoing_core' => 'required|string',
        ];
    }
}
