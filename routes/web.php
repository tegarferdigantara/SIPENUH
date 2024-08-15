<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerAuditLogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDocumentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\Pdf\ManifestController;
use App\Http\Controllers\Pdf\RekomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UmrahPackageController;
use App\Http\Controllers\WhatsAppController;
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
        Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/pengaturan', [ProfileController::class, 'edit'])->name('admin.account.setting');
        Route::put('/pengaturan/profil', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/pengaturan/password', [PasswordController::class, 'update'])->name('password.update');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.list');
        Route::get('/faq/tambah', [FaqController::class, 'create'])->name('admin.faq.create');
        Route::post('/faq/tambah', [FaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/faq/{faqId}/edit', [FaqController::class, 'edit'])->name('admin.faq.edit');
        Route::put('/faq/{faqId}', [FaqController::class, 'update'])->name('admin.faq.update');
        Route::delete('/faq/{faqId}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');

        Route::get('/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial.list');
        Route::get('/testimonial/tambah', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
        Route::post('/testimonial/tambah', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('/testimonial/{testimonialId}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::put('/testimonial/{testimonialId}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::delete('/testimonial/{testimonialId}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');

        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/users', [RegisteredUserController::class, 'index'])->name('admin.users.index');
            Route::get('/users/tambah', [RegisteredUserController::class, 'create'])->name('admin.users.create');
            Route::post('/users/store', [RegisteredUserController::class, 'store'])->name('admin.users.store');
            Route::get('/users/{userId}/edit', [RegisteredUserController::class, 'edit'])->name('admin.users.edit');
            Route::put('/users/{userId}/update', [RegisteredUserController::class, 'update'])->name('admin.users.update');
            Route::delete('/users/{userId}/delete', [RegisteredUserController::class, 'destroy'])->name('admin.users.destroy');

            Route::get('/pesan-siaran', [WhatsAppController::class, 'broadcast'])->name('admin.message.broadcast.index');
            Route::post('/pesan-siaran', [WhatsAppController::class, 'broadcastStore'])->name('admin.message.broadcast.store');
            Route::get('/pesan-tunggal', [WhatsAppController::class, 'single'])->name('admin.message.single.index');
            Route::post('/pesan-tunggal', [WhatsAppController::class, 'singleStore'])->name('admin.message.single.store');
        });

        Route::group(['middleware' => ['role:manager']], function () {


            Route::get('/jemaah-umrah', [CustomerController::class, 'index'])->name('admin.customer.list.all');
            Route::get('/jemaah-umrah/{packageId}', [CustomerController::class, 'showByPackage'])->name('admin.customer.list.by.package');
            Route::get('/jemaah-umrah/{packageId}/{customerId}', [CustomerController::class, 'showCustomer'])->name('admin.customer.detail.by.package');
            Route::get('/jemaah-umrah/{packageId}/{customerId}/edit', [CustomerController::class, 'edit'])->name('admin.customer.detail.by.package.edit');
            Route::put('/jemaah-umrah/{packageId}/{customerId}', [CustomerController::class, 'update'])->name('admin.customer.detail.by.package.update');
            Route::delete('/jemaah-umrah/{registrationNumber}', [CustomerController::class, 'destroyByWebManage'])->name('admin.customer.destroy');

            Route::post('/jemaah-umrah/{customerId}/update-photo', [CustomerDocumentController::class, 'updatePhoto'])->name('admin.customerDocument.update.photo.post');
            Route::post('/jemaah-umrah/rotate-photo/{customerId}/{type}', [CustomerDocumentController::class, 'rotatePhoto'])->name('admin.customerDocument.rotate.photo');

            Route::get('/jemaah-umrah/download/manifest/{packageId}', [ManifestController::class, 'generatePdfByPackageId'])->name('download.manifest');
            Route::get('/jemaah-umrah/download/rekom-by-package-id/{packageId}', [RekomController::class, 'generateRekomByPackageId'])->name('download.rekom.by.packageId');
            Route::get('/jemaah-umrah/download/rekom-by-customer-id/{customerId}', [RekomController::class, 'generateRekomByCustomerId'])->name('download.rekom.by.customerId');

            Route::get('/riwayat-penghapusan', [CustomerAuditLogController::class, 'index'])->name('admin.customer.audit.log');

            Route::get('/paket-umrah', function () {
                return redirect()->back();
            });
            Route::get('/paket-umrah/tambah', [UmrahPackageController::class, 'create'])->name('admin.package.create');
            Route::post('/paket-umrah/tambah', [UmrahPackageController::class, 'store'])->name('admin.package.store');
            Route::get('/paket-umrah/{packageId}', [UmrahPackageController::class, 'show'])->name('admin.package.show');
            Route::get('/paket-umrah/{packageId}/edit', [UmrahPackageController::class, 'edit'])->name('admin.package.edit');
            Route::put('/paket-umrah/{packageId}', [UmrahPackageController::class, 'update'])->name('admin.package.update');
            Route::delete('/paket-umrah/{packageId}', [UmrahPackageController::class, 'destroy'])->name('admin.package.destroy');

            Route::get('/paket-umrah/{packageId}/itinerary', function () {
                return redirect()->back();
            });

            Route::get('/paket-umrah/{packageId}/itinerary/tambah', [ItineraryController::class, 'create'])->name('admin.package.itinerary.create');
            Route::post('/paket-umrah/{packageId}/itinerary/tambah', [ItineraryController::class, 'store'])->name('admin.package.itinerary.store');
            Route::get('/paket-umrah/{packageId}/itinerary/{itineraryId}/edit', [ItineraryController::class, 'edit'])->name('admin.package.itinerary.edit');
            Route::put('/paket-umrah/{packageId}/itinerary/{itineraryId}', [ItineraryController::class, 'update'])->name('admin.package.itinerary.update');
            Route::delete('/paket-umrah/{packageId}/itinerary/{itineraryId}', [ItineraryController::class, 'destroy'])->name('admin.package.itinerary.destroy');
        });
    });
});
