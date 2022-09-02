<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Community\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use com_exception;
use Illuminate\Support\Str;
class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Cache::get('communities',function(){  return Community::where('user_id',auth()->user()->id)->get();    });
        return view('communities.index',compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Cache::get('topics',function(){  Topic::all();    });
        return view('communities.create',compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityRequest $request)
    {

        $community = Community::create($request->validated() + [
            'user_id' => auth()->user()->id,
            // 'slug'  =>  Str::slug($request->name)  // we dont need this beacuse we use package eloquent slug /
        ]);
        $community->topics()->attach($request->topics);
        return redirect()->route('communities.index')->with('message','Community Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {

        $query = $community->posts();

        if(request('sort','') == 'popular'){

            $posts = $query->orderBy('created_at','asc');

        }else{

            $posts = $query->latest();
        }


        $posts = $posts->paginate(8);
        return view('communities.show',compact('community','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        if($community->user_id  !==  auth()->user()->id){
            return abort(403);
        }
        $topics = Topic::all();
        $community->load('topics');
        return view('communities.edit',compact('community','topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        if($community->user_id  !==  auth()->user()->id){
            return abort(403);
        }
        $community->update($request->validated());
        $community->topics()->sync($request->topics);
        return redirect()->route('communities.index')->with('message','Community Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        if($community->user_id  !==  auth()->user()->id){
            return abort(403);
        }

        $community->delete();
        return redirect()->route('communities.index')->with('message','Community Deleted Successfully');
    }
}
