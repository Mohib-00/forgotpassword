<?php

namespace App\Http\Controllers;

use App\Models\Section1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Section1Controller extends Controller
{
    public function section1(){ 
        $user = Auth::user();
        $section1s = Section1::all();  
        return view('adminpages.section1', ['userName' => $user->name,'userEmail' => $user->email], compact('section1s'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $section1 = new Section1();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $section1->image = $fileName;
                }
            }
            $section1->heading = $request->heading;
            $section1->paragraph = $request->paragraph;
            $section1->save();
            return response()->json(['success' => true, 'section1' => $section1]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $section1 = Section1::find($id);

    if (!$section1) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'section1' => $section1
    ]);
}


public function update(Request $request, $id)
{
    $section1 = Section1::findOrFail($id);   

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

             $section1->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $section1->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $section1->paragraph = $request->paragraph;
    }
    
     $section1->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'section1' => $section1
    ], 200);
}

public function deletesection1(Request $request)
{
    $section1 = Section1::find($request->section1_id);

    if ($section1) {
        $section1->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
