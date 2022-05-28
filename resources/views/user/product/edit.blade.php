@extends('layouts.user')
@section('content')
        <div class="card">
            <div class="card-header">
               edit  Product
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                    @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="ar_name" class="form-label">Arabic name</label>
                            <input id="ar_name" type="text" class="form-control @error('ar_name') is-invalid @enderror"
                                name="ar_name" value="{{ $product->ar_name }}" required autocomplete="ar_name" autofocus>

                            @error('ar_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="en_name" class="form-label">English name</label>
                            <input id="en_name" type="text" class="form-control @error('en_name') is-invalid @enderror"
                                name="en_name" value="{{  $product->en_name }}" required autocomplete="en_name" autofocus>

                            @error('en_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fr_name" class="form-label">French name</label>
                            <input id="fr_name" type="text" class="form-control @error('fr_name') is-invalid @enderror"
                                name="fr_name" value="{{$product->fr_name }}" required autocomplete="fr_name" autofocus>

                            @error('fr_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">price </label>
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror"
                                name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity </label>
                            <input id="quantity" type="number"
                                class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                value="{{ $product->quantity }}" required autocomplete="quantity" autofocus>

                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="condition" class="form-label">Condition </label>
                            <input id="condition" type="text"
                                class="form-control @error('condition') is-invalid @enderror" name="condition"
                                value="{{$product->condition }}" required autocomplete="condition" autofocus>

                            @error('condition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="formFile" class="form-label">Categories</label>
                        <select class="form-select" aria-label="Default select example" name="category">--}}
                            @foreach ($categories as $cat)
                            <option selected="{{$cat->id == $product->category }}" value="{{ $cat->id }}">{{ $cat->en_name }}</option> @endforeach
                        </select>
                        <br>

                        <label for="formFile" class="form-label">Currency</label>
                        <select class="form-select" aria-label="Default select example" name="currency">--}}
                            @foreach ($currencies as $curr)
                            <option selected="{{$curr->id == $product->currency }}" value="{{ $curr->id }}">{{ $curr->name }}</option> @endforeach
                        </select>
                        <br>

                        <label for="formFile" class="form-label">Brand</label>
                        <select class="form-select" aria-label="Default select example" name="brand">--}}
                            @foreach ($brands as $bran)
                            <option selected="{{$bran->id == $product->brand }}" value="{{ $bran->id }}">{{ $bran->name }}</option> @endforeach
                        </select>
                        <br>
                        <!-- <div class="mb-3">
                            <label for="image" class="form-label">product image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image" accept="image/gif, image/jpeg, image/png, image/webp">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->


                        <button class="btn btn-primary px-4">Save product</button>
                    </form>
                </div>
            </div>
        </div>
@endsection