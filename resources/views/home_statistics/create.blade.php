@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Create Home Statistic</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('home-statistics.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Introduction</label>
            <textarea name="introduction" class="form-control"></textarea>
        </div>

        <hr>
        <h5>Cards</h5>
        <div id="cards-container">
            <div class="card-row mb-2 border p-2">
                <input type="number" name="cards[0][card_number]" placeholder="Card Number" class="form-control mb-2" required>
                <input type="text" name="cards[0][card_name]" placeholder="Card Name" class="form-control mb-2" required>
                <input type="text" name="cards[0][card_description]" placeholder="Card Description" class="form-control mb-2" required>
                <button type="button" class="btn btn-danger btn-remove">Remove Card</button>
            </div>
        </div>

        <button type="button" id="add-card" class="btn btn-info mb-3">Add Another Card</button>
        <button type="submit" class="btn btn-primary">Save Home Statistic</button>
    </form>
</div>

<script>
let cardIndex = 1;

document.getElementById('add-card').addEventListener('click', function() {
    let container = document.getElementById('cards-container');
    let div = document.createElement('div');
    div.classList.add('card-row','mb-2','border','p-2');
    div.innerHTML = `
        <input type="number" name="cards[${cardIndex}][card_number]" placeholder="Card Number" class="form-control mb-2" required>
        <input type="text" name="cards[${cardIndex}][card_name]" placeholder="Card Name" class="form-control mb-2" required>
        <input type="text" name="cards[${cardIndex}][card_description]" placeholder="Card Description" class="form-control mb-2" required>
        <button type="button" class="btn btn-danger btn-remove">Remove Card</button>
    `;
    container.appendChild(div);
    cardIndex++;
});

document.addEventListener('click', function(e){
    if(e.target.classList.contains('btn-remove')){
        e.target.closest('.card-row').remove();
    }
});
</script>
@endsection
