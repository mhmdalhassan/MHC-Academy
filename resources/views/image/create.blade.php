@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Image</h2>

    <form action="{{ route('home-banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('home-banner.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
