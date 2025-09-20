@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Blog</h2>
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

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="form-group mb-3">
            <strong>Content:</strong>
            <textarea class="form-control" style="height:150px" name="content" placeholder="Enter content"
                required></textarea>
        </div>

        <div class="form-group mb-3">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
