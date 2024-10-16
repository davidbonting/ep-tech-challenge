<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\NewClientRequest;
use Auth;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Auth::user()->clients()->select('id', 'name', 'email', 'phone')->withCount('bookings')->get();

        if (request()->expectsJson()) {
            return $clients;
        }

        return view('clients.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function show(Client $client)
    {
        $client = $client->load('bookings');

        return view('clients.show', ['client' => $client]);
    }

    public function store(NewClientRequest $request)
    {
        return Auth::user()->clients()->create($request->only('name', 'email', 'phone', 'adress', 'city', 'postcode'));
    }

    public function destroy(Client $client)
    {
        return $client->delete();
    }
}
