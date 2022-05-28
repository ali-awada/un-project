@extends('layouts.app')

@section('content')

<div class="row">
    <h2>{{$product->en_name}}</h2>
</div>
<div class="row">
    <div class="col-5 mb-4">
        <!-- @foreach($product as $pro) -->
        <!-- @endforeach -->
        <img class="card-img-top" src="{{count($product->images) != 0 ? url($product->images[0]->url) : url(asset('images/download.png')) }}" alt="Card image cap">

    </div>

    <div class="col-7 mb-4">
        <div class="card" style="height:100%;">
            <div class="card-body">
                <h5 class="card-title">name:{{" ".$product->en_name}}</h5>
                <!-- <h5 class="card-title">{{$product->fr_name}}</h5>
                <h5 class="card-title">{{$product->ar_name}}</h5> -->
                <h5 class="card-title">condition:{{" ".$product->condition}}</h5>
                <h5 class="card-title">price:{{" ".$product->price . $product->currency->symbole}}</h5>
                <p class="card-text"><a href="{{route('userCategory.show',$product->category->id)}}" class="text-muted">{{$product->category->en_name}}</a></p>
                <p class="text-success"><a href="{{route('userBrand.show', $product->brand->id)}}" class="text-muted">{{$product->brand->name}}</a></p>
            </div>
        </div>
    </div>
</div>

@endsection