<?php

use App\Http\Controllers\ConsumerDocumentsController;
use App\Http\Controllers\ConsumersController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UmrahPackagesController;
use App\Models\UmrahPackages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('chatbot')->group(function () {
    Route::post('/register', [ConsumersController::class, 'store']);
    Route::post('/register/document', [ConsumerDocumentsController::class, 'store']);
    Route::post('/register/document/{id}', [ConsumerDocumentsController::class, 'update']);
    Route::get('/umrah-package', [UmrahPackagesController::class, 'show']);
    Route::get('/faq', [FaqController::class, 'show']);
});
