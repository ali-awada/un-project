@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<div class="row">
    <h2>{{$product->en_name}}</h2>
</div>
<div class="row">
    <div class="col-5 mb-4" id="">
        <div id="images">
            @foreach($product->images as $image)
            <img class="card-img-top" src="{{$image->url}}" alt="Card image cap">
            @endforeach
        </div>

    </div>
    <div class="col-7 mb-4">
        <div class="card" style="height:100%;">
            <div class="card-body">
                <h5 class="card-title">name:{{" ".$product->en_name}}</h5>
                <!-- <h5 class="card-title">{{$product->fr_name}}</h5>
                <h5 class="card-title">{{$product->ar_name}}</h5> -->
                <h5 class="card-title">condition:{{" ".$product->condition}}</h5>
                <h5 class="card-title">price:{{" ".$product->price . $product->currency->symbole}}</h5>
                <p class="card-text">Category: <a href="{{route('userCategory.show',$product->category->id)}}" class="text-muted">{{" ".$product->category->en_name}}</a></p>
                <p class="text-success">Brand:<a href="{{route('userBrand.show', $product->brand->id)}}" class="text-muted">{{" ".$product->brand->name}}</a></p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ask for delivery
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('order.create')}}" method="post">

                                <div class="modal-body">
                                    <div class="form-group">
                                        @csrf
                                        <input name="currency_id" hidden type="text" value="{{$product->currency->id}}">
                                        <input name="owner_id" hidden type="text" value="{{$product->user_id}}">
                                        <input name="buyer_id" hidden type="text" value="{{auth()->id()}}">
                                        <label for="recipient-name" class="col-form-label">Total (how much will you
                                            pay):</label>
                                        <input type="number" name="total" class="form-control" id="recipient-name">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Send offer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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