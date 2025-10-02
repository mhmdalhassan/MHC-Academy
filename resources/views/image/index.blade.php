@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Images</h2>

    @can('image-create')
        <a href="{{ route('home-banner.create') }}" class="btn btn-primary mb-3">Add New Image</a>
    @endcan

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->title }}</td>
                    <td>{{ $image->description }}</td>
                    <td>
                        @if($image->image)
                            <img src="{{ asset('storage/'.$image->image) }}" width="100">
                        @endif
                    </td>
                    <td>
                        @can('image-list')
                            <a href="{{ route('home-banner.show', $image->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>
                            </a>
                        @endcan
                        @can('image-edit')
                            <a href="{{ route('home-banner.edit', $image->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        
                            @endcan
                       

                        @can('image-delete')
                                    <form action="{{ route('home-banner.destroy', $image->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
