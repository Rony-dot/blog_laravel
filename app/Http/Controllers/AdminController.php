<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.auth');
    }

    public function users(){
        $users =User::all();

        return view('admin.users',compact('users'));
    }

    public function adminCreate(){
        return view('admin.create');
    }

    public function adminCreateUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->hasfile('profile_image')){
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().".".$extension;
            $file->move('uploads/users/',$fileName);
            $user->profile_image = $fileName;
        }
        $user->save();
        $user->roles()->sync($request->role_id);
        return redirect()->back()->with('msg',"User Created Successfull");
    }

    public function adminEditUser($id){
        $user = User::find($id);
        return view('admin.adminEditUser',compact('user'));

    }
    public function adminUpdateUser(Request $request, $id){
        // dd($request->role_id);
        $user = User::find($id);
        $this->validate($request,[
            'email' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password !==''){
            $user->password = Hash::make($request->password);
        }

        $user->roles()->sync($request->role_id);

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
        $destination = 'uploads/users/'.$user->profile_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        
        $user->delete();
        return redirect()->back()->with('msg','Delete succesfull by Admin');

    }
}
