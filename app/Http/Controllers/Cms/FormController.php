<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Input;
use App\Models\PurchaseOrder;
use App\Models\Receipt;

class FormController extends Controller
{
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
        $listPurchaseOrders = PurchaseOrder::with('supplier')->paginate(5);
        return view('cms.modules..forms.purchase-orders.index', compact('listPurchaseOrders'));
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
            'pur_order_date' => $request->pur_order_date,
            'user_practise' => auth()->user()->name,
            'supplier_id' => $request->supplier_id,
            'notes' => $request->notes,
            'total_price' => $request->total_price,
            'pur_order_detail' => $purOrderDetail,
            'pur_order_status' => 0
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Receipt',
            'purOrder' => $purOrders
        ], 200);
    }

    public function listInputs()
    {
        $listInputs = Input::with('supplier')->paginate(5);
        return view('cms.modules.forms.inputs.index', compact('listInputs'));
    }

    public function createInput()
    {
        $listPurchaseOrders = PurchaseOrder::select('id', 'pur_order_code')->get();
        return view('cms.modules.forms.inputs.create-input', compact('listPurchaseOrders'));
    }

    public function showProductOnPurOrder(Request $request, $id)
    {
        $productByPurchaseOrder = PurchaseOrder::where('id',$id)->with('supplier')->first();
        return view('cms.modules.forms.inputs.show-input', compact('productByPurchaseOrder'));
    }

    public function storeInput(Request $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $inputCode = 'PNK-'.random_int ($min , $max);
        $importDetails = $request->import_detail;
        $totalOriginPrice = 0;
        foreach ($importDetails as $value) {
            $totalOriginPrice += $value['origin_price'];
        }
        $importDetail = json_encode($request->import_detail);
        $receipts = Input::create([
            'input_code' => $inputCode,
            'pur_order_id' => $request->pur_order_id,
            'input_date' => $request->input_date,
            'user_practise' => auth()->user()->name,
            'supplier_id' => $request->supplier_id,
            'notes' => $request->notes,
            'total_price' => $request->total_price,
            'input_status' => 0,
            'import_detail' => $importDetail,
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Receipt',
            'receipt' => $receipts
        ], 200);
    }

    public function listBillOrders()
    {
        return view('cms.modules.forms.bill-orders.index');
    }

    public function createBillOrder()
    {
        $listInputs = Input::select('id', 'input_code')->get();
        return view('cms.modules.forms.bill-orders.import_bill', compact('listInputs'));
    }

    public function showProductOnInput(Request $request, $id)
    {
        $productByInput = Input::where('id',$id)->with('supplier')->first();
        return view('cms.modules.forms.bill-orders.show-bill-order', compact('productByInput'));
    }

    public function storeBillOrder(Request $request)
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
