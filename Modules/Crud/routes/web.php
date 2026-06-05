<?php

use Illuminate\Support\Facades\Route;
use Modules\Crud\Http\Controllers\CrudController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cruds', CrudController::class)->names('crud');
});
