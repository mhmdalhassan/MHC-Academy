@extends('client.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-info text-center mb-4">Contact Us</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="p-4 rounded-4" style="background:#3B38A0;"
            data-aos="fade-up">
            @csrf

            <div class="mb-3">
                <label class="form-label text-white">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Phone</label>
                <input type="tel" name="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Category</label>
                <select name="category" id="categorySelect" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 d-none" id="productWrapper">
                <label class="form-label text-white">Course</label>
                <select name="product_id" id="productSelect" class="form-select">
                    <option value="">-- Select Course --</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('categorySelect').addEventListener('change', function () {
            let category = this.value;
            let productWrapper = document.getElementById('productWrapper');
            let productSelect = document.getElementById('productSelect');

            if (!category) {
                productWrapper.classList.add('d-none');
                return;
            }

            fetch(`/contact-us/products?category=${category}`)
                .then(res => res.json())
                .then(data => {
                    productSelect.innerHTML = '<option value="">-- Select Course --</option>';
                    if (Object.keys(data).length > 0) {
                        Object.entries(data).forEach(([id, name]) => {
                            let option = document.createElement('option');
                            option.value = id;
                            option.textContent = name;
                            productSelect.appendChild(option);
                        });
                        productWrapper.classList.remove('d-none');
                    } else {
                        productWrapper.classList.add('d-none');
                    }
                });
        });
    </script>
@endpush