@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <h2>Show Footer</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('footer.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3 border rounded"><strong>Name of Academy:</strong>
                    <p>{{ $footer->name }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded"><strong>Email:</strong>
                    <p>{{ $footer->email }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded"><strong>Phone Number:</strong>
                    <p>{{ $footer->phone_number }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Description:</strong>
                    <p>{{ $footer->description }}</p>
                </div>
            </div>

            {{-- Links --}}
            @foreach (['linkedin', 'facebook', 'instagram', 'twitter', 'youtube', 'github', 'privacy_policy', 'terms_of_service'] as $field)
                <div class="col-md-6">
                    <div class="p-3 border rounded"><strong>{{ ucfirst(str_replace('_', ' ', $field)) }}:</strong>
                        <p>
                            @if($footer->$field)
                                <a href="{{ $footer->$field }}" target="_blank">{{ $footer->$field }}</a>
                            @else
                                <span class="text-muted">Not provided</span>
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
