<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InitiativeController extends Controller
{
    public function initiative(){ 
        $user = Auth::user();
        $initiatives = Initiative::all();  
        return view('adminpages.initiative', ['userName' => $user->name,'userEmail' => $user->email], compact('initiatives'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $initiative = new Initiative();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $initiative->image = $fileName;
                }
            }
            $initiative->heading = $request->heading;
            $initiative->paragraph = $request->paragraph;
            $initiative->save();
            return response()->json(['success' => true, 'initiative' => $initiative]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $initiative = Initiative::find($id);

    if (!$initiative) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'initiative' => $initiative
    ]);
}


public function update(Request $request, $id)
{
    $initiative = Initiative::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|max:1536', 
        'heading' => 'nullable',
        'paragraph' => 'nullable',
  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

     if ($request->hasFile('image')) {
        $file = $request->file('image');
        if ($file->isValid()) {
            $uniqueTimestamp = time();
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $imagePath = $fileName;

             $initiative->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $initiative->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $initiative->paragraph = $request->paragraph;
    }
    
     $initiative->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'initiative' => $initiative
    ], 200);
}

public function deleteinitiative(Request $request)
{
    $initiative = Initiative::find($request->initiative_id);

    if ($initiative) {
        $initiative->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
