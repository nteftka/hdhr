<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HdhrController;
use App\Http\Controllers\PdfOutputController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ChangePasswordController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::group(['middleware' => ['auth', 'can:admin-higher']], function(){
//   Route::get('/', function (){
//     // return view('welcome');
//     return view('admin/admin_top');
//   });
// });

Route::group(['middleware' => ['auth']], function(){
  Route::get('/', function(){
    return view('index');
  });
});

Auth::routes();
Route::get('/password/change', [ChangePasswordController::class, 'edit']);
Route::patch('/password/change',[ChangePasswordController::class, 'update'])->name('password.change');


// Route::group(['middleware' => ['auth']], function(){
//   Route::get('/', function (){
//     // return view('welcome');
//     return view('dh/main');
//   });
// });



// DH側
Route::group(['middleware' => ['auth']], function(){
  Route::get('main', [HdhrController::class, 'main'])->name('main');
  Route::patch('main', [HdhrController::class, 'main'])->name('main');
  Route::get('main', [HdhrController::class, 'main'])->name('main');
  Route::post('main', [HdhrController::class, 'main'])->name('main');
  Route::post('main', [HdhrController::class, 'contents_complate'])->name('main');
  Route::patch('confirm', [HdhrController::class, 'confirm']);
  Route::post('main', [HdhrController::class, 'complate']);
  Route::get('kr', [HdhrController::class, 'kr'])->name('kr');
  Route::get('user_edit', [HdhrController::class, 'user_edit']);
  Route::get('kr_contents', [HdhrController::class, 'kr_contents']);
  Route::get('contents/{id}', [HdhrController::class, 'contents']);
  Route::get('data', [HdhrController::class, 'data']);
  Route::get('contents_edit/{id}', [HdhrController::class, 'contents_edit']);
  Route::patch('contents_edit/{id}', [HdhrController::class, 'contents_confirm']);
  Route::get('kr_add', [HdhrController::class, 'kr_add'])->name('kr_add');
  Route::patch('kr_add_confirm', [HdhrController::class, 'kr_add_confirm']);
  Route::post('kr_add_complate', [HdhrController::class, 'kr_add_complate']);
  Route::get('kr_add_complate', [HdhrController::class, 'kr_add_complate']);
  Route::get('search', [HdhrController::class, 'search'])->name('search');
  Route::get('create/{id}', [HdhrController::class, 'create']);
  Route::post('contents_edit/{id}', [HdhrController::class, 'contents_complate']);
  Route::get('kr_edit/{id}', [HdhrController::class, 'kr_edit']);
  Route::patch('kr_edit/{id}', [HdhrController::class, 'kr_edit_confirm']);
  Route::post('kr_edit/{id}', [HdhrController::class, 'kr_edit_complate']);
  Route::get('kr_info/{id}', [HdhrController::class, 'kr_info']);
  Route::get('graphsample/{id}', [HdhrController::class, 'graphsample'])->name('graphsample');
  Route::post('contents_delete/{id}', [HdhrController::class, 'contents_delete']);
  Route::post('kr_delete/{id}', [HdhrController::class, 'kr_delete']);
});


// admin側
Route::group(['middleware' => ['auth', 'can:admin-higher']], function(){
  // Route::get('/', [AdminController::class, 'admin_top']);
  Route::get('admin_login', [AdminController::class, 'admin_login']);
  Route::patch('admin_top', [AdminController::class, 'admin_top']);
  Route::post('admin_top', [AdminController::class, 'admin_top']);
  Route::get('admin_top', [AdminController::class, 'admin_top'])->name('admin_top');
  Route::get('admin_add', [AdminController::class, 'admin_add']);
  Route::get('admin_user', [AdminController::class, 'admin_user'])->name('admin_user');
  Route::patch('admin_add_confirm', [AdminController::class, 'admin_add_confirm']);
  Route::get('admin_edit/{id}', [AdminController::class, 'admin_edit']);
  Route::patch('admin_edit/{id}', [AdminController::class, 'admin_edit_confirm']);
  Route::post('admin_top', [AdminController::class, 'admin_add_complate']);
  Route::post('admin_edit/{id}', [AdminController::class, 'admin_edit_finish']);
  Route::post('admin_delete/{id}', [AdminController::class, 'admin_delete']);
});


// Route::get('/admin_login', function () {
//     return view('login');
// });
// Route::POST('/admin_login', 'AdminController@admin_login');
// Route::get('/admin_logout', 'LoginController@logout')->middleware('login');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// sushiテスト
Route::get('/output/pdf', [PdfOutputController::class, 'output']);
