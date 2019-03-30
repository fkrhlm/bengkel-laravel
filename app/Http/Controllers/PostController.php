<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //declare sbb nak guna Post

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = new Post; //create instances model
        $posts = $post->all(); //model post akan panggil function all(semua row dlm table) then akan load dalam variable baru $posts
        
        //$posts = $post
        //->where('title', 'LIKE', '%asd') //boleh letak banyak where
        //->where('title', 'izzat')
        //->get(); - guna untuk dapatkan specific result

        return view('post.index', [  //akan display dekat resources->post->index.blade.php
            'posts'=> $posts //dia akan display apa yg ada dlm varible $posts tadi
        ]); //redirect ke resources->views->post->index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create'); //redirect ke resources->views->post->create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post; //kena declare dlu kt atas kalau nak guna $post

        $post->title = $request->title; //name dekat database -> nama dekat input field
        $post->content = $request->content; //specify database mana untuk input field mana

        if ($request->hasFile('image')){
            $post->image = $request->image->store('images','public');//untuk store images
        }else{
            $post->image = "";
        }

        $post->save(); //code untuk save dlm database

        return redirect()->route('posts.index'); //redirect ke index punya post
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',[
            'post'=>$post //nama post ni digunakan di dalam blade file
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')){
            $post->image = $request->image->store('images','public');
        }
       
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index'); //redirect ke index punya post
    }
}
