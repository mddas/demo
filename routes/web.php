<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobApplyController;
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

Route::get('/{admin}',[AdminController::class,'index'])->name('admin');
Route::get('/admin/users/{users}',[AdminController::class,'index'])->name('users');
Route::get('/admin/roles/{roles}',[AdminController::class,'index'])->name('roles');
Route::get('/admin/permisson/{permissons}',[AdminController::class,'index'])->name('permissons');
Route::get('/admin/job/{jobs}',[JobApplyController::class,'index'])->name('jobs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';