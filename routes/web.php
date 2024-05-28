<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customers',[CustomerController::class,'show'])->name('customer.list')->middleware('access');
Route::get('/customers/register',[CustomerController::class,'Register'])->name("customer.register");
Route::post('/customers/registers',[CustomerController::class,'RegisterCustomer'])->name("customers.submit");
Route::get("/customers/edit",[CustomerController::class,"editCustomer"])->name("customers.edit");
Route::post("/customers/update/{id}",[CustomerController::class,"UpdateCustomer"])->name("customers.update");
Route::get("/customers/delete",[CustomerController::class,"DeleteCustomer"])->name("customers.delete")->middleware("access");

//adminActionRoutes
Route::get("/admin/register",[AdminController::class,'AdminReg'])->name('admin.reg');
Route::post("/admin/add",[AdminController::class,'Register'])->name('admin.add');
Route::get("/admin/loginpage",[LoginController::class,'Admin'])->name('admin.loginpage');
Route::post("/admin/login",[LoginController::class,'Adminauthenticate'])->name('admin.login');
Route::get("/admin/dashboard",[AdminController::class,'AdminDash'])->name('admin.dashboard');
Route::get("/admin/logout",[LoginController::class,'Adminlogout'])->name('admin.logout');
//UserActionRoutes
Route::get("/user/register",[UserController::class,'UserReg'])->name('user.reg');
Route::get("/user/dashboard",[UserController::class,'UserDash'])->name('user.dashboard')->middleware('permission:edit articles');
Route::post("/user/add",[UserController::class,'Register'])->name('user.add');
//LoginRoutes
Route::get("/user/loginpage",[LoginController::class,'User'])->name('user.loginpage');
Route::post("/user/login",[LoginController::class,'Userauthenticate'])->name('user.login');
Route::get("/user/logout",[LoginController::class,'Userlogout'])->name('user.logout');

Route::get('/permission/create',[PermissionController::class,'CreatePermission'])->name("permission.create");

Route::get('/permission/user',[PermissionController::class,'CreatePermission'])->name("permission.user");