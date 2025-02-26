<?php

namespace App\Http\Controllers;

use App\Models\Join;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JoinController extends Controller
{
    public function join(){ 
        $user = Auth::user();
        $joins = Join::all();  
        return view('adminpages.join', ['userName' => $user->name,'userEmail' => $user->email], compact('joins'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'heading' => 'nullable',
                'paragraph' => 'nullable',
                'name' => 'nullable',
            ]);
    
            $join = new Join();
            $join->heading = $request->heading;
            $join->paragraph = $request->paragraph;
            $join->name = $request->name;
            $join->save();
            return response()->json(['success' => true, 'join' => $join]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $join = Join::find($id);

    if (!$join) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'join' => $join
    ]);
}


public function update(Request $request, $id)
{
    $join = Join::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'heading' => 'nullable',
        'paragraph' => 'nullable',
        'name' => 'nullable',
  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    if ($request->has('heading')) {
        $join->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $join->paragraph = $request->paragraph;
    }
    if ($request->has('name')) {
        $join->name = $request->name;
    }
    
     $join->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'join' => $join
    ], 200);
}

public function deletejoin(Request $request)
{
    $join = Join::find($request->join_id);

    if ($join) {
        $join->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
