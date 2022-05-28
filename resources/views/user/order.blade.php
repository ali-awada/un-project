@extends('layouts.user')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Total</th>
            <th>Placed Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->total . $order->currency->symbole}}</td>
                <td>{{$order->created_at}}</td>
                @if($order->status == 0)
                    <td>Pending</td>
                @else
                    <td>Completed</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
