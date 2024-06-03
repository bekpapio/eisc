@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    
    <div class="card mb-4">
        <div class="card-header">
            {{-- <i class="fas fa-table me-1"></i> --}}
            students
        </div>
        <div class="card-body">
            <table id="datatablesSimple" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th class="">Name</th>
                        <th class="">Last Name</th>
                        <th class="">Email</th>
                        <th class=""></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>

                            <td>{{ $student->first_name }} </td>
                            <td>{{ $student->last_name }} </td>
                            <td>{{ $student->email }} </td>
                            {{-- <td>{{ $student->description }}</td> --}}
                            <td>
                                <a class="btn btn-sm" data-toggle="modal" data-target="#exampleModalLong{{ $student->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                               {{-- detail modal  --}}
                                <div class="modal fade" id="exampleModalLong{{ $student->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Student Detail</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- student info  --}}
                                                <div class="">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Name
                                                                </div>
                                                                <p>{{ $student->first_name }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Last Name
                                                                </div>
                                                                <p>{{ $student->last_name }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Phone number
                                                                </div>
                                                                <p>{{ $student->phone_number }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Email</div>
                                                                <p>{{ $student->email }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Date of Birth</div>
                                                                <p>{{ $student->dob }}</p>
                                                            </div>
                                                            {{-- <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">What to Study</div>
                                                                <p>{{ $student->what_to_study }}</p>
                                                            </div> --}}
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Residence</div>
                                                                <p>{{ $student->residence }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Course Start Date</div>
                                                                <p>{{ $student->course_start_date }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">English test taken</div>
                                                                <p>{{ $student->english_taste_taken }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Acadamic Qualification</div>
                                                                <p>{{ $student->academic_qualification }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Source Funds</div>
                                                                <p>{{ $student->source_funds }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Work with agents</div>
                                                                <p>{{ $student->work_with_agent }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Register Date</div>
                                                                <p>{{ $student->created_at }}</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="text-primary font-weight-bold">Question</div>
                                                                <p>{{ $student->question }}</p>
                                                            </div>
                                    
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn text-primary btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete ');">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
