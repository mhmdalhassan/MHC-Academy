@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Add Hero Section</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('hero-sections.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There are some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hero-sections.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <strong>Header:</strong>
                <input type="text" name="header" class="form-control" value="{{ old('header') }}" required>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Introduction:</strong>
                <textarea name="introduction" class="form-control" rows="3" required>{{ old('introduction') }}</textarea>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Button 1 Name:</strong>
                <input type="text" name="button1_name" class="form-control" value="{{ old('button1_name') }}">
            </div>

            <div class="col-md-6 mb-2">
                <strong>Button 1 Route:</strong>
                <input type="text" name="button1_route" class="form-control" value="{{ old('button1_route') }}">
            </div>

            <div class="col-md-6 mb-2">
                <strong>Button 2 Name:</strong>
                <input type="text" name="button2_name" class="form-control" value="{{ old('button2_name') }}">
            </div>

            <div class="col-md-6 mb-2">
                <strong>Button 2 Route:</strong>
                <input type="text" name="button2_route" class="form-control" value="{{ old('button2_route') }}">
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
        </div>
    </form>
@endsection