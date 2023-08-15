<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('pages.admin.product.index', [
            'products' => $products,
            'title' => 'All product'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.product.create', [
            'categories' => $categories,
            'title' => 'Create Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['cover'] = $request->file('cover')->store('product', 'public');

        Product::create($data);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Product::findOrFail($id);

        return view('pages.admin.product.show', [
            'item' => $item,
            'title' => 'Detail Karyawan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $items = Product::findOrFail($id);
        $categories = Category::all();

        return view('pages.admin.product.edit', [
            'title' => 'Edit Data',
            'categories' => $categories,
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if(!empty($data['cover'])) {
            $data['cover'] = $request->file('cover')->store('product', 'public');
        }else{
            unset($data['cover']);
        }

        Product::findOrFail($id)->update($data);

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('produk.index');
    }
}
