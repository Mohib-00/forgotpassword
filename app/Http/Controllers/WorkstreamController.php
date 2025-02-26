<?php

namespace App\Http\Controllers;

use App\Models\workstream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WorkstreamController extends Controller
{
    public function workstream(){ 
        $user = Auth::user();
        $workstreams = workstream::all();  
        return view('adminpages.workstream', ['userName' => $user->name,'userEmail' => $user->email], compact('workstreams'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $workstream = new workstream();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $workstream->image = $fileName;
                }
            }
            $workstream->heading = $request->heading;
            $workstream->paragraph = $request->paragraph;
            $workstream->save();
            return response()->json(['success' => true, 'workstream' => $workstream]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $workstream = workstream::find($id);

    if (!$workstream) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'workstream' => $workstream
    ]);
}


public function update(Request $request, $id)
{
    $workstream = workstream::findOrFail($id);   

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

             $workstream->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $workstream->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $workstream->paragraph = $request->paragraph;
    }
    
     $workstream->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'workstream' => $workstream
    ], 200);
}

public function deleteworkstream(Request $request)
{
    $workstream = workstream::find($request->workstream_id);

    if ($workstream) {
        $workstream->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
