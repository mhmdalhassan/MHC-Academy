@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2>Show Product</h2>
                <a class="btn btn-secondary btn-sm mt-2 mt-md-0" href="{{ route('products.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>Name:</strong>
                    <p class="mb-0">{{ $product->name }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>Price:</strong>
                    <p class="mb-0">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>Duration:</strong>
                    <p class="mb-0">{{ $product->duration }} Months</p>
                </div>
            </div>


            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Detail:</strong>
                    <p class="mb-0">{{ $product->detail }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Image:</strong><br>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mt-2" style="max-width:200px;">
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Category:</strong>
                    <p class="mb-0">{{ $product->category }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection