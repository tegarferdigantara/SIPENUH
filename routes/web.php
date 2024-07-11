<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDocumentController;
use App\Http\Controllers\Pdf\ManifestController;
use App\Http\Controllers\Pdf\RekomController;
use App\Http\Controllers\UmrahPackageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.pages.home');
});
Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.home');
        })->name('admin.dashboard');

        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/jemaah-umrah', [CustomerController::class, 'index'])->name('admin.customer.list.all');
        Route::get('/jemaah-umrah/{packageId}', [CustomerController::class, 'showByPackage'])->name('admin.customer.list.by.package');
        Route::get('/jemaah-umrah/{packageId}/{customerId}', [CustomerController::class, 'showCustomer'])->name('admin.customer.detail.by.package');
        Route::get('/jemaah-umrah/{packageId}/{customerId}/edit', [CustomerController::class, 'edit'])->name('admin.customer.detail.by.package.edit');
        Route::put('/jemaah-umrah/{packageId}/{customerId}', [CustomerController::class, 'update'])->name('admin.customer.detail.by.package.edit.post');
        Route::post('/jemaah-umrah/{customerId}/update-photo', [CustomerDocumentController::class, 'updatePhoto'])->name('admin.customerDocument.update.photo.post');
        Route::post('/jemaah-umrah/rotate-photo/{customerId}/{type}', [CustomerDocumentController::class, 'rotatePhoto'])->name('admin.customerDocument.rotate.photo');

        Route::get('/paket-umrah', function () {
            return redirect()->back();
        });
        Route::get('/paket-umrah/{packageId}', [UmrahPackageController::class, 'show'])->name('admin.package.show');

        Route::get('/jemaah-umrah/download/manifest/{packageId}', [ManifestController::class, 'generatePdfByPackageId'])->name('download.manifest');
        Route::get('/jemaah-umrah/download/rekom-by-package-id/{packageId}', [RekomController::class, 'generateRekomByPackageId'])->name('download.rekom.by.packageId');
        Route::get('/jemaah-umrah/download/rekom-by-customer-id/{customerId}', [RekomController::class, 'generateRekomByCustomerId'])->name('download.rekom.by.customerId');
    });
});
