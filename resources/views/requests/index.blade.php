@extends('layouts.app')

@section('title', 'Requests')

@section('content')

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

<div class="row">
    @foreach($requests as $request)
        <div class="col-md-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $request->name }}</h5>
                    <p><strong>Email:</strong> {{ $request->email }}</p>
                    <p><strong>Phone:</strong> {{ $request->phone }}</p>
                    <p><strong>Product:</strong> {{ $request->product->name ?? $request->product_id }}</p>
                    <p><strong>Category:</strong> {{ $request->category }}</p>
                    <p><strong>Message:</strong><br>{{ $request->description }}</p>
                    <small class="text-muted">Sent: {{ $request->created_at->format('d M Y - H:i') }}</small>

                    <form action="{{ route('requests.sendMail', $request->id) }}" 
                          method="POST" 
                          class="mt-2"
                          onsubmit="return confirm('Do you whant to send this?');">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
