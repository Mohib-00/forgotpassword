<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function team(){ 
        $user = Auth::user();
        $teams = Team::all();  
        return view('adminpages.team', ['userName' => $user->name,'userEmail' => $user->email], compact('teams'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'nullable|image|max:1536', 
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $team = new Team();
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $uniqueTimestamp = time();
                    $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
                    $file->move(public_path('images'), $fileName);
                    $team->image = $fileName;
                }
            }
            $team->heading = $request->heading;
            $team->paragraph = $request->paragraph;
            $team->save();
            return response()->json(['success' => true, 'team' => $team]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $team = Team::find($id);

    if (!$team) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'team' => $team
    ]);
}


public function update(Request $request, $id)
{
    $team = Team::findOrFail($id);   

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

             $team->image = $imagePath;
        }
    }

    if ($request->has('heading')) {
        $team->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $team->paragraph = $request->paragraph;
    }
    
     $team->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'team' => $team
    ], 200);
}

public function deleteteam(Request $request)
{
    $team = Team::find($request->team_id);

    if ($team) {
        $team->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
