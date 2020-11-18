@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6" style="margin-bottom: 20px;">
                <div class="card" style="width: 100%">
                    <a href="{{url('activate_enter')}}">
                        <img class="card-img-top" src="{{asset('images/enter.jpg')}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title" style="text-align: center;"><small class="text text-muted">Click icon to Enter</small></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 100%">
                    <a href="{{url('activate_exit')}}">
                        <img class="card-img-top" src="{{asset('images/exit.png')}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title" style="text-align: center;"><small class="text text-muted">Click icon to Exit</small></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection