@extends('layouts.app')

@section('content')
    <div class="container">
      @if ($success == 'true')
      {{-- Alert after sending a request --}}
        <div  style="margin-top: 30px; margin-left: 30px; margin-right: 30px;" class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Your alert has been sent!</strong> Appropriate department is now being notified.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      {{-- Control panel section --}}
        <div style="padding: 50px;">
          <h4><span class="badge badge-light" style="background: white;">Biometric Record</span></h4>
          <hr>
          <form method="POST" action="/send">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Select Emergency Type</label>
                <select name="alert_type" id="" class="form-control form-control-lg">
                    @foreach ($emergencies as $emergency)
                        <option value="{{$emergency}}">{{$emergency}}</option>
                    @endforeach
                </select>
                <small id="emailHelp" class="form-text text-muted">
                  Please select the appropriate emergency option
                </small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Select Department</label>
                <select name="alert_location" id="" class="form-control form-control-lg">
                  @foreach ($colleges as $college)
                    <option value="{{$college}}">{{$college}}</option>
                  @endforeach
                </select>
              </div>
              {{-- Modal area --}}
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#staticBackdrop">
                Send Request
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Confirm Request</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Do you wish to proceed?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary btn-lg">Confirm</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
    </div>
@endsection