<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandDetailResource;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::withCount('carModels');

        // Sorting
        $sortField = $request->get('sort', 'name');
        $sortDirection = $request->get('direction', 'asc');

        $allowedSortFields = ['id', 'name', 'created_at', 'updated_at'];
        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortDirection === 'desc' ? 'desc' : 'asc');
        }

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // Status filter
        if ($request->has('status')) {
            $query->where('is_active', $request->boolean('status'));
        }

        $brands = $query->get();

        return response()->json([
            'data' => BrandResource::collection($brands),
            'meta' => [
                'sort' => $sortField,
                'direction' => $sortDirection
            ]
        ]);
    }

    public function show(Request $request, Brand $brand)
    {
        $brand->load(['carModels' => function ($query) use ($request) {
            // Search in models
            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                        ->orWhere('manufacturing_year', 'like', "%{$request->search}%");
                });
            }
        }]);

        return response()->json([
            'data' => new BrandDetailResource($brand)
        ]);
    }
}
