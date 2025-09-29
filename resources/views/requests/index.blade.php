@extends('layouts.app')

@section('title', 'Requests')

@section('content')

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

<div class="row">
    @if($requests->isEmpty())
        <div class="col-12">
            <div class="alert alert-info text-center">
                <h4>No requests yet</h4>
                <p>When clients contact you through the contact form, their requests will appear here.</p>
            </div>
        </div>
    @else
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


                        <div class="d-flex justify-content-between mt-3">
                        <!-- Send Email Button -->
                        <form action="{{ route('requests.sendMail', $request->id) }}" 
                              method="POST" 
                              class="mt-2"
                              onsubmit="return confirm('Do you want to send this email?');">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Send Email</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('requests.destroy', $request->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this request?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<!-- Pagination -->
<div class="mt-3">
    {{ $requests->links() }}
</div>

@endsection
