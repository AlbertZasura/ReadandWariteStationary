<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * method dibawah merupakan method yang pertama di panggil saat kita memanggil php artisan db:seed 
     * sehingga kita perlu menulis class seeding mana yang pertama dipanggil dan seterusnya.
     */
    public function run()
    {
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(DetailTransactionSeeder::class);
    }
}