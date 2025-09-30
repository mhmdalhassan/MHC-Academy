@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Edit Footer</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('footer.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
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

    <form action="{{ route('footer.update', $footer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-2">
                <strong>Name of Academy:</strong>
                <input type="text" name="name" class="form-control" value="{{ old('name', $footer->name) }}" required>
            </div>
            <div class="col-md-6 mb-2">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" value="{{ old('email', $footer->email) }}">
            </div>
            <div class="col-md-6 mb-2">
                <strong>Phone Number:</strong>
                <input type="text" name="phone_number" class="form-control"
                    value="{{ old('phone_number', $footer->phone_number) }}">
            </div>
            <div class="col-md-12 mb-2">
                <strong>Description:</strong>
                <textarea name="description" class="form-control"
                    rows="3">{{ old('description', $footer->description) }}</textarea>
            </div>

            {{-- Links --}}
            @foreach (['linkedin', 'facebook', 'instagram', 'twitter', 'youtube', 'github', 'privacy_policy', 'terms_of_service'] as $field)
                <div class="col-md-6 mb-2">
                    <strong>{{ ucfirst(str_replace('_', ' ', $field)) }}:</strong>
                    <input type="url" name="{{ $field }}" class="form-control" value="{{ old($field, $footer->$field) }}">
                </div>
            @endforeach

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </div>
        </div>
    </form>
@endsection
