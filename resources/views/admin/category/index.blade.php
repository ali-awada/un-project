@extends('layouts.admin')
@section('content')
    <div class="my-4 d-flex justify-content-between align-items-center">
        <h2>Categories</h2>
        <a class="btn btn-primary" href="{{route('adminCategory.create')}}">Create category</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Arabic name</th>
            <th scope="col">English name</th>
            <th scope="col">French name</th>
            <th scope="col">Parent</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category )
            <tr>
                <td>{{$category->id}}</td>
                <td><img width=50 src="{{url($category->image)}}" alt=""></td>
                <td>{{$category->ar_name}}</td>
                <td>{{$category->en_name}}</td>
                <td>{{$category->fr_name}}</td>
                <td>{{$category->parent_id}}</td>
                {{-- <td><a href="{{route('adminCategory.edit' ,$category->id)}}">Edit</a></td> --}}
                <td>
                        <a href="{{ route('adminCategory.edit',$category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('adminCategory.destroy', $category->id) }}" method="post" class="d-inline-block">
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
