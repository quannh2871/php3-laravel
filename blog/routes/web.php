<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminLogin;

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

Route::group([
    'as' => 'auth.',
    'namespace' => 'Auth'
], function () {
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/post-login', 'AuthController@postLogin')->name('post_login');
    Route::get('/logout', 'AuthController@getLogout')->name('logout');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['admin.check_role']
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(
        [
            'as' => 'users.',
            'prefix' => 'user'
        ],
        function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/save-create', 'UserController@saveCreate')->name('save_create');
            Route::get('/delete/{id}', 'UserController@delete')->name('delete');
        }
    );
});
