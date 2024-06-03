@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h3 class="text-primary text-center">User Details</h3>

<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th class="text-primary">Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th class="text-primary">Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="text-primary">Phone Number</th>
                <td>{{ $user->phone_number }}</td>
            </tr>
            <tr>
                <th class="text-primary">Address</th>
                <td>{{ $user->address }}</td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection