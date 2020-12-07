<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * method dibawah merupakan seeding dimana kita membuat template insert data ke DB
     */
    public function run()
    {

        $productNames = [
            "2 Pens", "Colour Pens",
            "Three Pencils", "Pencil Box",
            "4 Rulers", "2 Rulers",
            "Wooden Notebooks", "4 Notebooks",
            "Black Dictionary", "Old Dictionary",
            "Samsang Smart Pen", "Smart Pen",
            "smart note", "E-Book"
        ];

        $productPhotos = [
            "penp2.jpg", "penp3.jpg",
            "pencilp.jpg", "pencilbox.jpg",
            "rulerp.jpg", "rulerp1.jpg",
            "bookp1.jpg", "notep.jpg",
            "dictionary2.jpg", "dictionaryp.jpg",
            "smartpenp.jpg", "smartpenp2.jpg",
            "smartNotep.jpg", "tabletp.jpg"
        ];


        $index = 0;
        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $product = new Product;
                $product->fill(["name" => $productNames[$index], "type_id" => $i + 1, "stock" => 100, "price" => rand(5001, 50001), "description" => "Lorem test", "image" => $productPhotos[$index]]);
                $product->save();
                $index = $index + 1;
            }
        }
    }
}
