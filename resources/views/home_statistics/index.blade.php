@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Home Statistics</h2>

    @can('home-statistic-create')
        @if ($homeStatistics->count() === 0)
            <a href="{{ route('home-statistics.create') }}" class="btn btn-success mb-3">
                Add New Home Statistic
            </a>
        @endif
    @endcan

    @session('success')
        <div class="alert alert-success">{{ session('success') }}</div>
    @endsession

    @if ($homeStatistics->count() > 0)
        @php $stat = $homeStatistics->first(); @endphp
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
                    <td>{{ $stat->title }}</td>
                    <td>{{ $stat->introduction }}</td>
                    <td>
                        <a href="{{ route('home-statistics.show', $stat->id) }}" class="btn btn-info btn-sm">Show</a>
                        @can('home-statistic-edit')
                            <a href="{{ route('home-statistics.edit', $stat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endcan
                        @can('home-statistic-delete')
                            <form action="{{ route('home-statistics.destroy', $stat->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this statistic?');">
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
