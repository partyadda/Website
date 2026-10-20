<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theatre;
use App\Models\home_banner;
use App\Models\city;
use App\Models\branch;
use App\Models\asset;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
// use Auth;
class loginController extends Controller
{
    
     public function index(){
       
        return view('index');
    }
    
    
    public function login(Request $request){
    //   return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            
        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      // dd('yes');
      //  $user = Auth::user();
      $user = User::select('branch_id', 'admin_id', 'username')->where('email', $request->email)->first();
      //dd($user);
      // Get all the user's branch IDs, assuming the relationship exists
      // $branchIds = $user->pluck('branch_id')->toArray();

      // dd(Auth::user()); 
      // dd('yes');
      // Authentication passed, redirect to the dashboard
      //  return redirect()->route('dashboard');

      session(['branch_id' => $user->branch_id]);
      session(['user_id' => $user->admin_id]);
      session(['username' => $user->username]);

        // Optionally, you can store multiple branch IDs if needed:
        $branchIds = session()->get('branch_ids', []);
        $branchIds[] = $user->branch_id;
        $branchIds = array_unique($branchIds);
        sort($branchIds);
        session(['branch_ids' => $branchIds]);

            return redirect()->intended('/admin/dashboard');
        }
        
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     // dd('yes');
        //     return redirect()->intended('/admin/dashboard');
        // }

        // Authentication failed, redirect back with an error
        return back()->with('error', 'Invalid credentials.');
    }
    
    
    public function dashboard(){
        return view('dashboard');
  }
}