@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Models</h1>
        <a href="{{ route('models.create') }}" class="btn btn-primary">Add New Model</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form id="filter-form" action="{{ route('models.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by model name or brand"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="brand_id" class="form-select" data-auto-submit>
                        <option value="">All Brands</option>
                        @foreach ($brands as $id => $name)
                            <option value="{{ $id }}" {{ request('brand_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="year" class="form-select" data-auto-submit>
                        <option value="">All Years</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                    <a href="{{ route('models.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>@sortablelink('brand.name', 'Brand')</th>
                    <th>@sortablelink('name', 'Model Name')</th>
                    <th>@sortablelink('manufacturing_year', 'Year')</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($models as $model)
                    <tr>
                        <td>
                            @if ($model->image_url)
                                <img src="{{ $model->image_url }}" alt="{{ $model->name }}" class="model-image">
                            @else
                                <i class="fas fa-car fa-2x"></i>
                            @endif
                        </td>
                        <td>{{ $model->brand->name }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->manufacturing_year }}</td>
                        <td>
                            <span class="badge bg-{{ $model->is_active ? 'success' : 'danger' }}">
                                {{ $model->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('models.edit', $model) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('models.destroy', $model) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    data-confirm="Are you sure you want to delete this model?">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No models found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div>
            Showing {{ $models->firstItem() ?? 0 }} to {{ $models->lastItem() ?? 0 }}
            of {{ $models->total() }} entries
        </div>
        {{ $models->withQueryString()->links() }}
    </div>
@endsection
