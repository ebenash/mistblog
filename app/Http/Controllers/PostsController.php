<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::all();
        return view('posts.list')->with('posts',$posts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userposts($id)
    {
        //
        $items = [
            'user' => User::find($id),
            'posts' => User::find($id)->posts
        ];
        
        return view('posts.userposts')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.form')->with('create','create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'image|nullable|max:1999'
        ]); 
        
        if($request->hasFile('image')){
            $rawfilename = $request->file('image')->getClientOriginalName();
            $filenameonly = pathinfo($rawfilename,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameonly."_".time().".".$extension;
            $path = $request->file('image')->storeAs('public/uploads',$filename);
        }else{
            $filename = 'default.png';
        }

        $post = new Posts;

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image_url = $filename;
        $post->user_id = auth()->user()->id;

        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Posts::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Posts::find($id);
        return view('posts.form')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);        

        $post = Posts::find($request->input('id'));

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image_url = 'https://cdn-5ce4a003f911c80f50818892.closte.com/wp-content/uploads/elementor/thumbs/php-regex-developers-ocsfht6plbfud4gnblnu87mr6y2477shcaybok3iiw.png';


        $post->update();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Posts::find($id);
        $post->delete();
        return redirect('/posts');

    }
}
