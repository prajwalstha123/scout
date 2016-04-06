<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateDistrictsRequest;

use App\District;

use Auth;
use Session;
use Validator;

/**
 * Class DistrictsController
 * @package App\Http\Controllers
 */
class DistrictsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     */
    public function getIndex()
    {
        $districts = District::all();
        $title = 'Nepal Scout - Districts';
        return view('admin.districts', array('title' => $title, 'districts' => $districts));
    }

    /**
     */
    public function postCreate(Request $request)
    {

        if (Session::token() !== $request->get('_token')) {

            $response = array(
                'msg' => 'Unauthorized attempt to create districts'
            );

            return response()->json($response);

        }

        $rules = array(
            'district_code' => 'required|unique:districts',
            'name' => 'required|unique:districts'
        );

        $validator = Validator::make($request->all(), $rules);
        // process the form
        if ($validator->fails()) {
            $response = array(
                'status'    => 'danger',
                'msg'       => $validator->errors()->all()
            );

        } else {

            District::create(
                [
                    'name' => $request->get('name'),
                    'district_code' => $request->get('district_code'),
                ]
            );

            $response = array(
                'status' => 'success',
                'msg' => 'One more districts has been added.',
            );
        }

        return response()->json($response);

    }


    /**
     * @param CreateDistrictsRequest $request
     */
    public function patchUpdate(CreateDistrictsRequest $request, $code)
    {


    }

    public function getDelete($id)
    {
        $district = District::findOrFail($id);
        if(District::destroy($district->id)){
            return redirect()->back()->with(array('districts_deleted' => 'One of the districts has been deleted.'));
        }
    }

    public function postRemove(Request $request)
    {
        if ( is_array($request->get('action_to')) ){
            District::destroy($request->get('action_to'));
            return redirect()->back();
        } else {

            return redirect()->back();
        }


    }


}
