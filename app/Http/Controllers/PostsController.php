<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostAddRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Models\Posts;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('user.auth');
    }

    public function index()
    {
//        $posts = Posts::orderBy('created_at','desc')->where('user_id',session()->get('user_id'))->paginate(10);
        $posts = Posts::orderBy('created_at','desc')->paginate(10);
//        $posts = Posts::all();
//        $count = Posts::count();
//        return $posts;
//        return $count;
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostAddRequest $request)
    {
        $user = User::find($request->session()->get('user_id'));
//        $user = User::where('email',$request->session()->get('user_id'));
//        dd($request->all(), $request->session()->get('user_id') );

//        $post= new Posts;
//        $post->title = $request->title;
//        $post->body = $request->body;
//        //        dd($post->title, $post->body);
//        $post->save();

//        Posts::create($request->all());

        $post = new Posts();
        $post->title = $request->title;
        $post->body = $request->body;
        $post['user_id']=$user->id;
        $post = $post->save();

        return redirect(route('posts.page'))->with(['msg'=>'created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Posts::find($id);
//        dd ($post);
//        return $post;
//        return view('posts.show',compact('post'));
    return view('posts.show')->with('post',$post);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        return view('posts.edit')->with('post',$post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required'
        ]);
//        dd($request->all());
        $post= Posts::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        //        dd($post->title, $post->body);
        $post->save();
        return redirect(route('posts.page'))->with(['msg'=>'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        dd($post);
    }
    /**
     *  my custom delete function
     */
    public function delete($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect(route('posts.page'))->with('msg','deleted successfully');
    }

}
