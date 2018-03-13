<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index()
    {
      $discussions = Discussion::orderBy('created_at', 'desc')->paginate(5);
      return view('forum', ['d' => $discussions]);
    }

    public function channel($slug)
    {
      $channel = Channel::where('slug', $slug)->first();

      return view('channel')->with('d', $channel->discussions()->paginate(5));
    }
}
