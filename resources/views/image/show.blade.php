@extends('layouts.app')

@section('content')
<div class="container">
    <h2>View Image</h2>

    <div class="mb-3">
        <strong>Title:</strong> {{ $image->title }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $image->description }}
    </div>

    <div class="mb-3">
        <strong>Image:</strong><br>
        @if($image->image)
            <img src="{{ asset('storage/'.$image->image) }}" width="300">
        @endif
    </div>

    <a href="{{ route('home-banner.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
