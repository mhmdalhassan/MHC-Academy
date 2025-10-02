@extends('layouts.app')

@section('content')
    <a href="{{ route('course-tracks.index') }}" class="btn btn-secondary mb-3">Back</a>
    <div class="container">
        <h2>{{ $courseTrack->title }}</h2>
        <p>{{ $courseTrack->introduction }}</p>

        <h4>Cards</h4>
        @foreach ($courseTrack->cards as $card)
            <div class="card mb-2 p-2 border">
                @if(!empty($card['image']))
                    <p><strong>Image:</strong><br>
                        <img src="{{ asset('storage/' . $card['image']) }}" alt="Card Image" width="100">
                    </p>
                @endif
                <p><strong>Name:</strong> {{ $card['name'] ?? '' }}</p>
                <p><strong>Icon:</strong> {{ $card['image_icon'] ?? '' }}</p>
                <p><strong>Description:</strong> {{ $card['description'] ?? '' }}</p>
            </div>
        @endforeach
    </div>
@endsection