<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesanPost extends FormRequest
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
            'nama_pemesan' => 'required|unique:pemesans|max:50'
        ];
    }

    public function messages()
    {
        return [
            'nama_pemesan.required' => 'Isi Nama Pemesan',
            'nama_pemesan.unique' => 'Nama Pemesan Telah Ada',
            'nama_pemesan.max' => 'panjang nama tidak boleh lebih dari 50'
        ];
    }

}
