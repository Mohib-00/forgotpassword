<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function about(){ 
        $user = Auth::user();
        $abouts = About::all();  
        return view('adminpages.about', ['userName' => $user->name,'userEmail' => $user->email], compact('abouts'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $about = new About();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $about->image = $fileName;
                }
            }
            $about->heading = $request->heading;
            $about->paragraph = $request->paragraph;
            $about->save();
            return response()->json(['success' => true, 'about' => $about]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $about = About::find($id);

    if (!$about) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'about' => $about
    ]);
}


public function update(Request $request, $id)
{
    $about = About::findOrFail($id);   

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

             $about->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $about->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $about->paragraph = $request->paragraph;
    }
    
     $about->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'about' => $about
    ], 200);
}

public function deleteabout(Request $request)
{
    $about = About::find($request->about_id);

    if ($about) {
        $about->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
