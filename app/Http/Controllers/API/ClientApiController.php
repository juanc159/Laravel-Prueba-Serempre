<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientApiController extends Controller
{
    public function index()
    {
        return Client::all();
    }
}
