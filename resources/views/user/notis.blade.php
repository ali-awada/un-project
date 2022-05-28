@extends('layouts.user')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Arrived</th>
            <th>text</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notis as $noti)
            <tr>
                <th>{{$noti->created_at}}</th>
                <th>{{$noti->text}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
