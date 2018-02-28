@extends('admin.layouts.app')
@section('title') MyApp Print @stop
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-primary text-center">City Mark</h1>
                <p class="text-warning text-center">Address : Mawlamyine</p>
                <p class="pull-right text-danger"><i class="fa fa-phone"></i>Phone : 09255760378</p>
                @foreach($orders as $order)
                    <p>Cashier : {{$order->customer}}</p>
                    <p>Customer : {{$order->user->name}}</p>
                    <p>Date : {{date('d-m-Y h:i A',strtotime($order->created_at))}}</p>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total Amount</th>
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

                    @endforeach
            </div>
        </div>
    </div>
@endsection
