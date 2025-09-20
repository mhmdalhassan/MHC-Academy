@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2>Show Offer</h2>
                <a class="btn btn-secondary btn-sm mt-2 mt-md-0" href="{{ route('offers.index') }}">Back</a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Name:</strong>
                    <p class="mb-0">{{ $offer->name }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Description:</strong>
                    <p class="mb-0">{{ $offer->description }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>Old Price:</strong>
                    <p class="mb-0">${{ number_format($offer->old_price, 2) }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>New Price:</strong>
                    <p class="mb-0">${{ number_format($offer->new_price, 2) }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Image:</strong><br>
                    @if($offer->image)
                        <img src="{{ asset('storage/' . $offer->image) }}" class="img-fluid mt-2" style="max-width:200px;">
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Active:</strong>
                    <p class="mb-0">{{ $offer->is_active ? 'Yes' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection