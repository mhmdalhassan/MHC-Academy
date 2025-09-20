@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                    Back</a>
            </div>
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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>

            <div class="col-md-6 mb-2">
                <strong>Price ($):</strong>
                <input type="number" name="price" class="form-control" step="0.01" placeholder="Price" required>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Detail:</strong>
                <textarea name="detail" class="form-control" rows="4" placeholder="Detail"></textarea>
            </div>

            <div class="col-md-12 mb-2">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select name="category" class="form-control">
                        <option value="">-- Select Category --</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile Application">Mobile Application</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Data Science">Data Science</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
        </div>
    </form>
@endsection