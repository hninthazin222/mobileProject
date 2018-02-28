@extends('admin.layouts.app')
@section('title') MyApp Detail @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-share-square-o"></i> Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @foreach($orders as $order)
                    <div class="panel-primary">
                        <div class="panel-heading">Customer : @if($order->customer) {{$order->customer}} @else Customer @endif | Waiter : {{$order->user->name}} <p class="pull-right">{{date('d-m-Y h:i A',strtotime($order->created_at))}}</p> </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                                @foreach($order->cart->items as $item)
                                    <tr>
                                        <td>{{$item['item']['pd_name']}}</td>
                                        <td>{{$item['item']['sale_price']}}</td>
                                        <td>{{$item['qty']}}</td>
                                        <td>{{$item['price']}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Total Amount</td>
                                    <td>{{$order->cart->totalAmount}}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    @endforeach
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection
