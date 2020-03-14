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
/*Comienza | Rutas publicas */


//Route::get('login','PublicController@login')->name('login');
/*Fin | Rutas publicas */
Route::group(['middleware' => ['guest']],function(){

  Route::get('/mainlogin','Auth\LoginController@showLoginForm')->name('mainlogin');;
  Route::post('/login','Auth\LoginController@login')->name('login');
  Route::get('/','PublicController@index')->name('/');
  Route::get('about','PublicController@about')->name('about');
  Route::get('class','PublicController@class')->name('class');
  Route::get('membership','PublicController@membership')->name('membership');
  Route::get('schedule','PublicController@schedule')->name('schedule');
  Route::get('diet','PublicController@diet')->name('diet');
  Route::get('store','PublicController@store')->name('store');
});

Route::group(['middleware' => ['auth']],function(){

  Route::get('/logout','Auth\LoginController@logout')->name('logout');

  /* MIDDLEWARE ADMIN COMIENZO*/
  Route::group(['middleware' => ['Admin']],function(){


    Route::get('account','PublicController@account')->name('account');
    /*Comienza | Rutas actividades */
    Route::get('activity','ActivityController@index');
    Route::post('activity/store','ActivityController@store');
    Route::put('activity/update','ActivityController@update');
    Route::put('activity/activate','ActivityController@activate');
    Route::put('activity/desactivate','ActivityController@desactivate');
    Route::get('activity/selectActivity','ActivityController@selectActivity');
    Route::get('activity/selectActivityAjax','ActivityController@selectActivityAjax');
    Route::get('activity/selectActivityEdit','ActivityController@selectActivityEdit');
    /*Fin | Rutas actividades */


    /*Comienza | Rutas costos */
    Route::get('cost','CostController@index');
    Route::post('cost/store','CostController@store');
    Route::put('cost/update','CostController@update');
    Route::put('cost/activate','CostController@activate');
    Route::put('cost/desactivate','CostController@desactivate');
    Route::get('cost/selectCost','CostController@selectCost');
    Route::get('cost/getCostId','CostController@getCostId');

    /*Fin | Rutas costos */

    /*Comienza | Rutas horarios */
    Route::get('scheduler','ScheduleController@index');
    Route::post('scheduler/store','ScheduleController@store');
    Route::put('scheduler/update','ScheduleController@update');
    Route::put('scheduler/activate','ScheduleController@activate');
    Route::put('scheduler/desactivate','ScheduleController@desactivate');
    Route::get('scheduler/selectSchedule','ScheduleController@selectSchedule');
    Route::get('scheduler/getTime','ScheduleController@getTime');


    /*Fin | Rutas horarios */

    /*Comienza | Rutas roles */
    Route::get('rol','RolController@index');
    Route::post('rol/store','RolController@store');
    Route::put('rol/update','RolController@update');
    Route::put('rol/activate','RolController@activate');
    Route::put('rol/desactivate','RolController@desactivate');
    Route::get('rol/selectRol','RolController@selectRol');

    /*Fin | Rutas roles */

    /*Comienza | Rutas roles */
    Route::get('user','UserController@index');
    Route::post('user/store','UserController@store');
    Route::put('user/update','UserController@update');
    Route::put('user/activate','UserController@activate');
    Route::put('user/desactivate','UserController@desactivate');
    /*Fin | Rutas roles */

    /*Comienza | Rutas coach */
    Route::get('coach','CouchController@index');
    Route::post('coach/store','CouchController@store');
    Route::put('coach/update','CouchController@update');
    Route::put('coach/activate','CouchController@activate');
    Route::put('coach/desactivate','CouchController@desactivate');
    Route::get('coach/selectCoachAjax','CouchController@selectCoachAjax');
    Route::get('coach/selectCoachEdit','CouchController@selectCoachEdit');
    /*Fin | Rutas coach */

    /*Comienza | Rutas sales */
    Route::get('sale','SaleController@index');
    Route::post('sale/createDay','SaleController@createDay');
    Route::put('sale/desactivate','SaleController@desactivate');
    Route::post('sale/storeDayActivity','SaleController@storeDayActivity');
    Route::get('sale/editDetail','SaleController@editDetail');
    Route::put('sale/deleteDetail','SaleController@deleteDetail');
    Route::put('sale/deleteDay','SaleController@deleteDay');
    Route::put('sale/activateDay','SaleController@activateDay');
    Route::put('sale/closeDay','SaleController@closeDay');
    Route::put('sale/saveEditDetail','SaleController@saveEditDetail');

    /*Fin | Rutas sales */
  });
  /* MIDDLEWARE ADMIN FIN*/

  /* MIDDLEWARE OPS MANAGER INICIO*/
  Route::group(['middleware' => ['OpsManager']],function(){

    Route::get('account','PublicController@account')->name('account');
    /*Comienza | Rutas sales */
    Route::get('sale','SaleController@index');
    Route::post('sale/createDay','SaleController@createDay');
    Route::put('sale/desactivate','SaleController@desactivate');
    Route::post('sale/storeDayActivity','SaleController@storeDayActivity');
    Route::get('sale/editDetail','SaleController@editDetail');
    Route::put('sale/deleteDetail','SaleController@deleteDetail');
    Route::put('sale/deleteDay','SaleController@deleteDay');
    Route::put('sale/activateDay','SaleController@activateDay');
    Route::put('sale/closeDay','SaleController@closeDay');
    Route::put('sale/saveEditDetail','SaleController@saveEditDetail');


  });
  /* MIDDLEWARE OPS MANAGER FIN*/

});


//Route::get('/home', 'HomeController@index')->name('home');
