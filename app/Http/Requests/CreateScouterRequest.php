<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

use App\Scouter;

class CreateScouterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            if(Scouter::where('organization_id', session()->get('org_id'))->count() < 2) {
                return TRUE;
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'                 => 'required',
            'btc_no'               => 'required_with:btc_date',
            'btc_date'             => 'required_with:btc_no|date_format:"d/m/Y"',
            'advance_no'           => 'required_with:advance_date',
            'advance_date'         => 'required_with:advance_no|date_format:"d/m/Y"',
            'alt_no'               => 'required_with:alt_date',
            'alt_date'             => 'required_with:alt_no|date_format:"d/m/Y"',
            'lt_no'                => 'required_with:lt_date',
            'lt_date'              => 'required_with:lt_no|date_format:"d/m/Y"',
            'email'                => 'required|email',
            'organization_id'      => 'required|exists:organizations,id'
        ];
    }

}
