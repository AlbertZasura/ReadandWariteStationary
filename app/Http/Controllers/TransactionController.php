<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
     /*
    function index berfungsi untuk menampilkan transaction user,
    function index akan menghitung jumlah transaksi user apabila user tidak mempunyai transaksi maka
    yang direturn hanyalah null sebaliknya akan di return total price
    */
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::where("user_id", $user->id)->get();
        for ($i = 0; $i < count($transactions); $i++) {
            $totalPrice[$i] = 0;
            for ($j = 0; $j < count($transactions[$i]->detailTransactions); $j++) {
                $totalPrice[$i] = $totalPrice[$i] + ($transactions[$i]->detailTransactions[$j]->products->price * $transactions[$i]->detailTransactions[$j]->qty);
            }
        }

        if (count($transactions) == 0) {
            return view('pages.transaction', [
                'transactions' => $transactions
            ]);
        }

        return view('pages.transaction', [
            'transactions' => $transactions,
            'totalPrice' => $totalPrice
        ]);
    }
}
