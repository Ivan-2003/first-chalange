<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataUsersRequest extends FormRequest
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
            'nama'          => 'required|min:2',
            'country_code'  => 'required|max:2',
            'phone'         => 'required|min:10',
            'umur'          => 'required|min:1',
            'alamat'        => 'required|min:4',
            'email'         => 'required|min:5'
        ];
    }
}
