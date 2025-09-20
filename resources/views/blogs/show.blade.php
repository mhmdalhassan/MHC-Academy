@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary btn-sm mb-2" href="{{ route('blogs.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <strong>Title:</strong>
        {{ $blog->title }}
    </div>

    <div class="form-group mb-3">
        <strong>Content:</strong>
        {{ $blog->content }}
    </div>

    <div class="form-group mb-3">
        <strong>Image:</strong><br>
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" width="300">
        @endif
    </div>
@endsection
