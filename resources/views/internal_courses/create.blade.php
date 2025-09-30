@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Add New Internal Course</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('internal-courses.index') }}"><i
                    class="fa fa-arrow-left"></i> Back</a>
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

    <form action="{{ route('internal-courses.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <strong>Header:</strong>
                <input type="text" name="header" class="form-control" value="{{ old('header') }}"
                    placeholder="Course Header" required>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Description:</strong>
                <textarea name="description" class="form-control" rows="3"
                    placeholder="Description">{{ old('description') }}</textarea>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Students Enrolled:</strong>
                <input type="number" name="students_enrolled" class="form-control" value="{{ old('students_enrolled', 0) }}"
                    min="0" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Expert Instructors:</strong>
                <input type="number" name="expert_instructors" class="form-control"
                    value="{{ old('expert_instructors', 0) }}" min="0" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Projects Built:</strong>
                <input type="number" name="projects_built" class="form-control" value="{{ old('projects_built', 0) }}"
                    min="0" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Completion Rate (%):</strong>
                <input type="number" step="0.01" name="completion_rate" class="form-control"
                    value="{{ old('completion_rate', 0) }}" min="0" max="100" required>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
        </div>
    </form>
@endsection