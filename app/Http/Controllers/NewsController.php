<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function khabar(){ 
        $user = Auth::user();
        $khabars = News::all();  
        return view('adminpages.news', ['userName' => $user->name,'userEmail' => $user->email], compact('khabars'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $khabar = new News();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $khabar->image = $fileName;
                }
            }
            $khabar->heading = $request->heading;
            $khabar->paragraph = $request->paragraph;
            $khabar->save();
            return response()->json(['success' => true, 'khabar' => $khabar]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $khabar = News::find($id);

    if (!$khabar) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'khabar' => $khabar
    ]);
}


public function update(Request $request, $id)
{
    $khabar = News::findOrFail($id);   

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

             $khabar->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $khabar->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $khabar->paragraph = $request->paragraph;
    }
    
     $khabar->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'khabar' => $khabar
    ], 200);
}

public function deletekhabar(Request $request)
{
    $khabar = News::find($request->khabar_id);

    if ($khabar) {
        $khabar->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
