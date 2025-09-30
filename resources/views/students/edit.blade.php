@extends('layouts.app')

@section('page-title', 'Edit Student Review')

@section('content')
<div class="card">
    <div class="card-header"><h4>Edit Student Review</h4></div>
    <div class="card-body">
        <form action="{{ route('student-reviews.update', $studentReview->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $studentReview->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $studentReview->title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Details</label>
                <textarea name="details" class="form-control" rows="4">{{ $studentReview->details }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Rate</label>
                <input type="number" step="0.1" max="5" min="0" name="rate" value="{{ $studentReview->rate }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if($studentReview->image)
                    <img src="{{ asset('storage/'.$studentReview->image) }}" width="120" class="mt-2 rounded">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('student-reviews.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection