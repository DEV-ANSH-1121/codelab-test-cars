<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/brands-listing.css') }}">
</head>

<body>
    <div class="main-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="title-container">
                <h1 class="brand-title">Brands</h1>
                <p class="results-count">(Showing {{ $brands->count() }} results)</p>
            </div>
            <div class="search-container">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                            placeholder="Search by Brand">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alphabetical Navigation -->
        <div class="alpha-nav">
            <a href="{{ route('home') }}" class="nav-link {{ !request('letter') ? 'active' : '' }}">
                ALL BRANDS
            </a>
            @foreach (range('A', 'Z') as $letter)
                <a href="{{ route('home', ['letter' => $letter]) }}"
                    class="nav-link {{ request('letter') === $letter ? 'active' : '' }}">
                    {{ $letter }}
                </a>
            @endforeach
        </div>

        <!-- Brand Grid -->
        <div class="row">
            @forelse($brands as $brand)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="brand-card">
                        @if ($brand->logo_url)
                            <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" class="img-fluid">
                        @else
                            <i class="fas fa-car fa-3x text-muted"></i>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No brands found</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
