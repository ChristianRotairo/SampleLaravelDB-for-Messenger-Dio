<?php

namespace App\Http\Controllers;

use App\Models\TravelHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TravelHistoryController extends Controller
{
    public function index()
    {
        $travel_histories = TravelHistory::all();
        if ($travel_histories->count() > 0) {
            return response()->json($travel_histories, 200);
        } else {
            return response()->json(['message' => 'No travel history found']);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $travelHistory = TravelHistory::create([
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        if ($travelHistory) {
            return response()->json([
                'message' => 'Travel history added successfully',
                'travel_history' => $travelHistory,
                'image_url' => $imagePath ? asset($imagePath) : null,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Something went wrong'
            ], 500);
        }
    }
}
