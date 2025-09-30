@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Internal Courses</h2>
                @can('internal-course-create')
                    @if ($internalCourses->count() === 0)
                        <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('internal-courses.create') }}">
                            <i class="fa fa-plus"></i> Create New Internal Course
                        </a>
                    @endif
                @endcan

            </div>
        </div>

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Header</th>
                        <th>Students Enrolled</th>
                        <th>Expert Instructors</th>
                        <th>Projects Built</th>
                        <th>Completion Rate (%)</th>
                        <th style="min-width:180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internalCourses as $course)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $course->header }}</td>
                            <td>{{ $course->students_enrolled }}</td>
                            <td>{{ $course->expert_instructors }}</td>
                            <td>{{ $course->projects_built }}</td>
                            <td>{{ $course->completion_rate }}%</td>

                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('internal-courses.show', $course->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('internal-course-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('internal-courses.edit', $course->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('internal-course-delete')
                                        <form action="{{ route('internal-courses.destroy', $course->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this internal course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! $internalCourses->links('pagination::bootstrap-5') !!}
        </div>

        <p class="text-center text-primary mt-3"><small>Internal Courses Module</small></p>
    </div>
@endsection
