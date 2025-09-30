@extends('layouts.app')

@section('page-title', 'Instructor Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $instructor->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $instructor->email }}</p>
            <p><strong>Title:</strong> {{ $instructor->title ?? '—' }}</p>
            <p><strong>Description:</strong> {{ $instructor->description ?? '—' }}</p>
            <p><strong>Number of Graduates:</strong> {{ $instructor->students_graduated ?? 0 }}</p>
            <p><strong>Rating:</strong>
                @if($instructor->rating)
                    {{ $instructor->rating }} ⭐
                @else
                    <span class="text-muted">No rating</span>
                @endif
            </p>
            <p>
                <strong>Image:</strong><br>
                @if($instructor->image)
                    <img src="{{ asset('storage/' . $instructor->image) }}" class="img-fluid rounded" width="200">
                @else
                    <span class="text-muted">No image</span>
                @endif
            </p>

            <a href="{{ route('instructors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
@endsection