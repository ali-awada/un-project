@extends('layouts.admin')
@section('content')
<div class="my-4 d-flex justify-content-between align-items-center">
    <h2>Currencies</h2>
    <a class="btn btn-primary" href="{{ route('adminCurrency.create') }}">Create Currency</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"> Name</th>
            <th scope="col"> Symbol</th>
            <th scope="col"> Rate</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currencies as $currency)
        <tr>
            <td>{{ $currency->id }}</td>
            <td>{{ $currency->name }}</td>
            <td>{{ $currency->symbole }}</td>
            <td>{{ $currency->rate }}</td>
            <td>
                <a href="{{ route('adminCurrency.edit', $currency->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('adminCurrency.destroy', $currency->id) }}" method="post" class="d-inline-block">
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