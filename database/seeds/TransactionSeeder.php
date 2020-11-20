<?php

use Illuminate\Database\Seeder;
use App\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
