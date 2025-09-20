@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Create New Offer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('offers.index') }}"> Back</a>
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

    <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Offer Name" required>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <strong>Old Price ($):</strong>
                    <input type="number" name="old_price" class="form-control" step="0.01" placeholder="Old Price">
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <strong>New Price ($):</strong>
                    <input type="number" name="new_price" class="form-control" step="0.01" placeholder="New Price">
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
                    <input type="hidden" name="is_active" value="0">
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