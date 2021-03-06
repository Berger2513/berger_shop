<?php

namespace App\Http\Controllers;
use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;


class UserAddressesController extends Controller
{
    public function index()
    {
        return view('user_addresses.index', [
            'addresses' => request()->user()->addresses,
        ]);
    }

    public function create()
    {
        return view('user_addresses.create_and_edit', ['address' => new UserAddress()]);
    }


    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }


    public function edit(UserAddress $user_address)
    {
        return view('user_addresses.create_and_edit', ['address' => $user_address]);
    }

    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
    	$this->authorize('own', $user_address);
        $user_address->update($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }

    public function destroy(UserAddress $user_address)
    {
    	
        if ($this->authorize('own', $user_address)) {
            if ($user_address->delete()) {
                return ['status' => 1];
            } else {
                return ['status' => -1];
            }
         } 
        return ['status' => -2];
    }
}
