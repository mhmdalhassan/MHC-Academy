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
                        <div class="col-md-4 mb-3 text-center">
                            <div class="card h-100 p-3">
                                <h5>{{ $card['title'] }}</h5>
                                <p>{{ $card['description'] }}</p>
                                @if(!empty($card['icon']))
                                    <i class="{{ $card['icon'] }} display-4"></i>
                                @endif
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
