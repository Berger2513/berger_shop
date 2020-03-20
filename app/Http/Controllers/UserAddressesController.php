<?php

namespace App\Http\Controllers;

class UserAddressesController extends Controller
{
    public function index()
    {
        return view('user_addresses.index', [
            'addresses' => request()->user()->addresses,
        ]);
    }
}
