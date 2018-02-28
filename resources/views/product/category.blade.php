@extends('admin.layouts.app')
@section('title') MyApp Category @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-list"></i> Categories</h1>
                    <div class="pull-right">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newCat"><i class="fa fa-plus-circle"></i> New Category</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    @foreach($cate as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->cat_name}}</td>
                            <td><a href="#" id="btnCatDel" idd="{{$cat->id}}" class="text-danger"><i class="fa fa-trash"></i> </a> </td>
                        </tr>
                        @endforeach
                    {{$cate->links()}}
                </table>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
<div class="showDel navbar-fixed-bottom"></div>
    <!--New Category Modal -->
    <div class="modal fade" id="newCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div id="showCat"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Insert Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cat_name" class="control-label">New Category</label>
                        <input type="text" name="cat_name" id="cat_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btnNewCat" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
