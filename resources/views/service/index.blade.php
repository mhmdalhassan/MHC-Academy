
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Manage Services</h2>

      

        @can('service-create')
            {{-- <a href="{{ route('services.create') }}" class="btn btn-success">Create New Service</a> --}}
        
          @if($services->count() == 0)
    <a href="{{ route('services.create') }}" class="btn btn-success">Create New Service</a>
@endif
 @endcan
    </div>
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Paragraph</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->header }}</td>
                        <td>{{ Str::limit($service->paragraph, 50) }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                @can('service-list')
                                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-sm">Show</a>
                                @endcan
                                @can('service-edit')
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                @endcan
                                @can('service-delete')
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
