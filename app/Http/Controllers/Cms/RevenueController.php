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
    public function all(Request $request)
    {
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        $orderByEmp = DB::table('orders')->select('user_practise',
        DB::raw('count(id) as total_order, sum(coupon) as total_coupon,
            sum(total_quantity) as total_quantity,
            sum(total_money) as total_money, sum(lack) as total_lack
        '))
        ->groupBy('user_practise')->paginate(5);
        foreach($orderByEmp as $key => $item) {
            $orderByEmp[$key] = [
                'employee' => $item,
                'orderByEmp' => Order::where('user_practise', $item->user_practise)->get()->toArray()
            ];
        }
        $numberSale = User::select('id')->count();
        return view('cms.modules.revenue.all', compact('orders', 'customers', 'orderByEmp', 'numberSale'));
    }

    public function customer()
    {
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        $orderByEmp = DB::table('orders')->select('user_practise',
        DB::raw('count(id) as total_order, sum(coupon) as total_coupon,
            sum(total_quantity) as total_quantity,
            sum(total_money) as total_money, sum(lack) as total_lack
        '))
        ->groupBy('user_practise')->paginate(5);
        foreach($orderByEmp as $key => $item) {
            $orderByEmp[$key] = [
                'employee' => $item,
                'orderByEmp' => Order::where('user_practise', $item->user_practise)->get()->toArray()
            ];
        }
        $numberSale = User::select('id')->count();
        return view('cms.modules.revenue.customer', compact('orders', 'customers', 'orderByEmp', 'numberSale'));
    }

    public function product()
    {
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        $orderByEmp = DB::table('orders')->select('user_practise',
        DB::raw('count(id) as total_order, sum(coupon) as total_coupon,
            sum(total_quantity) as total_quantity,
            sum(total_money) as total_money, sum(lack) as total_lack
        '))
        ->groupBy('user_practise')->paginate(5);
        foreach($orderByEmp as $key => $item) {
            $orderByEmp[$key] = [
                'employee' => $item,
                'orderByEmp' => Order::where('user_practise', $item->user_practise)->get()->toArray()
            ];
        }
        $numberSale = User::select('id')->count();
        return view('cms.modules.revenue.product', compact('orders', 'customers', 'orderByEmp', 'numberSale'));
    }

    public function sale()
    {
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        $orderByEmp = DB::table('orders')->select('user_practise',
        DB::raw('count(id) as total_order, sum(coupon) as total_coupon,
            sum(total_quantity) as total_quantity,
            sum(total_money) as total_money, sum(lack) as total_lack
        '))
        ->groupBy('user_practise')->paginate(5);
        foreach($orderByEmp as $key => $item) {
            $orderByEmp[$key] = [
                'employee' => $item,
                'orderByEmp' => Order::where('user_practise', $item->user_practise)->get()->toArray()
            ];
        }
        $numberSale = User::select('id')->count();
        return view('cms.modules.revenue.sale', compact('orders', 'customers', 'orderByEmp', 'numberSale'));
    }

    public function user()
    {
        $orders = Order::with('customer')->paginate(5);
        $customers = Customer::with('orders')->paginate(5);
        $orderByEmp = DB::table('orders')->select('user_practise',
        DB::raw('count(id) as total_order, sum(coupon) as total_coupon,
            sum(total_quantity) as total_quantity,
            sum(total_money) as total_money, sum(lack) as total_lack
        '))
        ->groupBy('user_practise')->paginate(5);
        foreach($orderByEmp as $key => $item) {
            $orderByEmp[$key] = [
                'employee' => $item,
                'orderByEmp' => Order::where('user_practise', $item->user_practise)->get()->toArray()
            ];
        }
        $numberSale = User::select('id')->count();
        return view('cms.modules.revenue.user', compact('orders', 'customers', 'orderByEmp', 'numberSale'));
    }
}
