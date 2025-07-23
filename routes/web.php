<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\User\UserServiceRequestController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::name('front.')->controller(HomeController::class)->group(function () {
    // Home Page
    Route::post('/subscribers/store', 'subscribersStore')->name('subscriber.store');
    Route::get('/', 'index')->name('index');

    // About Page
    Route::get('/about', 'about')->name('about');

    // Service Page
    Route::get('/services', 'service')->name('service');

    // Contact Page
    Route::post('/contact/store', 'contactStore')->name('contact.store');
    Route::get('/contact', 'contact')->name('contact');
});

Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')
    ->middleware([ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])
    ->group(function () {

        Route::get('login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('login', [AdminLoginController::class, 'store'])->name('store-login');
        Route::post('logout', [AdminLoginController::class, 'destroy'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        
        // Dashboard page
        Route::view('/dashboard', 'admin.index')->name('index'); 

        // Services 
        Route::resource('services', ServiceController::class);

        //Features
        Route::resource('features', FeatureController::class);

        //Messages
        Route::resource('messages', MessageController::class)->only(['index','show','destroy']);

        //Subsrcibers
        Route::controller(SubscriberController::class)->group(function () {
            Route::get('/subscribers', 'index')->name('subscribers.index');
            Route::delete('/subscribers/{subscriber}', 'destroy')->name('subscribers.destroy');
        });

        //Settigs
        Route::controller(SettingController::class)->group(function () {
            Route::get('/settings', 'index')->name('settings.index');
            Route::put('/settings/{setting}', 'update')->name('settings.update');
        });

        //Service Request
        Route::controller(ServiceRequestController::class)->group(function () {
            Route::get('/requests', 'index')->name('requests.index');
            Route::get('/requests/{request}', 'show')->name('requests.show');
            Route::get('/requests/{request}/edit', 'edit')->name('requests.edit');
            Route::put('/requests/{request}', 'update')->name('requests.update');
        });

        // mark notification to read
        Route::get('/notification/{id}/markasread', function($id) {
            $notification = Auth::guard('admin')->user()->notifications()->findOrFail($id);
            if ($notification->unread()) {
                $notification->markAsRead();
            }
        })->name('notification.markasread');

        // clear all notifications
        Route::get('/notification/clear', function() {
            Auth::guard('admin')->user()->notifications()->delete();
        })->name('notifications.clear');
    });
  
});

// user
Route::prefix('user')->name('user.')->group(function () {

    require __DIR__.'/auth.php';

    Route::middleware(['auth', 'user.verified'])->group(function () {

        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');

        Route::get('/profile', function () {
            return view('user.profile.index');
        })->name('profile');
        
        Route::controller(UserServiceRequestController::class)->group(function () {
            Route::get('/my-requests', 'myRequests')->name('requests.index');
            Route::get('/my-requests/{request}', 'show')->name('requests.show');
            Route::get('/services/{service}/request', 'create')->name('requests.create');
            Route::post('/services/request', 'store')->name('requests.store');
        });
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


});







