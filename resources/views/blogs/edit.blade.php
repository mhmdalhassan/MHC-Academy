@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary btn-sm mb-2" href="{{ route('blogs.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <strong>Title:</strong>
            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <strong>Content:</strong>
            <textarea class="form-control" style="height:150px" name="content" required>{{ $blog->content }}</textarea>
        </div>

        <div class="form-group mb-3">
            <strong>Image:</strong><br>
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" width="120" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
