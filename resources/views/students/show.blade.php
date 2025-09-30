@extends('layouts.app')

@section('page-title', 'Student Review Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{ $studentReview->name }}</h4>
    </div>
    <div class="card-body">
        <p><strong>Title:</strong> {{ $studentReview->title }}</p>
        <p><strong>Details:</strong> {{ $studentReview->details }}</p>
        <p><strong>Rate:</strong> {{ $studentReview->rate }} ⭐</p>
        <p>
            <strong>Image:</strong><br>
            @if($studentReview->image)
                <img src="{{ asset('storage/'.$studentReview->image) }}" class="img-fluid rounded" width="200">
            @else
                <span class="text-muted">No image</span>
            @endif
        </p>
        <a href="{{ route('student-reviews.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>
@endsection