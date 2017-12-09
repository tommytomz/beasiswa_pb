<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerhitunganRequest extends Request
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
            'kriteria1'     => 'required',
            'kriteria2'     => 'required',
            'kriteria3'     => 'required',
            'kriteria4'     => 'required',
            'kriteria5'     => 'required',
            'kriteria6'     => 'required',

            'hkriteria1'    => 'required',
            'hkriteria2'    => 'required',
            'hkriteria3'    => 'required',
            'hkriteria4'    => 'required',
            'hkriteria5'    => 'required',
            'hkriteria6'    => 'required',

            'ipk1'          => 'required',
            'ipk2'          => 'required',
            'ipk3'          => 'required',

            'hipk1'         => 'required',
            'hipk2'         => 'required',
            'hipk3'         => 'required',

            'penghasilan1'  => 'required',
            'penghasilan2'  => 'required',
            'penghasilan3'  => 'required',

            'hpenghasilan1' => 'required',
            'hpenghasilan2' => 'required',
            'hpenghasilan3' => 'required',

            'tanggungan1'   => 'required',
            'tanggungan2'   => 'required',
            'tanggungan3'   => 'required',

            'htanggungan1'  => 'required',
            'htanggungan2'  => 'required',
            'htanggungan3'  => 'required',

            'jarak1'        => 'required',
            'jarak2'        => 'required',
            'jarak3'        => 'required',

            'hjarak1'       => 'required',
            'hjarak2'       => 'required',
            'hjarak3'       => 'required',

        ];
    }
}
