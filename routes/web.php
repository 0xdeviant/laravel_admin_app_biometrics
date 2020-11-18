<?php

use Illuminate\Support\Facades\Route;

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
// Home Controller
Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@login');
// Dashboard Controller
Route::get('logout', 'DashController@logout');
Route::get('logs', 'DashController@logs');
Route::get('change', 'DashController@change');
Route::post('change', 'DashController@change');
Route::post('namesearch', 'DashController@namesearch');
Route::post('datesearch', 'DashController@datesearch');
// People Controller
Route::get('people', 'PeopleController@index');
Route::post('people', 'PeopleController@addperson');
Route::post('delete', 'PeopleController@delete');
// Enter Controller
Route::match(['GET', 'POST'], 'access', 'LandingController@index');
Route::match(['GET', 'POST'], 'activate_enter', 'LandingController@activate_enter');
Route::match(['GET', 'POST'], 'activate_exit', 'LandingController@activate_exit');
