<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{

    public function home()
    {
        return view('pages.home');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function services()
    {
        return view('pages.services');
    }
    public  function login()
    {
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }

  
    public function registerUser(Request $request)
    {
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
        $roles = [3];
        $user->roles()->attach($roles);
        Session::put('user_id',$user->id);
        return redirect(route('login.page'))->with('msg',"Registration Successfull");
    }

    public function loginUser(Request $request){
//        $user = User::find($request->email);

        $user = User::where('email',$request->email)->first();
        if($user==null){
            return redirect()->back()->with([
                'msg'=>"User doesn't exist"
            ]);
        }

        if(!Hash::check($request->password, $user->password))
        {
            return redirect()->back()->with([
                'msg'=>"password doesn't match"
            ]);
        }


        Session::put('user_id',$user->id);

        return redirect(route('home.page'))->with(['msg'=>"Logged in Successfully"]);

    }

    public function logoutUser(Request  $request)
    {
//        $request->session()->destroy($request->session()->get('user_id'));

//        Auth::logout();
        $request->session()->forget('user_id');
        $request->session()->flush();
        return redirect(route('login.page'))->with([
           'msg' => "Logged out successfully"
        ]);
    }

    public function editProfile(){
        $user = User::find(session()->get('user_id'));
        return view('pages.edit_user',compact('user'));
    }
    public function updateProfile(Request $request){
        $user = User::find(session()->get('user_id'));

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password !== ''){
            $user->password = Hash::make($request->password);
        }
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
        return redirect()->back()->with('msg',"Update Successfull");
    }

}
