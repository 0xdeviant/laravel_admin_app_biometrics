@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 50px;">
        <div style="margin-bottom:10px;">
            <a href="/logs" style="text-decoration: none">
                <svg style="position:relative; top:-2px;" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                    <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
        </div>
        @if($success)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Please put your finger in the sensor properly.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if($remove)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>You have deleted that person from the database!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @include('includes.navpeople')
        <table class="table table-striped">
            <thead>
                <tr>
                    <td><strong>First Name</strong></td>
                    <td><strong>Last Name</strong></td>
                    <td><strong>Date Added</strong></td>
                    <td><strong>Action</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($persons as $person)
                    <tr>
                        <td>{{$person['fname']}}</td>
                        <td>{{$person['lname']}}</td>
                        <td>{{$person['created_at']}}</td>
                        <td>
                            <form action="/delete" method="POST">
                                @csrf
                                <input type="text" hidden value="{{$person['fname']}}" name="fname">
                                <input type="text" hidden value="{{$person['lname']}}" name="lname">
                                <button type="button" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger btn-sm">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                                @include('includes.deletemodal')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$persons->links()}}
    </div>
@endsection