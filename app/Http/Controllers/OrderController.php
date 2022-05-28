<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        $order = new Order();
        $not = new Notification();
        $not->text = 'New order has been placed';
        $not->read = false;
        $not->user_id = $request->owner_id;

        $not2 = new Notification();
        $not2->text = 'Your order has been requested, check your notifactions for more info';
        $not2->read = false;
        $not2->user_id = $request->buyer_id;
        $order->total = $request->total;
        $order->owner_id = $request->owner_id;
        $order->buyer_id = $request->buyer_id;
        $order->confirmed_by_buyer = false;
        $order->currency_id = $request->buyer_id;
        $order->status = false;
        $order->save();
        $not->save();
        $not2->save();
        return redirect()->back();
    }
}
