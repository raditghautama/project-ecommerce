<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transactions = Transaction::where('status', '!=', 'in_cart')->orderBy('created_at', 'DESC')->get();

        return view('pages.admin.transaction.index', [
            'transactions' => $transactions,
            'title' => 'Transaksi'
        ]);
    }


    public function update(Request $request, $id)
    {
        Transaction::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    public function report()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $items = Transaction::where('status', 'success')
            ->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$currentMonth])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.admin.laporan.report', [
            'items' => $items,
            'title' => 'Transaksi'
        ]);
    }

    public function report_filter(Request $request)
    {
        $items = Transaction::whereMonth('created_at', $request->bulan)
            ->whereYear('created_at', $request->tahun)
            ->where('status', 'success')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.admin.laporan.report-filter', [
            'title' => 'Laporan Bulan ' . $request->bulan . ' Tahun ' . $request->tahun,
            'items' => $items,
            'month' => $request->bulan,
            'year' => $request->tahun
        ]);
    }


}
