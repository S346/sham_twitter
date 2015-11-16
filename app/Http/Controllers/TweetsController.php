<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tweet;
use Auth;

class TweetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $friend_user= $user->friends()->lists('friend_user_id');
        $friend_user[] = $user->id;
        $tweets = Tweet::whereIn('user_id', $friend_user)->whereNull('tweet_id')->latest('published_at')->get();

        return view('tweet.index', compact('tweets', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $input['user_id'] = $user->id;
        $input['published_at'] = Carbon::now();

        Tweet::create($input);
        \Session::flash('flash_message', 'ツイートしました。');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::findOrFail($id);

        return view('tweet.show', compact('tweet'));
    }

    /**
     * Display the specified all resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all_show()
    {
        $user = Auth::user();
        $tweets = Tweet::latest('published_at')->get();

        return view('tweet.index', compact('user', 'tweets'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
