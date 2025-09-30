{{-- @extends('layouts.app')

@section('page-title', 'Instructors')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Instructors</h4>
        @can('instructor-create')
            <a href="{{ route('instructors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Instructor
            </a>
        @endcan
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Graduates</th>
                        <th>Rating</th>
                        <th>Image</th>
                        <th width="220px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($instructors as $instructor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $instructor->name }}</td>
                            <td>{{ $instructor->email }}</td>
                            <td>{{ $instructor->title }}</td>
                            <td>{{ $instructor->graduates }}</td>
                            <td>{{ $instructor->rating }} ⭐</td>
                            <td>
                                @if($instructor->image)
                                    <img src="{{ asset('storage/'.$instructor->image) }}" width="60" class="rounded">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('instructors.show', $instructor->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('instructor-edit')
                                    <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('instructor-delete')
                                    <form action="{{ route('instructors.destroy', $instructor->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No instructors found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}









@extends('layouts.app')

@section('page-title', 'Instructors')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Instructors</h4>
        @can('instructor-create')
            <a href="{{ route('instructors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Instructor
            </a>
        @endcan
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Graduates</th>
                        <th>Rating</th>
                        <th>Image</th>
                        <th width="220px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($instructors as $instructor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $instructor->name }}</td>
                            <td>{{ $instructor->email }}</td>
                            <td>{{ $instructor->title }}</td>
                            <td>{{ $instructor->students_graduated }}</td>
                            <td>{{ $instructor->rating }} ⭐</td>
                            <td>
                                @if($instructor->image)
                                    <img src="{{ asset('storage/'.$instructor->image) }}" width="60" class="rounded">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('instructors.show', $instructor->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('instructor-edit')
                                    <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('instructor-delete')
                                    <form action="{{ route('instructors.destroy', $instructor->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No instructors found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection