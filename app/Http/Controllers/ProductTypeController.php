<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = DetailTransaction::select('products.type_id', 'product_types.name', 'product_types.image', DB::raw('sum(qty) as quantity'))
            ->join('products', 'products.id', '=', 'detail_transactions.product_id')
            ->join('product_types', 'products.type_id', '=', 'product_types.id')
            ->groupBy('type_id', 'product_types.name', 'product_types.image')
            ->orderBy('quantity', 'DESC')
            ->limit(4)
            ->get();

        return view('pages.welcome', ["productTypes" => $productTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::get();
        return view('stationaryTypes.add', ['productTypes' => $productTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:product_types,name',
            'image' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->image;
        if ($image) {
            $destination_path = 'public/images/productTypes';
            $image_name = $image->getClientOriginalName();
            $path = $request->image->storeAs($destination_path, $image_name);
        }

        ProductType::create([
            'name' => $request->name,
            'image' =>  $image_name
        ]);

        return redirect('/productType/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $productTypes = ProductType::get();
        return view('stationaryTypes.update', ['productTypes' => $productTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:product_types,name',
        ]);
        $productType = ProductType::find($id);
        $productType->name = $request->name;
        $productType->save();
        return redirect('/productType/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductType::destroy($id);
        return redirect('/productType/edit');
    }
}
