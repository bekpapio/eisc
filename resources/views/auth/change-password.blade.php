@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<body>
    <div class="card p-4">
        <h4 class="text-center">Changes Password</h4>

        {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif --}}


        <form method="POST" action="{{ route('change.password') }}">
            @csrf
            <div class="row">
                <div class="form-group mb-3 col-md-6">
                    <label for="old_password">Old Password:</label>
                    <input type="password" id="old_password" name="old_password" class="form-control" required>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="new_password_confirmation" class="form-control"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function checkPasswordMatch() {
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (newPassword !== confirmPassword) {
            document.getElementById("password_match_message").innerHTML = "Passwords do not match";
        } else {
            document.getElementById("password_match_message").innerHTML = "";
        }
    }
    </script>
</body>
@endsection