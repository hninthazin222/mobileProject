@extends('admin.layouts.app')
@section('title') MyApp User Profile @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-user"></i> {{$userName->name}} Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')
                <div class="text-center">
                    <img src="{{route('userImg',['user_image'=>$userName->name])}}" style="height: 200px; width: 200px;" class="img img-thumbnail">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="{{route('imgUpload')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_image" class="control-label">Select User Image</label>
                            <input type="file" name="user_image" id="user_image col-md-4" style="height: auto">
                            <button type="submit" class="btn btn-primary btn-block">Upload Image</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item"><i class="fa fa-user"></i> User Name : {{$userName->name}}</li>
                    <li class="list-group-item"><i class="fa fa-user-circle-o"></i> User Role : @if($userName->hasRole('Admin')) Adminstration @else Employee @endif</li>
                    <li class="list-group-item"><i class="fa fa-clock-o"></i> Created Date : {{date('d-m-Y h:i A',strtotime($userName->created_at))}}</li>
                </ul>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
