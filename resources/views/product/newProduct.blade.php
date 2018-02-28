@extends('admin.layouts.app')
@section('title') MyApp newProduct @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-plus-circle"></i> New Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('new-product')}}" method="post">
                        <div class="form-group @if($errors->has('pd_name')) has-error @endif">
                            @if($errors->has('pd_name')) <span class="help-block">{{$errors->first('pd_name')}}</span> @endif
                            <label for="pd_name" class="control-label">Product Name</label>
                            <input type="text" name="pd_name" id="pd_name" class="form-control">
                        </div>
                        <div class="form-group @if($errors->has('qty')) has-error @endif">
                            @if($errors->has('qty')) <span class="help-block">{{$errors->first('qty')}}</span> @endif
                            <label for="qty" class="control-label">Qty</label>
                            <input type="text" name="qty" id="qty" class="form-control">
                        </div>
                        <div class="form-group @if($errors->has('buy_price')) has-error @endif">
                            @if($errors->has('buy_price')) <span class="help-block">{{$errors->first('buy_price')}}</span> @endif
                            <label for="buy_price" class="control-label">Buying Price</label>
                            <input type="number" name="buy_price" id="buy_price" class="form-control">
                        </div>
                        <div class="form-group @if($errors->has('sale_price')) has-error @endif">
                            @if($errors->has('sale_price')) <span class="help-block">{{$errors->first('sale_price')}}</span> @endif
                            <label for="sale_price" class="control-label">Sale Price</label>
                            <input type="number" name="sale_price" id="sale_price" class="form-control">
                        </div>

                        <div class="form-group @if($errors->has('cat_id')) has-error @endif">
                            @if($errors->has('cat_id')) <span class="help-block">{{$errors->first('cat_id')}}</span> @endif
                            <label for="cat_id" class="control-label">Select Category</label>
                            <select name="cat_id" class="form-control">
                                <option value="">-Select Category-</option>
                                @foreach($cate as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
