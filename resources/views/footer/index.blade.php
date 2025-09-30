@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Footer</h2>

                @can('footer-create')
                    @if($footers->count() == 0)
                        <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('footer.create') }}">
                            <i class="fa fa-plus"></i> Create New Footer
                        </a>
                    @endif
                @endcan
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Academy Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th style="min-width:180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($footers as $footer)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $footer->name }}</td>
                            <td>{{ $footer->email }}</td>
                            <td>{{ $footer->phone_number }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('footer.show', $footer->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('footer-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('footer.edit', $footer->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('footer-delete')
                                        <form action="{{ route('footer.destroy', $footer->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this footer?');">
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
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No footer information available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="text-center text-primary mt-3"><small>Footer Module</small></p>
    </div>
@endsection