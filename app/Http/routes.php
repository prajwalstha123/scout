<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Auth::loginUsingId(1);

Route::group( ['middleware' => ['web']], function () {

    Route::auth();
    Route::controller( 'districts', 'DistrictsController', [
        'getAllDistricts'  => 'all-districts',
    ]);
    Route::controller( 'organizations', 'OrganizationsController');
    Route::controller( 'rate', 'RateController');
    Route::controller( 'team', 'TeamsController');
    Route::controller( 'admin', 'AdminController' );
    Route::controller( 'scouter', 'ScouterController' );
    Route::controller( 'member', 'TeamMemberController' );



    Route::get('/confirm/{token?}', function($token){
        $user = App\User::whereToken($token)->firstOrFail();
        $user->verified = true;
        $user->token = null;
        $user->save();
        return redirect('/login');
    });

    Route::get('test', function(){
        return view('scouter/print');
    });

    Route::controller( '/', 'ScouterController' );

});