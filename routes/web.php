<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Blogs;
use App\Http\Livewire\ManageDevices;
use App\Http\Livewire\GrowConfigs;
use App\Http\Livewire\Counter;
use App\Http\Controllers\CounterNew;
use App\Http\Livewire\Dashboard;

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

//Route::get('/', function () {
 //   return view('welcome');
//});

//Route::middleware(['auth:sanctum', 'verified'])->get('/welcome', App\Http\Livewire\Counters::class)->name('welcome');
//Route::middleware(['auth:sanctum', 'verified'])->get('/welcomeNew', App\Http\Controllers\CounterNew::class)->name('welcomeNew');

Route::get('/post', [CounterNew::class, 'mqttSubTestOpen']);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
 //  return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', App\Http\Livewire\Dashboard::class)->name('dashboard');

//Route::middleware(['auth:sanctum', 'verified'])->get('/blog', function () {
//    return view('blogs');
//})->name('blog');

Route::middleware(['auth:sanctum', 'verified'])->get('/blog', App\Http\Livewire\Blogs::class)->name('blog');

Route::middleware(['auth:sanctum', 'verified'])->get('/managedevice', App\Http\Livewire\ManageDevices::class)->name('managedevice');

Route::middleware(['auth:sanctum', 'verified'])->get('/growconfig', App\Http\Livewire\GrowConfigs::class)->name('growconfig');
