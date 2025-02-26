<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category(){ 
        $user = Auth::user();
        $categorys = Category::all();  
        return view('adminpages.category', ['userName' => $user->name,'userEmail' => $user->email], compact('categorys'));
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'heading' => 'nullable',
                'paragraph' => 'nullable',
            ]);
    
            $category = new Category();
            $category->heading = $request->heading;
            $category->paragraph = $request->paragraph;
            $category->save();
            return response()->json(['success' => true, 'category' => $category]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function show($id)
{
    $category = Category::find($id);

    if (!$category) {
        return response()->json([
            'success' => false,
            'message' => 'Not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'category' => $category
    ]);
}


public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);   

    $validator = Validator::make($request->all(), [
        'heading' => 'nullable',
        'paragraph' => 'nullable',
  ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    if ($request->has('heading')) {
        $category->heading = $request->heading;
    }
    
    if ($request->has('paragraph')) {
        $category->paragraph = $request->paragraph;
    }
    
     $category->save();

    return response()->json([
        'success' => true,
        'message' => 'Updated successfully!',
        'category' => $category
    ], 200);
}

public function deletecategory(Request $request)
{
    $category = Category::find($request->category_id);

    if ($category) {
        $category->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Not found']);
}
}
