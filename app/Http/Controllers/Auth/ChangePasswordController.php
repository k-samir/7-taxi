<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function showChangePassword(Request $request,$token){
        return view('auth.passwords.changePassword')->with('token',$token)->with('action','changePassword');
    }

    public function showCreatePassword(Request $request, $token){
        return view('auth.passwords.changePassword')->with('token',$token)->with('action','createPassword');

    }

    public function changePassword(Request $request,$token){
        $user = User::where('remember_token',$token)->first();
        if(!(Hash::check($request->input('current-password'),$user->password))){
            return redirect()->back()->with("error","Votre mot de passe actuelle est incorect.");
        }
        if(strcmp($request->input('new-password'),$request->input('current-password')) == 0){
            return redirect()->back()->with('error','Le nouveau mot de passe doit etre différant de l\'actuelle');

        }
        if(strcmp($request->input('new-password'),$request->input('new-password_confirmation')) !==0){
             return redirect()->back()->with('error','Le mot de passe et sa confimation doit etre identique');
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8',
        ]);
        $user->password = Hash::make($request->input('new-password'));
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route('homeNoVerification');
    }

    public function createPassword(Request $request,$token){
        $this->changePassword($request,$token);
        return redirect()->route('homeNoVerification');
    }

}
