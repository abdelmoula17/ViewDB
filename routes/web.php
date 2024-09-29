<?php

use Illuminate\Support\Facades\Route;
use Khufu\Viewdb\Http\Controllers\QueryDbController;
use Khufu\Viewdb\Http\Controllers\ViewDbController;

Route::get('/chartdb/{view?}', [ViewDbController::class, "show"])->where('view', '(.*)');
Route::get('/api/viewdb/query', [QueryDbController::class, "index"]);
