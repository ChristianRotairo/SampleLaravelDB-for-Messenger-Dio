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
        }else {
            return response()->json(['message' => 'No travel history found']);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()], 422);
        } else {
            $travel_histories = TravelHistory::create([
                'description' => $request->description,

            ]);
          if($travel_histories){
            return response()->json([
               'message' => 'Travel history added successfully',
                'travel_histories' => $travel_histories
            ], 200);
          }else{
            return response()->json([
               'message' => 'Something went wrong'
            ], 500);
          }
        }
    }
}
