<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Input;

class ImportController extends Controller
{
    public function index()
    {
        return view('cms.modules.imports.index');
    }

    public function create()
    {
        return view('cms.modules.imports.import_bill');
    }

    public function searchProductOnImport(Request $request)
    {
        $products = Product::where('product_code', 'LIKE', $request->param.'%')->orWhere('product_name', 'LIKE', $request->param.'%')->get();
        return view('cms.modules.pos.list-product', compact('products'));
    }

    public function buyProductOnImport(Request $request, $id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product
        ]);
    }

    public function searchSupplierOnImport(Request $request)
    {
        $suppliers = Supplier::where('supplier_code', 'LIKE', $request->param.'%')
        ->orWhere('supplier_name', 'LIKE', $request->param.'%')
        ->orWhere('supplier_phone', 'LIKE', $request->param.'%')
        ->get();
        return view('cms.modules.pos.list-supplier', compact('suppliers'));
    }

    public function createReceipt(Request $request)
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
