<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PosController extends Controller
{
    public function index()
    {
        return view('cms.layouts.pos');
    }

    public function searchProductOnPos(Request $request)
    {
        $products = Product::where('product_code', 'LIKE', $request->param.'%')->orWhere('product_name', 'LIKE', $request->param.'%')->get();
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
