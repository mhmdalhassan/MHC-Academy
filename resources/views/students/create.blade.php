@extends('layouts.app')

@section('page-title', 'Add Student Review')

@section('content')
<div class="card">
    <div class="card-header"><h4>Add New Student Review</h4></div>
    <div class="card-body">
        <form action="{{ route('student-reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Details</label>
                <textarea name="details" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Rate</label>
                <input type="number" step="0.1" max="5" min="0" name="rate" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('student-reviews.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection