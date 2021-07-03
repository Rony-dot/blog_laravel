<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.auth');
    }

    public function adminEditUser($id){
        $user = User::find($id);
        return view('pages.adminEditUser',compact('user'));

    }
    public function adminUpdateUser(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password !==''){
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        if($request->hasfile('profile_image')){
            $destination = 'uploads/users/'.$user->profile_image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().".".$extension;
            $file->move('uploads/users/',$fileName);
            $user->profile_image = $fileName;
        }
        $user->update();
        return redirect()->back()->with('msg',"Update Successfull by Admin");

    }
    public function adminDeleteUser($id){
        $user = User::find($id);
        if($request->hasfile('profile_image')){
            $destination = 'uploads/users/'.$user->profile_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }
        $user->destroy();
        return redirct()->back()->with('msg','Delete succesfull by Admin');

    }
}
