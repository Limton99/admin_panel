<?php


namespace App\Services\Impl;


use App\Models\Order\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderServiceImpl implements OrderService
{

    public function getAll(Request $request)
    {
        $perPage = $request->get('perPage', 15);

        $orders = Order::with('client', 'addresses', 'info', 'transaction', 'estimates')
            ->orderBy('id', 'ASC');

        $orders = $orders->paginate($perPage);

        $orders->map(function ($item) {
                if ($item->info->status->ru_name) {
                    $item->info->status->name = $item->info->status->ru_name;
                } elseif ($item->info->status->en_name) {
                    $item->info->status->name = $item->info->status->kk_name;
                } else {
                    $item->info->status->name = $item->info->status->label;
                }
        });


        return $orders;
    }

    public function get($id)
    {
        $order = Order::with('client', 'addresses', 'info', 'transaction', 'estimates')
            ->find($id);


            if ($order->info->status->ru_name) {
                $order->info->status->name = $order->info->status->ru_name;
            } elseif ($order->info->status->en_name) {
                $order->info->status->name = $order->info->status->kk_name;
            } else {
                $order->info->status->name = $order->info->status->label;
            }



        $order->estimates->map(function ($item) {
            if ($item->paymentMethod) {
                if ($item->paymentMethod->ru_name) {
                    $item->paymentMethod_name = $item->paymentMethod->ru_name;
                } elseif ($item->paymentMethod->en_name) {
                    $item->paymentMethod_name = $item->paymentMethod->kk_name;
                } else {
                    $item->paymentMethod_name = $item->paymentMethod->label;
                }
            }
            else {
                $item->paymentMethod_name = null;
            }
        });

        if(!$order) {
            throw new \Exception('Такого заказа нету!!!');
        }

        return $order;
    }
}
