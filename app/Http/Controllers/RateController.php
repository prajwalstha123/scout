<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CreateRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Rate;

use Auth;

/**
 * Class RateController
 * @package App\Http\Controllers
 */
class RateController extends Controller
{

    /**
     * RateController constructor.
     */
    public function __construct()
    {
        $this->middleware( ['auth', 'role', 'xss'] );

    }

    /**
     * @return $this
     */
    public function getIndex()
    {
        $data['title'] = 'Nepal Scout - Rates';
        $data['rates'] = Rate::first();
        return view('admin.rate')->with($data);
    }

    /**
     * @param CreateRateRequest $request
     * @return $this
     */
    public function postCreate(CreateRateRequest $request)
    {
        Rate::create
        (
            [
                'registration_rate'            => $request->get('registration_rate'),
                'scouter_rate'                 => $request->get('scouter_rate'),
                'team_rate'                    => $request->get('team_rate'),
                'committee_members_rate'       => $request->get('committee_members_rate'),
                'disaster_mgmt_trust_rate'     => $request->get('disaster_mgmt_trust_rate'),
            ]
        );

        return redirect()->back()->withInput();
    }


    /**
     * @param $id
     * @param UpdateRateRequest $request
     * @return $this
     */
    public function patchEdit($id, UpdateRateRequest $request)
    {
        $rates = Rate::findOrFail($id);

        $input = $request->all();

        $rates->fill($input)->save();

        return redirect()->back()
            ->with(['rates_updated' => 'Rates successfully updated'])
            ->withInput();
        
    }


}
