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

Auth::loginUsingId(1);

Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::controller( 'admin', 'AdminController' );
    Route::controller( 'districts', 'DistrictsController');
    Route::get('document/{document}', 'DocumentsController@show');
    Route::controller( 'organizations', 'OrganizationsController');
    Route::controller( 'rate', 'RateController');
    Route::controller( 'teams', 'TeamController');
    Route::controller( '/', 'ScouterController' );

});