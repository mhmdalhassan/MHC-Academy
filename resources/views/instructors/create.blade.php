@extends('layouts.app')

@section('page-title', 'Add Instructor')

@section('content')
<div class="card">
    <div class="card-header"><h4>Add New Instructor</h4></div>
    <div class="card-body">
        <form action="{{ route('instructors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Number of Graduates</label>
                <input type="number" name="students_graduated" class="form-control" value="0">
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" step="0.1" max="5" min="0" name="rating" class="form-control" value="0">
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
