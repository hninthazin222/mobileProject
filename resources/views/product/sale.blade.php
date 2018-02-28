@extends('admin.layouts.app')
@section('title') MyApp Sale @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-share-alt"></i> Sale</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">Scan Barcode and Product name</div>
                        <div class="panel-body">
                            <form id="sale_form" action="{{route('add-to-cart')}}" method="post">
                                <div class="form-group">
                                    <input type="search" autofocus list="sale_list" name="sale_item" id="sale_item" class="form-control" placeholder="Scan Barcode and Product Name">
                                    <datalist id="sale_list">
                                        @foreach($pd as $pro)
                                            <option value="{{$pro->pd_name}}"></option>
                                            @endforeach
                                    </datalist>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel panel-heading"><i class="fa fa-shopping-basket"></i> Show Cart</div>
                            <div class="panel panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>TotalAmount</th>
                                        <th>Remove Cart</th>
                                    </tr>
                                    </thead>
                                    @if(Session::has('cart'))
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td>{{$cart['item']['pd_name']}}</td>
                                            <td>{{$cart['item']['sale_price']}}</td>
                                            <td><a href="{{route('decrease-item',['id'=>$cart['item']['id']])}}" class="text-success"><i class="fa fa-minus-circle"></i> </a> {{$cart['qty']}} <a href="{{route('increase-item',['id'=>$cart['item']['id']])}}" class="text-success"><i class="fa fa-plus-circle"></i> </a> </td>
                                            <td>{{$cart['price']}}</td>
                                            <td><a href="{{route('remove-item',['id'=>$cart['item']['id']])}}" class="text-danger"><i class="fa fa-trash"></i> </a> </td>
                                        </tr>
                                        @endforeach
                                    <tr>
                                        <td colspan="3">TotalAmount</td>
                                        <td>{{$totalAmount}}</td>
                                    </tr>
                                        <tr>
                                            <td colspan="3">Payment Total</td>
                                            <td>@if(Session::has('a_t')) {{Session::get('a_t')}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Amount Due</td>
                                            <td>@if(Session::has('a_t')) {{Session::get('a_t')-$totalAmount}}@endif</td>
                                        </tr>
                                    @endif
                                </table>

                                <div class="row">
                                    <div class="col-md-6">
                                    <form action="{{route('payment')}}" method="post">
                                        <div class="form-group text-center" style="width: 200px">
                                            <label for="amount_tendered" class="control-label">Amount Tendered</label>
                                            <input type="text" name="amount_tendered" value="@if(Session::has('cart')){{$totalAmount}}@endif" class="form-control">
                                            <button type="submit" class="btn btn-success btn-sm btn-block">Add Payment</button>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                        @if(Session::has('cart'))
                                            @if(Session::has('a_t'))
                                        <form action="{{route('getCustomer')}}" method="post" target="_blank">
                                            <div class="form-group">
                                                <label for="customer" class="control-label">Enter Customer Name</label>
                                                <input type="text" name="customer" class="form-control">
                                                <button type="submit" class="btn btn-warning btn-block">Add Customer</button>
                                            </div>
                                            {{csrf_field()}}
                                        </form>
                                            @endif
                                            @endif
                                    </div>
                                </div>

                                <a href="{{route('sale')}}" class="btn btn-primary btn-block">New Sale</a>

                            </div>
                        </div>


                </div>

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>

    <div class="col-md-6 col-md-offset-3 navbar-fixed-bottom">
        @if(Session('info'))
            <div class="alert alert-danger" id="showQty">{{Session('info')}}</div>
        @endif
    </div>

@endsection
