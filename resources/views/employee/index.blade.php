@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('employee_saved'))
                    <div class="alert alert-success" role="alert">
                        {{ session('employee_saved') }}
                    </div>
                @endif
                @if (session('employee_deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ session('employee_deleted') }}
                    </div>
                @endif
                @if (session('updated_successfuly'))
                    <div class="alert alert-success" role="alert">
                        {{ session('updated_successfuly') }}
                    </div>
                @endif
                @if (session('video_error'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('video_error') }}
                        <a href="{{ url('videos/create')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            please create one <span class="caret"></span>
                        </a>
                    </div>
                @endif
                <div class="card border-0 shadow mb-4">
                    <div class="card-body d-flex">
                        <h5 class="m-0">All employees</h5>
                        <a href="{{ url('employee/create')}}" role="button" class="btn btn-outline-primary ml-auto">
                            Add new employee
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>
                </div>
                @isset ($employees)
                    <div class="card">
                        <div class="card-header">List of all your employees</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Company</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <th scope="row">{{$employee->firstname}}</th>
                                        <th scope="row">{{$employee->lastname}}</th>
                                        <td>{{$employee->designation}}</td>
                                        <td>{{$employee->address}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{$employee->company}}</td>
                                        <td>
                                            {!!Form::open(['route' => ['edit/employee',$employee->id], 'method'=>'GET'])!!}
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            {!!Form::close() !!}

                                            {!!Form::open(['route' => ['employee/delete',$employee->id], 'method'=>'DELETE'])!!}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            {!!Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <?php echo $employees->render(); ?>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
@endsection
