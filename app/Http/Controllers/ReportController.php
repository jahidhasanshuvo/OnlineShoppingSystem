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
        $date = $request->toDate;
        $date1 = str_replace('-', '/', $date);
        $tomorrow = date('Y-m-d',strtotime($date1 . "+1 days"));
        if(strtotime($request->fromDate) > strtotime($request->toDate)){
            return redirect()->back()->with([
                'status' => 'danger',
               'message' => 'From date is bigger than to date'
            ]);
        }
        $orders = OrderDetail::whereBetween('created_at', [$request->fromDate, $tomorrow])
            ->groupBy('product_id')
            ->select(['product_id', DB::raw("SUM(qty) as qty"), DB::raw('SUM(subtotal) as subtotal')])
            ->get();
        return view('report.report', ['orders' => $orders, 'fromDate' => $request->fromDate, 'toDate' => $request->toDate]);
    }
}
