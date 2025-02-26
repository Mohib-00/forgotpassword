<?php

namespace App\Http\Controllers;

use App\Models\MebershipSection2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MebershipSection2Controller extends Controller
{
    public function membershipsection2(){ 
        $user = Auth::user();
        $membershipsection2s = MebershipSection2::all();  
        return view('adminpages.membershipsection2', ['userName' => $user->name,'userEmail' => $user->email], compact('membershipsection2s'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $membershipsection2 = new MebershipSection2();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $membershipsection2->image = $fileName;
                }
            }
            $membershipsection2->heading = $request->heading;
            $membershipsection2->paragraph = $request->paragraph;
            $membershipsection2->save();
            return response()->json(['success' => true, 'membershipsection2' => $membershipsection2]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $membershipsection2 = MebershipSection2::find($id);

    if (!$membershipsection2) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'membershipsection2' => $membershipsection2
    ]);
}


public function update(Request $request, $id)
{
    $membershipsection2 = MebershipSection2::findOrFail($id);   

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

             $membershipsection2->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $membershipsection2->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $membershipsection2->paragraph = $request->paragraph;
    }
    
     $membershipsection2->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'membershipsection2' => $membershipsection2
    ], 200);
}

public function deletemembershipsection2(Request $request)
{
    $membershipsection2 = MebershipSection2::find($request->membershipsection2_id);

    if ($membershipsection2) {
        $membershipsection2->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
