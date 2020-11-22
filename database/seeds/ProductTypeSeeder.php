<?php

use Illuminate\Database\Seeder;
use App\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypeNames = [
            "pen","pencil","ruler",
            "notebook","dictionary","smart pen",
            "smart note"
        ];

        $productTypePhotos = [
            "img/pen/pen.jpg","img/pencil/pencil.jpg","img/ruler/ruler.jpg",
            "img/notebook/book.jpg","img/dictionary/dictionary.jpg","img/smartPen/smartpen.jpg",
            "img/smartNote/smartNote.jpg"
        ];

        for ($i=0; $i < 7; $i++) { 
            $productType = new ProductType;
            $productType->fill(["name" => $productTypeNames[$i], "image" => $productTypePhotos[$i]]);
            $productType->save();
        }
    }
}