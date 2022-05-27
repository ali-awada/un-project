@extends('layouts.app')
@section('content')
    {{--SHow side bar if user is logged in--}}
    @auth

    @else


    @endauth
@endsection
