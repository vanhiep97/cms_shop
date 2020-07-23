<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use DB;
use App\Models\User;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
        $revenueOption = $request->revenueOption;
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        $orderByEmp = DB::table('orders')->select('user_practise',
        DB::raw('count(id) as total_order, sum(coupon) as total_coupon,
            sum(total_quantity) as total_quantity,
            sum(total_money) as total_money, sum(lack) as total_lack
        '))
        ->groupBy('user_practise')->get();
        foreach($orderByEmp as $key => $item) {
            $orderByEmp[$key] = [
                'employee' => $item,
                'orderByEmp' => Order::where('user_practise', $item->user_practise)->get()->toArray()
            ];
        }
        $numberSale = User::select('id')->count();
        return view('cms.modules.revenue.index', compact('orders', 'customers', 'orderByEmp', 'numberSale', 'revenueOption'));
    }
}
