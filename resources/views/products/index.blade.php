@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Products</h2>
                @can('product-create')
                    <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('products.create') }}">
                        <i class="fa fa-plus"></i> Create New Product
                    </a>
                @endcan
            </div>
        </div>

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Difficulty</th>
                        <th>Lessons</th>
                        <th style="min-width:180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-width:80px;">
                                @endif
                            </td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->category }}</td>
                            <td>
                                {{ $product->duration }} {{ $product->duration > 1 ? 'months' : 'month' }}
                            </td>
                            <td>{{ $product->difficulty }}</td>
                            <td>{{ $product->lessons }}</td>

                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('product-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('product-delete')
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! $products->links('pagination::bootstrap-5') !!}
        </div>

        <p class="text-center text-primary mt-3"><small>Products Module</small></p>
    </div>
@endsection