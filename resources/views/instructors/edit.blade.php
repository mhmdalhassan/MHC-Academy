@extends('layouts.app')

@section('page-title', 'Edit Instructor')

@section('content')
<div class="card">
    <div class="card-header"><h4>Edit Instructor</h4></div>
    <div class="card-body">
        <form action="{{ route('instructors.update', $instructor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $instructor->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $instructor->email }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $instructor->title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $instructor->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Number of Graduates</label>
                <input type="number" name="students_graduated" value="{{ $instructor->students_graduated }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" step="0.1" max="5" min="0" name="rating" value="{{ $instructor->rating }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if($instructor->image)
                    <img src="{{ asset('storage/'.$instructor->image) }}" width="120" class="mt-2 rounded">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
