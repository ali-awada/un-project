@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col ">
        <div class="card">
            <div class="card-header">
                Edit Currency
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('adminCurrency.update', $currency->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label"> name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $currency->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <br>
                        <div class="mb-3">
                            <label for="symbole" class="form-label"> symbole</label>
                            <input id="symbole" type="text" class="form-control @error('symbole') is-invalid @enderror" name="symbole" value="{{ $currency->symbole }}" required autocomplete="symbole" autofocus>

                            @error('symbole')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rate" class="form-label"> rate</label>
                            <input id="rate" type="number" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ $currency->rate }}" required autocomplete="rate" autofocus>

                            @error('rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- <div class="mb-3">
                            <label for="image" class="form-label">Brand image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/webp">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->


                        <button class="btn btn-primary px-4">Save Currency</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection