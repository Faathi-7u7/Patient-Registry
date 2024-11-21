<?php
namespace App\Http\Controllers;

use App\Models\Island;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    // List all islands
    public function index()
    {
        // Return all islands from the database
        return Island::all();
    }

    // Show a single island
    public function show(Island $island)
    {
        // Return a single island with its related addresses
        return $island->load('addresses');
    }

    // Create a new island
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'name' => 'required|string|unique:islands,name', // Name must be unique
        ]);

        // Create and return the newly created island
        return Island::create($validated);
    }

    // Update an existing island
    public function update(Request $request, Island $island)
    {
        // Validate incoming data (only allow changing the name)
        $validated = $request->validate([
            'name' => 'sometimes|required|string|unique:islands,name,' . $island->id,
        ]);

        // Update the island with validated data
        $island->update($validated);

        // Return the updated island
        return $island;
    }

    // Delete an island
    public function destroy(Island $island)
    {
        // Delete the island and all associated addresses (due to the cascade delete setup)
        $island->delete();

        // Return a response with no content
        return response()->noContent();
    }
}
