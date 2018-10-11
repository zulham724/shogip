<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



Route::group(['middleware'=>'auth'],function(){

	Route::group(['middleware'=>'role:1'],function(){

		Route::get('/home', 'HomeController@index')->name('home');
		Route::resources([
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
		]);

	});

	Route::group(['middleware'=>'role:2'],function(){
		Route::resources([
			'user'=>'UMKM\UserController',
			'umkmuser'=>'UMKM\UmkmController'
		]);
	});

});
