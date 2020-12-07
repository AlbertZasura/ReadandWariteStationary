<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionSeeder extends Seeder
{
   /**
     * method dibawah merupakan seeding dimana kita membuat template insert data ke DB
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $transaction = new Transaction;
            $transaction->fill(["user_id" => 2, "date" => now()]);
            $transaction->save();
        }
    }
}
