@extends('layouts.master')
@section('title', 'Registration Form')

@section('nav.affix')
    @parent
    @include('layouts.affix')
@endsection

@section('content')
<div class="container view-container-pad-t">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-user"></i> Registration Form </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full Name <i class="fa fa-user fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your (First) Name (Last)" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <i class="fa fa-envelope fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="syyu@example.com" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address <i class="fa fa-address-card fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Your Address" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">Zipcode <i class="fa fa-compass fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" placeholder="11333" required autofocus>

                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State <i class="fa fa-map-marker fa-blue"></i></label>

                            <div class="col-md-6">
                                    <select id="state" class="form-control" name="state" required autofocus>
                                        <option>Select One</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->abbreviation }}" value="{{ $state->abbreviation }}" {{  $state->abbreviation == old('state') ? 'selected="selected"' : '' }}> {{ $state->state }} </option>
                                        @endforeach -->

                                    </select>

                                <!-- input id="state" type="text" class="form-control" name="state" value="{ { old('state') }}" required autofocus -->
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone <i class="fa fa-phone-square fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Your Phone Number" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password <i class="fa fa-unlock fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password <i class="fa fa-key fa-blue"></i></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('consent') ? ' has-error' : '' }}">
                            <div for="consent" class="col-md-9 control-label small">
                                <div>By checking the box i agree with terms and condition for this web site</div>
                                <a href="#">To view <i class="fa fa-external-link"></i> </a>
                            </div>

                            <div class="col-md-1">
                                <input id="consent" type="checkbox" name="consent" value="1" {{ (is_array(old('consent')) && in_array(1, old('consent'))) ? ' checked' : '' }} class="form-control"  required>

                                @if ($errors->has('consent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('consent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info btn-lg">
                                    <i class="fa fa-user-plus 3x"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer small">Complete all the required fields</div>
            </div>
        </div>
    </div>
</div>
@endsection
