<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


/*
  | --------------------------------------------------------------------------
  | Application Routes
  | --------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    // Display main page
    Route::get('/', 'Main@create');

    // Add search form to page
    Route::get('/find', 'Main@create');

    // Display results from search form
    Route::post('find', ['as' => 'results', 'uses' => 'Main@results']);

    // Display individual listing
    Route::get('/listing/{id}', 'Main@listing');

    // Send email to seller from listing page
    Route::post('/listing/{id}', ['as' => 'email_seller', 'uses' => 'Main@emailSeller']);

    // Display seller profile
    Route::get('/seller/{id}', 'Main@seller');
});
