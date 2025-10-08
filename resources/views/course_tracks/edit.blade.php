@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Course Track</h2>
        <a href="{{ route('course-tracks.index') }}" class="btn btn-secondary mb-3">Back</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('course-tracks.update', $courseTrack->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $courseTrack->title) }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Introduction</label>
                <textarea name="introduction"
                    class="form-control">{{ old('introduction', $courseTrack->introduction) }}</textarea>
            </div>

            <hr>
            <h5>Cards</h5>
            <div id="cards-container">
                @php
                    $cards = $courseTrack->cards ?? [['image' => '', 'name' => '', 'image_icon' => '', 'description' => '']];
                @endphp

                @foreach($cards as $index => $card)
                    <div class="card-row mb-2 border p-2">

                        {{-- Show current image if exists --}}
                        @if(!empty($card['image']))
                            <p>
                                <strong>Current Image:</strong><br>
                                <img src="{{ asset('storage/' . $card['image']) }}" alt="Card Image" width="150" class="mb-2">
                            </p>
                        @endif

                        {{-- File input to replace image --}}
                        <input type="file" name="cards[{{ $index }}][image]" class="form-control mb-2">

                        <input type="text" name="cards[{{ $index }}][name]" placeholder="Card Name" class="form-control mb-2"
                            value="{{ $card['name'] ?? '' }}">

                        <textarea name="cards[{{ $index }}][image_icon]" placeholder="Image Icon"
                            class="form-control mb-2">{{ $card['image_icon'] ?? '' }}</textarea>

                        <textarea name="cards[{{ $index }}][description]" placeholder="Description"
                            class="form-control mb-2">{{ $card['description'] ?? '' }}</textarea>

                        <button type="button" class="btn btn-danger btn-remove">Remove Card</button>
                    </div>
                @endforeach
            </div>


            <button type="button" id="add-card" class="btn btn-info mb-3">Add Another Card</button>
            <button type="submit" class="btn btn-primary">Update Course Track</button>
        </form>
    </div>

    <script>
        let cardIndex = {{ count($cards) }};
        document.getElementById('add-card').addEventListener('click', function () {
            let container = document.getElementById('cards-container');
            let div = document.createElement('div');
            div.classList.add('card-row', 'mb-2', 'border', 'p-2');
            div.innerHTML = `
                    <input type="file" name="cards[${cardIndex}][image]" class="form-control mb-2">
                    <input type="text" name="cards[${cardIndex}][name]" placeholder="Card Name" class="form-control mb-2">
                    <textarea name="cards[${cardIndex}][image_icon]" placeholder="Image Icon (SVG or path)" class="form-control mb-2"></textarea>
                    <textarea name="cards[${cardIndex}][description]" placeholder="Description" class="form-control mb-2"></textarea>
                    <button type="button" class="btn btn-danger btn-remove">Remove Card</button>
                `;
            container.appendChild(div);
            cardIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-remove')) {
                e.target.closest('.card-row').remove();
            }
        });
    </script>

@endsection