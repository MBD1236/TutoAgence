<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePropertyController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Property;

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

Route::get('/', [HomeController::class, 'index'] );

Route::get('/add/user', [RegisterController::class, 'formUser'])->name('formUser');
Route::post('/add/user', [RegisterController::class, 'addUser'])->name('addUser');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::prefix('/property')->name('property.')->controller(HomePropertyController::class)->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{property}', 'show')->where([
        'slug' => '[a-z0-9\w\-]+',
        'property' => '[0-9]+'
    ])->name('show');
});

Route::post('/property/{property}/contact', [HomePropertyController::class, 'contact'])->where([
    'property' => '[0-9]+'
])->name('property.contact');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
