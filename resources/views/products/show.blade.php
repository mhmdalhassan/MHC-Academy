@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <h2>Show Product</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Name:</strong>
                    <p>{{ $product->name }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Price:</strong>
                    <p>${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Duration:</strong>
                    <p>{{ $product->duration }} Months</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Difficulty:</strong>
                    <p>{{ $product->difficulty }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Lessons:</strong>
                    <p>{{ $product->lessons }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Enrolled Students:</strong>
                    <p>{{ $product->enrolled_count }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Rating:</strong>
                    <p>{{ $product->rating }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Welcome Video:</strong>
                    <p>{{ $product->welcome_video_url }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Overview Video:</strong>
                    <p>{{ $product->overview_video_url }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Core Concepts:</strong>
                    <ul>
                        @if($product->core_concepts)
                            @foreach($product->core_concepts as $concept)
                                <li>{{ $concept }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Detail:</strong>
                    <p>{{ $product->detail }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Image:</strong><br>@if($product->image)<img
                    src="{{ asset('storage/' . $product->image) }}" class="img-fluid mt-2"
                style="max-width:200px;">@endif
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Category:</strong>
                    <p>{{ $product->category }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
