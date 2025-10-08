@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <h2>Show Hero Section</h2>
            <a class="btn btn-secondary btn-sm" href="{{ route('hero-sections.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Header:</strong>
                    <p>{{ $heroSection->header }}</p>
                </div>
            </div>

            <div class="col-12">
                <div class="p-3 border rounded"><strong>Introduction:</strong>
                    <p>{{ $heroSection->introduction }}</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Button 1:</strong>
                    <p>{{ $heroSection->button1_name }} ({{ $heroSection->button1_route }})</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="p-3 border rounded"><strong>Button 2:</strong>
                    <p>{{ $heroSection->button2_name }} ({{ $heroSection->button2_route }})</p>
                </div>
            </div>
        </div>
    </div>
@endsection