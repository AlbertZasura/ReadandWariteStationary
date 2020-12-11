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
    /**
     * function show berfungsi untuk mengambil dan menampilkan 
     * barang-barang yang telah dimasukan kedalam keranjang
     * setiap user.
     */
    public function show() {
        $user = Auth::user();
        $carts = Cart::all()->where('user_id',$user->id);
        return view('cart.view', ['carts' => $carts]);
    }

    /**
     * function add berfungsi untuk mengambil dan menyimpan barang
     * kedalam keranjang (cart) user dilengkapi dengan berbagai
     * validasi seperti perhitungan jumlah stock namun tidak mempengaruhi
     * nilai stock aslinya selama tidak di check out.
     */
    public function add(Request $request, $productId) {
        $this->validate(request(), [
            'qty' => 'required|min:1'
        ]);
        $user = Auth::user();
        $products = Product::find($productId);
        if($products->stock < $request->qty || $request->qty <= 0) return back()->with('error', 'Invalid Stock');
        else {
            $carts = Cart::where('user_id', $user->id)->where('product_id', $products->id)->first();
            if($carts) {
                $carts->qty = $carts->qty + $request->qty;
                $carts->save();
            }
            else {
                $carts = Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'qty' => $request->qty 
                ]);
            }
            return redirect('/product/'.$productId.'/edit');
        }
    }

    /**
     * function destroy berfungsi untuk menghapus salah satu barang
     * dalam keranjang user apabila user tidak jadi mengambil barang 
     * tersebut
     */
    public function destroy($carts) {
        Cart::destroy($carts);
        return redirect('/cart');
    }
    /**
     * function update berfungsi untuk menampilkan halaman update saat
     * user ingin mengupdate qty barang dari cart user
     */
    public function update($id) {
        $carts = Cart::find($id);
        return view('cart.update', ['carts' => $carts]);
    }

    /**
     * function fetch berfungsi untuk melakukan proses update pada barang
     * yang ada dalam cart user. proses ini mirip seperti function add namun
     * yang berbeda adalah penambahan atau pengurangan qty
     */
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
            return back()->with('error', $errorMessage);
        }

        $carts->qty = $request->qty;
        $carts->save();
        return view('cart.update', ['carts' => $carts]);
    }
    
    /**
     * function checkOut berfungsi untuk mengangkut semua barang
     * yang ada pada keranjang (cart) user kedalam suatu transaksi.
     */
    public function checkOut() {
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'date' => now()
        ]);
        
        $carts = Cart::all()->where('user_id', Auth::user()->id);
        foreach($carts as $cart) {
            $products = Product::find($cart->product_id);
            // decrease stock product with cart qty
            // check again to make sure
            if($products->stock < $cart->qty || $cart->qty <= 0) return back()->with('error', 'There\'s something error with the stock stationary');
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