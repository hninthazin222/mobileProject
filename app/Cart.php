<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart
{
    public $items;
    public $totalQty=0;
    public $totalAmount=0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalAmount=$oldCart->totalAmount;
        }else{
            $this->items=null;
        }
    }
    public function add($item,$id){
        $storeItem=['item'=>$item, 'price'=>$item->sale_price, 'qty'=>0];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storeItem=$this->items[$id];
            }
        }
        $storeItem['qty']++;
        $storeItem['price']=$storeItem['qty'] * $item->sale_price;
        $this->items[$id]=$storeItem;
        $this->totalQty++;
        $this->totalAmount +=$item->sale_price;
    }
    public function removeItem($id){
        $cartQty=$this->items[$id]['qty'];
        $pd=Product::where('id',$id)->first();
        $oldQty=$pd->qty;
        $newQty=$oldQty+$cartQty;
        $pd->qty=$newQty;
        $pd->update();
        $this->totalAmount -=$this->items[$id]['item']['sale_price'];
        unset($this->items[$id]);
    }
    public function increase($id){
        $this->items[$id]['qty']++;
        $pd=Product::where('id',$id)->first();
        $oldQty=$pd->qty;
            $newQty = $oldQty - 1;
            $pd->qty = $newQty;
            $pd->update();
            $this->items[$id]['price'] += $this->items[$id]['item']['sale_price'];
            $this->totalQty++;
            $this->totalAmount += $this->items[$id]['item']['sale_price'];
    }
    public function decrease($id){
        $this->items[$id]['qty']--;
        $pd=Product::where('id',$id)->first();
        $oldQty=$pd->qty;
        $newQty=$oldQty+1;
        $pd->qty=$newQty;
        $pd->update();
        $this->items[$id]['price'] -=$this->items[$id]['item']['sale_price'];
        $this->totalQty--;
        $this->totalAmount -=$this->items[$id]['item']['sale_price'];
        if($this->items[$id]['qty'] <=0){
            unset($this->items[$id]);
        }
    }
}
