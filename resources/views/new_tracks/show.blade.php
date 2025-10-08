@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('new-tracks.index') }}" class="btn btn-secondary mb-3">Back</a>

        <h2>{{ $track->title }}</h2>
        <p>{{ $track->introduction }}</p>

        @if($track->image)
            <p><strong>Image:</strong><br>
                <img src="{{ asset('storage/' . $track->image) }}" width="150">
            </p>
        @endif

        <h4>Points</h4>
        <ul>
            @foreach($track->points ?? [] as $point)
                <li>{{ $point }}</li>
            @endforeach
        </ul>
    </div>
@endsection
