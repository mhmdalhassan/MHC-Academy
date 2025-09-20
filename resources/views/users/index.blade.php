@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Users Management</h2>
                @can('user-create')
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">
                        <i class="fa fa-plus"></i> Create New User
                    </a>
                @endcan
            </div>
        </div>

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th class="text-center" style="min-width: 180px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $role)
                                        <span class="badge bg-success">{{ $role }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('user-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('user-delete')
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
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
            {!! $data->links('pagination::bootstrap-5') !!}
        </div>

        <p class="text-center text-primary mt-3"><small>Users Module</small></p>
    </div>
@endsection