<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});



Route::get('/home', [HomeController::class, 'index'])->name('home');

//Administrator routes
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.index');

//Administrator-users routes
Route::get('/admin/users/usersIndex', [AdminController::class, 'usersIndex'])->name('admin.users.usersIndex');

Route::get('/admin/users/createUser', [AdminController::class, 'createUser'])->name('admin.users.createUser');
Route::post('/admin/users/storeUser', [AdminController::class, 'storeUser'])->name('admin.users.storeUser');

Route::get('/admin/users/showInactiveUsers', [AdminController::class, 'showInactiveUsers'])->name('admin.users.showInactiveUsers');

Route::get('admin/users/{id}/confirmActivateUser', [AdminController::class, 'confirmActivateUser'])->name('admin.users.confirmActivateUser');
Route::put('admin/users/{id}/activateUser', [AdminController::class, 'activateUser'])->name('admin.users.activateUser');

Route::get('/admin/users/{id}/show', [UserController::class, 'show'])->name('admin.users.show');

Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');

Route::get('/admin/users/{id}/confirmDeleteUser', [AdminController::class, 'confirmDeleteUser'])->name('admin.users.confirmDeleteUser');
Route::put('/admin/users/{id}/deleteUser', [AdminController::class, 'deleteUser'])->name('admin.users.deleteUser');


