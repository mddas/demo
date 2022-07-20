<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\UserController;
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
require __DIR__.'/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('logout', [AdminController::class,'logout'])->name('logout');
Route::get('/',[AdminController::class,'tempindex'])->middleware(['auth'])->name('admin');
Route::get('/{admin}',[AdminController::class,'index'])->middleware(['auth'])->name('admin');
Route::get('/admin/users/{users}',[UserController::class,'index'])->middleware(['auth'])->name('users');
Route::get('/admin/roles/{roles}',[AdminController::class,'index'])->middleware(['auth'])->name('roles');
Route::get('/admin/permisson/{permissons}',[AdminController::class,'index'])->middleware(['auth'])->name('permissons');
Route::get('/admin/job/{jobs}',[JobApplyController::class,'index'])->middleware(['auth'])->name('jobs');

Route::POST('/admin/job/store',[JobApplyController::class,'jobstore'])->middleware(['auth'])->name('storejob');
Route::GET('/admin/job/destroy/{id}',[JobApplyController::class,'destroy'])->middleware(['auth'])->name('jobdestroy');
Route::GET('/admin/user/destroy/{id}',[UserController::class,'destroy'])->middleware(['auth'])->name('userdestroy');



