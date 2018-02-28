@extends('admin.layouts.app')
@section('title') MyApp Edit Product @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-product-hunt"></i> Edit Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row col-md-6">

                <form action="{{route('edit-product')}}" method="post">
                    <input type="hidden" id="id" name="id" value="{{$pd->id}}">
                    <div class="form-group">
                        <label for="pd_name" class="control-label">Product Name</label>
                        <input type="text" value="{{$pd->pd_name}}" name="pd_name" id="pd_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="qty" class="control-label">Qty</label>
                        <input type="text" value="{{$pd->qty}}" name="qty" id="qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="buy_price" class="control-label">Buying Price</label>
                        <input type="number" value="{{$pd->buy_price}}" name="buy_price" id="buy_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sale_price" class="control-label">Sale Price</label>
                        <input type="number" value="{{$pd->sale_price}}" name="sale_price" id="sale_price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cat_id" class="control-label">Select Category</label>
                        <select name="cat_id" class="form-control">
                            <option value="">-Select Category-</option>
                            @foreach($cate as $cat)
                                <option value="{{$cat->id}}" @if($cat->id==$pd->cat_id) selected @endif>{{$cat->cat_name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Save Product</button>
                    </div>
                    {{csrf_field()}}
                </form>

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
