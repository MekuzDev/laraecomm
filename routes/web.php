<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix'=>'admin',
    'middleware'=>['auth','isAdmin']
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    // Category Routes

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.categories');
        Route::get('/categories/create', 'showCreateForm')->name('admin.showCreateCategory');
        Route::post('/categories/create', 'create')->name('admin.createCategory');
        Route::get('/categories/{category}/edit', 'showEditForm')->name('admin.editCategory');
        Route::post('/categories/{category}/edit', 'edit')->name('admin.editCategory');
    });

});

