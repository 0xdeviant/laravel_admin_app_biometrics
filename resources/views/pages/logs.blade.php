@extends('layouts.app')

@section('content')
    <div class="container" style="padding:50px">
        @include('includes.navlogs')
        <table class="table table-striped">
            <thead>
                <tr>
                    <td><strong>First Name</strong></td>
                    <td><strong>Last Name</strong></td>
                    <td><strong>Type</strong></td>
                    <td><strong>Timestamp</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{$log['fname']}}</td>
                        <td>{{$log['lname']}}</td>
                        <td>{{$log['direction']}}</td>
                        <td>{{$log['created_at']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$logs->links()}}
    </div>
@endsection