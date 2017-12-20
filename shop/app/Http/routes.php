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
// 后台登录模块
Route::get('login','Admin\LoginController@login');
// 后台进入index模块
Route::post('/login','Admin\LoginController@login');
Route::get('index','Admin\IndexController@index');
Route::get('login_out','Admin\LoginController@login_out');
Route::get('goods_list','Admin\goodsController@goods_list');
Route::get('goods_add','Admin\goodsController@goods_add');
Route::get('species_list','Admin\speciesController@species_list');
Route::get('species_add','Admin\speciesController@species_add');
Route::get('role_list','Admin\roleController@role_list');
Route::get('role_add','Admin\roleController@role_add');
