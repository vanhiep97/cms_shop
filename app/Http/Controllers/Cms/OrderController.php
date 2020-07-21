<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $date = Carbon::now();
        $year = Carbon::now()->year;
        $dateOfYear = Carbon::now()->weekOfYear;
        $date->setISODate($year, $dateOfYear);
        $startDayOfWeek = $date->startOfWeek();
        $endDayOfWeek = $date->endOfWeek();

        $lastDayofPreviousMonth = Carbon::now()->endOfMonth()->subMonth()->toDateString();
        $orders = Order::with('customer')->paginate(5);
        return view('cms.modules.orders.index', compact('orders'));
    }

    public function saveOrder(Request  $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $orderCode = 'DH-'.random_int ($min , $max);
        $sellDate = Carbon::now()->toDateTimeString();
        $orderDetails = $request->order_detail;
        $totalOriginPrice = 0;
        $totalQuantity = 0;
        foreach ($orderDetails as $value) {
            $totalOriginPrice += $value['product_origin_price'];
            $totalQuantity += $value['product_sell_amount'];
        }
        $orderDetail = json_encode($request->order_detail);
        $orders = Order::create([
            'order_code' => $orderCode,
            'sell_date' => $sellDate,
            'user_practise' => auth()->user()->name,
            'customer_id' => $request->customer_id,
            'notes' => $request->notes,
            'total_origin_price' => $totalOriginPrice,
            'total_price' => $request->total_price,
            'coupon' => $request->coupon,
            'total_money' => $request->total_money,
            'total_quantity' => $totalQuantity,
            'customer_pay' => $request->customer_pay,
            'lack' => $request->lack,
            'order_status' => $request->status,
            'order_detail' => $orderDetail,
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Order',
            'orders' => $orders
        ], 200);
    }

    public function savePrintOrder(Request  $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $orderCode = 'DH-'.random_int ($min , $max);
        $sellDate = Carbon::now()->toDateTimeString();
        $orderDetails = $request->order_detail;
        $totalOriginPrice = 0;
        foreach ($orderDetails as $value) {
            $totalOriginPrice += $value['product_origin_price'];
        }
        $orderDetail = json_encode($request->order_detail);
        $orders = Order::create([
            'order_code' => $orderCode,
            'sell_date' => Carbon::now(),
            'user_practise' => auth()->user()->name,
            'customer_id' => $request->customer_id,
            'notes' => $request->notes,
            'total_origin_price' => $totalOriginPrice,
            'total_price' => $request->total_price,
            'coupon' => $request->coupon,
            'total_money' => $request->total_money,
            'customer_pay' => $request->customer_pay,
            'lack' => $request->lack,
            'order_status' => $request->status,
            'order_detail' => $orderDetail,
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Order',
            'orders' => $orders
        ], 200);
    }

    public function printOrder(Request $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $orderCode = 'DH-'.random_int ($min , $max);
        $sellDate = Carbon::now()->toDateTimeString();
        $orderDetails = $request->order_detail;
        $totalOriginPrice = 0;
        foreach ($orderDetails as $value) {
            $totalOriginPrice += $value['product_origin_price'];
        }
        $orderDetail = json_encode($request->order_detail);

        DB::beginTransaction();
        try {
            $orders = Order::create([
                'order_code' => $orderCode,
                'sell_date' => $sellDate,
                'user_practise' => auth()->user()->name,
                'customer_id' => $request->customer_id,
                'notes' => $request->notes,
                'total_origin_price' => $totalOriginPrice,
                'total_price' => $request->total_price,
                'coupon' => $request->coupon,
                'total_money' => $request->total_money,
                'customer_pay' => $request->customer_pay,
                'lack' => $request->lack,
                'order_status' => $request->status,
                'order_detail' => $orderDetail,
            ]);

            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
            $pdf = PDF::loadView('cms.modules.orders.invoice',  compact('orders'))->setPaper('a4', 'portrait');
            return $pdf->stream('invoice.pdf', array("Attachment" => false));

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
