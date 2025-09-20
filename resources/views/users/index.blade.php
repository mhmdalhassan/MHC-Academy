@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                @can('user-create')
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">
                        <i class="fa fa-plus"></i> Create New User
                    </a>
                @endcan
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $role)
                            <label class="badge bg-success">{{ $role }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this user?');">

                        <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">
                            <i class="fa-solid fa-list"></i> Show
                        </a>

                        @can('user-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('user-delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $data->links('pagination::bootstrap-5') !!}

    <p class="text-center text-primary"><small>Users Module</small></p>
@endsection