<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items',[ItemController::class, "index"]);
Route::prefix('/item')->group(function(){
        Route::post('/store',[ItemController::class, "store"]); // POST /item/store  -- calling store method from ItemController
        Route::put('/{id}',[ItemController::class, "update"]); // PUT item/{id} -- calling update method from ItemController
        Route::delete('/{id}',[ItemController::class, "destroy"]); // DELETE item/{id} -- calling destroy method from ItemController
    }
);
