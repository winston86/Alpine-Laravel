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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\EditableTable::class, 'index'])
    ->name('editable-table');

Route::post('/editable-table-update', [App\Http\Livewire\EditableTable::class, 'updateRows'])
    ->name('editable-table-update');
