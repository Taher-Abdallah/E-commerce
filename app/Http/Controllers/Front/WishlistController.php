<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Cart::instance('wishlist')->content();
        
        return view('front.wishlist', compact('wishlistItems'));
    }
    public function add(Request $request)
    {
        Cart::instance('wishlist')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }
    public function remove($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }

    public function removeAll()
    {

        Cart::instance('wishlist')->destroy();
        return redirect()->back();
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\Product');
        return redirect()->route('front.cart');
    }

}