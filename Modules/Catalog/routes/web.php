<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::view('catalog', 'catalog::pages.index')->name(name: 'catalog.index');
});
