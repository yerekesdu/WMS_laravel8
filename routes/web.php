<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitOfIssueController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WhouseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RequestTypeController;
use App\Http\Controllers\RequestStatusController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TranTypeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\WhouseTransferController;
use App\Http\Controllers\BalanceController;

Route::resource('unitofissues', UnitOfIssueController::class);

Route::resource('materials', MaterialController::class);

Route::resource('districts', DistrictController::class);

Route::resource('whouses', WhouseController::class);

Route::resource('orders', OrderController::class);

Route::resource('requesttypes', RequestTypeController::class);

Route::resource('requeststatuses', RequestStatusController::class);

Route::resource('requests', RequestController::class);

Route::resource('receipts', ReceiptController::class);

Route::resource('trantypes', TranTypeController::class);

Route::resource('transactions', TransactionController::class);

Route::resource('issues', IssueController::class);

Route::resource('whousetransfers', WhouseTransferController::class);

Route::resource('balances', BalanceController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
