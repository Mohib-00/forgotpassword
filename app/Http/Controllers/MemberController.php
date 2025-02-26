<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function member(){ 
        $user = Auth::user();
        $members = Member::all();  
        return view('adminpages.groupmember', ['userName' => $user->name,'userEmail' => $user->email], compact('members'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
                'name' => 'nullable',
            ]);
    
            $member = new Member();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $member->image = $fileName;
                }
            }
            $member->heading = $request->heading;
            $member->paragraph = $request->paragraph;
            $member->name = $request->name;
            $member->save();
            return response()->json(['success' => true, 'member' => $member]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $member = Member::find($id);

    if (!$member) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'member' => $member
    ]);
}


public function update(Request $request, $id)
{
    $member = Member::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|max:1536', 
        'heading' => 'nullable',
        'paragraph' => 'nullable',
        'name' => 'nullable',
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

             $member->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $member->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $member->paragraph = $request->paragraph;
    }
    if ($request->has('name')) {
        $member->name = $request->name;
    }
    
     $member->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'member' => $member
    ], 200);
}

public function deletemember(Request $request)
{
    $member = Member::find($request->member_id);

    if ($member) {
        $member->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
