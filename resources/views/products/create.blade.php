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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
        @csrf
        <div class="row">
            {{-- Basic fields --}}
            <div class="col-md-6 mb-2">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Price ($):</strong>
                <input type="number" name="price" class="form-control" step="0.01" placeholder="Price" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Duration :</strong>
                <div class="input-group">
                    <input type="number" name="duration" class="form-control" placeholder="Duration" required>
                    <span class="input-group-text">Months</span>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Difficulty:</strong>
                <select name="difficulty" class="form-control" required>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Lessons:</strong>
                <input type="number" name="lessons" class="form-control" placeholder="Number of lessons" min="0" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Enrolled Students:</strong>
                <input type="number" name="enrolled_count" class="form-control" value="{{ old('enrolled_count', 0) }}"
                    min="0">
            </div>

            {{-- Rating stars --}}
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
                <input type="url" name="welcome_video_url" class="form-control" placeholder="https://youtube.com/...">
            </div>

            <div class="col-md-6 mb-2">
                <strong>Course Overview Video URL:</strong>
                <input type="url" name="overview_video_url" class="form-control" placeholder="https://youtube.com/...">
            </div>

            {{-- Core Concepts --}}
            <div class="col-md-12 mb-2">
                <strong>Core Concepts:</strong>
                <div class="input-group mb-2">
                    <input type="text" id="concept-input" class="form-control" placeholder="Type concept and click Add">
                    <button type="button" id="add-concept" class="btn btn-success">+ Add</button>
                </div>

                <ul id="concept-list" class="list-group">
                    {{-- server-side prefilled only for edit; create starts empty --}}
                </ul>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Detail:</strong>
                <textarea name="detail" class="form-control" rows="4" placeholder="Detail">{{ old('detail') }}</textarea>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select name="category" class="form-control">
                        <option value="">-- Select Category --</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile Application">Mobile Application</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="Computer Engineering">Computer Engineering</option>
                        <option value="Data Analysis">Data Analysis</option>
                        <option value="Cybersecurity">Cybersecurity</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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