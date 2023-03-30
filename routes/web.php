<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ListController;
use App\Http\Controllers\Admin\ListDetailController;
use App\Http\Controllers\Admin\ListĐetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MVController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SingerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\UploadController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });
        
         #Singer
         Route::prefix('singers')->group(function () {
            Route::get('add', [SingerController::class, 'create']);
            Route::post('add', [SingerController::class, 'store']);
            Route::get('list', [SingerController::class, 'index']);
            Route::get('edit/{singer}', [SingerController::class, 'show']);
            Route::post('edit/{singer}', [SingerController::class, 'update']);
            Route::DELETE('destroy', [SingerController::class, 'destroy']);
        });
            #Album
            Route::prefix('albums')->group(function () {
                Route::get('add', [AlbumController::class, 'create']);
                Route::post('add', [AlbumController::class, 'store']);
                Route::get('list', [AlbumController::class, 'index']);
                Route::get('edit/{album}', [AlbumController::class, 'show']);
                Route::post('edit/{album}', [AlbumController::class, 'update']);
                Route::DELETE('destroy', [AlbumController::class, 'destroy']);
            });
            #MV
            Route::prefix('mvs')->group(function () {
                Route::get('add', [MVController::class, 'create']);
                Route::post('add', [MVController::class, 'store']);
                Route::get('list', [MVController::class, 'index']);
                Route::get('edit/{mv}', [MVController::class, 'show']);
                Route::post('edit/{mv}', [MVController::class, 'update']);
                Route::DELETE('destroy', [MVController::class, 'destroy']);
            });
        #song
        Route::prefix('songs')->group(function () {
            Route::get('add', [SongController::class, 'create']);
            Route::post('add', [SongController::class, 'store']);
            Route::get('list', [SongController::class, 'index']);
            Route::get('edit/{song}', [SongController::class, 'show']);
            Route::post('edit/{song}', [SongController::class, 'update']);
            Route::DELETE('destroy', [SongController::class, 'destroy']);
        });
         #list
         Route::prefix('lists')->group(function () {
            Route::get('add', [ListController::class, 'create']);
            Route::post('add', [ListController::class, 'store']);
            Route::get('list', [ListController::class, 'index']);
            Route::get('edit/{list}', [ListController::class, 'show']);
            Route::post('edit/{list}', [ListController::class, 'update']);
            Route::DELETE('destroy', [ListController::class, 'destroy']);
            Route::get('hoc', [ListController::class, 'zui']);
        });
        #listdetail
        Route::prefix('listdetails')->group(function () {
            Route::get('add', [ListDetailController::class, 'create']);
            Route::post('add', [ListDetailController::class, 'store']);
            Route::get('list/{list}', [ListDetailController::class, 'index']);
            Route::get('edit/{slider}', [ListDetailController::class, 'show']);
            Route::post('edit/{slider}', [ListDetailController::class, 'update']);
            Route::DELETE('destroy', [ListDetailController::class, 'destroy']);
        });
         #slider
         Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('bai-hat/{id}-{slug}.html', [App\Http\Controllers\SongController::class, 'index']);
Route::get('mv/{id}-{slug}.html', [App\Http\Controllers\MVController::class, 'index']);
Route::get('ca-si/{id}-{slug}.html', [App\Http\Controllers\SingerController::class, 'index']);

Route::get('album/{id}-{slug}.html', [App\Http\Controllers\AlbumController::class, 'index']);

Route::get('list/{id}-{slug}.html', [App\Http\Controllers\ListController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
