<?php

namespace App\Http\Controllers;

use App\Models\Memberships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberShipsController extends Controller
{
    public function membership(){ 
        $user = Auth::user();
        $memberships = Memberships::all();  
        return view('adminpages.membership', ['userName' => $user->name,'userEmail' => $user->email], compact('memberships'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'paragraph' => 'nullable',
            ]);
    
            $membership = new Memberships();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $membership->image = $fileName;
                }
            }
             $membership->paragraph = $request->paragraph;
            $membership->save();
            return response()->json(['success' => true, 'membership' => $membership]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $membership = Memberships::find($id);

    if (!$membership) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'membership' => $membership
    ]);
}


public function update(Request $request, $id)
{
    $membership = Memberships::findOrFail($id);   

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

             $membership->image = $imagePath;
        }
    }
    
    if ($request->has('paragraph')) {
        $membership->paragraph = $request->paragraph;
    }
    
     $membership->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'membership' => $membership
    ], 200);
}

public function deletemembership(Request $request)
{
    $membership = Memberships::find($request->membership_id);

    if ($membership) {
        $membership->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
