<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Input;
use App\Models\PurchaseOrder;
use App\Models\Receipt;
use App\Models\BillOrder;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

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

    public function printPurchaseOrder($id)
    {
        $purchaseOrder = PurchaseOrder::with('supplier')->find($id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
        $pdf = PDF::loadView('cms.modules.forms.purchase-orders.invoice', compact('purchaseOrder'))->setPaper('a4', 'portrait');
        return $pdf->stream('invoice.pdf', array("Attachment" => false));
    }

    public function destroyPurchaseOrder($id)
    {
        try {
            $ids = explode(",", $id);
            PurchaseOrder::destroy($ids);
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

    public function searchPurchaseOrder(Request $request)
    {
        $orderCode = $request->order_code;
        $orderDateFrom = $request->order_date_from;
        $orderDateTo = $request->order_date_to;

        $listPurchaseOrders = PurchaseOrder::with('supplier');
        if($request->has('order_code') && $orderCode) {
            $listPurchaseOrders->where('pur_order_code', 'LIKE', $orderCode.'%');
        }
        if($request->has('order_date_from') && $request->has('order_date_to') && $orderDateFrom && $orderDateTo) {
            $listPurchaseOrders->whereBetween('pur_order_date', [$orderDateFrom, $orderDateTo]);
        }
        $listPurchaseOrders = $listPurchaseOrders->paginate(5);
        return view('cms.modules.forms.purchase-orders.list-purorder', compact('listPurchaseOrders'));
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
        $totalQuantity = 0;
        foreach ($importDetails as $value) {
            $totalOriginPrice += $value['origin_price'];
            $totalQuantity += $value['product_sell_amount'];
        }
        $importDetail = json_encode($request->import_detail);
        DB::beginTransaction();
            try {
                $receipts = Input::create([
                'input_code' => $inputCode,
                'pur_order_id' => $request->pur_order_id,
                'input_date' => $request->input_date,
                'user_practise' => auth()->user()->name,
                'supplier_id' => $request->supplier_id,
                'notes' => $request->notes,
                'total_price' => $request->total_price,
                'total_quantity' => $totalQuantity,
                'input_status' => 0,
                'import_detail' => $importDetail,
            ]);

            $importProduct = json_decode($receipts->import_detail);
            foreach($importProduct as $value) {
                $productCode = $value->product_code;
                $product = Product::where('product_code', $productCode)->first();
                $product->update([
                    'product_amount' => $product->product_amount + $value->amount_input
                ]);
            }
            DB::commit();
            return response()->json([
                'isSuccess' => true,
                'message' => 'Create Receipt',
                'receipt' => $receipts
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function printInput($id)
    {
        $input = Input::with('supplier')->find($id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
        $pdf = PDF::loadView('cms.modules.forms.inputs.invoice', compact('input'))->setPaper('a4', 'portrait');
        return $pdf->stream('invoice.pdf', array("Attachment" => false));
    }

    public function destroyInput($id)
    {
        try {
            $ids = explode(",", $id);
            Input::destroy($ids);
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

    public function searchInput(Request $request)
    {
        $orderCode = $request->order_code;
        $orderDateFrom = $request->order_date_from;
        $orderDateTo = $request->order_date_to;

        $listInputs = Input::with('supplier');
        if($request->has('order_code') && $orderCode) {
            $listInputs->where('input_code', 'LIKE', $orderCode.'%');
        }
        if($request->has('order_date_from') && $request->has('order_date_to') && $orderDateFrom && $orderDateTo) {
            $listInputs->whereBetween('input_date', [$orderDateFrom, $orderDateTo]);
        }
        $listInputs = $listInputs->paginate(5);
        return view('cms.modules.forms.inputs.list-input', compact('listInputs'));
    }

    public function listBillOrders()
    {
        $listBillOrders = BillOrder::with('input')->paginate(5);
        return view('cms.modules.forms.bill-orders.index', compact('listBillOrders'));
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
        $billCode = 'HDM-'.random_int ($min , $max);
        $billOrderDetails = $request->bill_detail;
        $totalOriginPrice = 0;
        foreach ($billOrderDetails as $value) {
            $totalOriginPrice += $value['product_origin_price'];
        }
        $billOrderDetail = json_encode($billOrderDetails);
        $billOrders = BillOrder::create([
            'bill_code' => $billCode,
            'input_id' => $request->input_id,
            'bill_date' => $request->bill_date,
            'user_practise' => auth()->user()->name,
            'supplier_id' => $request->supplier_id,
            'notes' => $request->notes,
            'sell_type' => $request->sell_type,
            'total_price' => $request->total_price,
            'counpon' => $request->discount,
            'total_money' => $request->total_money,
            'pair_pay' => $request->pair_pay,
            'lack' => $request->lack,
            'bill_status' => 0,
            'bill_detail' => $billOrderDetail,
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'Create Bill Order',
            'receipt' => $billOrders
        ], 200);
    }


    public function destroyBillOrder($id)
    {
        try {
            $ids = explode(",", $id);
            BillOrder::destroy($ids);
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

    public function searchBillOrder(Request $request)
    {
        $orderCode = $request->order_code;
        $orderDateFrom = $request->order_date_from;
        $orderDateTo = $request->order_date_to;

        $listBillOrders = BillOrder::with('input');
        if($request->has('order_code') && $orderCode) {
            $listBillOrders->where('bill_code', 'LIKE', $orderCode.'%');
        }
        if($request->has('order_date_from') && $request->has('order_date_to') && $orderDateFrom && $orderDateTo) {
            $listBillOrders->whereBetween('bill_date', [$orderDateFrom, $orderDateTo]);
        }
        $listBillOrders = $listBillOrders->paginate(5);
        return view('cms.modules.forms.bill-orders.list_imports', compact('listBillOrders'));
    }

    public function createBillExchange()
    {
        $listOrders = Order::select('id', 'order_code')->get();
        return view('cms.modules.forms.bill-exchanges.create-bill', compact('listOrders'));
    }

    public function showProductOnOrder(Request $request, $id)
    {
        $productByOrder = Order::where('id',$id)->with('customer')->first();
        return view('cms.modules.forms.bill-exchanges.show-bill-order', compact('productByOrder'));
    }
}
