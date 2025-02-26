<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AddMember;
use App\Models\Career;
use App\Models\Category;
use App\Models\Highlight;
use App\Models\Initiative;
use App\Models\MebershipSection2;
use App\Models\Member;
use App\Models\Networks;
use App\Models\News;
use App\Models\Overview;
use App\Models\Resource;
use App\Models\Section1;
use App\Models\Section2;
use App\Models\Support1;
use App\Models\Support2;
use App\Models\Support3;
use App\Models\Team;
use App\Models\workstream;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserAuthcontroller extends Controller
{
    public function register(Request $request) {
        try {
            
            $validateuser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|same:password',  
            ]);
    
            
            if ($validateuser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateuser->errors()  
                ], 401);  
            }
    
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),  
            ]);
    
            
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken  
            ], 200);
    
        } catch (\Throwable $th) {
           
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
    
 
 
     public function login(Request $request)
{
    try {
      
        $validateuser = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

       
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateuser->errors(),
            ], 422); 
        }

        
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'The credentials do not match our record.',
                'errors' => [
                    'password' => ['The password you entered is incorrect.']
                ],
            ], 401); 
        }
 
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'userType' => $user->userType,
        ], 200);

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}


public function changePassword(Request $request){
    $request->validate([
        'password' => 'required|confirmed',
    ]);
    $loggeduser = auth()->user();
    $loggeduser->password = Hash::make($request->password);
    $loggeduser->save();
    return response()->json([
        'message' => 'Password change succesfully',
        'status' => 'Success'   
    ], 200);
}

public function logout() {
       
    auth()->user()->tokens()->delete();

    Session::flush(); 

    return response()->json([
        'status' => true,
        'message' => 'User logged out',
        'data' => [],
    ], 200);
}

     public function logoutuser() {
       
        auth()->user()->tokens()->delete();
 
        Session::flush(); 
    
        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => [],
        ], 200);
    }
 
     
     public function home(){ 
         $user = Auth::user();      
         $highlights = Highlight::all();  
         $overviews = Overview::all(); 
         $workstreams = workstream::all();
         $networks = Networks::all();
         $groupmembers = Member::all();
         $members = AddMember::all();
         $teams = Team::all();
         $news = News::all();
         return view('userpages.home',compact('user','highlights','overviews','workstreams','networks','groupmembers','members','teams','news'));
     }
 
     public function admin(){ 
         $user = Auth::user();         
        return view('adminpages.admin', ['userName' => $user->name,'userEmail' => $user->email]);
    }

     public function about(){ 
        $user = Auth::user();    
        $abouts = About::all(); 
        $initiatives = Initiative::all();    
        return view('userpages.about',compact('user','abouts','initiatives'));
    }

    public function portfolio(){ 
        $user = Auth::user();         
        return view('userpages.portfolio',compact('user'));
    }
    public function services(){ 
        $user = Auth::user();         
        return view('userpages.servicepage',compact('user'));
    }
    public function contact(){ 
        $user = Auth::user();         
        return view('userpages.contact',compact('user'));
    }
    public function allmembers(){ 
        $user = Auth::user();    
        $members = AddMember::all();     
        return view('userpages.members',compact('user','members'));
    }

    public function teams(){ 
        $user = Auth::user(); 
        $teams = Team::all();        
        return view('userpages.team',compact('user','teams'));
    }

    public function news(){ 
        $user = Auth::user(); 
        $news = News::all();        
        return view('userpages.allnews',compact('user','news'));
    }
    public function board(){ 
        $user = Auth::user();  
        $teams = Team::all();       
        return view('userpages.board',compact('user','teams'));
    }
    public function event(){ 
        $user = Auth::user();         
        return view('userpages.events',compact('user'));
    }
    public function wedo(){ 
        $user = Auth::user();  
        $section1s = Section1::all();
        $section2s = Section2::all();
        return view('userpages.whatwedo',compact('user','section1s','section2s'));
    }
    public function resources(){ 
        $user = Auth::user();   
        $resources = Resource::all();
        return view('userpages.resources',compact('user','resources'));
    }
    public function joinus(){ 
        $user = Auth::user();         
        return view('userpages.joinus',compact('user'));
    }

    public function memberships(){ 
        $user = Auth::user();   
        $teams = Team::all(); 
        $members = AddMember::all();  
        $membershipsection2s = MebershipSection2::all();
        $categorys = Category::all();   
        return view('userpages.membership',compact('user','teams','members','membershipsection2s','categorys'));
    }
    public function supportourwork(){ 
        $user = Auth::user(); 
        $support1s = Support1::all();  
        $support2s = Support2::all(); 
        $support3s = Support3::all();       
        return view('userpages.supportwork',compact('user','support1s','support2s','support3s'));
    }
    public function joinourteam(){ 
        $user = Auth::user();    
        $careers = Career::all();     
        return view('userpages.careers',compact('user','careers'));
    }

    public function  users(){ 
        $user = Auth::user();
        $users = User::all();
        return view('adminpages.users', ['userName' => $user->name,'userEmail' => $user->email],compact('users'));
      }

      public function getUserData(Request $request)
{
    $userId = $request->input('user_id');
    $user = User::find($userId);
    $currentUser = Auth::user();  

    if ($user) {
        return response()->json([
            'success' => true,
            'user' => $user,
            'currentUser' => $currentUser
        ]);
    }

    return response()->json(['success' => false, 'message' => 'User not found']);
}

public function editUser(Request $request, $id)
{
    

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->userType = $request->userType;

    $user->save();

    return response()->json(['message' => 'User updated successfully.']);
}

public function deleteUser(Request $request)
{
    $user = User::find($request->user_id);

    if ($user) {
        $user->delete();

        return response()->json(['success' => true, 'message' => 'User deleted successfully']);
    }

    return response()->json(['success' => false, 'message' => 'User not found']);
}

     
}
