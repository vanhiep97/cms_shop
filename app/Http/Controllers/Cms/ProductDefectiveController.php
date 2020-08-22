<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDefective;

class ProductDefectiveController extends Controller
{
    public function index()
    {
        $productDefectives = ProductDefective::with('product')->paginate(5);
        return view('cms.modules.product-defectives.index', compact('productDefectives'));
    }
}
