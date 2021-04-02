<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('projetos.index');
    })->name('home');

    Route::get('logout', function () {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');

});

Route::name('projetos.')
    ->prefix('projetos')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'App\Http\Controllers\ProjetosController@index')->name('index');
    });

Route::post('authenticate', 'App\Http\Controllers\LoginController@authenticate')->name('authenticate');

Route::get('login', function () {
    if (!Auth::guest()) {
        return redirect()->route('home');
    }

    return view('login');
})->name('login');
