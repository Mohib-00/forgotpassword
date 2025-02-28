<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function  websitesettings(){ 
        $user = Auth::user();
        $settings = Setting::all();  
        return view('adminpages.settings', ['userName' => $user->name,'userEmail' => $user->email], compact('settings',));
    }
    public function store(Request $request)
{
    $request->validate([
        'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'name' => 'nullable|required|string|max:255',
        'email' => 'nullable|required|email',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|',
        'about_paragraph' => 'nullable|string|max:1000',
    ]);

    $setting = Setting::first(); 

    $imagePath = $setting->image_1 ?? null;

    
    if ($request->hasFile('image_1')) {
        $file = $request->file('image_1');
        if ($file->isValid()) {
            $uniqueTimestamp = time();
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $imagePath = $fileName;
        }
    }

    
    $setting = Setting::updateOrCreate(
        ['id' => $setting ? $setting->id : null],
        [
            'image_1' => $imagePath,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'about_paragraph' => $request->about_paragraph,
        ]
    );

     return response()->json([
        'success' => true,
        'message' => $setting ? 'Settings updated successfully!' : 'Settings created successfully!',
        'setting' => $setting,  
    ]);
}

public function getSetting($id) {
    $setting = Setting::find($id);
    return response()->json($setting);
}

public function updateSetting(Request $request, $id)
{
    $setting = Setting::find($id);

    if (!$setting) {
        return response()->json(['message' => 'Setting not found'], 404);
    }

    if ($request->hasFile('image_1')) {
        $file = $request->file('image_1');

        if ($file->isValid()) {
            $uniqueTimestamp = time();
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $setting->image_1 = $fileName;
        }
    }

     $setting->fill($request->only([
        'name', 
        'email', 
        'address', 
        'phone', 
        'about_paragraph'
    ]));

    $setting->save();

    return response()->json([
        'message' => 'Setting updated successfully',
        'setting' => $setting
    ]);
}

public function adminprofile()
{
$user = Auth::user();   
 return view('adminpages.profile', ['userName' => $user->name,'userEmail' => $user->email,'userImage' => $user->image]);
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:users,email,' . $user->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($user->image && File::exists(public_path('images/' . $user->image))) {
            File::delete(public_path('images/' . $user->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
    }

    if ($request->filled('name')) {
        $user->name = $request->name;
    }
    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully!',
        'image' => $user->image ? asset('images/' . $user->image) : null, 
        'name' => $user->name,
        'email' => $user->email
    ]);
}

}