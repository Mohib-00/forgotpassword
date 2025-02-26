<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HighlightController extends Controller
{
    public function highlight(){ 
        $user = Auth::user();
        $highlights = Highlight::all();  
        return view('adminpages.highlight', ['userName' => $user->name,'userEmail' => $user->email], compact('highlights',));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'required|image|max:1536', 
                'heading' => 'required',
            ]);
    
            $highlight = new Highlight();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $highlight->image = $fileName;
                }
            }
            $highlight->heading = $request->heading;
            $highlight->save();
            return response()->json(['success' => true, 'highlight' => $highlight]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $highlight = Highlight::find($id);

    if (!$highlight) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'highlight' => $highlight
    ]);
}


public function update(Request $request, $id)
{
    $highlight = Highlight::findOrFail($id);   

    $validator = Validator::make($request->all(), [
      'image' => 'nullable|image|max:1536', 
      'heading' => 'nullable|string|max:255',
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

             $highlight->image = $imagePath;
        }
    }

   

    if ($request->has('heading')) {
        $highlight->heading = $request->heading;
    }
    

     $highlight->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'highlight' => $highlight
    ], 200);
}

public function deletehighlight(Request $request)
{
    $highlight = Highlight::find($request->highlight_id);

    if ($highlight) {
        $highlight->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}

}
