@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Image</h2>

    {{-- <form action="{{ route('home-banner.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        --}}
       
        <form action="{{ route('home-banner.update', $image) }}" method="POST" enctype="multipart/form-data">
   

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $image->title }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $image->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($image->image)
                <img src="{{ asset('storage/'.$image->image) }}" width="150" class="mt-2">
            @endif
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('home-banner.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
