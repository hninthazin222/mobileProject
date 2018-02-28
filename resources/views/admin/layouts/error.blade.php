@extends('admin.layouts.app')
@section('title') MyApp Error @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-danger"><i class="fa fa-exclamation-triangle"></i> Error</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')
                <h2 class="text-danger"><i class="fa fa-exclamation-triangle"></i> You don't have permission this page.</h2>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
