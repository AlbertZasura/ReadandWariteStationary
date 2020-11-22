<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $productNames = [
            "2 Pens","Colour Pens",
            "Three Pencils", "Pencil Box",
            "4 Rulers","2 Rulers",
            "Wooden Notebooks","4 Notebooks",
            "Black Dictionary","Old Dictionary",
            "Samsang Smart Pen", "Smart Pen",
            "smart note","E-Book"
        ];

        $productPhotos = [
            "img/pen/penp2.jpg","img/pen/penp3.jpg",
            "img/pencil/pencilp.jpg","img/pencil/pencilbox.jpg",
            "img/ruler/rulerp.jpg","img/ruler/rulerp1.jpg",
            "img/notebook/bookp1.jpg","img/notebook/notep.jpg",
            "img/dictionary/dictionary2.jpg","img/dictionary/dictionaryp.jpg",
            "img/smartPen/smartpenp.jpg","img/smartPen/smartpenp2.jpg",
            "img/smartNote/smartNotep.jpg","img/smartNote/tabletp.jpg"
        ];


        $index=0;
        for ($i=0; $i < 7; $i++) { 
            for ($j=0; $j <2 ; $j++) { 
                $product = new Product;
                $product->fill(["name" => $productNames[$index],"type_id" => $i+1,"stock" => 100,"price" => rand(5001,50001),"description" => "Lorem test","image" => $productPhotos[$index]]);
                $product->save();
                $index=$index+1;
            }
        }
    }
}
