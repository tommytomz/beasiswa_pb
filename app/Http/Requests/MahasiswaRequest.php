<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MahasiswaRequest extends Request
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
            //'key'           => 'required|numeric',
            'npm'           => 'required|numeric',
            'nama'          => 'required',
            'jeniskelamin'  => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required|numeric',
        ];
    }

    public function messages(){
        return[
            /*'key.required'              => ':attribute tidak boleh kosong !',
            'key.numeric'               => ':attribute harus angka !',*/
            'npm.required'              => ':attribute tidak boleh kosong !',
            'npm.numeric'               => ':attribute harus angka !',
            'nama.required'             => ':attribute tidak boleh kosong !',
            'jeniskelamin.required'     => ':attribute tidak boleh kosong !',
            'alamat.required'           => ':attribute tidak boleh kosong !',
            'nohp.required'             => ':attribute tidak boleh kosong !',
            'nohp.numeric'              => ':attribute harus angka !',
            
        ];
    }
}
