@extends('admin.layouts.app')
@section('title') MyApp Barcode @stop
@section('body')
   <div class="container">
       <div class="row" style="margin-top: 50px">
   @foreach($product as $pd)

           <div class="col-md-3">
               <p class="text-center">{{$pd->pd_name}}</p>
                <p class="text-center"><img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($pd->barcode, 'C39')}}"/></p>
               <p class="text-center">{{$pd->sale_price}}</p>
           </div>

       @endforeach
</div>
</div>
@endsection
