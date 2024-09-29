<?php

use Illuminate\Support\Facades\Route;
use Khufu\Viewdb\Http\Controllers\QueryDbController;

Route::get('/chartdb/query', [QueryDbController::class, "index"]);
