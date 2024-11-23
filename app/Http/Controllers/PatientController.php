<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // List all patients
    public function index()
    {
        $patients = Patient::with('address')->get();
        return response()->json(['message' => 'Patients retrieved successfully.', 'patients' => $patients], 200);
    }

    // Show a single patient
    public function show(Patient $patient)
    {
        $patient = $patient->load('address');
        return response()->json(['message' => 'Patient retrieved successfully.', 'patient' => $patient], 200);
    }

    // Create a new patient
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'national_id' => 'required|string|unique:patients|max:7', // Add max length for national_id
            'address_id' => 'required|exists:addresses,id',
        ]);

        $patient = Patient::create($validated);
        return response()->json(['message' => 'Patient created successfully.', 'patient' => $patient], 201);
    }

    // Update an existing patient
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'dob' => 'sometimes|date',
            'national_id' => 'sometimes|string|unique:patients,national_id,' . $patient->id,
            'address_id' => 'sometimes|exists:addresses,id',
        ]);

        $patient->update($validated);
        return response()->json(['message' => 'Patient updated successfully.', 'patient' => $patient], 200);
    }

    // Delete a patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message' => 'Patient deleted successfully.'], 200);
    }
}
