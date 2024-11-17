<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ModelController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Brand Routes
    Route::get('/brands', [BrandController::class, 'index']);
    Route::get('/brands/{brand}', [BrandController::class, 'show']);

    // Model Routes
    Route::get('/models', [ModelController::class, 'index']);
    Route::post('/models', [ModelController::class, 'store']);
});

/**
 * API Documentation
 * 
 * Brands:
 * GET /api/v1/brands
 *   - Parameters:
 *     - sort: string (id|name|created_at|updated_at) default: name
 *     - direction: string (asc|desc) default: asc
 *     - search: string
 *     - status: boolean
 * 
 * GET /api/v1/brands/{brand}
 *   - Parameters:
 *     - sort: string (id|name|manufacturing_year|created_at) default: name
 *     - direction: string (asc|desc) default: asc
 *     - search: string
 * 
 * Models:
 * GET /api/v1/models
 *   - Parameters:
 *     - sort: string (id|name|manufacturing_year|created_at) default: name
 *     - direction: string (asc|desc) default: asc
 *     - search: string
 *     - brand_id: integer
 * 
 * POST /api/v1/models
 *   - Parameters:
 *     - brand_id: required|exists:brands,id
 *     - name: required|string|max:255
 *     - manufacturing_year: required|integer|min:1900|max:(current_year + 1)
 *     - is_active: boolean
 */
