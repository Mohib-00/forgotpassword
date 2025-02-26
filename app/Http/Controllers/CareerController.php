<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function career(){ 
        $user = Auth::user();
        $careers = Career::all();  
        return view('adminpages.career', ['userName' => $user->name,'userEmail' => $user->email], compact('careers'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $career = new Career();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $career->image = $fileName;
                }
            }
            $career->heading = $request->heading;
            $career->paragraph = $request->paragraph;
            $career->save();
            return response()->json(['success' => true, 'career' => $career]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $career = Career::find($id);

    if (!$career) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'career' => $career
    ]);
}


public function update(Request $request, $id)
{
    $career = Career::findOrFail($id);   

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

             $career->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $career->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $career->paragraph = $request->paragraph;
    }
    
     $career->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'career' => $career
    ], 200);
}

public function deletecareer(Request $request)
{
    $career = Career::find($request->career_id);

    if ($career) {
        $career->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
