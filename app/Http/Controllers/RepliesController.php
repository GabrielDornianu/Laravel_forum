<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {
      Like::create([
        'reply_id' => $id,
        'user_id'  => Auth::id()
      ]);

      return redirect()->back();
    }

    public function dislike($id)
    {
      Like::where('reply_id', $id)->where('user_id', Auth::id())->first()->delete();

      return redirect()->back();
    }

    public function best_answer($id)
    {
      $reply = Reply::find($id);
      $reply->best_answer = 1;
      $reply->save();

      Session::flash('success', 'Reply marked as best');
      return redirect()->back();
    }
}
