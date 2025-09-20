@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-2">
            <strong>Name:</strong> {{ $product->name }}
        </div>
        <div class="col-md-6 mb-2">
            <strong>Price:</strong> ${{ number_format($product->price, 2) }}
        </div>
        <div class="col-md-12 mb-2">
            <strong>Detail:</strong> {{ $product->detail }}
        </div>
        <div class="col-md-12 mb-2">
            <strong>Image:</strong><br>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="150">
            @endif
        </div>
        <div class="col-md-12 mb-2">
            <strong>Category:</strong> {{ $product->category }}
        </div>
    </div>
@endsection
