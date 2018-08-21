<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckUser');
    }

    public function index()
    {
        return view('report.report');
    }

    public function sellingOnDate(Request $request)
    {
        $orders = OrderDetail::whereBetween('created_at', [$request->fromDate, $request->toDate])
            ->groupBy('product_id')
            ->select(['product_id', DB::raw("SUM(qty) as qty"), DB::raw('SUM(subtotal) as subtotal')])
            ->get();
        return view('report.report', ['orders' => $orders, 'fromDate' => $request->fromDate, 'toDate' => $request->toDate]);
    }
}
