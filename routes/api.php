<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeListController;
use App\Http\Controllers\UserRecipeListNameController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

    Route::get('/list/{ListId}', [RecipeListController::class, 'index']);
    Route::post('/list', [RecipeListController::class, 'store']);
    Route::post('/remove/recipe/{ItemId}/list/{ListId}', [RecipeListController::class, 'destroy']);

    Route::get('/listname', [UserRecipeListNameController::class, 'index']);
    Route::post('/listname', [UserRecipeListNameController::class, 'store']);
    Route::post('remove/listname/{id}', [UserRecipeListNameController::class, 'destroy']);        
});


  