<?php


namespace App\Services\Impl;


use App\Models\Client\Client;
use App\Models\Client\ClientWallet;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientServiceImpl implements ClientService
{

    public function getAll()
    {
        $clients = Client::with('orders', 'city')->paginate(10);

        $clients->map(function ($item) {
            $item->profile = $item->profile_created == 1 ? 'Да' : 'Нет';
            $item->telnum_confirmed = $item->telnumber_confirmed == 1 ? 'Да' : 'Нет';
        });

        return $clients;
    }

    public function get($id)
    {
        $client = Client::with('orders', 'city')->findOrFail($id);
        $orders = Client::find($id)->orders()->paginate(5);

        $orders->map(function ($item) {
                if ($item->info->status->ru_name) {
                    $item->info->status->name = $item->info->status->ru_name;
                } elseif ($item->info->status->en_name) {
                    $item->info->status->name = $item->info->status->kk_name;
                } else {
                    $item->info->status->name = $item->info->status->label;
                }
        });

        $client->profile = $client->profile_created == 1 ? 'Да' : 'Нет';
        $client->telnum_confirmed = $client->telnumber_confirmed == 1 ? 'Да' : 'Нет';


        return [
            'client' => $client,
            'orders' => $orders
        ];
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }

    public function resetAttempts($id)
    {
        $client = Client::findOrFail($id);

        $client->auth_attempts = 0;

        $client->save();
    }

    public function getTransactionsAndWallets($id)
    {
        $client = Client::with('wallets')->findOrFail($id);

        $transactions = $client->orders()->paginate(5);

        return [
            'client' => $client,
            'transactions' => $transactions
        ];
    }
}
