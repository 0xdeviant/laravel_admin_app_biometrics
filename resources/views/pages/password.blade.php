@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div style="margin-bottom:10px;">
                    <a href="/logs">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                            <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                        </svg>
                    </a>
                </div>
                <h4>Change Password</h4>
                <hr>
                <form action="/change" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="oldpassword">Enter Old Password</label>
                        <input class="form-control" id="oldpassword" type="text" name="oldpassword">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">Enter New Password</label>
                        <input class="form-control" id="newpassword" type="password" name="newpassword">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">Confirm New Password</label>
                        <input class="form-control" id="newpassword" type="password" name="confirmpassword">
                    </div>
                    <button class="btn btn-primary btn-lg">Submit</button>
                </form>
            </div>
            <div class="col-md-4">
                @if ($transaction)
                    @if ($success)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>You have updated your password!</strong> Please make sure you don't share it with anyone.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Update failed!</strong> Please make sure the password matches.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>   
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection