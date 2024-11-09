<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('backend.settings.setting',compact('user'));
    }
    public function update(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'confirmed',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if($request->hasFile('photo')){
            if($user->profile_image){
                $old_image = public_path('assets/uploads/'.$user->profile_image);
                if(file_exists($old_image)){
                    
                    unlink($old_image);
                }
            }
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads'),$image_name);
            $user->profile_image = $image_name;
        }
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully');
    }
}
