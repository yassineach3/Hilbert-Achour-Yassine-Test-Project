@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <div class="card d-block shadow-lg rounded mb-4">
                    @isset ($videos)
                        <div class="card-header">List of all the companies</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Description</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($videos as $video)
                                    <tr>
                                        <th scope="row">{{$video->title}}</th>
                                        <td>
                                            <a href="{{$video->link}}">{{$video->link}}</a>
                                        </td>
                                        <td>{{$video->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-header">No Data !</div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
