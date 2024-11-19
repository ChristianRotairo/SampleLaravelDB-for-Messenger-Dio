<?php

namespace App\Http\Controllers;

use App\Models\DataEntryModel;
use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    /**
     * Display a listing of the data entries.
     */
    public function index()
    {
        $entries = DataEntryModel::all();
        return response()->json($entries);
    }

    /**
     * Store a newly created data entry in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'kvnr'=> 'required|string',
            'birthDay' => 'required|date',
            'gender' => 'required|string',
            'placeOfBirth'=> 'required|string',
            'maritalStatus'=> 'required|string',
            'birthState'=> 'required|string',
            'religion'=> 'required|string',
            'motherMaidenName'=> 'required|string',
            'children'=> 'required|string',
            'motherDeceasedDate'=> 'required|string',
            'motherCausedOfDeath'=> 'required|string',
            'fatherName'=> 'required|string',
            'fatherDeceasedDate'=> 'required|string',
            'fatherCausedOfDeath'=> 'required|string',
            'spouseName'=> 'required|string',
            'spouseDeceasedDate'=> 'required|string',
            'spouseCausedOfDeath'=> 'required|string',
            'preferredLanguage'=> 'required|string',
            'contactPreference'=> 'required|string',
            'emailAddress'=> 'required|string',
            'emergencyContactName'=> 'required|string',
            'relationship'=> 'required|string',
            'phoneNumber'=> 'required|string',
            'emergencyContactEmailAddress'=> 'required|string',
        ]);

        $entry = DataEntryModel::create($validatedData);

        return response()->json([
            'message' => 'Data entry created successfully',
            'data' => $entry
        ], 201);
    }

    /**
     * Display the specified data entry.
     */
    public function show($id)
    {
        $entry = DataEntryModel::find($id);

        if (!$entry) {
            return response()->json(['message' => 'Data entry not found'], 404);
        }

        return response()->json($entry);
    }

    /**
     * Update the specified data entry in storage.
     */
    public function update(Request $request, $id)
    {
        $entry = DataEntryModel::find($id);

        if (!$entry) {
            return response()->json(['message' => 'Data entry not found'], 404);
        }

        $validatedData = $request->validate([
            'firstName' => 'sometimes|string|max:50',
            'lastName' => 'sometimes|string|max:50',
            'birthDay' => 'sometimes|date',
            'gender' => 'sometimes|in:male,female,other'
        ]);

        $entry->update($validatedData);

        return response()->json([
            'message' => 'Data entry updated successfully',
            'data' => $entry
        ]);
    }

    /**
     * Remove the specified data entry from storage.
     */
    public function destroy($id)
    {
        $entry = DataEntryModel::find($id);

        if (!$entry) {
            return response()->json(['message' => 'Data entry not found'], 404);
        }

        $entry->delete();

        return response()->json(['message' => 'Data entry deleted successfully']);
    }
}
