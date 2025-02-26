<?php

namespace App\Http\Controllers;

use App\Models\AddMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MembersController extends Controller
{
    public function addmembers(){ 
        $user = Auth::user();
        $addmembers = AddMember::all();  
        return view('adminpages.members', ['userName' => $user->name,'userEmail' => $user->email], compact('addmembers'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'paragraph' => 'nullable',
            ]);
    
            $addmember = new AddMember();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $addmember->image = $fileName;
                }
            }
             $addmember->paragraph = $request->paragraph;
            $addmember->save();
            return response()->json(['success' => true, 'addmember' => $addmember]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $addmember = AddMember::find($id);

    if (!$addmember) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'addmember' => $addmember
    ]);
}


public function update(Request $request, $id)
{
    $addmember = AddMember::findOrFail($id);   

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

             $addmember->image = $imagePath;
        }
    }
    
    if ($request->has('paragraph')) {
        $addmember->paragraph = $request->paragraph;
    }
    
     $addmember->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'addmember' => $addmember
    ], 200);
}

public function deleteaddmember(Request $request)
{
    $addmember = AddMember::find($request->addmember_id);

    if ($addmember) {
        $addmember->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
