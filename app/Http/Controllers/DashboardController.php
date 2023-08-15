<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $currentMonth = Carbon::now()->format('Y-m');
        $success_count = Transaction::where('status', 'success')
            ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth])
            ->count();

        $total_income = Transaction::where('status', 'success')->sum('total_amount');
        $total_customers = User::where('roles', 'customer')->count();
        $total_products = Product::count();
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'total_income' => $total_income,
            'success_count' => $success_count,
            'total_customers' => $total_customers,
            'total_products' => $total_products,
        ]);
    }
}
