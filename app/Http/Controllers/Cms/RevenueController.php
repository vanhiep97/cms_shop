<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class RevenueController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        return view('cms.modules.revenue.index', compact('orders', 'customers'));
    }
}
