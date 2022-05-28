@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col ">
            <div class="card">
                <div class="card-header">
                    Create new Currency
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('adminCurrency.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="symbole" class="form-label">Symbole</label>
                                <input id="symbole" type="text" class="form-control @error('symbole') is-invalid @enderror"
                                       name="symbole" value="{{ old('symbole') }}" required autocomplete="symbole" autofocus>
                                @error('symbole')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="mb-3">
                                <label for="rate" class="form-label">Rate</label>
                                <input id="rate" type="number" class="form-control @error('rate') is-invalid @enderror"
                                       name="rate" value="{{ old('rate') }}" required autocomplete="rate" autofocus>
                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button class="btn btn-primary px-4">Save Currency</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
