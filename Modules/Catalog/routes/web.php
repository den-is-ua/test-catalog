<?php

use Illuminate\Support\Facades\Route;
use Modules\Catalog\Http\Controllers\CatalogController;

Route::middleware('web')->group(function () {
    Route::view('/catalog', 'catalog::pages.index')->name('shop.index');
});
