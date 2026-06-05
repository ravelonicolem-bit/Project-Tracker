<?php

use Illuminate\Support\Facades\Route;
use Modules\Projects\Http\Controllers\CreateProjectController;
use Modules\Projects\Http\Controllers\DestroyProjectController;
use Modules\Projects\Http\Controllers\EditProjectController;
use Modules\Projects\Http\Controllers\ExportProjectsController;
use Modules\Projects\Http\Controllers\IndexProjectController;
use Modules\Projects\Http\Controllers\ShowProjectController;
use Modules\Projects\Http\Controllers\StoreProjectController;
use Modules\Projects\Http\Controllers\UpdateProjectController;

Route::get('/projects/export', ExportProjectsController::class)->name('projects.export');
Route::get('/projects', IndexProjectController::class)->name('projects.index');
Route::get('/projects/create', CreateProjectController::class)->name('projects.create');
Route::post('/projects', StoreProjectController::class)->name('projects.store');
Route::get('/projects/{project}', ShowProjectController::class)->name('projects.show');
Route::get('/projects/{project}/edit', EditProjectController::class)->name('projects.edit');
Route::put('/projects/{project}', UpdateProjectController::class)->name('projects.update');
Route::delete('/projects/{project}', DestroyProjectController::class)->name('projects.destroy');
