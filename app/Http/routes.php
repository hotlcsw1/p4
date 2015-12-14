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
/auth
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
        //dump($user->toArray());
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
/ Car routes: create, post, get and delete
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

/*----------------------------------------------------
/debug route--->REMOVE
-----------------------------------------------------*/
Route::get('/debug', function() {
    echo '<pre>';
    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';
    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";
    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));
    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }
    echo '</pre>';
});
