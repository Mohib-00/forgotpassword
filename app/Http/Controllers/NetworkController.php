<?php

namespace App\Http\Controllers;

use App\Models\Networks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NetworkController extends Controller
{
    public function network(){ 
        $user = Auth::user();
        $networks = Networks::all();  
        return view('adminpages.network', ['userName' => $user->name,'userEmail' => $user->email], compact('networks'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $network = new Networks();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $network->image = $fileName;
                }
            }
            $network->heading = $request->heading;
            $network->paragraph = $request->paragraph;
            $network->save();
            return response()->json(['success' => true, 'network' => $network]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $network = Networks::find($id);

    if (!$network) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'network' => $network
    ]);
}


public function update(Request $request, $id)
{
    $network = Networks::findOrFail($id);   

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

             $network->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $network->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $network->paragraph = $request->paragraph;
    }
    
     $network->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'network' => $network
    ], 200);
}

public function deletenetwork(Request $request)
{
    $network = Networks::find($request->network_id);

    if ($network) {
        $network->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
