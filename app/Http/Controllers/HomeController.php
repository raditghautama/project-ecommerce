<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $item = Transaction::where('status', 'in_cart')->with('details')->first();


        return view('pages.home.welcome', [
            'categories' => $categories,
            'products' => $products,
            'item' => $item,
            'title' => 'All product'
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        if ($category == NULL) {
            $products = Product::all();
        } else {
            $products = Product::where('kategori_id', $category->id)->orderBy('id', 'DESC')->get();
        }

        return view('pages.home.category', [
            'title' => 'category',
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function detail($slug)
    {
        $products = Product::where('slug', $slug)->first();
        $all = Product::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        $banks = Bank::all();


        return view('pages.home.detail', [
            'title' => 'Detail',
            'products' => $products,
            'all' => $all,
            'categories' => $categories,
            'banks' => $banks,
        ]);
    }

    public function order()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $items = Transaction::where('customer_id', Auth::user()->id)->where('status', '!=', 'in_cart')->get();
        return view('pages.home.orders.pesanan', [
            'title' => 'Pesanan saya',
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function order_update(Request $request, $id)
    {
        Transaction::findOrFail($id)->update($request->all());
        return redirect()->back();
    }


}
