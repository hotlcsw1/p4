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
# Reminder: 5 Route methods are: get, post, put, delete, or all
/*----------------------------------------------------
/ Authorization Routes:
------------------------------------------------------*/
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

/*----------------------------------------------------
/ Login confirmation message
-----------------------------------------------------*/
Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
    } else {
        echo 'You are not logged in.';
    }

    return;

});

/*----------------------------------------------------
/Welcome -- Default landing zone
-----------------------------------------------------*/
Route::get('/', 'WelcomeController@getIndex');

/*----------------------------------------------------
/ Car routes: create, edit, get and delete
-----------------------------------------------------*/
Route::group(['middleware' => 'auth'], function() {
    Route::get('/cars/create', 'CarController@getCreate');
    Route::post('/cars/create', 'CarController@postCreate');

    Route::get('/cars/edit/{id?}', 'CarController@getEdit');
    Route::post('/cars/edit', 'CarController@postEdit');

    Route::get('/cars/confirm-delete/{id?}', 'CarController@getConfirmDelete');
    Route::get('/cars/delete/{id?}', 'CarController@getDoDelete');

    Route::get('/cars', 'CarController@getIndex');
    Route::get('/cars/show/{model?}', 'CarController@getShow');

});

/*----------------------------------------------------
Debugging/Local/Misc--->REMOVE
-----------------------------------------------------*/
if(App::environment('local')) {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('/drop', function() {
        DB::statement('DROP database carsdb');
        DB::statement('CREATE database carsdb');
        return 'Dropped carsdb; Re-created carsdb.';

    });
};

/*----------------------------------------------------
/ Log viewer
-----------------------------------------------------*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
