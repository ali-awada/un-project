@extends('layouts.app')

@section('content')

<div class="row">
    <h2>{{$brand->name}}</h2>
</div>
<div class="row">
    @foreach($brand->products as $product)
    <div class="col-3 mb-4">
        <div class="card" style="height:100%;">
            <img class="card-img-top" src="{{count($product->images) != 0 ? url($product->images[0]->url) : url(asset('images/download.png')) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$product->en_name}}</h5>
                <h4 class="card-title">{{$product->price . $product->currency->symbole}}</h4>
                <p class="card-text"><a href="{{route('userCategory.show',$product->category->id)}}" class="text-muted">{{$product->category->en_name}}</a></p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection