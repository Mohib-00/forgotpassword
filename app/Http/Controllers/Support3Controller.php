<?php

namespace App\Http\Controllers;

use App\Models\Support3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Support3Controller extends Controller
{
    public function support3(){ 
        $user = Auth::user();
        $support3s = Support3::all();  
        return view('adminpages.support3', ['userName' => $user->name,'userEmail' => $user->email], compact('support3s'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $support3 = new Support3();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $support3->image = $fileName;
                }
            }
            $support3->heading = $request->heading;
            $support3->paragraph = $request->paragraph;
            $support3->save();
            return response()->json(['success' => true, 'support3' => $support3]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $support3 = Support3::find($id);

    if (!$support3) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'support3' => $support3
    ]);
}


public function update(Request $request, $id)
{
    $support3 = Support3::findOrFail($id);   

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

             $support3->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $support3->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $support3->paragraph = $request->paragraph;
    }
    
     $support3->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'support3' => $support3
    ], 200);
}

public function deletesupport3(Request $request)
{
    $support3 = Support3::find($request->support3_id);

    if ($support3) {
        $support3->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
