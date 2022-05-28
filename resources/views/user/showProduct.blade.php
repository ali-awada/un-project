@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
<div class="row">
    <h2>{{$product->en_name}}</h2>
</div>
<div class="row">
    <div class="col-5 mb-4" id="images">
        @foreach($product->images as $image)
        <img class="card-img-top" src="{{$image->url}}" alt="Card image cap">
        @endforeach
    </div>
    <div class="col-7 mb-4">
        <div class="card" style="height:100%;">
            <div class="card-body">
                <h5 class="card-title">name:{{" ".$product->en_name}}</h5>
                <!-- <h5 class="card-title">{{$product->fr_name}}</h5>
                <h5 class="card-title">{{$product->ar_name}}</h5> -->
                <h5 class="card-title">condition:{{" ".$product->condition}}</h5>
                <h5 class="card-title">price:{{" ".$product->price . $product->currency->symbole}}</h5>
                <p class="card-text">Category:<a href="{{route('userCategory.show',$product->category->id)}}" class="text-muted">{{" ".$product->category->en_name}}</a></p>
                <p class="text-success">Brand:<a href="{{route('userBrand.show', $product->brand->id)}}" class="text-muted">{{" ".$product->brand->name}}</a></p>
            </div>
        </div>
    </div>
</div>
<script>
    $('#images').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        navigation: false,
        adaptiveHeight: true
    });
</script>
@endsection