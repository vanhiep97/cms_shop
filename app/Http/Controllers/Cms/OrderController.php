<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

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
                'total_quantity' => $totalQuantity,
                'customer_pay' => $request->customer_pay,
                'lack' => $request->lack,
                'sell_type' => $request->sell_type,
                'order_status' => 0,
                'order_detail' => $orderDetail,
            ]);
            $orderBuyProduct = json_decode($orders->order_detail);
            foreach($orderBuyProduct as $value) {
                $productCode = $value->product_code;
                $product = Product::where('product_code', $productCode)->first();
                $product->update([
                    'product_amount' => $product->product_amount - $value->product_sell_amount
                ]);
            }

            DB::commit();

            return response()->json([
                'isSuccess' => true,
                'message' => 'Create Order',
                'orders' => $orders
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return response()->json([
                'isSuccess' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function printOrder($id)
    {
        $orders = Order::findOrFail($id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
        $pdf = PDF::loadView('cms.modules.orders.invoice',  compact('orders'))->setPaper('a4', 'portrait');
        $orders->update([
            'order_status' => 1
        ]);
        return $pdf->stream('invoice.pdf', array("Attachment" => false));
    }

    public function destroy($id)
    {
        try {
            $ids = explode(",", $id);
            Order::destroy($ids);
            return response()->json([
                'isSuccess' => true,
                'message' => 'Delete success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'isSuccess' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
