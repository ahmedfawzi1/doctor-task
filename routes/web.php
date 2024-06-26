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

Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/doctors', 'DoctorController@index')->name('index.doctors');
// Route::get('/doctors', 'DoctorController@create')->name('doctors.create');
// Route::post('/doctors', 'DoctorController@store')->name('doctors.store');

Route::resource('/doctors', 'DoctorController');
Route::resource('/patients', 'PatientController');
