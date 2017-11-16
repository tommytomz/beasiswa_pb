<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PenilaianRequest extends Request
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
            'mahasiswa'    => 'required|numeric',
            'ipk'          => 'required',
            'penghasilan'  => 'required',
            'tanggungan'   => 'required',
            'jarak'        => 'required|numeric',
        ];
    }

    public function messages(){
        return[
            /*'key.required'              => ':attribute tidak boleh kosong !',
            'key.numeric'               => ':attribute harus angka !',*/
            'mahasiswa.required'       => ':attribute tidak boleh kosong !',
            'mahasiswa.numeric'        => ':attribute harus angka !',
            'ipk.required'             => ':attribute tidak boleh kosong !',
            'penghasilan.required'     => ':attribute tidak boleh kosong !',
            'tanggungan.required'      => ':attribute tidak boleh kosong !',
            'jarak.required'           => ':attribute tidak boleh kosong !',
            'jarak.numeric'            => ':attribute harus angka !',
            
        ];
    }
}
