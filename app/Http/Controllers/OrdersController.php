<?php


namespace App\Http\Controllers;


use App\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends WebBaseController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->getAll($request);

        return view('admin.order.orders', [
            'orders' => $orders,
            'perPage' => $request->perPage
            ]);
    }

    public function show($id)
    {
        $order = $this->orderService->get($id);

        $order->info->specialist_name = $order->info->specialist
            ? $order->info->specialist->username : null;
        $order->info->specialist_status = $order->info->specialistStatus
            ? $order->info->specialistStatus->label : null;

        return view('admin.order.order', ['order' => $order]);
    }

}
