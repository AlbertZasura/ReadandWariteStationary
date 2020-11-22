<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::where("user_id", $user->id)->get();
        for ($i = 0; $i < count($transactions); $i++) {
            $detailTransactions[$i] = $transactions[$i]->detailTransactions;
            $totalPrice[$i] = 0;
            for ($j = 0; $j < count($detailTransactions[$i]); $j++) {
                $products[$i][$j] = Product::where('id', $detailTransactions[$i][$j]->product_id)->first();
                $totalPrice[$i] = $totalPrice[$i] + ($products[$i][$j]->price * $detailTransactions[$i][$j]->qty);
            }
        }

        if(count($transactions)==0){
            return view('pages.transaction', [
                'transactions' => $transactions
            ]);
        }

        return view('pages.transaction', [
            'transactions' => $transactions,
            'detailTransactions' => $detailTransactions,
            'totalPrice' => $totalPrice,
            'products' => $products
        ]);
    }
}
