<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Post;
use App\Http\Requests\Post\StoreCommunityPostRequest;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\Comment;
use App\Events\Post\CreatePostEvent;
class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Community $community)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Community $community)
    {
        return view('posts.create',compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityPostRequest $request,Community $community)
    {

        $post = $community->posts()->create([
            'user_id'=>auth()->id(),
            'title'=> $request->title,
            'post_text'=>  $request->post_text ?? null,
            'post_url'=>  $request->post_url ?? null,
        ]);

        if($request->hasFile('post_image')){

            event(new CreatePostEvent($post,$request));
        }
        return redirect()->route('communities.show',$community)->with('message','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community , Post $post)
    {

        return view('posts.show',compact(['community','post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community,Post $post)
    {
        return view('posts.edit',compact(['community','post']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommunityPostRequest $request,Community $community,Post $post)
    {
        if($post->user_id !== auth()->id()){
            abort(403);
        }
        //update all except image
        $post->update($request->validated());


        if($request->hasFile('post_image')){

            event(new CreatePostEvent($post,$request));
        }
        return redirect()->route('communities.show',compact('community'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community,Post $post)
    {
        if (auth()->user()->cannot('delete',$post)) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('communities.show',compact('community'));
    }
}
