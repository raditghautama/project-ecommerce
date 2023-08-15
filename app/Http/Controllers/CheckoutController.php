<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        $item = Transaction::where('customer_id', Auth::user()->id)->where('status', 'in_cart')->with('details')->first();
        $banks = Bank::all();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('pages.home.orders.checkout', [
            'title' => 'Checkout',
            'item' => $item,
            'banks' => $banks,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['proof_of_payment'] = $request->file('proof_of_payment')->store('bukti-pembayaran', 'public');
        Transaction::findOrFail($id)->update([
            'shipping_address' => $data['shipping_address'],
            'proof_of_payment' => $data['proof_of_payment'],
            'bank_name' => $data['bank_name'],
            'notes' => $data['notes'],
            'status' => 'in_progress'
        ]);

        // stock reduction
        $transaction = Transaction::findOrFail($id);
        foreach ($transaction->details as $item) {
            $product = Product::findOrFail($item->product_id);
            $product->update(['stock' => $product->stock - $item->quantity]);
        }

        return redirect()->route('selesai', $id);
    }
    public function checkout(Request $request)
    {
        Transaction::create([
            'shipping_address' => $request->shipping_address,
            'proof_of_payment' => $request->file('proof_of_payment')->store('bukti-pembayaran', 'public'),
            'bank_name' => $request->bank_name,
            'notes' => $request->notes,
            'status' => 'in_progress',
            'customer_id' => Auth::user()->id,
            'total_amount' => $request->quantity * $request->price,
        ]);

        TransactionDetail::create([
            'transaction_id' => Transaction::where('customer_id', Auth::user()->id)->orderBy('id', 'DESC')->first()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->update(['stock' => $product->stock - $request->quantity]);

        $transaction = Transaction::where('customer_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        return redirect()->route('selesai', $transaction->id);
    }

    public function selesai($id)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $transaction = Transaction::findOrFail($id);
        return view('pages.home.orders.selesai', [
            'title' => 'Sukses',
            'item' => $transaction,
            'categories' => $categories
        ]);
    }
}
