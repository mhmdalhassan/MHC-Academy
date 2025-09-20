@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2>Show Feature</h2>
                <a class="btn btn-secondary btn-sm mt-2 mt-md-0" href="{{ route('features.index') }}">Back</a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Name:</strong>
                    <p class="mb-0">{{ $feature->name }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Image:</strong><br>
                    @if($feature->image)
                        <img src="{{ asset('storage/' . $feature->image) }}" class="img-fluid mt-2" style="max-width:200px;">
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Active:</strong>
                    <p class="mb-0">{{ $feature->is_active ? 'Yes' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection