<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Http\Resources\ModelResource;
use App\Http\Requests\ModelRequest;

class ModelController extends Controller
{
    public function index(Request $request)
    {
        $query = CarModel::with('brand');

        // Sorting
        $sortField = $request->get('sort', 'name');
        $sortDirection = $request->get('direction', 'asc');

        $allowedSortFields = ['id', 'name', 'manufacturing_year', 'created_at'];
        if (in_array($sortField, $allowedSortFields)) {
            $query->orderBy($sortField, $sortDirection === 'desc' ? 'desc' : 'asc');
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhere('manufacturing_year', 'like', "%{$request->search}%");
            });
        }

        // Brand filter
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        $models = $query->get();

        return response()->json([
            'data' => ModelResource::collection($models),
            'meta' => [
                'sort' => $sortField,
                'direction' => $sortDirection
            ]
        ]);
    }

    public function store(ModelRequest $request)
    {
        // if request has image, store it and get the path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('models', 'public');
            $request->merge(['image' => asset('storage/' . $path)]);
        }

        $model = CarModel::create($request->validated());

        return response()->json([
            'message' => 'Model created successfully',
            'data' => new ModelResource($model)
        ], 201);
    }
}
