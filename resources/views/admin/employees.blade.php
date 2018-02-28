@extends('admin.layouts.app')
@section('title') MyApp Employees @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-users"></i> Employees</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>User Role</th>
                        <th>Created Date</th>
                        <th>Change Password</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>@if($user->hasRole('Admin')) Adminstrator @else Employee @endif</td>
                            <td>{{date('d-m-Y h:i A',strtotime($user->created_at))}}</td>
                            <td><a href="#" data-toggle="modal" data-target="#p{{$user->id}}"><i class="fa fa-edit"></i> </a> </td>
                            <!--Change Password Modal -->
                            <div class="modal fade" id="p{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  
                                    <div class="modal-content">
                                        <div id="showChangePassword"></div>
                                            <input type="hidden" id="idi" name="idi" value="{{$user->id}}">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Change Password-><strong>{{$user->name}}</strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name" class="control-label">User Name</label>
                                                <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="c_password" class="control-label">New Password</label>
                                                <input type="password" name="c_password" id="c_password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="c_confirm_password" class="control-label">Confirm Password</label>
                                                <input type="password" name="c_confirm_password" id="c_confirm_password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" id="btnChangePassword" class="btn btn-primary">Change Password</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <td><a href="#" data-toggle="modal" data-target="#e{{$user->id}}"><i class="fa fa-edit"></i></a>  </td>

                            <!--Edit User Role Modal -->
                            <div class="modal fade" id="e{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('updateUserRole')}}" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><strong>{{$user->name}}</strong> User Role->@if($user->hasRole('Admin')) Adminstrator @else Employee @endif</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                            <div class="form-group">
                                                <label for="name" class="control-label">User Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_role" class="control-label">User Role</label>
                                                <select class="form-control" name="user_role">
                                                    @foreach($roles as $role)
                                                        <option>{{$role->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <td><a href="#" class="text-danger" data-toggle="modal" data-target="#d{{$user->id}}"> <i class="fa fa-trash"></i></a> </td>
                            <!--Delete User Role Modal -->
                            <div class="modal fade" id="d{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('deleteUserRole')}}" method="post">
                                            <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete {{$user->name}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">

                                                <p class="text-warning">Are you sure delete user name? <h4 class="text-danger">{{$user->name}}</h4></p>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
