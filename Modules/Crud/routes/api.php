<?php

use Illuminate\Support\Facades\Route;
use Modules\Crud\Http\Controllers\CrudController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('cruds', CrudController::class)->names('crud');
});
