<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OverviewController extends Controller
{
    public function overview(){ 
        $user = Auth::user();
        $overviews = Overview::all();  
        return view('adminpages.overview', ['userName' => $user->name,'userEmail' => $user->email], compact('overviews',));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
                'number' => 'nullable', 
                'n_heading' => 'nullable',
            ]);
    
            $overview = new Overview();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $overview->image = $fileName;
                }
            }
            $overview->heading = $request->heading;
            $overview->paragraph = $request->paragraph;
            $overview->number = $request->number;
            $overview->n_heading = $request->n_heading;
            $overview->save();
            return response()->json(['success' => true, 'overview' => $overview]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $overview = Overview::find($id);

    if (!$overview) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'overview' => $overview
    ]);
}


public function update(Request $request, $id)
{
    $overview = Overview::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|max:1536', 
        'heading' => 'nullable',
        'paragraph' => 'nullable',
        'number' => 'nullable', 
        'n_heading' => 'nullable',
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

             $overview->image = $imagePath;
        }
    }

   

    if ($request->has('heading')) {
        $overview->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
      $overview->paragraph = $request->paragraph;
    }
    if ($request->has('number')) {
        $overview->number = $request->number;
    }
    if ($request->has('heading')) {
        $overview->n_heading = $request->n_heading;
    }
    

     $overview->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'overview' => $overview
    ], 200);
}

public function deleteOverview(Request $request)
{
    $overview = Overview::find($request->overview_id);

    if ($overview) {
        $overview->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
