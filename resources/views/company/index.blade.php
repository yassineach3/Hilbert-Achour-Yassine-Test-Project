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
                @if (session('company_saved'))
                    <div class="alert alert-success" role="alert">
                        {{ session('company_saved') }}
                    </div>
                @endif
                @if (session('company_deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ session('company_deleted') }}
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
                            <h5 class="m-0">All companies</h5>
                            <a href="{{ url('company/create')}}" role="button" class="btn btn-outline-primary ml-auto">
                                Add new company
                                <i class="fa fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                @isset ($companies)
                    <div class="card">
                        <div class="card-header">List of all your companies</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Website</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <th scope="row">{{$company->name}}</th>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->address}}</td>
                                        <td>{{$company->phone}}</td>
                                        <td>
                                            <a href="{{$company->website}}">{{$company->website}}</a>
                                        </td>
                                        <td>
                                            {!!Form::open(['route' => ['edit',$company->id], 'method'=>'GET'])!!}
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            {!!Form::close() !!}

                                            {!!Form::open(['route' => ['videos/delete',$company->id], 'method'=>'DELETE'])!!}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            {!!Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
@endsection
