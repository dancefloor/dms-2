<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/courses/geneva', [WelcomeController::class, 'genevaCourses'])->name('geneva.courses');
Route::get('/courses/lausanne', [WelcomeController::class, 'lausanneCourses'])->name('lausanne.courses');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('profile/dashboard');
})->name('dashboard');

Route::get('styles/export', [StyleController::class, 'export'])->name('styles.export');
Route::get('users/export/', [UserController::class,'export'])->name('users.export');
Route::get('locations/export/', [LocationController::class, 'export'])->name('locations.export');
Route::get('classrooms/export/', [ClassroomController::class, 'export'] )->name('classrooms.export');
Route::get('courses/export/', [CourseController::class, 'export'] )->name('courses.export');

Route::middleware(['auth'])->group(function(){
    Route::resource('users', UserController::class)->middleware('auth');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('courses', CourseController::class)->middleware('auth');
    Route::resource('locations', LocationController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('styles', StyleController::class);        
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('orders', OrderController::class);

    Route::get('checkout', [ProfileController::class, 'checkout'])->name('checkout');
    Route::get('catalogue', [ProfileController::class, 'catalogue'])->name('catalogue');
    Route::get('reports', [ProfileController::class, 'reports'])->name('reports');
    
    Route::get('/mollie-payment', [MollieController::class, 'preparePayment'])->name('mollie.payment');
    Route::get('/payment-success', [MollieController::class, 'paymentSuccess'])->name('payment.status');
    Route::post('webhooks/mollie', [MollieController::class, 'handle'])->name('webhooks.mollie');
});

// Route::get('course/{slug}', [CourseController::class, 'view'])->name('courses.view');
Route::get('course/{course}', [CourseController::class, 'view'])->name('courses.view');

Route::post('registration/{course}', [RegistrationController::class,'add'])->name('registration.add');
Route::delete('registration/{course}',[RegistrationController::class, 'remove'])->name('registration.remove');

