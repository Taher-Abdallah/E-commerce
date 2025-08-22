<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items=Cart::instance('cart')->content();
        return view('front.cart',compact('items'));
    }
    public function add(Request $request)
    {
        Cart::instance('cart')->add($request->id,$request->name,$request->quantity,$request->price)->associate('App\Models\Product');
        return redirect()->back()->with('success','Product added to cart successfully');
    }
    public function increase($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->update($rowId,$item->qty + 1);
        return redirect()->back();
    }
    public function decrease($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->update($rowId,$item->qty - 1);
        return redirect()->back();
    }
    public function remove($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function deleteAll($rowId)
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

}
