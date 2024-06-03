@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')


    <!-- Display success or error messages -->
    {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif --}}
   
        <div class="d-flex justify-content-end align-items-center pb-2">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        </div>
    
    <div class="card mb-4">
        <div class="card-header">
            {{-- <i class="fas fa-table me-1"></i> --}}
            Users
        </div>
        <div class="card-body">
            <table id="datatablesSimple" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Roles</th> --}}
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>
                                @foreach ($user->roles as $role)
                                    <span class="">{{ $role->name }}</span>
                                @endforeach
                            </td> --}}
                            <td>
                                {{-- <a href="{{ route('users.show', $user->id) }}" class="btn  btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a> --}}
                                <a class="btn btn-sm" data-toggle="modal" data-target="#exampleModalLong{{ $user->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                {{-- detail modal  --}}
                                <div class="modal fade" id="exampleModalLong{{ $user->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">user Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- user info  --}}
                                                <div class="">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Name
                                                                </div>
                                                                <p>{{ $user->name }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Email
                                                                </div>
                                                                <p>{{ $user->email }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Phone number
                                                                </div>
                                                                <p>{{ $user->phone_number }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Address</div>
                                                                <p>{{ $user->address }}</p>
                                                            </div>
                                    
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn text-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                               
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger"
                                            onclick="return confirm('Are you sure you want to delete ');"> <i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endsection
