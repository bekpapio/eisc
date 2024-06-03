@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">Update Profile</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ Auth::user()->address }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="text" name="phone_number" id="phone" class="form-control"
                                    value="{{ Auth::user()->phone_number }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
