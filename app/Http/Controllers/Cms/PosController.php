<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class PosController extends Controller
{
    public function index()
    {
        $orders = Order::select('id')->get();
        return view('cms.layouts.pos', compact('orders'));
    }

    public function searchProductOnPos(Request $request)
    {
        $param = $request->param;
        $products = Product::where('product_amount', '>=', 1);
        $products->where(function($query) use($param) {
            return $query->where('product_code', 'LIKE', $param.'%')
            ->orWhere('product_name', 'LIKE', $param.'%');
        });
        $products = $products->get();
        return view('cms.modules.pos.list-product', compact('products'));
    }

    public function buyProductOnPos(Request $request, $id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product
        ]);
    }

    public function searchCustomerOnPos(Request $request)
    {
        $customers = Customer::where('customer_code', 'LIKE', $request->param.'%')
        ->orWhere('customer_name', 'LIKE', $request->param.'%')
        ->orWhere('customer_phone', 'LIKE', $request->param.'%')
        ->get();
        return view('cms.modules.pos.list-customer', compact('customers'));
    }
}
