@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <h2>Show Product</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Name:</strong>
                    <p>{{ $product->name }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Price:</strong>
                    <p>${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Duration:</strong>
                    <p>{{ $product->duration }} Months</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Difficulty:</strong>
                    <p>{{ $product->difficulty }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Lessons:</strong>
                    <p>{{ $product->lessons }}</p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Enrolled Students:</strong>
                    <p>{{ $product->enrolled_count }}</p>
                </div>
            </div>

            {{-- Rating --}}
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded">
                    <strong>Rating:</strong><br>
                    @php
                        $rating = $product->rating ?? 0;
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                        $emptyStars = 5 - $fullStars - $halfStar;
                    @endphp

                    @for ($i = 0; $i < $fullStars; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor

                    @if ($halfStar)
                        <span class="fa fa-star-half-o checked"></span>
                    @endif

                    @for ($i = 0; $i < $emptyStars; $i++)
                        <span class="fa fa-star"></span>
                    @endfor

                    <span class="ms-2">({{ number_format($rating, 1) }})</span>
                </div>
            </div>

            <style>
                .fa-star,
                .fa-star-half-o {
                    color: #ccc;
                    font-size: 1.2rem;
                }

                .checked {
                    color: #ffc107;
                }
            </style>


            <div class="col-12">
                <div class="p-3 border rounded"><strong>Welcome Video:</strong>
                    <p><a href="{{ $product->welcome_video_url }}" target="_blank">{{ $product->welcome_video_url }}</a></p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Overview Video:</strong>
                    <p><a href="{{ $product->overview_video_url }}" target="_blank">{{ $product->overview_video_url }}</a>
                    </p>
                </div>
            </div>

            {{-- Core Concepts --}}
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Core Concepts:</strong>
                    <ul>
                        @php
                            $concepts = is_array($product->core_concepts) ? $product->core_concepts : json_decode($product->core_concepts ?? '[]', true);
                        @endphp
                        @forelse($concepts as $concept)
                            <li>{{ $concept }}</li>
                        @empty
                            <li class="text-muted">No core concepts provided.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded"><strong>Detail:</strong>
                    <p>{{ $product->detail }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Image:</strong><br>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mt-2" style="max-width:200px;">
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="p-3 border rounded"><strong>Category:</strong>
                    <p>{{ $product->category }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection