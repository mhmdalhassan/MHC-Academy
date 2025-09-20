@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Role Management</h2>
                @can('role-create')
                    <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('roles.create') }}">
                        <i class="fa fa-plus"></i> Create New Role
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
                        <th style="width:100px;">No</th>
                        <th>Name</th>
                        <th style="min-width:180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('role-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('role-delete')
                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this role?');">
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
            {!! $roles->links('pagination::bootstrap-5') !!}
        </div>

        <p class="text-center text-primary mt-3"><small>Role Module</small></p>
    </div>
@endsection
