<?php

namespace App\Http\Controllers;

use Auth;
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
      switch (request('filter')) {
        case 'me':
          $results = Discussion::where('user_id', Auth::id())->paginate(5);
          break;
        case 'solved';
          $answered = array();
          foreach(Discussion::all() as $d)
          {
            if($d->has_best_answer())
            {
              array_push($answered, $d);
            }
          }
          $results = new Paginator($answered, 5);
          break;
        case 'unsolved':
          $unanswered = array();
          foreach(Discussion::all() as $d)
          {
            if(!($d->has_best_answer()))
            {
              array_push($unanswered, $d);
            }
          }
          $results = new Paginator($unanswered, 5);
          break;
        default:
          $results = Discussion::orderBy('created_at', 'desc')->paginate(5);
          break;
      }
      return view('forum', ['d' => $results]);
    }

    public function channel($slug)
    {
      $channel = Channel::where('slug', $slug)->first();

      return view('channel')->with('d', $channel->discussions()->paginate(5));
    }
}
