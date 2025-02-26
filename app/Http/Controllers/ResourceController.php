<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{
    public function resource(){ 
        $user = Auth::user();
        $resources = Resource::all();  
        return view('adminpages.resource', ['userName' => $user->name,'userEmail' => $user->email], compact('resources'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'heading' => 'nullable',
                'paragraph' => 'nullable',
                'name' => 'nullable',
            ]);
    
            $resource = new Resource();
            $resource->heading = $request->heading;
            $resource->paragraph = $request->paragraph;
            $resource->name = $request->name;
            $resource->save();
            return response()->json(['success' => true, 'resource' => $resource]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $resource = Resource::find($id);

    if (!$resource) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'resource' => $resource
    ]);
}


public function update(Request $request, $id)
{
    $resource = Resource::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'heading' => 'nullable',
        'paragraph' => 'nullable',
        'name' => 'nullable',
  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    if ($request->has('heading')) {
        $resource->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $resource->paragraph = $request->paragraph;
    }
    if ($request->has('name')) {
        $resource->name = $request->name;
    }
    
     $resource->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'resource' => $resource
    ], 200);
}

public function deleteresource(Request $request)
{
    $resource = Resource::find($request->resource_id);

    if ($resource) {
        $resource->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
