<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Island;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    // List all addresses
    public function index()
    {
        return Address::with('island')->get(); // Fetch all addresses along with related island data
    }

    // Show a single address
    public function show(Address $address)
    {
        return $address->load('island'); // Show a specific address and include its related island
    }

    // Create a new address
    public function store(Request $request)
    {
        $validated = $request->validate([
            'street' => 'required|string|max:255', // Street validation
            'city' => 'required|string|max:255', // City validation
            'state' => 'required|string|max:255', // State validation
            'island_id' => 'required|exists:islands,id', // Ensure the island exists
        ]);

        $address = Address::create($validated); // Create a new address with validated data
        return response()->json($address, 201); // Return the newly created address with a 201 status code
    }

    // Update an existing address
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'street' => 'sometimes|string|max:255', // Optional update for street
            'city' => 'sometimes|string|max:255', // Optional update for city
            'state' => 'sometimes|string|max:255', // Optional update for state
            'island_id' => 'sometimes|exists:islands,id', // Optional update for island_id
        ]);

        $address->update($validated); // Update the address with validated data
        return response()->json($address); // Return the updated address
    }

    // Delete an address
    public function destroy(Address $address)
    {
        $address->delete(); // Delete the address
        return response()->noContent(); // Return no content status (204) after successful deletion
    }
}
