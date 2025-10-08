@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Track</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('new-tracks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Introduction</label>
                <textarea name="introduction" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <hr>
            <h5>Points (Max 3)</h5>
            <div id="points-container">
                <div class="point-row mb-2">
                    <input type="text" name="points[0]" placeholder="Point 1" class="form-control mb-2" required>
                </div>
            </div>

            <button type="button" id="add-point" class="btn btn-info mb-3">Add Another Point</button>
            <button type="submit" class="btn btn-primary">Save Track</button>
        </form>
    </div>

    <script>
        let pointIndex = 1;
        document.getElementById('add-point').addEventListener('click', function () {
            if (pointIndex >= 3) return; // max 3 points
            let container = document.getElementById('points-container');
            let div = document.createElement('div');
            div.classList.add('point-row', 'mb-2');
            div.innerHTML = `
            <input type="text" name="points[${pointIndex}]" placeholder="Point ${pointIndex + 1}" class="form-control mb-2" required>
            <button type="button" class="btn btn-danger btn-remove">Remove</button>
        `;
            container.appendChild(div);
            pointIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-remove')) {
                e.target.closest('.point-row').remove();
                pointIndex--;
            }
        });
    </script>
@endsection