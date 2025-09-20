@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2> Show Offer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('offers.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-2">
            <strong>Name:</strong> {{ $offer->name }}
        </div>

        <div class="col-md-12 mb-2">
            <strong>Description:</strong> {{ $offer->description }}
        </div>

        <div class="col-md-6 mb-2">
            <strong>Old Price:</strong> ${{ number_format($offer->old_price, 2) }}
        </div>

        <div class="col-md-6 mb-2">
            <strong>New Price:</strong> ${{ number_format($offer->new_price, 2) }}
        </div>

        <div class="col-md-12 mb-2">
            <strong>Image:</strong><br>
            @if($offer->image)
                <img src="{{ asset('storage/' . $offer->image) }}" width="150">
            @endif
        </div>

        <div class="col-md-12 mb-2">
            <strong>Active:</strong> {{ $offer->is_active ? 'Yes' : 'No' }}
        </div>
    </div>
@endsection