<?php

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

use App\http\Controllers\EstoqueControl;

Route::get('/', [EstoqueControl::class, 'index']);

Route::post('/', [EstoqueControl::class, 'store']);

Route::get('/dashboard', [EstoqueControl::class, 'dashboard']);

Route::get('/estoque', [EstoqueControl::class, 'search']);

Route::get('/estoque', [EstoqueControl::class, 'showEstoque'])->middleware('auth');

Route::delete('/estoque/delete/{id}', [EstoqueControl::class, 'delete'])->middleware('auth');

Route::get('/estoque/edit/{id}', [EstoqueControl::class, 'edit'])->middleware('auth');

Route::put('/estoque/update/{id}', [EstoqueControl::class, 'update'])->middleware('auth');
