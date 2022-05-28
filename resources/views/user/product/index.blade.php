@extends('layouts.user')
@section('content')
<div class="my-4 d-flex justify-content-between align-items-center">
    <h2>Products</h2>
    <a class="btn btn-primary" href="{{route('product.create')}}">Create Product</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Arabic name</th>
            <th scope="col">English name</th>
            <th scope="col">French name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Condition</th>
            <th scope="col">category_id</th>
            <th scope="col">Currency_id</th>
            <th scope="col">Brand_id</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
        <tr>
            <td>{{$product->ar_name}}</td>
            <td>{{$product->en_name}}</td>
            <td>{{$product->fr_name}}</td>
            <td>{{$product->price . $product->currency->symbole }}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->condition}}</td>
            <td>{{$product->category->en_name}}</td>
            <td>{{$product->currency->name }}</td>
            <td>{{$product->brand->name }}</td>
            <td class="d-flex gap-1">
                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary ">
                    <i class="fa fa-pencil"></i>
                </a>
                <form action="{{ route('product.destroy', $product->id) }}" method="post" class="d-inline-block">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger ">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection