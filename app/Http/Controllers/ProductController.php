<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('pages.home',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $products = Product::get();
	    return view('stationaries.add',['products' => $products]);
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
            'name' => 'required|min:5|unique:products,name',
            'type' => 'required',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:5000',
            'description' => 'required|min:10',
            'image' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->image;
        if($image){
            $image->move('asset',$image->getClientOriginalName());
        }
        
        Product::create([
            'name' => $request->name,
            'type' => $request->type,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'image' =>  $image->getClientOriginalName()
        ]);

        return redirect('/product/add');
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
    public function edit($id)
    {
        $product = Product::find($id);
	    return view('stationaries.update',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|min:5|unique:products,name',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:5000',
            'description' => 'required|min:10',
        ]);

        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/product/{product}/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/product/{product}/edit');
    }
}
