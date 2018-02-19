@extends('admin.layouts.app')
@section('title') MyApp Register @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-user-plus"></i> New Employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')

                <div class="col-md-6">


                <form class="form-horizontal" role="form" method="POST" action="{{route('register')}}">
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

                    <div class="form-group{{ $errors->has('password_again') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="password_again" class="control-label">Password Again</label>

                            <input id="password_again" type="password" class="form-control" name="password_again">

                            @if ($errors->has('password_again'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_again') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="user_role" class="control-label">User Role</label>

                            <select name="user_role" class="form-control">
                                <option value="">-Select User Role</option>
                                @foreach($roles as $role)
                                    <option>{{$role->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('user_role'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('user_role') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-success btn-block">
                                Sign Up
                            </button>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
                </div>

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection

