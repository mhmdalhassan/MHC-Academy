@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blogs</h2>
            </div>
            <div class="pull-right">
                @can('blog-create')
                    <a class="btn btn-success btn-sm mb-2" href="{{ route('blogs.create') }}">
                        <i class="fa fa-plus"></i> Create New Blog
                    </a>
                @endcan
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $blog->title }}</td>
                <td>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this blog?')">
                        <a class="btn btn-info btn-sm" href="{{ route('blogs.show', $blog->id) }}"><i
                                class="fa-solid fa-list"></i> Show</a>
                        @can('blog-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('blogs.edit', $blog->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('blog-delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        @endcan
                    </form>

                </td>
            </tr>
        @endforeach
    </table>

    {!! $blogs->links() !!}

    <p class="text-center text-primary"><small>Blogs Module</small></p>
@endsection