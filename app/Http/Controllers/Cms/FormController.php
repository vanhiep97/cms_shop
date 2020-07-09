<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Input;
use App\Models\PurchaseOrder;

class FormController extends Controller
{
    public function listReceipts()
    {
        return view('cms.modules.forms.receipts.index');
    }

    public function createReceipt()
    {
        return view('cms.modules.forms.receipts.import_bill');
    }

    public function searchProductOnForm(Request $request)
    {
        $products = Product::where('product_code', 'LIKE', $request->param.'%')->orWhere('product_name', 'LIKE', $request->param.'%')->get();
        return view('cms.modules.forms.list-product', compact('products'));
    }

    public function buyProductOnForm(Request $request, $id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product
        ]);
    }

    public function searchSupplierOnForm(Request $request)
    {
        $suppliers = Supplier::where('supplier_code', 'LIKE', $request->param.'%')
        ->orWhere('supplier_name', 'LIKE', $request->param.'%')
        ->orWhere('supplier_phone', 'LIKE', $request->param.'%')
        ->get();
        return view('cms.modules.forms.list-supplier', compact('suppliers'));
    }

    public function listPurchaseOrders()
    {
        return view('cms.modules..forms.purchase-orders.index');
    }

    public function createPurchaseOrder()
    {
        return view('cms.modules.forms.purchase-orders.create-purorder');
    }

    public function storePurchaseOrder(Request $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $purOrderCode = 'PYC-'.random_int ($min , $max);
        $purOrderDetails = $request->pur_order_detail;
        $totalOriginPrice = 0;
        $purOrderDetail = json_encode($request->pur_order_detail);
        $purOrders = PurchaseOrder::create([
            'pur_order_code' => $purOrderCode,
            'pur_order_date' => $request->input_date,
            'user_practise' => auth()->user()->name,
            'supplier_id' => $request->supplier_id,
            'notes' => $request->notes,
            'total_price' => $request->total_price,
            'total_money' => $request->total_money,
            'pur_order_status' => $request->pur_order_status,
            'pur_order_detail' => $purOrderDetail,
            'pur_order_status' => 0
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Receipt',
            'purOrder' => $purOrders
        ], 200);
    }

    public function storeReceipt(Request $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $inputCode = 'PNK-'.random_int ($min , $max);
        $importDetails = $request->import_detail;
        $totalOriginPrice = 0;
        foreach ($importDetails as $value) {
            $totalOriginPrice += $value['product_origin_price'];
        }
        $importDetail = json_encode($request->import_detail);
        $receipts = Input::create([
            'input_code' => $inputCode,
            'input_date' => $request->input_date,
            'user_practise' => auth()->user()->name,
            'supplier_id' => $request->supplier_id,
            'notes' => $request->notes,
            'total_origin_price' => $totalOriginPrice,
            'total_price' => $request->total_price,
            'discount' => $request->discount,
            'total_money' => $request->total_money,
            'pair_pay' => $request->pair_pay,
            'lack' => $request->lack,
            'input_status' => $request->input_status,
            'import_detail' => $importDetail,
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Receipt',
            'receipt' => $receipts
        ], 200);
    }
}
