<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        Session::put('email',$request->email);

        return redirect(route('home.page'))->with(['msg'=>"Logged in Successfully"]);

    }

    public function logoutUser()
    {

    }


}
