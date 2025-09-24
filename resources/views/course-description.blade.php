@extends('client.app')

@section('content')
    <section class="container my-5">
        <div class="row g-4 align-items-center">
            {{-- TEXT (left) --}}
            <div class="col-lg-6 order-lg-1">
                <h1 class="fw-bold mb-2">{{ $product->name }}</h1>
                <p class="text-muted mb-3">{{ $product->category ?? '' }}</p>

                <div class="mb-4">
                    <span class="badge bg-info text-dark me-2">{{ $product->duration }}
                        {{ $product->duration > 1 ? 'months' : 'month' }}</span>
                    <span
                        class="h4 text-white bg-dark px-3 py-2 rounded">{{ '$' . number_format($product->price, 2) }}</span>
                </div>

                <p class="lead text-secondary">{!! nl2br(e($product->detail ?? 'No description available.')) !!}</p>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('course') }}" class="btn btn-outline-light">← Back to Courses</a>
                    <a href="#" class="btn btn-info">Enroll Now</a>
                </div>
            </div>

            {{-- IMAGE (right) --}}
            <div class="col-lg-6 order-lg-2 text-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-fluid rounded-4 shadow-lg" loading="lazy"
                        style="object-fit:cover; max-height:520px; width:100%;">
                @else
                    <div class="rounded-4 bg-secondary d-flex align-items-center justify-content-center" style="height:420px;">
                        <span class="text-white">No image available</span>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection