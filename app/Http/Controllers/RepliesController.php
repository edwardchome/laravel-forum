<?php

namespace App\Http\Controllers;

use App\Models\Replies;
use App\Models\Threads;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * RepliesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Threads $threads){
        $threads->addReply([
            'body'=>\request('body'),
            'user_id'=>auth()->id(),
        ]);

        return redirect($threads->path());
    }
}
