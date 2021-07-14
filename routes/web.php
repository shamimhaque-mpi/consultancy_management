<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PrivilegeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;

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
Auth::routes(['login'=>false]);

Route::group(['prefix'=>'admin'], function(){
    Route::get('dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin.dashboard');
    /*
     * ********************
     * Admin MODULE
     * ****************
    */
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('new', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id?}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('api/all', [AdminController::class, 'api_fetch_data']);
    Route::get('profile/{id?}', [AdminController::class, 'profile'])->name('admin.profile');



    // USER MODULE
   	Route::group(['prefix'=>'user'], function(){
   		Route::match(['GET', 'POST'], 'create', [UserController::class, 'create'])->name('admin.user.create');
   		Route::match(['GET', 'POST'], 'edit/{id?}', [UserController::class, 'edit'])->name('admin.user.edit');
   		Route::get('all', [UserController::class, 'index'])->name('admin.user.all');
      Route::get('profile/{id?}', [UserController::class, 'profile'])->name('admin.user.profile');
      Route::post('get-all-users', [UserController::class, 'allUser']);
   	});


    /*
     * ****************************
     *  SERVICE CATEGORY MODULE
     * *************************
    */
    Route::resource('/category', 'App\Http\Controllers\Backend\CategoryController');
    Route::group(['prefix'=>'category'], function(){
      Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');
      Route::post('api_get_all', [CategoryController::class, 'api_get_all']);
      Route::get('trash/{id}', [CategoryController::class, 'trash'])->name('category.trash');
    });

    /*
     * *************************
     *  SERVICE MODULE
     * ******************
    */
    Route::resource('/service', 'App\Http\Controllers\Backend\ServiceController');
    Route::group(['prefix'=>'service'], function(){
      Route::post('update/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'update'])->name('service.update');
      Route::post('api_get_all', [App\Http\Controllers\Backend\ServiceController::class, 'api_get_all']);
      Route::get('trash/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'trash'])->name('service.trash');
    });


    /*
     * *************************
     *  CUSTOMER MODULE
     * ******************
    */
    Route::group(['prefix'=>'customer'], function(){
      Route::match(['POST', 'GET'], '/', [CustomerController::class, 'index'])->name('admin.customer.index');
      Route::match(['POST', 'GET'], '/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');

      Route::match(['POST', 'GET'], 'files', [CustomerController::class, 'file'])->name('admin.customer.files');
      Route::match(['POST', 'GET'], 'file/{id}/edit', [CustomerController::class, 'fileEdit'])->name('admin.customer.file.edit');

      Route::post('api_get_file', [CustomerController::class, 'api_get_file']);
      Route::post('api_get_movement', [CustomerController::class, 'api_get_movement']);
      Route::post('api_get_all', [CustomerController::class, 'api_get_all']);

      Route::match(['POST', 'GET'], 'movements', [CustomerController::class, 'movements'])->name('admin.customer.movements');
    });

    /*
     * *************************
     *  PRIVILEGE MODULE
     * ******************
    */
      Route::group(['prefix'=>'privilege'], function(){
         Route::match(['POST', 'GET'], '/status', [PrivilegeController::class, 'status'])->name('admin.privilege.status');
      });


    Route::match(['POST', 'GET'], 'settings', [App\Http\Controllers\Backend\SettingsController::class, 'index'])->name('admin.settings');

    // Admin Login
  	Route::get('login', [App\Http\Controllers\Backend\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  	Route::post('login', [App\Http\Controllers\Backend\Auth\LoginController::class, 'login'])->name('admin.login');
  	Route::match(['GET', 'POST'], 'logout', [App\Http\Controllers\Backend\Auth\LoginController::class, 'logout'])->name('admin.logout');
});

// USER LOGIN
Route::post('login', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'login'])->name('user.login');
Route::get('logout', [App\Http\Controllers\Frontend\Auth\LoginController::class, 'logout'])->name('user.logout');

// USER PANEL
Route::get('/dashboard', [App\Http\Controllers\Frontend\UserController::class, 'index'])->name('user.dashboard');

Route::match(['POST', 'GET'], '/customer', [App\Http\Controllers\Frontend\UserController::class, 'customer'])->name('user.customer.all');
Route::match(['POST', 'GET'], '/customer/add', [App\Http\Controllers\Frontend\UserController::class, 'newCustomer'])->name('user.customer.add');
Route::match(['POST', 'GET'], '/customer/edit/{id}', [App\Http\Controllers\Frontend\UserController::class, 'editCustomer'])->name('user.customer.edit');

// FILE HANDLE 
Route::match(['POST', 'GET'], '/file', [App\Http\Controllers\Frontend\UserController::class, 'file'])->name('user.file');
Route::match(['POST', 'GET'], '/file', [App\Http\Controllers\Frontend\UserController::class, 'file'])->name('user.file');
Route::post('/file/store', [App\Http\Controllers\Frontend\UserController::class, 'fileStore'])->name('user.file.store');
Route::match(['POST', 'GET'], '/file/edit/{id}', [App\Http\Controllers\Frontend\UserController::class, 'editFile'])->name('user.file.edit');
Route::get('/file/view/{id}', [App\Http\Controllers\Frontend\UserController::class, 'veiwFile'])->name('user.file.view');
Route::get('delete/file/{id}', [App\Http\Controllers\Frontend\UserController::class, 'deleteFile'])->name('user.file.delete');

// MOVEMENTS
Route::match(['POST', 'GET'], '/movements', [App\Http\Controllers\Frontend\UserController::class, 'movements'])->name('user.movements');


Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');



