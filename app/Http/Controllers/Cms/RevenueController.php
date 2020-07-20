<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('cms.modules.revenue.index');
    }
}
