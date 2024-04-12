<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $file1 = $request->file('image');
        $path1 = time() . '_' . $request->name . '.' . $file1->getClientOriginalExtension();
        Storage::disk('local')->put('public/Product/' . $path1, file_get_contents($file1));

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path1
        ]);
        return Redirect::route('index_product');
    }

    public function index_product()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function update(Product $product)
    {
        return view('product.update', compact('product'));
    }

    public function update_process(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $file1 = $request->file('image');
        $path1 = time() . '_' . $request->name . '.' . $file1->getClientOriginalExtension();
        Storage::disk('local')->put('public/Product/' . $path1, file_get_contents($file1));

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path1
        ]);
        return Redirect::route('index_product');
    }
    public function delete(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}
