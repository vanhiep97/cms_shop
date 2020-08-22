<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\ExchangeBill;
use App\Models\Inventory;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $dateNow = Carbon::today()->toDateString();
        $orders = Order::selectRaw('sum(total_money) as total_money_sale,
        count(id) as total_order, sum(total_quantity) as total_quantity_product');
        $orderAll = $orders->get()->toArray();
        $orderNow = $orders->whereDate('sell_date', '=', $dateNow)->get()->toArray();
        $sellTypeOff = Order::where('sell_type', 0);
        $sellTypeOffNow = $sellTypeOff->whereDate('sell_date', '=', $dateNow)->count();
        $sellTypeOffAll = $sellTypeOff->count();
        $sellTypeOn = Order::where('sell_type', 1);
        $sellTypeOnNow = $sellTypeOn->whereDate('sell_date', '=', $dateNow)->count();
        $sellTypeOnAll = $sellTypeOn->count();
        $billExchange = ExchangeBill::selectRaw('sum(exchange_ammount) as total_exchange_amount');
        $billExchangeNow = $billExchange->whereDate('exchange_date', '=', $dateNow)->get()->toArray();
        $billExchangeAll = $billExchange->get()->toArray();
        $product_die = Product::where('product_amount', 0)->count();
        $product_nguong = Product::whereBetween('product_amount', array(1, 10))->count();
        $product_vuot = Product::where('product_amount', '>', 'product_amount_inventory')->count();
        $inventory = Inventory::selectRaw('sum(quantity) as quantity_invetory')->get()->toArray();
        $product_count = Product::count();
        $dataNow = [
            'total_money' => $orderNow[0]['total_money_sale'],
            'total_order' => $orderNow[0]['total_order'],
            'total_quantity' => $orderNow[0]['total_quantity_product'],
            'total_order_sell_type_off' => $sellTypeOffNow,
            'total_order_sell_type_on' => $sellTypeOnNow,
            'exchange_amount' => $billExchangeNow[0]['total_exchange_amount'],
        ];

        $dataAll = [
            'total_money' => $orderAll[0]['total_money_sale'],
            'total_order' => $orderAll[0]['total_order'],
            'total_quantity' => $orderAll[0]['total_quantity_product'],
            'total_order_sell_type_off' => $sellTypeOffAll,
            'total_order_sell_type_on' => $sellTypeOnAll,
            'exchange_amount' => $billExchangeAll[0]['total_exchange_amount'],
            'quantity_inventory' => $inventory[0]['quantity_invetory'],
            'product_die' => $product_die,
            'product_nguong' => $product_nguong,
            'product_vuot' => $product_vuot,
            'product_count' => $product_count
        ];
        return view('cms.modules.home.index', compact('dataNow', 'dataAll'));
    }
}
