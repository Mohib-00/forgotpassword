<?php

namespace App\Http\Controllers;

use App\Models\Support2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Support2Controller extends Controller
{
    public function support2(){ 
        $user = Auth::user();
        $support2s = Support2::all();  
        return view('adminpages.support2', ['userName' => $user->name,'userEmail' => $user->email], compact('support2s'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $support2 = new Support2();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $support2->image = $fileName;
                }
            }
            $support2->heading = $request->heading;
            $support2->paragraph = $request->paragraph;
            $support2->save();
            return response()->json(['success' => true, 'support2' => $support2]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $support2 = Support2::find($id);

    if (!$support2) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'support2' => $support2
    ]);
}


public function update(Request $request, $id)
{
    $support2 = Support2::findOrFail($id);   

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

             $support2->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $support2->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $support2->paragraph = $request->paragraph;
    }
    
     $support2->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'support2' => $support2
    ], 200);
}

public function deletesupport2(Request $request)
{
    $support2 = Support2::find($request->support2_id);

    if ($support2) {
        $support2->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
