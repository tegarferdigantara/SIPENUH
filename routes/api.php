<?php

use App\Http\Controllers\ConsumerDocumentController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\UmrahPackageController;
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
    Route::post('/register', [ConsumerController::class, 'store']);
    Route::delete('/register/bot/{registrationNumber}', [ConsumerController::class, 'destroyByBot']);
    Route::delete('/register/user/{registrationNumber}', [ConsumerController::class, 'destroyByUser']);
    Route::post('/register/document', [ConsumerDocumentController::class, 'store']);
    Route::patch('/register/document/{id}', [ConsumerDocumentController::class, 'update'])->name('update-consumer-document-data');
    Route::post('/register/document/{id}', [ConsumerDocumentController::class, 'update'])->name('post-consumer-document-image-data');
    Route::get('/umrah-packages', [UmrahPackageController::class, 'index']);
    Route::get('/umrah-packages/{id}', [UmrahPackageController::class, 'show']);
    Route::get('/faq', [FaqController::class, 'show']);
    Route::get('/itineraries/{umrahPackageNumber}', [ItineraryController::class, 'show']);
});
