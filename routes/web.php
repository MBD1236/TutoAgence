<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePropertyController;
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


Route::prefix('/property')->name('property.')->controller(HomePropertyController::class)->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{property}', 'show')->where([
        'slug' => '[a-z0-9\w\-]+',
        'property' => '[0-9]+'
    ])->name('show');
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
