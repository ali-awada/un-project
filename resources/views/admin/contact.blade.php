@extends('layouts.admin')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        </thead>

        <tbody>
        @foreach($messages as $message)

        <tr>
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->message}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
