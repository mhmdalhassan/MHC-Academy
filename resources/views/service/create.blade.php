@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Service</h2>
    <a href="{{ route('services.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Header</label>
            <input type="text" name="header" class="form-control" value="{{ old('header') }}" required>
        </div>

        <div class="mb-3">
            <label>Paragraph</label>
            <textarea name="paragraph" class="form-control">{{ old('paragraph') }}</textarea>
        </div>

        <h4>Cards</h4>
        <div id="cards-wrapper"></div>
        <button type="button" id="add-card" class="btn btn-primary mb-3">Add Card</button>

        <button type="submit" class="btn btn-success">Create Service</button>
    </form>
</div>

<script>
let cardIndex = 0;
document.getElementById('add-card').addEventListener('click', function(){
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
                <label>Card Image</label>
                <input type="file" name="cards[${cardIndex}][image]" class="form-control">
            </div>
            <button type="button" class="btn btn-danger remove-card">Remove Card</button>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', html);
    cardIndex++;
});

document.addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove-card')){
        e.target.closest('.card').remove();
    }
});
</script>
@endsection
