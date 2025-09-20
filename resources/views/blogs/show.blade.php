@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2>Show Blog</h2>
                <a class="btn btn-secondary btn-sm mt-2 mt-md-0" href="{{ route('blogs.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Title:</strong>
                    <p class="mb-0">{{ $blog->title }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Content:</strong>
                    <p class="mb-0">{{ $blog->content }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Image:</strong><br>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mt-2" style="max-width:300px;">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection