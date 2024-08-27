<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route for the main dashboard page
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Add other routes here as needed for additional pages, modals, filters, etc.

