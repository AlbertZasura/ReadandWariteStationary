<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
    function index berfungsi untuk menampilkan produk pada homepage,
    function index akan mengecek apakah terdapat request search atau kategori.
    apabila ada maka akan menampilkan product sesuai request / kategori yang diminta.
    product hanya ditampilkan sebanyak 6 dalam 1 halaman.
    */

    public function index(Request $request)
    {
        $search = $request->get('search');
        $category = $request->get('category');
        if ($category != null) {
            $products = Product::where("type_id", $category)->paginate(6);
        } else {
            $products = Product::where("name", 'like', '%' . $search . '%')->paginate(6);
        }

        return view('pages.home', ['products' => $products]);
    }

    /*
    function create hanya menampilkan halaman untuk menambah product,
    karena halaman add product membutuhkan semua tipe product maka kita perlu mengambil semua
    data tipe product dari Database
    */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('stationaries.add', ['productTypes' => $productTypes]);
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
            'name' => 'required|min:5|unique:products,name',
            'type_id' => 'required',
            'stock' => 'required|integer|min:1',
            'price' => 'required|integer|min:5001',
            'description' => 'required|min:10',
            'image' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->image;
        if ($image) {
            // $destination_path = 'public/images/products';
            $image_name = $image->getClientOriginalName();
            // $path = $request->image->storeAs($destination_path, $image_name);
            str_replace('public','/storage', Storage::putFileAs('/public/images/products',$request->image,$image_name));
        }

        Product::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'image' =>  $image_name
        ]);

        return redirect('/product/add')->with(['success' => 'Add Product Successfully']);
    }

    /*
    function show berfungsi untuk menampilkan detail suatu produk.
    sebelum menampilkan function show akan melakukan validasi apakah user sudah login atau belum apabila belum
    maka akan di redirect ke login page.
    */
    public function show($id)
    {
        if (Auth::check() == false) {
            return redirect('/login');
        }
        $product = Product::find($id);

        return view('stationaries.view', ['product' => $product]);
    }

    /*
    function edit hanya menampilkan halaman untuk update product,
    function edit akan menerima parameter id untuk mencari suatu product berdasarkan id yang di request
    */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('stationaries.update', ['product' => $product]);
    }

    /*
    function update hampir sama dengan function store bedanya update berfungsi untuk mengubah data di Database.
    sebelum menyentuh database function update melakukan validasi terhadap request dan apabila sesuai maka
    data dalam DB di ubah dan redirect ke halaman detail product
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5|unique:products,name',
            'stock' => 'required|integer|min:1',
            'price' => 'required|integer|min:5001',
            'description' => 'required|min:10',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect("/product/" . $id);
    }

    /*
    function destroy berfungsi untuk mendelete suatu data dalam DB.
    function destroy membutuh parameter id untuk mengetahui data product mana yang ingin dihapus user.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect("/home");
    }
}
