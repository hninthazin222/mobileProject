@extends('admin.layouts.app')
@section('title') MyApp Report @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-bar-chart"></i> Report</h1>
                    <div class="col-md-3 pull-right">
                    <form action="{{route('search-by-date')}}" method="get" class="input-group custom-search-form">
                        <input type="date" name="search_date" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        {{csrf_field()}}
                    </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>
            <div class="row">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Cashier</th>
                        <th>Customer</th>
                        <th>Saling Price</th>
                        <th>Buying Price</th>
                        <th>Profit</th>
                        <th>Date</th>
                        <th>Detail</th>
                        <th>Print</th>
                    </tr>
                    <?php
                    $grantTotalAmount=0;
                    $totalBuyingPrice=0;
                    ?>

                    @foreach($orders as $order)
                        <?php $buyingPrice=0; ?>
                        <?php $grantTotalAmount += $order->cart->totalAmount;?>


                        @foreach($order->cart->items as $item)
                            <?php $buyingPrice += $item['item']['buy_price'];?>
                            @endforeach
                        <?php $totalBuyingPrice += $buyingPrice; ?>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->cart->totalAmount}}</td>
                            <td><?php echo $buyingPrice; ?></td>
                            <td><?php echo $order->cart->totalAmount - $buyingPrice; ?></td>
                            <td>{{date('d-m-Y h:i A',strtotime($order->created_at))}}</td>
                            <td><a href="{{route('detail',['id'=>$order->id])}}"><i class="fa fa-delicious"></i> </a> </td>
                            <td><a target="_blank" href="{{route('print',['id'=>$order->id])}}"><i class="fa fa-print"></i> </a> </td>
                        </tr>
                        @endforeach

                </table>
            </div>
            <!-- /#page-wrapper -->
            <div class="panel panel-footer text-center">
                <p>Date : {{date('(D)d-(M)m-Y',strtotime($toDay))}}</p>
                <p>Sale Price : <?php echo $grantTotalAmount ?></p>
                <p>Buy Price : <?php echo $totalBuyingPrice ;?></p>
                <p>Profit : <?php echo $grantTotalAmount - $totalBuyingPrice; ?></p>
            </div>

        </div>
    </div>
@endsection
