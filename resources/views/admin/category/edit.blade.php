@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col ">
            <div class="card">
                <div class="card-header">
                    Edit category
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('adminCategory.update', $category->id) }}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="ar_name" class="form-label">Arabic name</label>
                                <input id="ar_name" type="text" class="form-control @error('ar_name') is-invalid @enderror"
                                    name="ar_name" value="{{ $category->ar_name }}" required autocomplete="ar_name"
                                    autofocus>

                                @error('ar_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="en_name" class="form-label">English name</label>
                                <input id="en_name" type="text" class="form-control @error('en_name') is-invalid @enderror"
                                    name="en_name" value="{{ $category->en_name }}" required autocomplete="en_name"
                                    autofocus>

                                @error('en_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fr_name" class="form-label">French name</label>
                                <input id="fr_name" type="text" class="form-control @error('fr_name') is-invalid @enderror"
                                    name="fr_name" value="{{ $category->fr_name }}" required autocomplete="fr_name"
                                    autofocus>

                                @error('fr_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="formFile" class="form-label">Parent</label>
                            <select class="form-select" aria-label="Default select example" name="parent_id">
                                {{-- <option selected>Parent</option> --}}
                                @foreach ($categories as $cat)
                                    <option selected="{{$cat->id == $category->id }}" value="{{ $cat->id }}">{{ $cat->en_name }}</option>
                                @endforeach

                            </select>
                            <br>

                            <img src="{{ url($category->image) }}" class="img-thumbnail" width="100">

                            <div class="mb-3">
                                <label for="image" class="form-label">Category image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                    id="image" accept="image/gif, image/jpeg, image/png, image/webp">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button class="btn btn-primary px-4">Save Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
