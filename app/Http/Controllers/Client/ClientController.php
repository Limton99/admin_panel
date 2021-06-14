<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends WebBaseController
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientService->getAll();

        return view('admin.client.clients', ['clients' => $clients]);
    }

    public function show($id)
    {
        $client = $this->clientService->get($id);

        return view('admin.client.client', ['client' => $client]);
    }

    public function resetAttempts($id)
    {
        $this->clientService->resetAttempts($id);

        $this->edited();

        return redirect()->back();
    }

    public function getTransactions($id)
    {
        $client = $this->clientService->getTransactionsAndWallets($id);

        return view('admin.client.client-transactions', ['client' => $client]);
    }
}
