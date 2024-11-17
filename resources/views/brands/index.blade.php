@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Brands</h1>
        <a href="{{ route('brands.create') }}" class="btn btn-primary">Add New Brand</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form id="filter-form" action="{{ route('brands.index') }}" method="GET" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search by brand name"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <select name="status" class="form-select" data-auto-submit>
                        <option value="">All Status</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">#</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td>{{ $brands->firstItem() + $loop->index }}</td>
                            <td>
                                @if ($brand->logo_url)
                                    <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" height="30">
                                @else
                                    <i class="fas fa-car"></i>
                                @endif
                            </td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <span class="badge bg-{{ $brand->is_active ? 'success' : 'danger' }}">
                                    {{ $brand->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        data-confirm="Are you sure you want to delete this brand?">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No brands found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($brands->hasPages())
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted small">
                        Showing {{ $brands->firstItem() ?? 0 }} to {{ $brands->lastItem() ?? 0 }}
                        of {{ $brands->total() }} entries
                    </div>
                    <div>
                        {{ $brands->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
