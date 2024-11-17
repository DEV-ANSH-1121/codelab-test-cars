<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Brand;
use App\Http\Requests\ModelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelController extends Controller
{
    public function index(Request $request)
    {
        $query = CarModel::with('brand');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('manufacturing_year', 'like', "%{$search}%")
                    ->orWhereHas('brand', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Brand filter
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Year filter
        if ($request->filled('year')) {
            $query->where('manufacturing_year', $request->year);
        }

        $models = $query->sortable(['created_at' => 'desc'])->paginate(10);
        $brands = Brand::pluck('name', 'id');
        $years = CarModel::distinct()->pluck('manufacturing_year')->sort()->reverse();

        return view('models.index', compact('models', 'brands', 'years'));
    }

    public function create()
    {
        $brands = Brand::pluck('name', 'id');
        return view('models.create', compact('brands'));
    }

    public function store(ModelRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('models', 'public');
        }

        CarModel::create($data);

        return redirect()->route('models.index')
            ->with('success', 'Model created successfully');
    }

    public function edit(CarModel $model)
    {
        $brands = Brand::pluck('name', 'id');
        return view('models.edit', compact('model', 'brands'));
    }

    public function update(ModelRequest $request, CarModel $model)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($model->image) {
                Storage::disk('public')->delete($model->image);
            }
            $data['image'] = $request->file('image')->store('models', 'public');
        }

        $model->update($data);

        return redirect()->route('models.index')
            ->with('success', 'Model updated successfully');
    }

    public function destroy(CarModel $model)
    {
        if ($model->image) {
            Storage::disk('public')->delete($model->image);
        }

        $model->delete();

        return redirect()->route('models.index')
            ->with('success', 'Model deleted successfully');
    }
}
