@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">
                <div class="card-header">
                    Create new Brand
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('adminBrand.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('ar_name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br>
                            <div class="mb-3">
                                <label for="image" class="form-label">Brand image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                    id="image" accept="image/gif, image/jpeg, image/png, image/webp">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button class="btn btn-primary px-4">Save Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
