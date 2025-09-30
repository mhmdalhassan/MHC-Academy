@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <h2>Show Internal Course</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('internal-courses.index') }}"><i
                    class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Header:</strong>
                    <p>{{ $internalCourse->header }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded"><strong>Description:</strong>
                    <p>{{ $internalCourse->description }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Students Enrolled:</strong>
                    <p>{{ $internalCourse->students_enrolled }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Expert Instructors:</strong>
                    <p>{{ $internalCourse->expert_instructors }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Projects Built:</strong>
                    <p>{{ $internalCourse->projects_built }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Completion Rate:</strong>
                    <p>{{ $internalCourse->completion_rate }}%</p>
                </div>
            </div>
        </div>
    </div>
@endsection