@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2>Show Role</h2>
                <a class="btn btn-primary btn-sm mt-2 mt-md-0" href="{{ route('roles.index') }}">Back</a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>Name:</strong>
                    <p class="mb-0">{{ $role->name }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded">
                    <strong>Permissions:</strong>
                    <div class="mt-1">
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $permission)
                                <span class="badge bg-success me-1">{{ $permission->name }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">No Permissions Assigned</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection