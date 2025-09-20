@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit Feature</h2>
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

    <form action="{{ route('features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $feature->name }}" class="form-control" required>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control">
                    @if($feature->image)
                        <img src="{{ asset('storage/' . $feature->image) }}" width="100" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-check">
                    <!-- Always send 0 if checkbox unchecked -->
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $feature->is_active ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
            </div>


            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection