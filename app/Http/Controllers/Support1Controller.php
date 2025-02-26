<?php

namespace App\Http\Controllers;

use App\Models\Support1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Support1Controller extends Controller
{
    public function support1(){ 
        $user = Auth::user();
        $support1s = Support1::all();  
        return view('adminpages.support1', ['userName' => $user->name,'userEmail' => $user->email], compact('support1s'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'paragraph' => 'nullable',
            ]);
    
            $support1 = new Support1();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $support1->image = $fileName;
                }
            }
             $support1->paragraph = $request->paragraph;
            $support1->save();
            return response()->json(['success' => true, 'support1' => $support1]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $support1 = Support1::find($id);

    if (!$support1) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'support1' => $support1
    ]);
}


public function update(Request $request, $id)
{
    $support1 = Support1::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|max:1536', 
        'heading' => 'nullable',
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

             $support1->image = $imagePath;
        }
    }
    
    if ($request->has('paragraph')) {
        $support1->paragraph = $request->paragraph;
    }
    
     $support1->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'support1' => $support1
    ], 200);
}

public function deletesupport1(Request $request)
{
    $support1 = Support1::find($request->support1_id);

    if ($support1) {
        $support1->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
