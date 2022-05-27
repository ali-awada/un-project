@extends('layouts.admin')
@section('content')
    <div class="my-4 d-flex justify-content-between align-items-center">
        <h2>Brands</h2>
        <a class="btn btn-primary" href="{{ route('adminBrand.create') }}">Create Brand</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col"> name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td><img width=50 src="{{ url($brand->image) }}" alt=""></td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <a href="{{ route('adminBrand.edit', $brand->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('adminBrand.destroy', $brand->id) }}" method="post" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
