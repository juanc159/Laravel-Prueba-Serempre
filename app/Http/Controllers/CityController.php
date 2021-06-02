<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ciudades.index');
    }

    public function store(Request $request)
    {
        $ciudad = new City;
        $ciudad->create($request->all());
    }

    public function show(City $ciudad)
    {
        return $ciudad;
    }

    public function update(Request $request, City $ciudad)
    {
        //
        //$contact->update($request->all());
        $fields = $request->validate([
            'name' => 'required|string'
        ]);

        $ciudad->update([
            'name' => $fields['name']
        ]);
    }

    public function destroy(City $ciudad)
    {
        $ciudad->delete();
    }
    
}
