<?php

use Illuminate\Http\Request;
use App\Model\Product;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('v1')->group(function () {


    Route::group(['namespace' => 'Api'], function ($router) {

        Route::post('index', ['uses' => 'IndexApiController@getIndex']);
        Route::post('product-list', ['uses' => 'ProductApiController@getProduct']);


    });
});
