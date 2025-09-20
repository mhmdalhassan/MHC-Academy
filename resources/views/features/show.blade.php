@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2> Show Feature</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('features.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $feature->name }}
            </div>
        </div>

        <div class="col-md-12 mb-2">
            <div class="form-group">
                <strong>Image:</strong><br>
                @if($feature->image)
                    <img src="{{ asset('storage/' . $feature->image) }}" width="150">
                @endif
            </div>
        </div>

        <div class="col-md-12 mb-2">
            <div class="form-group">
                <strong>Active:</strong>
                {{ $feature->is_active ? 'Yes' : 'No' }}
            </div>
        </div>
    </div>
@endsection