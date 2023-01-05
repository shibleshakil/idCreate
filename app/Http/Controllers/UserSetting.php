<?php

namespace App\Http\Controllers;

use App\models\User;
use auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserSetting extends Controller
{
    public function ownerSettings() {
        return view('settings.owner');
    }

    public function buyerSettings() {
        return view('settings.buyer');
    }

    
    public function buyerChangePasswordForm(){
        return view('settings.buyer.change_password');
    }

    public function buyerChangePassword(Request $request){
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
             
                return view('settings.buyer.change_pass_congrate');
             
            } else {
                return back()->with('error', 'Old password does not match');
            }
        } catch (\Throwable $th) {
            
            return back()->with('error', 'Internal server error');
        }
    }

    public function buyerChangeIDForm(){
        return view('settings.buyer.number_form');
    }

    public function buyerChangeID(Request $request){
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
                   return view('settings.buyer.congrates');
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
}
