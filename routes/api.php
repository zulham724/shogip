<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('oauthclients','API\OauthClientController');

Route::group(['namespace'=>'API'],function(){

	Route::apiResources([
		'users'=>'UserController',
		'biodatas'=>'BiodataController',
		'states'=>'StateController',
		'cities'=>'CityController',
		'districts'=>'DistrictController',
		'umkmcategories'=>'UmkmCategoriController',
		'umkms'=>'UmkmController',
		'umkmbiodatas'=>'UmkmBiodataController',
		'achievements'=>'UmkmAchievementController',
		'trainings'=>'UmkmTrainingController',
		'products'=>'ProductController',
		'productimages'=>'ProductImageController',
		'problemlists'=>'ProblemListController'
	]);

	Route::get('umkm/document','UmkmController@document');
	Route::get('umkm/states','UmkmController@states');
	Route::get('umkm/cities/{id}','UmkmController@cities');
	Route::get('umkms/getByCity/{id}','UmkmController@getByCity');

});

