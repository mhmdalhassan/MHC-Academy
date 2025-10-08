@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Edit Home Statistic</h2>
        <a href="{{ route('home-statistics.index') }}" class="btn btn-secondary mb-3">Back</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('home-statistics.update', $homeStatistic->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $homeStatistic->title) }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Introduction</label>
                <textarea name="introduction"
                    class="form-control">{{ old('introduction', $homeStatistic->introduction) }}</textarea>
            </div>

            <hr>
            <h5>Cards</h5>
            <div id="cards-container">
                @php
                    $cards = $homeStatistic->cards ?? [['card_number' => '', 'card_name' => '', 'card_description' => '']];
                @endphp

                @foreach($cards as $index => $card)
                    <div class="card-row mb-2 border p-2">
                        <input type="number" name="cards[{{ $index }}][card_number]" placeholder="Card Number"
                            class="form-control mb-2" value="{{ $card['card_number'] ?? '' }}" required>
                        <input type="text" name="cards[{{ $index }}][card_name]" placeholder="Card Name"
                            class="form-control mb-2" value="{{ $card['card_name'] ?? '' }}" required>
                        <input type="text" name="cards[{{ $index }}][card_description]" placeholder="Card Description"
                            class="form-control mb-2" value="{{ $card['card_description'] ?? '' }}" required>
                        <button type="button" class="btn btn-danger btn-remove">Remove Card</button>
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-card" class="btn btn-info mb-3">Add Another Card</button>
            <button type="submit" class="btn btn-primary">Update Home Statistic</button>
        </form>
    </div>

    <script>
        let cardIndex = {{ count($cards) }};

        document.getElementById('add-card').addEventListener('click', function () {
            let container = document.getElementById('cards-container');
            let div = document.createElement('div');
            div.classList.add('card-row', 'mb-2', 'border', 'p-2');
            div.innerHTML = `
            <input type="number" name="cards[${cardIndex}][card_number]" placeholder="Card Number" class="form-control mb-2" required>
            <input type="text" name="cards[${cardIndex}][card_name]" placeholder="Card Name" class="form-control mb-2" required>
            <input type="text" name="cards[${cardIndex}][card_description]" placeholder="Card Description" class="form-control mb-2" required>
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