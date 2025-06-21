@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Product List</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('product.all') }}" class="btn btn-success" title="Export PDF">Export PDF
                    <i class="bi bi-file-earmark-arrow-down"></i>
                </a>
                <a href="{{ route('product.create') }}" class="btn btn-primary" title="Create Product">Create
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div>
        <form method="GET" action="{{ route('product.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search product..."
                    value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $index }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->deleted_at)
                                <span class="badge bg-danger">Deleted</span>
                                <form action="{{ route('product.restore', $product->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    <button class="btn btn-sm btn-info" title="Restore"
                                        onclick="return confirm('Restore this product?')">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-success">Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Delete"
                                    onclick="return confirm('Delete this product?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <a href="{{ route('product.export', $product->id) }}" class="btn btn-sm btn-success"
                                title="Export PDF">
                                <i class="bi bi-file-earmark-arrow-down"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->withQueryString()->links() }}
    </div>
@endsection