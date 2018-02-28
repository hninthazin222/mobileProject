<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function getCustomer(Request $request){
        $customer=$request['customer'];
        $user_id=Auth::User()->id;
        $amount_tendered=Session::get('a_t');
        $cart=Session::get('cart');
        $od=new Order();
        $od->customer=$customer;
        $od->user_id=$user_id;
        $od->amount_tendered=$amount_tendered;
        $od->cart=serialize($cart);
        $od->save();

        Session::forget('cart');
        Session::forget('a_t');

        $id=$od->id;
        $orders=Order::where('id',$id)->get();
        $orders->transform(function ($order, $key){
           $order->cart=unserialize($order->cart);
           return $order;
        });
        return view('print')->with(['orders'=>$orders]);
    }
    public function payment(Request $request){
        $amount_tedered=$request['amount_tendered'];
        Session::put('a_t',$amount_tedered);
        return redirect()->back();
    }
    public function getDecreaseItem($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->decrease($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
           Session::forget('cart');
        }

        return redirect()->back();
    }
    public function getIncreaseItem($id){
        $pd=Product::where('id',$id)->first();
        if($pd->qty>0){
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);
            $cart->increase($id);
            Session::put('cart',$cart);
            return redirect()->back();
        }else{
            return redirect()->back()->with('info',"the quality does not has exist.");
        }


    }
    public function getRemoveItem($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
            Session::forget('a_t');
        }
        return redirect()->back();
    }
    public function salePage(){
        if(Session::has('cart')){
            $pd = Product::all();
            $cart=Session::get('cart');
            return view('product.sale')->with(['pd' => $pd])->with(['carts'=>$cart->items])->with(['totalAmount'=>$cart->totalAmount]);
        }else {
            $pd = Product::all();
            return view('product.sale')->with(['pd' => $pd]);
        }
    }
    public function postAddToCart(Request $request){
        $sale_item=$request['sale_item'];
        $pd = Product::where('barcode', $sale_item)->orwhere('pd_name', $sale_item)->first();
        if($pd) {
            if($pd->qty>0) {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $oldQty = $pd->qty;
                $newQty = $oldQty-1;
                $pd->qty = $newQty;
                $pd->update();
                $cart->add($pd, $pd->id);
                Session::put('cart', $cart);
                return redirect()->back();
            }else{
                return redirect()->back()->with('info',"the quality does not has exist.");
            }

        }else{
            return redirect()->back();
        }
    }
}
