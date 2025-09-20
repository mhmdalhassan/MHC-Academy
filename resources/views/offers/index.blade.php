@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Offers</h2>
            </div>
            <div class="pull-right">
                @can('offer-create')
                    <a class="btn btn-success btn-sm" href="{{ route('offers.create') }}">
                        <i class="fa fa-plus"></i> Create New Offer
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
            <th>Old Price</th>
            <th>New Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($offers as $offer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $offer->name }}</td>
                <td>
                    @if($offer->image)
                        <img src="{{ asset('storage/' . $offer->image) }}" width="80">
                    @endif
                </td>
                <td>{{ $offer->is_active ? 'Yes' : 'No' }}</td>
                <td>${{ number_format($offer->old_price, 2) }}</td>
                <td>${{ number_format($offer->new_price, 2) }}</td>
                <td>
                    <form action="{{ route('offers.destroy', $offer->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this offer?')">
                        <a class="btn btn-info btn-sm" href="{{ route('offers.show', $offer->id) }}">
                            <i class="fa-solid fa-list"></i> Show
                        </a>
                        @can('offer-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('offers.edit', $offer->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                        @endcan

                        @csrf
                        @method('DELETE')

                        @can('offer-delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $offers->links() !!}

    <p class="text-center text-primary"><small>Offers Module</small></p>
@endsection