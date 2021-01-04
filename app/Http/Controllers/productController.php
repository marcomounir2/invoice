<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\product;
use App\Stock;
use App\Bill;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function addproduct( ){
        return view('frontend.create');

    }

    public function saveproduct(Request $request ){
        $product = new Product();

        $product->product_no = $request->input('product_no');
        $product->product_qunt = $request->input('product_qty');

        $product->save();
        return view('frontend.create');
    }
    public function product(){

        $products = Product::get();
        return view('frontend.product')->with('products', $products);

    }

    public function stock(){
        $Products = Product::select([
                DB::raw('product_no as number'),
                DB::raw('sum(product_qunt) as qty')
            ])
            ->groupBy('number')
            ->get();
            return view ('frontend.stock',['Products'=>$Products]);

    }

    public function addbill( ){
        return view('frontend.createbill');

    }

    public function savebill(Request $request ){
        $bill = new Bill();

        $bill->product_no = $request->input('product_no');
        $bill->product_qunt = $request->input('product_qty');

        $bill->save();
        return view('frontend.createbill');
    }

    public function bill(){

        $bills = Bill::get();
        return view('frontend.bill')->with('bills', $bills);

    }

}
