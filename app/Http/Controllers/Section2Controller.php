<?php

namespace App\Http\Controllers;

use App\Models\Section2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Section2Controller extends Controller
{
    public function section2(){ 
        $user = Auth::user();
        $section2s = Section2::all();  
        return view('adminpages.section2', ['userName' => $user->name,'userEmail' => $user->email], compact('section2s'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $section2 = new Section2();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $section2->image = $fileName;
                }
            }
            $section2->heading = $request->heading;
            $section2->paragraph = $request->paragraph;
            $section2->save();
            return response()->json(['success' => true, 'section2' => $section2]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $section2 = Section2::find($id);

    if (!$section2) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'section2' => $section2
    ]);
}


public function update(Request $request, $id)
{
    $section2 = Section2::findOrFail($id);   

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

             $section2->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $section2->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $section2->paragraph = $request->paragraph;
    }
    
     $section2->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'section2' => $section2
    ], 200);
}

public function deletesection2(Request $request)
{
    $section2 = Section2::find($request->section2_id);

    if ($section2) {
        $section2->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
