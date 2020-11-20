<?php

use Illuminate\Database\Seeder;
use App\Cart;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = new Cart;
        $cart->fill(["user_id" => 2, "product_id" => 7, "qty" => 3]);
        $cart->save();
    }
}
