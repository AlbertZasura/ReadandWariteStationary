<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function create() {
        $users = Session::get('users');
        if($users == null) return view('pages.cart');
        else return view('cart.view', ['users' => $users]);
    }

    public function show($cart) {
        $users = Session::get('users');
        $carts = Cart::all()->where('user_id', $cart);
        return view('cart.view', ['users' => $users, 'carts' => $carts]);
    }

    public function add(Request $request, $productId) {
        $this->validate(request(), [
            'qty' => 'required|min:0'
        ]);

        $products = Product::find($productId);
        if($products->stock < $request->qty || $request->qty < 0) return back()->with('error', 'Out of Stock');
        else {
            $carts = Cart::where('user_id', Session::get('users')->id)->where('product_id', $products->id)->first();
            if($carts) {
                $carts->qty = $carts->qty + $request->qty;
                $carts->save();
            }
            else {
                $carts = Cart::create([
                    'user_id' => Session::get('users')->id,
                    'product_id' => $productId,
                    'qty' => $request->qty 
                ]);
            }
            return redirect('/product/'.$productId.'/edit');
        }
    }

    public function destroy($carts) {
        Cart::destroy($carts);
        $users = Session::get('users');
        return redirect('/cart/'.$users->id);
    }

    public function update($id) {
        $users = Session::get('users');
        $carts = Cart::find($id);
        return view('cart.update', ['users' => $users, 'carts' => $carts]);
    }

    public function fecth(Request $request, $id) {
        $users = Session::get('users');
        $carts = Cart::find($id);
        if($request->qty > 0) $carts->qty = $request->qty;
        $carts->save();
        return redirect('/cart/'.$users->id);
    }
}