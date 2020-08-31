<?php

use App\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@HomePage');
Route::get('/about', 'HomeController@aboutPage');

Route::get('/contact-us', 'HomeController@contact');
Route::post('/send/contact', 'ContactController@sendContact')->name('send.contact');

Route::get('/services', 'HomeController@servicesPage');
Route::get('/services/{id}/{title}', 'HomeController@singleService')->name('service.show');

Route::get('/blogs', 'HomeController@blogsPage');
Route::get('/blogs/{id}/{title}', 'HomeController@showBlog')->name('blog.show');

Route::get('/team', 'HomeController@teamPage');
Route::get('/team/{name}', 'HomeController@searchTeam')->name('search');

Route::get('appointments', 'AppointmentController@showPage');
Route::get('appointments/{id}', 'AppointmentController@showAppointments');
Route::post('appointments/days', 'AppointmentController@showDays');
Route::post('appointments/times', 'AppointmentController@showTimes');

Route::get('/lang/{language}', 'HomeController@changeLanguage');
Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    Route::get('profile/{id}', 'ProfileController@showProfile')->name('show.profile');
    Route::post('edit/profile/{id}', 'ProfileController@editProfile')->name('edit.profile');
    Route::post('book/appointment', 'AppointmentController@bookAppointment');
});

Route::match(['get','post'],'webhook', 'MessengerController@index');

