<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api')->get('/participantes', function (Request $request) {
    $aux = App\Models\User::select(['email'])->get();
    $rs = [];

    foreach ($aux->toArray() as $v) {
        $rs[$v['email']] = null;
    }

    return response()->json($rs);
});

Route::name('projetos.')
    ->prefix('projetos')
    ->middleware('api')
    ->group(function () {
        Route::post('simular', 'App\Http\Controllers\ProjetosController@simular')->name('simular');
    });
