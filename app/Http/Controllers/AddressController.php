<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('google-map.index', compact('addresses'));
    }

    public function create()
    {
        return view('google-map.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:255',
            'map_address' => 'required|max:255',
        ]);

        $inputs = $request->except('_token', 'map_address');
        $location_arr = explode(",", $request->map_address);
        $inputs["latitude"] = $location_arr[0];
        $inputs["longitude"] = $location_arr[1];
        $address = Address::create($inputs);
        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }

    public function show(Address $address)
    {
        return view('google-map.show', compact('address'));
    }

    public function edit(Address $address)
    {
        return view('google-map.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'address' => 'required|max:255',
        ]);

        $inputs = $request->except('_token', '_method', 'map_address');
        $location_arr = explode(",", $request->map_address);
        $inputs["latitude"] = $location_arr[0];
        $inputs["longitude"] = $location_arr[1];

        $address->update($inputs);
        return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
    }
}
