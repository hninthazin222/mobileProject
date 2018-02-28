@extends('admin.layouts.app')
@section('title') MyApp Product @stop
@section('body')
    <div id="wrapper">
        @include('admin.layouts.nav_bar')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-google-wallet"></i> Show Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <form action="{{route('barcode')}}" method="post">
                <button type="submit" class="btn btn-primary"><i class="fa fa-barcode"></i> Product Barcode</button>
                    <br>
               <div class="col-md-12">

                   <table class="table" id="myTable">
                       <thead>
                       <tr>
                           <th>Id</th>
                           <th>Check Barcode</th>
                           <th>Product Name</th>
                           <th>Buying Price</th>
                           <th>Sale Price</th>
                           <th>Qty</th>
                           <th>Barcode</th>
                           <th>Category</th>
                           <th>Edit</th>
                           <th>Remove</th>
                       </tr>
                       </thead>
                       @foreach($product as $pro)
                           <tr>
                               <td>{{$pro->id}}</td>
                               <td><input type="checkbox" name="checkBarcode[]" value="{{$pro->id}}"> </td>
                               <td>{{$pro->pd_name}}</td>
                               <td>{{$pro->buy_price}}</td>
                               <td>{{$pro->sale_price}}</td>
                               <td>{{$pro->qty}}</td>
                               <td>{{$pro->barcode}}</td>
                               <td>{{$pro->cat->cat_name}}</td>
                               <td><a href="{{route('edit-page',['id'=>$pro->id])}}"><i class="fa fa-edit"></i> </a> </td>
                               <td><a href="#" id="btnDelProduct" idd="{{$pro->id}}" class="text-danger"><i class="fa fa-trash"></i> </a> </td>

                           </tr>
                       @endforeach
                   </table>

               </div>
                    {{csrf_field()}}
                </form>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>


    <div class="col-md-6 col-md-offset-3 navbar-fixed-bottom">

            <div class="alert alert-success" id="dp"></div>

    </div>
@endsection
