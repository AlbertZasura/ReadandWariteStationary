<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\DetailTransaction;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function create() {
        
    }

    public function show() {
        if (Auth::check() == false) {
            return redirect()->home();
        }
        $carts = Cart::all()->where('user_id',Session::get('users')->id);
        return view('cart.view', ['carts' => $carts]);
    }

    public function add(Request $request, $productId) {
        $this->validate(request(), [
            'qty' => 'required|min:1'
        ]);

        $products = Product::find($productId);
        if($products->stock < $request->qty || $request->qty <= 0) return back()->with('error', 'Invalid Stock');
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
        return redirect('/cart');
    }

    public function update($id) {
        if (Auth::check() == false) {
            return redirect()->home();
        }
        $carts = Cart::find($id);
        return view('cart.update', ['carts' => $carts]);
    }

    public function fecth(Request $request, $id) {
        $carts = Cart::find($id);
        $products = Product::find($carts->product_id);
        
        $this->validate($request, [
            'qty' => 'required|min:0|max:'.$products->stock
        ]);
        
        if($request->qty <= 0 || $products->stock < $request->qty) {
            $errorMessage = null;
            if($request->qty <= 0) $errorMessage = 'Input At least bigger than 0';
            else $errorMessage = 'The Quantity must lower than '.$products->stock; 
            return back()->with('carts', $carts)->with('error', $errorMessage);
        }
        $carts->qty = $request->qty;
        $carts->save();
        return view('cart.update', ['carts' => $carts]);
    }

    public function checkOut() {
        $transaction = Transaction::create([
            'user_id' => Session::get('users')->id,
            'date' => now()
        ]);
        
        $carts = Cart::all()->where('user_id', Session::get('users')->id,);
        foreach($carts as $cart) {
            $products = Product::find($cart->product_id);
            // decrease stock product with cart qty
            $products->stock = $products->stock - $cart->qty;
            $products->save();

            $detailTransaction = DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $products->id,
                'qty' => $cart->qty
            ]);
            Cart::destroy($cart->id);
        }
        return redirect('/transaction');
    }
}