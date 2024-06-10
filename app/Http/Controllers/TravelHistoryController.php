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
            return response()->json(['message' => 'No travel history found'], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'todo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $travelHistory = TravelHistory::create([
            'todo' => $request->todo,
        ]);

        if ($travelHistory) {
            return response()->json([
                'message' => 'Travel history added successfully',
                'travel_history' => $travelHistory,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Something went wrong'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'todo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $travelHistory = TravelHistory::find($id);

        if (!$travelHistory) {
            return response()->json([
                'message' => 'Travel history not found'
            ], 404);
        }

        $travelHistory->update([
            'todo' => $request->todo,
        ]);

        return response()->json([
            'message' => 'Travel history updated successfully',
            'travel_history' => $travelHistory,
        ], 200);
    }

    public function destroy($id)
    {
        $travelHistory = TravelHistory::find($id);

        if (!$travelHistory) {
            return response()->json([
                'message' => 'Travel history not found'
            ], 404);
        }

        $travelHistory->delete();

        return response()->json([
            'message' => 'Travel history deleted successfully'
        ], 200);
    }
}
