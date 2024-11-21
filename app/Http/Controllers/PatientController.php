<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    // List all patients
    public function index()
    {
        return Patient::with('address')->get(); // Fetch all patients with their address details
    }

    // Show a single patient
    public function show(Patient $patient)
    {
        return $patient->load('address'); // Fetch a specific patient with address details
    }

    // Create a new patient
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'dob' => 'required|date',
            'national_id' => 'required|string|unique:patients',
            'address_id' => 'required|exists:addresses,id',
        ]);

        return Patient::create($validated); // Create and return the new patient
    }

    // Update a patient
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'dob' => 'sometimes|date',
            'national_id' => 'sometimes|string|unique:patients,national_id,' . $patient->id,
            'address_id' => 'sometimes|exists:addresses,id',
        ]);

        $patient->update($validated); // Update the patient record
        return $patient; // Return the updated patient
    }

    // Delete a patient
    public function destroy(Patient $patient)
    {
        $patient->delete(); // Delete the patient
        return response()->noContent(); // Return no content response
    }
}