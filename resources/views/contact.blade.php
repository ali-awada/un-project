@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Contact us
        </div>
        <div class="card-body">
            <form action="{{route('contact.save')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('name') is-invalid @enderror"
                           name="email" value="{{ old('name') }}" required autocomplete="email" autofocus>
                </div>
                <label for="message">Message</label>
                <textarea id="message" class="form-control mb-2" name="message">

                </textarea>
                <button class="btn btn-success">Add Message</button>
            </form>
        </div>
    </div>
@endsection
