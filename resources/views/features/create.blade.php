@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Create New Feature</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('features.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There are some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Feature Name" required>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-check">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
                    <label class="form-check-label">Active</label>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection