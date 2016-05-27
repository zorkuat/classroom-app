@extends('layouts.app')

@section('title', 'Profile')

@section('page-header', 'General Account Information')

@section('content')
  <!-- Display flashed session data on successful update -->
  @include('common.session-data')

  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        Your profile's information, <strong>{{ Auth::user()->first_name }}</strong>.
      </h4>
    </div>
    <div class="panel-body">
      <div class="col-xs-12 col-md-12">
          <p><strong>First name:</strong> {{ Auth::user()->first_name }}</p>
          <p><strong>Last name:</strong> {{ Auth::user()->last_name }}</p>
          <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
          <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
          <p><strong>Created at:</strong> {{ Auth::user()->created_at }}</p>
          <p><strong>Updated at:</strong> {{ Auth::user()->updated_at }}</p>
      </div>
    </div>
  </div>

  <!-- Edit Profile Information Section -->
  <div class="panel panel-warning">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Edit Your Profile Information</a>
      </h4>
    </div>

    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
          <div class="well">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/update') }}">
              {{ csrf_field() }}

              <!-- First Name -->
              <div class="form-group{{ $errors->has('first_name') ? ' has-error': ''}}">
                <label class="col-md-3 col-md-offset-1 control-label">First Name</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="first_name" value="{{ $errors->has('first_name') ? old('first_name') : Auth::user()->first_name }}">

                  @if ($errors->has('first_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                  @endif
                </div>
              </div>

              <!-- Last Name -->
              <div class="form-group{{ $errors->has('last_name') ? ' has-error': ''}}">
                <label class="col-md-3 col-md-offset-1 control-label">Last Name</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="last_name" value="{{ $errors->has('last_name') ? old('last_name') : Auth::user()->last_name }}">

                  @if ($errors->has('last_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                  @endif
                </div>
              </div>

              <!-- Submit Button -->
              <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection