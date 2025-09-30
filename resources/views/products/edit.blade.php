@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Add New Product</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
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
            {{-- Basic fields --}}
            <div class="col-md-6 mb-2">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Price ($):</strong>
                <input type="number" step="0.01" name="price" class="form-control"
                    value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Duration :</strong>
                <div class="input-group">
                    <input type="number" name="duration" class="form-control"
                        value="{{ old('duration', $product->duration) }}" required>
                    <span class="input-group-text">Months</span>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Difficulty:</strong>
                <select name="difficulty" class="form-control" required>
                    <option value="Beginner" {{ old('difficulty', $product->difficulty) == 'Beginner' ? 'selected' : '' }}>
                        Beginner
                    </option>
                    <option value="Intermediate" {{ old('difficulty', $product->difficulty) == 'Intermediate' ? 'selected' : '' }}>
                        Intermediate</option>
                    <option value="Advanced" {{ old('difficulty', $product->difficulty) == 'Advanced' ? 'selected' : '' }}>
                        Advanced
                    </option>
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Lessons:</strong>
                <input type="number" name="lessons" min="0" class="form-control"
                    value="{{ old('lessons', $product->lessons) }}" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Enrolled Students:</strong>
                <input type="number" name="enrolled_count" min="0" class="form-control"
                    value="{{ old('enrolled_count', $product->enrolled_count) }}">
            </div>

            {{-- Rating --}}

            @php
                $currentRating = old('rating', 0);
                if (isset($product)) {
                    $currentRating = old('rating', $product->rating);
                }
            @endphp

            <div class="col-md-6 mb-2">
                <strong>Rating:</strong>
                <div class="rating-input d-inline-block" aria-label="Course rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @php $checked = ($currentRating == $i) ? 'checked' : ''; @endphp
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" class="d-none" {{ $checked }}>
                        <label for="star{{ $i }}" class="fa fa-star" style="font-size:1.4rem; cursor:pointer;"></label>
                    @endfor
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Welcome Video URL:</strong>
                <input type="url" name="welcome_video_url" class="form-control"
                    value="{{ old('welcome_video_url', $product->welcome_video_url) }}">
            </div>

            <div class="col-md-6 mb-2">
                <strong>Course Overview Video URL:</strong>
                <input type="url" name="overview_video_url" class="form-control"
                    value="{{ old('overview_video_url', $product->overview_video_url) }}">
            </div>

            {{-- Core Concepts --}}
            <div class="col-md-12 mb-2">
                <strong>Core Concepts:</strong>
                <div class="input-group mb-2">
                    <input type="text" id="concept-input" class="form-control" placeholder="Type concept and click Add">
                    <button type="button" id="add-concept" class="btn btn-success">+ Add</button>
                </div>
                <ul id="concept-list" class="list-group">
                    @foreach(old('core_concepts', $product->core_concepts ?? []) as $concept)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <input type="hidden" name="core_concepts[]" value="{{ $concept }}">
                            <span>{{ $concept }}</span>
                            <button type="button" class="btn btn-danger btn-sm remove-concept">Delete</button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Detail:</strong>
                <textarea name="detail" class="form-control" rows="4">{{ old('detail', $product->detail) }}</textarea>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Image:</strong><br>
                @if($product->image) <img src="{{ asset('storage/' . $product->image) }}" height="80" class="mb-2"><br>
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-12 mb-2">
                <strong>Category:</strong>
                <select name="category" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach(['Web Development', 'Mobile Application', 'Artificial Intelligence', 'Computer Engineering', 'Data Analysis', 'Cybersecurity'] as $cat)
                        <option value="{{ $cat }}" {{ old('category', $product->category) == $cat ? 'selected' : '' }}>{{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </div>
        </div>
    </form>

    {{-- Styles for FA stars --}}
    <style>
        .fa-star {
            color: #ccc;
        }

        .fa-star.checked {
            color: #ffc107;
        }
    </style>

    {{-- Inline JS so it runs immediately --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // RATING: update star visuals based on checked radio
            function updateStars() {
                const stars = document.querySelectorAll('.rating-input .fa-star');
                const checked = document.querySelector('.rating-input input[type="radio"]:checked');
                const value = checked ? parseInt(checked.value) : 0;
                stars.forEach((star, idx) => {
                    if (idx < value) star.classList.add('checked'); else star.classList.remove('checked');
                });
            }

            // click on label should set checked radio (browser does it), but also update visuals
            const starLabels = document.querySelectorAll('.rating-input .fa-star');
            starLabels.forEach(label => {
                label.addEventListener('click', function () {
                    const forId = this.getAttribute('for');
                    const radio = document.getElementById(forId);
                    if (radio) radio.checked = true;
                    updateStars();
                });
            });

            // in case radio changed by keyboard
            const radios = document.querySelectorAll('.rating-input input[type="radio"]');
            radios.forEach(r => r.addEventListener('change', updateStars));

            // set initial stars
            updateStars();

            // CORE CONCEPTS: add / enter / delete with confirm
            const input = document.getElementById('concept-input');
            const addBtn = document.getElementById('add-concept');
            const list = document.getElementById('concept-list');

            function addConcept(value) {
                value = (value || '').trim();
                if (!value) {
                    // small feedback
                    input.focus();
                    return;
                }

                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';

                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'core_concepts[]';
                hidden.value = value;

                const span = document.createElement('span');
                span.textContent = value;

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'btn btn-danger btn-sm remove-concept';
                btn.textContent = 'Delete';

                li.appendChild(hidden);
                li.appendChild(span);
                li.appendChild(btn);

                list.appendChild(li);
                input.value = '';
                input.focus();
            }

            addBtn.addEventListener('click', function (e) {
                addConcept(input.value);
            });

            input.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault(); // avoid form submit
                    addConcept(input.value);
                }
            });

            list.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-concept')) {
                    if (confirm('Are you sure you want to delete this concept?')) {
                        const li = e.target.closest('li');
                        if (li) li.remove();
                    }
                }
            });
        });
    </script>
@endsection