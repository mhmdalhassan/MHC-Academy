@extends('layouts.app')

@section('page-title', 'Student Reviews')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Student Reviews</h4>
        @can('student-review-create')
            <a href="{{ route('student-reviews.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Student Review
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
                        <th>Title</th>
                        <th>Rate</th>
                        <th>Image</th>
                        <th width="220px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($studentReviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->title }}</td>
                            <td>{{ $review->rate }} ⭐</td>
                            <td>
                                @if($review->image)
                                    <img src="{{ asset('storage/'.$review->image) }}" width="60" class="rounded">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('student-reviews.show', $review->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('student-review-edit')
                                    <a href="{{ route('student-reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('student-review-delete')
                                    <form action="{{ route('student-reviews.destroy', $review->id) }}" 
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
                            <td colspan="6" class="text-center text-muted">No student reviews found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection