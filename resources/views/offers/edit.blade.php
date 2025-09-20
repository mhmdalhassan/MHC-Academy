@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit Offer</h2>
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

    <form action="{{ route('offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $offer->name }}" class="form-control" required>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control">{{ $offer->description }}</textarea>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <strong>Old Price ($):</strong>
                    <input type="number" name="old_price" value="{{ $offer->old_price }}" class="form-control" step="0.01">
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <strong>New Price ($):</strong>
                    <input type="number" name="new_price" value="{{ $offer->new_price }}" class="form-control" step="0.01">
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control">
                    @if($offer->image)
                        <img src="{{ asset('storage/' . $offer->image) }}" width="100" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $offer->is_active ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection