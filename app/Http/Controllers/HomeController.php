<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        if (auth()->user()->role_id == 1) {
            $data = User::find(auth()->user()->id);

            return view('profile.owner', compact('data'));
        }
        if (auth()->user()->role_id == 2) {
            $data = User::find(auth()->user()->id);

            return view('profile.staff', compact('data'));
        }
        if (auth()->user()->role_id == 3) {
            $data = User::find(auth()->user()->id);

            return view('profile.worker', compact('data'));
        }
        if (auth()->user()->role_id == 4) {
            $data = User::find(auth()->user()->id);

            return view('profile.buyer', compact('data'));
        }
        return view('home');
    }

    public function id()
    {
        return view('profile.id');
    }

    public function settings()
    {
        return view('profile.settings');
    }

    public function changePasswordForm(){
        return view('password.change_password');
    }

    public function changePassword(Request $request){
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:4|different:old_password', 
        ],[
            'password.different' => 'The new password and old password must be different.',
        ]);
        
        try {
            $user = User::findOrFail(auth()->user()->id);
    
            if (Hash::check($request->old_password, $user->password)) { 
                $user->fill([
                 'password' => Hash::make($request->password)
                ])->save();
             
                return view('password.change_pass_congrate');
             
            } else {
                return back()->with('error', 'Old password does not match');
            }
        } catch (\Throwable $th) {
            
            return back()->with('error', 'Internal server error');
        }
    }

    public function changeIDForm(){
        return view('id.number_form');
    }

    public function changeID(Request $request){
        $validatedData = $request->validate([
            'current_mobile_number' => 'required',
            'password' => 'required', 
            'mobile_number' => 'required|unique:users|different:current_mobile_number', 
        ],[
            'mobile_number.unique' => 'The new mobile number has already been taken.',
            'mobile_number.different' => 'The new mobile number and old mobile number must be different.',
        ]);
        
        try {
            $user = User::findOrFail(auth()->user()->id);
            if (Hash::check($request->password, $user->password)) { 
                if ($request->current_mobile_number == $user->mobile_number) {
                    $user->mobile_number = $request->mobile_number;
                    $user->save();
                   return view('id.congrates');
                }else {
                    return back()->with('error', 'Current mobile number does not match');
                }
             
            } else {
                return back()->with('error', 'Password does not match');
            }
        } catch (\Throwable $th) {
            
            return back()->with('error', 'Internal server error');
        }
    }

    public function changeImage(Request $request){
        $validatedData = $request->validate([
            'image' =>  ['image', 'mimes:jpeg,png,jpg,gif,svg,webp'],
        ]);
        $user = User::find(auth()->user()->id);
        $oldImg = $user->image;
        if($request->image){
            if($request->file('image')){
                $image = $request->file('image');
                $input = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads');
                $image->move($destinationPath,$input);
                $user->image = $input;
            }
        }
        $user->save();
        if ($oldImg) {
            $filePath = public_path('uploads/'.$oldImg);
            if (file_exists($filePath)){
                unlink($filePath);
            }
        }
        \Session::flash('success', 'Profile image changed successfully!');
        return back();
    }
}
