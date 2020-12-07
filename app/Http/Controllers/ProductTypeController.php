<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    /*
    function index berfungsi untuk menampilkan 4 tipe produk yang paling laris di halaman welcome,
    sehingga kita perlu membuat query dengan menjoin tabel detail_transactions, products, dan product_types.
    dari detail transactions kita dapat mengetahui produk apa yang paling banyak di beli, dari produk kita dapat mengetahui
    produk itu merupakan tipe produk apa.
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

    /*
    function create hanya menampilkan halaman untuk menambah tipe product,
    karena halaman add product type juga memperlihatkan semua tipe product yang sudah ada maka kita perlu
    mengambil semua tipe product data dari Database
    */
    public function create()
    {
        $productTypes = ProductType::get();
        return view('stationaryTypes.add', ['productTypes' => $productTypes]);
    }

    /*
    function store berfungsi untuk menambahkan data ke Database.
    sebelum menyentuh database function store melakukan validasi terhadap request dan apabila sesuai maka
    data request ditambahkan ke DB dan return success message.
    fungsi store juga membuat image yang diupload user tersimpan di server storage
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

    /*
    function edit hanya menampilkan halaman untuk update atau delete tipe product,
    function edit akan menerima parameter id untuk mencari suatu tipe product berdasarkan id yang di request
    */
    public function edit()
    {
        $productTypes = ProductType::get();
        return view('stationaryTypes.update', ['productTypes' => $productTypes]);
    }

    /*
    function update hampir sama dengan function store bedanya update berfungsi untuk mengubah data di Database.
    sebelum menyentuh database function update melakukan validasi terhadap request dan apabila sesuai maka
    data dalam DB di ubah dan redirect ke halaman edit tipe product
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

    /*
    function destroy berfungsi untuk mendelete suatu data dalam DB.
    function destroy membutuh parameter id untuk mengetahui data tipe product mana yang ingin dihapus user.
     */
    public function destroy($id)
    {
        ProductType::destroy($id);
        return redirect('/productType/edit');
    }
}
