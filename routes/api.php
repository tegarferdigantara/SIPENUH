<?php

use App\Http\Controllers\CustomerDocumentController;
use App\Http\Controllers\CustomerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('chatbot')->group(function () {
    Route::post('/register', [CustomerController::class, 'store']);
    Route::delete('/register/bot/{registrationNumber}', [CustomerController::class, 'destroyByBot']);
    Route::delete('/register/user/{registrationNumber}', [CustomerController::class, 'destroyByUser']);
    Route::post('/register/document', [CustomerDocumentController::class, 'store']);
    Route::patch('/register/document/{id}', [CustomerDocumentController::class, 'update'])->name('update-customer-document-data');
    Route::post('/register/document/{id}', [CustomerDocumentController::class, 'update'])->name('post-customer-document-image-data');
    Route::get('/umrah-packages', [UmrahPackageController::class, 'indexApi']);
    Route::get('/umrah-packages/{id}', [UmrahPackageController::class, 'showApi']);
    Route::get('/faq', [FaqController::class, 'show']);
    Route::get('/itineraries/{umrahPackageNumber}', [ItineraryController::class, 'show']);
});
