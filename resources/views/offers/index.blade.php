@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div
                class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h2 class="mb-2 mb-md-0">Offers</h2>
                @can('offer-create')
                    <a class="btn btn-success btn-sm mt-2 mt-md-0" href="{{ route('offers.create') }}">
                        <i class="fa fa-plus"></i> Create New Offer
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
                        <th style="width:60px;">No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Old Price</th>
                        <th>New Price</th>
                        <th>Active</th>
                        <th style="min-width:180px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $offer->name }}</td>
                            <td>
                                @if($offer->image)
                                    <img src="{{ asset('storage/' . $offer->image) }}" class="img-fluid" style="max-width:80px;">
                                @endif
                            </td>
                            <td>${{ number_format($offer->old_price, 2) }}</td>
                            <td>${{ number_format($offer->new_price, 2) }}</td>
                            <td>{{ $offer->is_active ? 'Yes' : 'No' }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column flex-sm-row justify-content-center gap-1">
                                    <a class="btn btn-info btn-sm" href="{{ route('offers.show', $offer->id) }}">
                                        <i class="fa-solid fa-list"></i> Show
                                    </a>

                                    @can('offer-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('offers.edit', $offer->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('offer-delete')
                                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this offer?');">
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
            {!! $offers->links('pagination::bootstrap-5') !!}
        </div>

        <p class="text-center text-primary mt-3"><small>Offers Module</small></p>
    </div>
@endsection