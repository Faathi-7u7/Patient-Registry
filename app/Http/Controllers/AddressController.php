<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    // List all addresses
    public function index()
    {
        $addresses = Address::with('island')->get();
        return response()->json(['message' => 'Addresses retrieved successfully.', 'addresses' => $addresses], 200);
    }

    // Show a single address
    public function show(Address $address)
    {
        $address = $address->load('island');
        return response()->json(['message' => 'Address retrieved successfully.', 'address' => $address], 200);
    }

    // Create a new address
    public function store(Request $request)
    {
        $validated = $request->validate([
            'street' => 'required|string|max:255',
            'house' => 'required|string|max:255',
            'island_id' => 'required|exists:islands,id',
        ]);

        $address = Address::create($validated);
        return response()->json(['message' => 'Address created successfully.', 'address' => $address], 201);
    }

    // Update an existing address
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'street' => 'sometimes|string|max:255',
            'house' => 'sometimes|string|max:255',
            'island_id' => 'sometimes|exists:islands,id',
        ]);

        $address->update($validated);
        return response()->json(['message' => 'Address updated successfully.', 'address' => $address], 200);
    }

    // Delete an address
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(['message' => 'Address deleted successfully.'], 200);
    }
}
