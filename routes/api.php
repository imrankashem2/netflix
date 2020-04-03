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


Route::group(['prefix' => 'v1','namespace' => 'API'], function(){
    
    //Route::apiResource('customers', 'AndroidApiController');

    Route::get('/', 'AndroidApiController@index');
    Route::post('app_details', 'AndroidApiController@app_details');
    Route::post('payment_settings', 'AndroidApiController@payment_settings');

    Route::post('login', 'AndroidApiController@postLogin');
    Route::post('signup', 'AndroidApiController@postSignup');

    Route::post('forgot_password', 'AndroidApiController@forgot_password');

    Route::post('dashboard', 'AndroidApiController@dashboard');
    Route::post('profile', 'AndroidApiController@profile');
    Route::post('profile_update', 'AndroidApiController@profile_update');

    Route::post('check_user_plan', 'AndroidApiController@check_user_plan');
    Route::post('subscription_plan', 'AndroidApiController@subscription_plan');
    Route::post('transaction_add', 'AndroidApiController@transaction_add');


    Route::post('home', 'AndroidApiController@home');
    Route::post('latest_movies', 'AndroidApiController@latest_movies');  
    Route::post('latest_shows', 'AndroidApiController@latest_shows');
    Route::post('popular_movies', 'AndroidApiController@popular_movies');  
    Route::post('popular_shows', 'AndroidApiController@popular_shows');  

    Route::post('languages', 'AndroidApiController@languages');  
    Route::post('genres', 'AndroidApiController@genres');  

    Route::post('shows', 'AndroidApiController@shows');  
    Route::post('shows_by_language', 'AndroidApiController@shows_by_language');
    Route::post('shows_by_genre', 'AndroidApiController@shows_by_genre');

    Route::post('show_details', 'AndroidApiController@show_details');  
    Route::post('seasons', 'AndroidApiController@seasons');
    Route::post('episodes', 'AndroidApiController@episodes');
    Route::post('episodes_recently_watched', 'AndroidApiController@episodes_recently_watched');
    //Route::post('episodes_details', 'AndroidApiController@episodes_details');  

    Route::post('movies', 'AndroidApiController@movies');  
    Route::post('movies_by_language', 'AndroidApiController@movies_by_language');  
    Route::post('movies_by_genre', 'AndroidApiController@movies_by_genre');  
    Route::post('movies_details', 'AndroidApiController@movies_details');  

    Route::post('sports_category', 'AndroidApiController@sports_category');
    Route::post('sports', 'AndroidApiController@sports');  
    Route::post('sports_by_category', 'AndroidApiController@sports_by_category');
    Route::post('sports_details', 'AndroidApiController@sports_details');    
    

    Route::post('livetv_category', 'AndroidApiController@livetv_category');
    Route::post('livetv', 'AndroidApiController@livetv');
    Route::post('livetv_by_category', 'AndroidApiController@livetv_by_category');
    Route::post('livetv_details', 'AndroidApiController@livetv_details');  

    Route::post('search', 'AndroidApiController@search'); 

    Route::post('stripe_token_get', 'AndroidApiController@stripe_token_get'); 
});
