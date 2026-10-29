<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;

// Strona główna (publiczna)
Route::get('/', function () {
    return view('welcome');
});

// Panel użytkownika (po zalogowaniu)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// ProfileController jak był
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'can:manage-rentals'])->group(function () {
    Route::resource('apartments', \App\Http\Controllers\ApartmentController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('buildings', \App\Http\Controllers\BuildingController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('locations', \App\Http\Controllers\LocationController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('tenants', \App\Http\Controllers\TenantController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('owners', \App\Http\Controllers\OwnerController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('rental-agreements', \App\Http\Controllers\RentalAgreementController::class)->names('rental_agreements')->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('rent-payments', \App\Http\Controllers\RentPaymentController::class)->names('rent_payments')->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('media-types', \App\Http\Controllers\MediaTypeController::class)->names('media_types')->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('media-usages', \App\Http\Controllers\MediaUsageController::class)->names('media_usages')->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('maintenance-requests', \App\Http\Controllers\MaintenanceRequestController::class)->names('maintenance_requests')->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('notifications', \App\Http\Controllers\NotificationController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('payment-schedules', \App\Http\Controllers\PaymentScheduleController::class)->names('payment_schedules')->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('reports', \App\Http\Controllers\ReportController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('users', \App\Http\Controllers\UserController::class)->only(['index','create','store','show','edit','update','destroy']);
    Route::resource('commission-logs', \App\Http\Controllers\CommissionLogController::class)->names('commission_logs')->only(['index','create','store','edit','update','destroy']);
    Route::resource('log-entries', \App\Http\Controllers\LogEntryController::class)->names('log_entries')->only(['index']);
});

// Nasz własny auth
Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout');
