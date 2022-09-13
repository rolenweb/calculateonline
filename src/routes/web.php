<?php

use App\Http\Controllers\FinanceCalculatorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator-nds', [FinanceCalculatorController::class, 'nds']);
Route::get('/calculator-credit', [FinanceCalculatorController::class, 'credit']);
Route::get('/kreditnyj-kalkulyator-s-dosrochnym-pogasheniem', [FinanceCalculatorController::class, 'creditWithEarlyRepayment']);
