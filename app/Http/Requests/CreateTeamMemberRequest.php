<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;
use App\TeamMember;

class CreateTeamMemberRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            if(TeamMember::where('team_id', $this->get('team_id'))->count() < 8) {
                return TRUE;
            }
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
            'f_name'        => 'required',
            'l_name'        => 'required',
            'dob'           => 'required|date_format:"d/m/Y"',
            'entry_date'    => 'required|date_format:"d/m/Y"|after:dob',
            'position'      => 'required|string',
            'post'          => 'required|string',
            'passed_date'   => 'required|date_format:"d/m/Y"|after:entry_date',
            'note'          => 'max:500',
            'team_id'       => 'required|exists:teams,id'
        ];
    }

    public function forbiddenResponse()
    {
        return $this->redirector->to('scouter/team')->withErrors('You can\'t add more than eight members in a team.');

    }

}
