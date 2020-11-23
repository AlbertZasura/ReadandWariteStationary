<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(6);
        $users = Session::get('users');
        if($users == null)  return view('pages.home',['products' => $products]);
        else return view('pages.home',['products' => $products, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();
	    $products = Product::get();
	    return view('stationaries.add',['products' => $products,'productTypes' => $productTypes]);
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
            'type_id' => 'required',
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
            'type_id' => $request->type_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'image' =>  "asset/".$image->getClientOriginalName()
        ]);

        return redirect('/product/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $users = Session::get('users');
        if($users == null)  return view('stationaries.view',['product' => $product]);
        else return view('stationaries.view',['product' => $product, 'users' => $users]);
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
	    $users = Session::get('users');
        if($users == null)  return view('stationaries.view',['product' => $product]);
        else return view('stationaries.view',['product' => $product, 'users' => $users]);
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
            'name' => 'required|min:5|unique:products,name',
            'stock' => 'required|integer|min:0',
            'price' => 'required|integer|min:5000',
            'description' => 'required|min:10',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect("/product/".$id."/edit");
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
        return redirect("/home");
    }
}