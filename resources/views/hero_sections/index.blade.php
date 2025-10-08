@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Hero Section</h2>
                @can('hero-section-create')
                    @if ($heroSections->count() === 0)
                        <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('hero-sections.create') }}">
                            <i class="fa fa-plus"></i> Create Hero Section
                        </a>
                    @endif
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
                        <th>Header</th>
                        <th>Introduction</th>
                        <th>Button 1</th>
                        <th>Button 2</th>
                        <th class="text-center" style="min-width:180px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($heroSections as $section)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $section->header }}</td>
                            <td>{{ Str::limit($section->introduction, 50) }}</td>
                            <td>{{ $section->button1_name }} ({{ $section->button1_route }})</td>
                            <td>{{ $section->button2_name }} ({{ $section->button2_route }})</td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('hero-sections.show', $section->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('hero-section-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('hero-sections.edit', $section->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('hero-section-delete')
                                        <form action="{{ route('hero-sections.destroy', $section->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this hero section?');">
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

        <p class="text-center text-primary mt-3"><small>Hero Section Module</small></p>
    </div>
@endsection