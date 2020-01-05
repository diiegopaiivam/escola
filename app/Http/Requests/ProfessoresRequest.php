<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProfessoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Name'      => 'required|string|max:255',
            'email'     => "required|string|email|max:255|unique:email",
            'phone1'    => 'required',
            'phone2'    => 'required',
            'image'     => 'image',
        ];
    }
}
