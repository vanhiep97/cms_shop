<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('cms.modules.suppliers.index', compact('suppliers'));
    }

    public function createSuppliers(Request $request)
    {
        try {
            $min = 000001;
            $max = 999999;
            $supplierCode = 'NCC-'.random_int ($min , $max);
            $suppliers = Supplier::create([
                'supplier_code' => $supplierCode,
                'supplier_name' => $request->supplier_name,
                'supplier_email' => $request->supplier_email,
                'supplier_phone' => $request->supplier_phone,
                'address' => $request->address,
                'ATM' => $request->ATM,
                'supplier_note' => $request->supplier_note,
                'user_practise' => auth()->user()->name
            ]);
            return response()->json([
                'message' => 'Create supplier success',
                'data' => $suppliers
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function editSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json([
            'message' => 'success',
            'data' => $supplier
        ], 200);
    }

    public function update($id, Request $request)
    {
        try {
            $supplier = Supplier::findOrFail($id)->update([
                'supplier_name' => $request->supplier_name,
                'supplier_email' => $request->supplier_email,
                'supplier_phone' => $request->supplier_phone,
                'address' => $request->address,
                'ATM' => $request->ATM,
                'supplier_note' => $request->supplier_note,
                'user_practise' => auth()->user()->name
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $supplier
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        $ids = explode(',', $id);
        Supplier::destroy($ids);
        return response()->json([
            'message' => 'success',
        ], 200);
    }
}
