<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getEditProduct(Request $request){
        $id=$request['id'];

        $pd=Product::where('id',$id)->first();
        $pd->pd_name=$request['pd_name'];
        $pd->buy_price=$request['buy_price'];
        $pd->sale_price=$request['sale_price'];
        $pd->qty=$request['qty'];
        $pd->cat_id=$request['cat_id'];
        $pd->update();
        return redirect()->route('product');
    }
    public function editProPage($id){
        $pd=Product::where('id',$id)->first();
        $cate=Category::all();
        return view('product.editProduct')->with(['pd'=>$pd])->with(['cate'=>$cate]);
    }
    public function deleteProduct(Request $request){
        $id=$request['id'];
        $pd=Product::where('id',$id)->first();
        $pd->delete();
        echo "delete Product success.";
    }
    public function barCode(Request $request){
        $id=$request['checkBarcode'];
        if($id){
            $pd=Product::whereIn('id',$id)->get();
            return view('product.barcode')->with(['product'=>$pd]);
        }else{
            return redirect()->back();
        }

    }
    public function insertNewProduct(Request $request){
        $this->validate($request,[
            'pd_name'=>'required|unique:products',
            'buy_price'=>'required',
            'sale_price'=>'required',
            'qty'=>'required',
            'cat_id'=>'required',
        ]);
        $pd=new Product();
        $pd->pd_name=$request['pd_name'];
        $pd->buy_price=$request['buy_price'];
        $pd->sale_price=$request['sale_price'];
        $pd->qty=$request['qty'];
        $pd->barcode=rand(000000,999999);
        $pd->cat_id=$request['cat_id'];
        $pd->save();
        return redirect()->back();

    }
    public function product(){
        $pro=Product::all();
        return view('product.product')->with(['product'=>$pro]);
    }
    public function newProduct(){
        $cat=Category::all();
        return view('product.newProduct')->with(['cate'=>$cat]);
    }
    public function delCat(Request $request){
        $id=$request['id'];

        $cate=Category::where('id',$id)->first();
        $and=$cate->delete();
        if($and){
            echo "<div class='alert alert-success'>Category delete success.</div>";
        }else{
            echo "<div class='alert alert-danger'>Category delete failed.</div>";
        }
    }
    public function insertCat(Request $request){
        $cat_name=$request['cat_name'];

        if($cat_name){
            $cat=Category::where('cat_name',$cat_name)->first();
            if(!$cat){
                $cate=new Category();
                $cate->cat_name=$cat_name;
                $ans=$cate->save();
                if($ans){
                    echo "<div class='alert alert-success'>Insert Category success.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Can't insert Category.</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>The category name already exists.</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>The category field required.</div>";
        }

    }
    public function category(){
        $cate=Category::OrderBy('id','desc')->paginate('5');
        return view('product.category')->with(['cate'=>$cate]);
    }

}
