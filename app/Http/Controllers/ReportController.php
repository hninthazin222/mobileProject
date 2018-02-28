<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getDetail($id){
        $orders=Order::where('id',$id)->get();
        $orders->transform(function ($order, $key){
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view('detail')->with(['orders'=>$orders]);
    }
    public function getPrint($id){
        $orders=Order::where('id',$id)->get();
        $orders->transform(function ($order, $key){
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view('print')->with(['orders'=>$orders]);
    }
    public function searchByDate(Request $request){
        $today=$request['search_date'];
        $orders=Order::where('created_at','LIKE','%'.$today.'%')->get();
        $orders->transform(function ($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });

        return view('admin.report')->with(['orders'=>$orders])->with(['toDay'=>$today]);

    }
    public function report(){
        $today=date('Y-m-d');
        $orders=Order::where('created_at','LIKE','%'.$today.'%')->get();
        $orders->transform(function ($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });

        return view('admin.report')->with(['orders'=>$orders])->with(['toDay'=>$today]);
    }
}
