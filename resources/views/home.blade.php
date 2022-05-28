@extends('layouts.app')

@section('content')
    <div class="row">
        <h2 class="my-4">Latest Products</h2>
    </div>
<div class="row">
    @foreach($products as $product)

    <div class="col-4 mb-4">
        <div class="card" style="height:100%;">
            <img class="card-img-top" src="{{count($product->images) != 0 ? url($product->images[0]->url) : url(asset('images/download.png')) }}" alt="Card image cap">
            <div class="card-body">
                <!-- <h5 class="card-title">{{$product->en_name}}</h5> -->
                <p class="text-success"><a href="{{route('userPoduct.show', $product->id)}}" class="text-muted">{{$product->en_name}}</a></p>
                <h4 class="card-title">{{$product->price . $product->currency->symbole}}</h4>
                <p class="text-success"><a href="{{route('userCategory.show', $product->category->id)}}" class="text-muted">{{$product->category->en_name}}</a></p>
                <p class="text-success"><a href="{{route('userBrand.show', $product->brand->id)}}" class="text-muted">{{$product->brand->name}}</a></p>
            </div>
        </div>
    </div>


    @endforeach
</div>
@endsection
