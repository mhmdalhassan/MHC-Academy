@extends('layouts.app')

@section('page-title', 'Edit Instructor')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Instructor</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('instructors.update', $instructor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $instructor->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $instructor->email }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $instructor->title }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ $instructor->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Number of Graduates</label>
                    <input type="number" name="students_graduated" value="{{ $instructor->students_graduated }}"
                        class="form-control">
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
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($instructor->image)
                <img src="{{ asset('storage/' . $instructor->image) }}" width="120" class="mt-2 rounded">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    </div>

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