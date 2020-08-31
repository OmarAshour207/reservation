<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'] , function () {

    Config::set('auth.defines', 'admin');
    Route::get('login', 'AdminAuth@login')->name('admin.login');
    Route::post('login', 'AdminAuth@doLogin')->name('admin.login');
    Route::get('lang/{lang}','LanguageController@changeLanguage')->name('admin.lang');

    Route::group(['middleware' => 'admin:admin'], function (){

        Route::get('dashboard', 'AdminController@showDashboard');

        Route::resource('slider', 'SliderController');

        Route::resource('services', 'ServiceController');

        Route::resource('projects', 'ProjectController');

        Route::resource('contacts', 'ContactController');

        Route::resource('about', 'AboutUsController');

        Route::resource('testimonials', 'TestimonialController');

        Route::resource('blogs', 'BlogController');

        Route::resource('team-members', 'TeamMemberController');

        Route::resource('contactus', 'ContactUsController');

        Route::get('settings/contact-info', 'ContactInfoController@contactInfo')->name('settings.contact');
        Route::post('settings/contact-info', 'ContactInfoController@store')->name('settings.contact.store');

        Route::get('settings/seo', 'SeoController@showSeoPage')->name('settings.seo');
        Route::post('settings/seo', 'SeoController@store')->name('settings.seo.store');

        Route::get('settings/tokens', 'FacebookController@showPage')->name('settings.tokens');
        Route::post('settings/tokens', 'FacebookController@store')->name('settings.tokens');

        Route::resource('website-settings', 'SettingController');

        Route::resource('logos', 'LogoController');

        Route::post('upload/image', 'ImageController@uploadPhoto')->name('upload.image');
        Route::post('remove/image', 'ImageController@removePhoto')->name('remove.image');

        Route::get('profile/edit', 'ProfileController@edit')->name('edit.profile');
        Route::post('profile/edit', 'ProfileController@update')->name('update.profile');

        Route::get('themes', 'ThemeController@index')->name('themes.index');
        Route::post('themes/{id}', 'ThemeController@changeTheme')->name('themes.change');

        Route::get('themes/{name}', 'ThemeController@showTheme')->name('theme.show');

        Route::resource('clients', 'ClientController');

        Route::resource('clients-histories', 'ClientHistoryController');
        Route::get('client/doctors/{id}', 'ClientHistoryController@showDoctors');

        Route::resource('accounts', 'AccountController');

        Route::resource('reservations', 'ReservationController');

        Route::resource('appointments', 'AppointmentController');
        Route::post('change/status', 'AppointmentController@changeStatus')->name('change.status');

        Route::get('paids', 'AdminController@showPaid');

        Route::get('export/all', 'ExcelController@export');
        Route::get('export/view', 'ExcelController@exportView');

    });
});
