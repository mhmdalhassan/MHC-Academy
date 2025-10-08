@extends('layouts.app')

@section('content')
    <a href="{{ route('home-statistics.index') }}" class="btn btn-secondary mb-3">Back</a>
    <div class="container">
        <h2>{{ $homeStatistic->title }}</h2>
        <p>{{ $homeStatistic->introduction }}</p>

        <h4>Cards</h4>
        @foreach ($homeStatistic->cards as $card)
            <div class="card mb-2 p-2 border">
                <p><strong>Number:</strong> {{ $card['card_number'] ?? '' }}</p>
                <p><strong>Name:</strong> {{ $card['card_name'] ?? '' }}</p>
                <p><strong>Description:</strong> {{ $card['card_description'] ?? '' }}</p>
            </div>
        @endforeach
    </div>
@endsection
