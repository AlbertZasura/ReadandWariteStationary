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
            "pen", "pencil", "ruler",
            "notebook", "dictionary", "smart pen",
            "smart note"
        ];

        $productTypePhotos = [
            "pen.jpg", "pencil.jpg", "ruler.jpg",
            "book.jpg", "dictionary.jpg", "smartpen.jpg",
            "smartNote.jpg"
        ];

        for ($i = 0; $i < 7; $i++) {
            $productType = new ProductType;
            $productType->fill(["name" => $productTypeNames[$i], "image" => $productTypePhotos[$i]]);
            $productType->save();
        }
    }
}
