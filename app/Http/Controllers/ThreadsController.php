<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Threads;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * ThreadsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel)
    {
        if($channel->exists){
//            $channelId = Channel::where('slug',$channelSlug)->first()->id;
            //$threads = Threads::where('channel_id',$channelId)->latest()->get();
            $threads = $channel->threads()->latest()->get();
        }
        else{
            $threads = Threads::latest()->get();
        }


        return view('threads.index',  compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param $channelid
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {

        $this->validate($request,[
            'channel_id'=>'required|exists:channels,id',
            'title'=>'required',
            'body'=>'required'
        ]);
       $thread = Threads::create([
            'user_id'=>auth()->id(),
            'channel_id'=>\request('channel_id'),
            'title'=>\request('title'),
            'body'=>\request('body')
        ]);

       return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     * @param $channeId
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function show($channeId,Threads $threads)
    {
        return view('threads.show', compact('threads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function edit(Threads $threads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Threads $threads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Threads $threads)
    {
        //
    }
}
