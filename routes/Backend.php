<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileControllers;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;


Route::middleware('admin')->group(function () {

    //Dashboard Controller
   Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard','index')->name('dashboard');
   });

   // Profile Controller
   Route::controller(ProfileControllers::class)->group(function(){
    Route::get('/profile','updateProfile')->name('profile');
    Route::post('/profile/update','update')->name('update.profile');
    Route::post('/profile/update/password','updatePassword')->name('profile.update.password');
   });

   //User Manage Controller
   Route::controller(UserController::class)->group(function(){
    Route::get('/user/manage','index')->name('user.index');
    Route::get('/user/get/all','allUser')->name('getUsers');
    Route::post('/user/manage/store','store')->name('user.store');
    Route::get('/user/manage/edit/{id}','edit')->name('user.edit');
    Route::post('/user/manage/update/{id}','update')->name('user.update');
    Route::get('/user/manage/delete/{id}','delete')->name('user.delete');
   });

    Route::controller(RoleController::class)->group(function(){
        Route::get('/role/manage','index')->name('role.index');
        Route::get('/role/get/all','allRole')->name('getRoles');
        Route::post('/role/manage/store','store')->name('roles.store');
        Route::get('/role/manage/edit/{id}','edit')->name('role.edit');
        Route::post('/role/manage/update','update')->name('roles.update');
        Route::get('/role/manage/delete/{id}','delete')->name('role.delete');
    });

});
