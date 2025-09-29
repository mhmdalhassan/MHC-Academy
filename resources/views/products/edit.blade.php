@extends('layouts.app')

@section('content')
    <div class="row mb-2 d-flex justify-content-between align-items-center">
        <h2>Edit Product</h2>
        <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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
            {{-- Name --}}
            <div class="col-md-6 mb-2">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            {{-- Price --}}
            <div class="col-md-6 mb-2">
                <strong>Price ($):</strong>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" step="0.01" required>
            </div>

            {{-- Duration --}}
            <div class="col-md-6 mb-2">
                <strong>Duration :</strong>
                <div class="input-group">
                    <input type="number" name="duration" value="{{ $product->duration }}" class="form-control" required>
                    <span class="input-group-text">Months</span>
                </div>
            </div>

            {{-- Difficulty --}}
            <div class="col-md-6 mb-2">
                <strong>Difficulty:</strong>
                <select name="difficulty" class="form-control" required>
                    <option value="Beginner" {{ $product->difficulty == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" {{ $product->difficulty == 'Intermediate' ? 'selected' : '' }}>Intermediate
                    </option>
                    <option value="Advanced" {{ $product->difficulty == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            {{-- Lessons --}}
            <div class="col-md-6 mb-2">
                <strong>Lessons:</strong>
                <input type="number" name="lessons" value="{{ $product->lessons }}" class="form-control" min="0" required>
            </div>

            {{-- Enrolled --}}
            <div class="col-md-6 mb-2">
                <strong>Enrolled Students:</strong>
                <input type="number" name="enrolled_count" value="{{ $product->enrolled_count }}" class="form-control"
                    min="0">
            </div>

            {{-- Rating --}}
            <div class="col-md-6 mb-2">
                <strong>Rating:</strong>
                <input type="number" name="rating" value="{{ $product->rating }}" class="form-control" step="0.1" min="0"
                    max="5">
            </div>

            {{-- Welcome Video --}}
            <div class="col-md-6 mb-2">
                <strong>Welcome Video URL:</strong>
                <input type="url" name="welcome_video_url" value="{{ $product->welcome_video_url }}" class="form-control">
            </div>

            {{-- Overview Video --}}
            <div class="col-md-6 mb-2">
                <strong>Course Overview Video URL:</strong>
                <input type="url" name="overview_video_url" value="{{ $product->overview_video_url }}" class="form-control">
            </div>

            {{-- Core Concepts --}}
            <div class="col-md-12 mb-2">
                <strong>Core Concepts:</strong>
                <div id="core-concepts-wrapper">
                    @if($product->core_concepts)
                        @foreach($product->core_concepts as $concept)
                            <div class="input-group mb-2 core-concept-item">
                                <input type="text" name="core_concepts[]" value="{{ $concept }}" class="form-control">
                                <button type="button" class="btn btn-danger remove-concept">-</button>
                            </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2 core-concept-item">
                            <input type="text" name="core_concepts[]" class="form-control" placeholder="Enter concept">
                            <button type="button" class="btn btn-danger remove-concept">-</button>
                        </div>
                    @endif
                </div>
                <button type="button" id="add-concept" class="btn btn-success btn-sm">+ Add Concept</button>
            </div>

            {{-- Detail --}}
            <div class="col-md-12 mb-2">
                <strong>Detail:</strong>
                <textarea name="detail" class="form-control" rows="4">{{ $product->detail }}</textarea>
            </div>

            {{-- Image --}}
            <div class="col-md-12 mb-2">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="mt-2" width="100">
                @endif
            </div>

            {{-- Category --}}
            <div class="col-md-12 mb-2">
                <strong>Category:</strong>
                <select name="category" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach(['Web Development', 'Mobile Application', 'Artificial Intelligence', 'Computer Engineering', 'Data Analysis', 'Cybersecurity'] as $cat)
                        <option value="{{ $cat }}" {{ $product->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </div>
        </div>
    </form>

    {{-- Dynamic JS for Core Concepts --}}
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const wrapper = document.getElementById('core-concepts-wrapper');
                document.getElementById('add-concept').addEventListener('click', function () {
                    const div = document.createElement('div');
                    div.classList.add('input-group', 'mb-2', 'core-concept-item');
                    div.innerHTML = `<input type="text" name="core_concepts[]" class="form-control" placeholder="Enter concept">
                                 <button type="button" class="btn btn-danger remove-concept">-</button>`;
                    wrapper.appendChild(div);
                });

                wrapper.addEventListener('click', function (e) {
                    if (e.target.classList.contains('remove-concept')) {
                        e.target.closest('.core-concept-item').remove();
                    }
                });
            });
        </script>
    @endpush

@endsection