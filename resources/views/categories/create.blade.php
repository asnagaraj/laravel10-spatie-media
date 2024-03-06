@extends('layouts.app') @section('title', 'New Category') @section('content')

<div class="container mt-5">
    <form class="row g-3" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="nameInp">Name</label>
            <input class="form-control" id="nameInp" type="text" name="name" value="{{ old('name') }}" />
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="imageInp">Image</label>
            <input class="form-control" id="imageInp" type="file" name="image" />
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
</div>

@endsection