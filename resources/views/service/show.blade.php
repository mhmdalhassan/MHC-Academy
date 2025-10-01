@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Service Details</h2>
    <a href="{{ route('services.index') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="mb-3">
        <strong>Header:</strong>
        <p>{{ $service->header }}</p>
    </div>

    <div class="mb-3">
        <strong>Paragraph:</strong>
        <p>{{ $service->paragraph }}</p>
    </div>

    <div class="mb-3">
        <strong>Cards:</strong>
        @if($service->cards && count($service->cards) > 0)
            <div class="row">
                @foreach($service->cards as $card)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            @if(!empty($card['image']))
                                <img src="{{ asset('storage/'.$card['image']) }}" class="card-img-top" alt="{{ $card['title'] }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $card['title'] }}</h5>
                                <p class="card-text">{{ $card['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <span class="text-muted">No cards available.</span>
        @endif
    </div>
</div>
@endsection
