@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Blogs</h2>
                @can('blog-create')
                    <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('blogs.create') }}">
                        <i class="fa fa-plus"></i> Create New Blog
                    </a>
                @endcan
            </div>
        </div>

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th style="min-width:180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid" style="max-width:80px;">
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('blogs.show', $blog->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('blog-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('blogs.edit', $blog->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('blog-delete')
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this blog?');">
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
            {!! $blogs->links('pagination::bootstrap-5') !!}
        </div>

        <p class="text-center text-primary mt-3"><small>Blogs Module</small></p>
    </div>
@endsection