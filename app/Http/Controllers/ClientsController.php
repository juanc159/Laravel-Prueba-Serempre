<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return view('clientes.index');
    }

    public function store(Request $request)
    {
        $cliente = new Client;
        $cliente->create($request->all());
    }

    public function show(Client $cliente)
    {
        return $cliente;
    }

    public function update(Request $request, Client $cliente)
    {
        //
        //$contact->update($request->all());
        $fields = $request->validate([
            'name' => 'required|string',
            'id_city' => 'required'
        ]);

        $cliente->update([
            'name' => $fields['name'],
            'id_city' => $fields['id_city']
        ]);
    }

    public function destroy(Client $cliente)
    {
        $cliente->delete();
    }
}
