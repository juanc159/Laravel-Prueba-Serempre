<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportExcel()
    {
        return Excel::download(new ClientsExport, 'clientes.xlsx');
    }

    public function importForm(){
        return view('clientes.importForm');
    }

    public function import(Request $request) 
    {
        

        // Determine si el tamaño alcanza los 20M
        if ($request->getClientSize() >= 1000000) {
            echo "<script>alert('tamano maximo es 1M')</script>";
            return redirect('/clientes/importForm');
        }

        Excel::import(new ClientsImport, $request->file);
        
        return redirect('/clientes')->with('success', 'All good!');
    }
}
