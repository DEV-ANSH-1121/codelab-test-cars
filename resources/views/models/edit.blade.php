@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Model: {{ $model->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('models.update', $model) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select class="form-select @error('brand_id') is-invalid @enderror" id="brand_id"
                                name="brand_id" required>
                                <option value="">Select Brand</option>
                                @foreach ($brands as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ old('brand_id', $model->brand_id) == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Model Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $model->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="manufacturing_year" class="form-label">Manufacturing Year</label>
                            <input type="number" class="form-control @error('manufacturing_year') is-invalid @enderror"
                                id="manufacturing_year" name="manufacturing_year"
                                value="{{ old('manufacturing_year', $model->manufacturing_year) }}" min="1900"
                                max="{{ date('Y') + 1 }}" required>
                            @error('manufacturing_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Model Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" data-preview="image-preview">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                @if ($model->image_url)
                                    <img id="image-preview" src="{{ $model->image_url }}" alt="Current Image"
                                        style="max-height: 100px;">
                                @else
                                    <img id="image-preview" src="#" alt="Image Preview"
                                        style="max-height: 100px; display: none;">
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                    value="1" {{ old('is_active', $model->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('models.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Model</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
