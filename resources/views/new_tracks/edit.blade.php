@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Track</h2>
        <a href="{{ route('new-tracks.index') }}" class="btn btn-secondary mb-3">Back</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('new-tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $track->title) }}" required>
            </div>

            <div class="mb-3">
                <label>Introduction</label>
                <textarea name="introduction"
                    class="form-control">{{ old('introduction', $track->introduction) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                @if($track->image)
                    <img src="{{ asset('storage/' . $track->image) }}" width="150" class="mb-2"><br>
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <hr>
            <h5>Points (Max 3)</h5>
            <div id="points-container">
                @php $points = $track->points ?? ['']; @endphp
                @foreach($points as $i => $point)
                    <div class="point-row mb-2">
                        <input type="text" name="points[{{ $i }}]" value="{{ $point }}" placeholder="Point {{ $i + 1 }}"
                            class="form-control mb-2" required>
                        @if($i > 0)
                            <button type="button" class="btn btn-danger btn-remove">Remove</button>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-point" class="btn btn-info mb-3">Add Another Point</button>
            <button type="submit" class="btn btn-primary">Update Track</button>
        </form>
    </div>

    <script>
        let pointIndex = {{ count($points) }};
        document.getElementById('add-point').addEventListener('click', function () {
            if (pointIndex >= 3) return;
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