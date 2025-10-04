@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>New Tracks</h2>

        @can('new-track-create')
            <a href="{{ route('new-tracks.create') }}" class="btn btn-success mb-3">Add New Track</a>
        @endcan

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($newTracks->count() > 0)
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
                    @foreach($newTracks as $index => $track)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $track->title }}</td>
                            <td>{{ $track->introduction }}</td>
                            <td>
                                <a href="{{ route('new-tracks.show', $track->id) }}" class="btn btn-info btn-sm">Show</a>
                                @can('new-track-edit')
                                    <a href="{{ route('new-tracks.edit', $track->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                @endcan
                                @can('new-track-delete')
                                    <form action="{{ route('new-tracks.destroy', $track->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Delete this track?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection