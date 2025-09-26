@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                    Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There are some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-2">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Price ($):</strong>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" step="0.01" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Duration :</strong>
                <div class="input-group">
                    <input type="number" name="duration" value="{{ $product->duration }}" class="form-control" required>
                    <span class="input-group-text">Months</span>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Difficulty:</strong>
                <select name="difficulty" class="form-control" required>
                    <option value="Beginner" {{ $product->difficulty == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ $product->difficulty == 'Intermediate' ? 'selected' : '' }}>Intermediate
                    </option>
                    <option value="Advanced" {{ $product->difficulty == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Lessons:</strong>
                <input type="number" name="lessons" value="{{ $product->lessons }}" class="form-control" min="0" required>
            </div>



            <div class="col-md-12 mb-2">
                <strong>Detail:</strong>
                <textarea name="detail" class="form-control" rows="4">{{ $product->detail }}</textarea>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
                @endif
            </div>

            <select name="category" class="form-control">
                <option value="">-- Select Category --</option>
                <option value="Web Development" {{ $product->category == 'Web Development' ? 'selected' : '' }}>Web
                    Development</option>
                <option value="Mobile Application" {{ $product->category == 'Mobile Application' ? 'selected' : '' }}>Mobile
                    Application</option>
                <option value="Artificial Intelligence" {{ $product->category == 'Artificial Intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                <option value="Computer Engineering" {{ $product->category == 'Computer Engineering' ? 'selected' : '' }}>
                    Computer Engineering
                </option>
                <option value="Data Analysis" {{ $product->category == 'Data Analysis' ? 'selected' : '' }}>Data Analysis
                </option>
                <option value="Cybersecurity" {{ $product->category == 'Cybersecurity' ? 'selected' : '' }}>Cybersecurity
                </option>
            </select>


            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </div>
        </div>
    </form>
@endsection