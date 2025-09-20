@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Features</h2>
            </div>
            <div class="pull-right">
                @can('feature-create')
                    <a class="btn btn-success btn-sm" href="{{ route('features.create') }}">
                        <i class="fa fa-plus"></i> Create New Feature
                    </a>
                @endcan
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endsession

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($features as $feature)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $feature->name }}</td>
                <td>
                    @if($feature->image)
                        <img src="{{ asset('storage/' . $feature->image) }}" width="80">
                    @endif
                </td>
                <td>{{ $feature->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <form action="{{ route('features.destroy', $feature->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this feature?')">
                        <a class="btn btn-info btn-sm" href="{{ route('features.show', $feature->id) }}">
                            <i class="fa-solid fa-list"></i> Show
                        </a>
                        @can('feature-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('features.edit', $feature->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('feature-delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $features->links() !!}

    <p class="text-center text-primary"><small>Features Module</small></p>
@endsection