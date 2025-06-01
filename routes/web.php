<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CommissionLogController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\MediaTypeController;
use App\Http\Controllers\MediaUsageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentScheduleController;
use App\Http\Controllers\RentPaymentController;
use App\Http\Controllers\RentalAgreementController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LogEntryController;

Route::get('/', function () {
    return view('home');
})->name('home');

// RESTful routes for all controllers
Route::resources([
    'apartments'           => ApartmentController::class,
    'buildings'            => BuildingController::class,
    'commission_logs'      => CommissionLogController::class,
    'locations'            => LocationController::class,
    'maintenance_requests' => MaintenanceRequestController::class,
    'media_types'          => MediaTypeController::class,
    'media_usages'         => MediaUsageController::class,
    'owners'               => OwnerController::class,
    'payment_schedules'    => PaymentScheduleController::class,
    'rent_payments'        => RentPaymentController::class,
    'rental_agreements'    => RentalAgreementController::class,
    'reports'              => ReportController::class,
    'reviews'              => ReviewController::class,
    'tenants'              => TenantController::class,
    'users'                => UserController::class,
    'notifications'        => NotificationController::class,
    'log_entries'          => LogEntryController::class,
]);
