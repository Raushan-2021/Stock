<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StationaryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OrderRequestController;
use App\Http\Controllers\OrderRequestDetailController;
use App\Http\Controllers\RequestController;
use App\OrderRequest;
use App\Stationary;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Dashboard order request 
Route::get('/dashboard', function () {
    $allReqCount = count(OrderRequest::all());
    $approvedCount = count(OrderRequest::where('status', '=', 'APPROVED')->get());
    $rejectCount = count(OrderRequest::where('status', '=', 'REJECT')->get());
    $pendingCount = count(OrderRequest::where('status', '=', 'PENDING')->get());
    $allStationary = Stationary::all();
    return view('admin.layouts.master', ['allReqCount'=> $allReqCount, 'approvedCount'=>$approvedCount, 'pendingCount'=>$pendingCount , 'rejectCount'=>$rejectCount, 'allStationary' => $allStationary]);
})->name('dashboard');

Route::get('/stationary', [StationaryController::class, 'index'])->name('stationary');
Route::get("/single-stationary/edit/{id}", [StationaryController::class, 'getSingleStationary'])->name('single-stationary.edit');
Route::post("/update-stationary/{id}", [StationaryController::class, 'updateStationary'])->name('update-stationary');
Route::get('stationary-destroy/{id}', [StationaryController::class, 'destroy'])->name('stationary-destroy');
Route::post('/stationarystore', [StationaryController::class, 'store'])->name('stationary_store');

Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get("/single-department/edit/{id}", [DepartmentController::class, 'getSingleDepartment'])->name('single-department.edit');
Route::post("/update-department/{id}", [DepartmentController::class, 'updateDepartment'])->name('update-department');
Route::get('department-destroy/{id}', [DepartmentController::class, 'destroy'])->name('department-destroy');
Route::post('/departmentstore', [DepartmentController::class, 'store'])->name('department_store');

Route::get('/order_request', [OrderRequestController::class, 'index'])->name('order_request');
Route::post('/order_request', [OrderRequestController::class, 'store'])->name('order_request');

Route::get('/order_request_details', [OrderRequestDetailController::class, 'index'])->name('order_request_details');
Route::get('/itemDetailShow/{id}', [OrderRequestDetailController::class, 'show'])->name('itemDetailShow');
Route::post('/approveRequest/{id}', [OrderRequestDetailController::class, 'approve'])->name('approveRequest');
Route::post('/rejectRequest/{id}', [OrderRequestDetailController::class, 'reject'])->name('rejectRequest');

Route::get('/orderRequestApproved', [RequestController::class, 'approvedRequest'])->name('orderRequestApproved');
Route::get('/orderRequestPending', [RequestController::class, 'pendingRequest'])->name('orderRequestPending');
Route::get('/orderRequestReject', [RequestController::class, 'rejectRequest'])->name('orderRequestReject');

//added by kritika
Route::get('/order_request_form', [OrderRequestController::class, 'request_form'])->name('order_request_form');