@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Course Tracks</h2>

        @can('course-track-create')
            @if ($courseTracks->count() === 0)
                <a href="{{ route('course-tracks.create') }}" class="btn btn-success mb-3">
                    Add New Course Track
                </a>
            @endif
        @endcan

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($courseTracks->count() > 0)
            @php $track = $courseTracks->first(); @endphp
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Introduction</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $track->title }}</td>
                        <td>{{ $track->introduction }}</td>
                        <td>
                            <a href="{{ route('course-tracks.show', $track->id) }}" class="btn btn-info btn-sm">Show</a>
                            @can('course-track-edit')
                                <a href="{{ route('course-tracks.edit', $track->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @endcan
                            @can('course-track-delete')
                                <form action="{{ route('course-tracks.destroy', $track->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this course track?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection