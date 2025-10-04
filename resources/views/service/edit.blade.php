@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Service</h2>
        <a href="{{ route('services.index') }}" class="btn btn-secondary mb-3">Back</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Header</label>
                <input type="text" name="header" class="form-control" value="{{ old('header', $service->header) }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Paragraph</label>
                <textarea name="paragraph" class="form-control">{{ old('paragraph', $service->paragraph) }}</textarea>
            </div>

            <h4>Cards</h4>
            <div id="cards-wrapper">
                @if($service->cards)
                    @foreach($service->cards as $index => $card)
                        <div class="card p-3 mb-3">
                            <div class="mb-2">
                                <label>Card Title</label>
                                <input type="text" name="cards[{{ $index }}][title]" class="form-control"
                                    value="{{ old("cards.$index.title", $card['title']) }}" required>
                            </div>
                            <div class="mb-2">
                                <label>Card Description</label>
                                <textarea name="cards[{{ $index }}][description]"
                                    class="form-control">{{ old("cards.$index.description", $card['description']) }}</textarea>
                            </div>
                            <div class="mb-2">
                                <label>Card Icon / Image Link</label>
                                <input type="text" name="cards[{{ $index }}][icon]" class="form-control"
                                    value="{{ old("cards.$index.icon", $card['icon'] ?? '') }}"
                                    placeholder="e.g. bi bi-journal-code or URL">
                            </div>
                            <button type="button" class="btn btn-danger remove-card">Remove Card</button>
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="button" id="add-card" class="btn btn-primary mb-3">Add Card</button>
            <button type="submit" class="btn btn-success">Update Service</button>
        </form>
    </div>

    <script>
        let cardIndex = {{ $service->cards ? count($service->cards) : 0 }};

        document.getElementById('add-card').addEventListener('click', function () {
            const wrapper = document.getElementById('cards-wrapper');
            const html = `
            <div class="card p-3 mb-3">
                <div class="mb-2">
                    <label>Card Title</label>
                    <input type="text" name="cards[${cardIndex}][title]" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Card Description</label>
                    <textarea name="cards[${cardIndex}][description]" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label>Card Icon / Image Link</label>
                    <input type="text" name="cards[${cardIndex}][icon]" class="form-control" placeholder="e.g. bi bi-journal-code or URL">
                </div>
                <button type="button" class="btn btn-danger remove-card">Remove Card</button>
            </div>
        `;
            wrapper.insertAdjacentHTML('beforeend', html);
            cardIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-card')) {
                e.target.closest('.card').remove();
            }
        });
    </script>
@endsection
