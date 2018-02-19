@extends ('admin.layouts.app')
@section('title') MyApp | Login @stop
@section ('body')
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-4 col-md-offset-4">
                @if(Session('err')) <div class="alert alert-danger">{{Session('err')}}</div> @endif
                @component('admin.widgets.panel')
                    @slot ('panelTitle', 'Please Sign In')
                    @slot ('panelBody')
                        <form class="form-horizontal" role="form" method="POST" action="{{route('login')}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="name" class="control-label">Username</label>

                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="password" class="control-label">Password</label>

                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-success btn-block">
                                        Login
                                    </button>
                                    <br>
                                    <a class="btn-link" href="#">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
