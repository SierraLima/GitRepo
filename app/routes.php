<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//create foo validation rule
Validator::extend('foo','customValidation@foo');


Route::controller('users', 'UsersController');
Route::controller('golfclubs', 'GolfClubsController');
Route::controller('teetimes', 'TeetimesController');
Route::controller('reservations', 'ReservationsController');
Route::controller('/', 'HomeController'); // must be last


