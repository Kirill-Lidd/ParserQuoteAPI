<?php

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

Route::group(['middleware' => 'token','prefix' => '/{token}'], function (){
    Route::get('/quotation/{date}', [\App\Http\Controllers\Api\V1\QuoteController::class,'getInJson']);
});
