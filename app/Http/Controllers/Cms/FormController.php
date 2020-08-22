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
use App\Models\OutStockBill;
use App\Models\ExchangeBill;
use App\Models\ProductDefective;
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

    public function UpdateStatusPurchaseOrder($id, Request $request)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->update([
            'pur_order_status' => $request->data
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'success'
        ], 200);
    }

    public function listInputs()
    {
        $listInputs = Input::with('supplier', 'purchaseOrder')->paginate(5);
        return view('cms.modules.forms.inputs.index', compact('listInputs'));
    }

    public function createInput()
    {
        $listPurchaseOrders = PurchaseOrder::select('id', 'pur_order_code')->where('pur_order_status','=', 1)->get();
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
        $input = Input::with('supplier', 'purchaseOrder')->find($id);
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

    public function UpdateStatusInput($id, Request $request)
    {
        $input = Input::find($id);
        $input->update([
            'input_status' => $request->data
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'success'
        ], 200);
    }

    public function listBillOrders()
    {
        $listBillOrders = BillOrder::with('input')->paginate(5);
        return view('cms.modules.forms.bill-orders.index', compact('listBillOrders'));
    }

    public function createBillOrder()
    {
        $listInputs = Input::select('id', 'input_code')->where('input_status', 0)->get();
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
            'coupon' => $request->coupon,
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

    public function printBillOrder($id)
    {
        $billOrder = BillOrder::with('input')->find($id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
        $pdf = PDF::loadView('cms.modules.forms.bill-orders.invoice', compact('billOrder'))->setPaper('a4', 'portrait');
        return $pdf->stream('invoice.pdf', array("Attachment" => false));
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

    public function updateStatusBillOrder($id)
    {
        $billOrder = BillOrder::find($id);
        if($billOrder->bill_status == 1) {
            $billOrder->update([
                'bill_status' => 0
            ]);
        } else {
            $billOrder->update([
                'bill_status' => 1
            ]);
        }
    }

    public function showProductOnOrder(Request $request, $id)
    {
        $productByOrder = Order::where('id',$id)->with('customer')->first();
        return view('cms.modules.forms.bill-exchanges.show-bill-exchange', compact('productByOrder'));
    }

    public function listBillOutStocks()
    {
        $listBillOutStocks = OutStockBill::with('supplier')->paginate(5);
        return view('cms.modules.forms.bill-out-stocks.index', compact('listBillOutStocks'));
    }

    public function createBillOutStock()
    {
        return view('cms.modules.forms.bill-out-stocks.create-bill-out-stock');
    }

    public function storeBillOutStock(Request $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $billOutStockCode = 'PXK-'.random_int ($min , $max);
        $billOutStockDetails = $request->out_stock_detail;
        $billOutStockDetail = json_encode($request->out_stock_detail);
        DB::beginTransaction();
            try {
                $billOutStocks = OutStockBill::create([
                    'bill_out_stock_code' => $billOutStockCode,
                    'bill_out_stock_date' => $request->out_stock_date,
                    'user_practise' => auth()->user()->name,
                    'supplier_id' => $request->supplier_id,
                    'bill_out_stock_reason' => $request->notes,
                    'total_price' => $request->total_price,
                    'bill_out_stock_detail' => $billOutStockDetail,
                    'pur_order_status' => 0
                ]);
                $exportProduct = json_decode($billOutStocks->bill_out_stock_detail);
                foreach($exportProduct as $value) {
                    $productCode = $value->product_code;
                    $product = Product::where('product_code', $productCode)->first();
                    $product->update([
                        'product_amount' => $product->product_amount - $value->product_sell_amount
                    ]);
                }
                DB::commit();
                return response()->json([
                    'isSuccess' => true,
                    'message' => 'Create Bill Out Stock',
                    'purOrder' => $billOutStocks
                ], 200);
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
    }

    public function printBillOutStock($id)
    {
        $billOutStock = OutStockBill::with('supplier')->find($id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
        $pdf = PDF::loadView('cms.modules.forms.bill-out-stocks.invoice', compact('billOutStock'))->setPaper('a4', 'portrait');
        return $pdf->stream('invoice.pdf', array("Attachment" => false));
    }

    public function destroyBillOutStock($id)
    {
         try {
            $ids = explode(",", $id);
            OutStockBill::destroy($ids);
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

    public function searchBillOutStock(Request $request)
    {
        $billOutStockCode = $request->bill_out_stock_code;
        $billOutStockDateFrom = $request->bill_out_stock_date_from;
        $billOutStockDateTo = $request->bill_out_stock_date_to;

        $listBillOutStocks = OutStockBill::with('supplier');
        if($request->has('bill_out_stock_code') && $billOutStockCode) {
            $listBillOutStocks->where('bill_out_stock_code', 'LIKE', $billOutStockCode.'%');
        }
        if($request->has('bill_out_stock_date_from') && $request->has('bill_out_stock_date_to') && $billOutStockDateFrom && $billOutStockDateTo) {
            $listBillOutStocks->whereBetween('bill_out_stock_date', [$billOutStockDateFrom, $billOutStockDateTo]);
        }
        $listBillOutStocks = $listBillOutStocks->paginate(5);
        return view('cms.modules.forms.bill-out-stocks.list-bill_out_stock', compact('listBillOutStocks'));
    }

    public function UpdateStatusBillOutStock($id, Request $request)
    {
        $billOutStock = OutStockBill::find($id);
        $billOutStock->update([
            'bill_out_stock_status' => $request->data
        ]);
        return response()->json([
            'isSuccess' => true,
            'message' => 'success'
        ], 200);
    }

    public function listBillExchanges()
    {
        $listBillExchanges = ExchangeBill::with('order', 'customer')->paginate(5);
        return view('cms.modules.forms.bill-exchanges.index', compact('listBillExchanges'));
    }

    public function createBillExchange()
    {
        $listOrders = Order::select('id', 'order_code')->get();
        return view('cms.modules.forms.bill-exchanges.create-bill', compact('listOrders'));
    }

    public function storeBillExchange(Request $request)
    {
        $min = 0000000001;
        $max = 9999999999;
        $exchangeCode = 'PDT-'.random_int ($min , $max);
        $billExchangeDetails = $request->exchange_detail;
        $totalOriginPrice = 0;
        $exchangeAmount = 0;
        foreach ($billExchangeDetails as $value) {
            $totalOriginPrice += $value['product_origin_price'];
            $exchangeAmount += $value['product_sell_amount'];
        }
        $billExchangeDetail = json_encode($billExchangeDetails);
        DB::beginTransaction();
            try {
                $billExchanges = ExchangeBill::create([
                    'exchange_code' => $exchangeCode,
                    'order_id' => $request->order_id,
                    'exchange_date' => $request->exchange_date,
                    'user_practise' => auth()->user()->name,
                    'customer_id' => $request->customer_id,
                    'exchange_reason' => $request->exchange_reason,
                    'exchange_ammount' => $exchangeAmount,
                    'exchange_price' => $request->exchange_price,
                    'exchange_refund' => $request->exchange_refund,
                    'exchange_detail' => $billExchangeDetail,
                ]);
                foreach($billExchangeDetails as $key => $value) {
                    $product = ProductDefective::where('product_id', $value['id'])->first();
                    if($product) {
                        $product->update([
                            'quantity' => $product->quantity + $value['amount_bill'],
                            'user_practise' => auth()->user()->name
                        ]);
                    } else {
                        ProductDefective::create([
                            'product_id' => $value['id'],
                            'quantity' => $value['amount_bill'],
                            'user_practise' => auth()->user()->name
                        ]);
                    }

                    $products = Product::where('id', $value['id'])->first();
                    if($products) {
                        $products->update([
                            'product_amount' => $products->product_amount + $value['amount_bill'],
                            'product_amount_defective' => $products->product_amount_defective + $value['amount_bill']
                        ]);
                    }
                }

                DB::commit();
                return response()->json([
                    'isSuccess' => true,
                    'message' => 'Create Bill Exchange',
                    'purOrder' => $billExchanges
                ], 200);
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
    }

    public function printBillExchange($id)
    {
        $billExchange = OutStockBill::with('order', 'customer')->find($id);
        dd($billExchange);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans']);
        $pdf = PDF::loadView('cms.modules.forms.bill-exchanges.invoice', compact('billExchange'))->setPaper('a4', 'portrait');
        return $pdf->stream('invoice.pdf', array("Attachment" => false));
    }

    public function searchBillExchange(Request $request)
    {
        $billExchangeCode = $request->bill_exchange_code;
        $billExchangeDateFrom = $request->bill_exchange_date_from;
        $billExchangeDateTo = $request->bill_exchange_date_to;

        $listBillExchanges = ExchangeBill::with('order', 'customer');
        if($request->has('bill_exchange_code') && $billExchangeCode) {
            $listBillExchanges->where('exchange_code', 'LIKE', $billExchangeCode.'%');
        }
        if($request->has('bill_exchange_code') && $request->has('bill_exchange_date_to') && $billExchangeDateFrom && $billExchangeDateTo) {
            $listBillExchanges->whereBetween('exchange_date', [$billExchangeDateFrom, $billExchangeDateTo]);
        }
        $listBillExchanges = $listBillExchanges->paginate(5);
        return view('cms.modules.forms.bill-exchanges.list_bill', compact('listBillExchanges'));
    }

    public function destroyBillExchange($id)
    {
         try {
            $ids = explode(",", $id);
            ExchangeBill::destroy($ids);
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
