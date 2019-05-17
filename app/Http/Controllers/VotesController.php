<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Comment;

class VotesController extends Controller
{
    //
    public function post_vote(Request $request){
        $isVote = $request['voted'] === true ? true: false;
        $comment_id = $request['comment_id'];
        $update = false;

        $comment = Comment::find($comment_id);

        if(!$comment){
            return null;
        }
        $user = auth()->user();

        $vote = $user->votes()->where('comment_id', $comment_id)->first();
        if($vote){
            $already_voted = $vote->vote;
            $update = true;

            if($isVote == $already_voted){
                $vote->delete();
                return null;
            }
        }else{
            $vote = new Vote;
        }
        $vote->vote = $isVote;
        $vote->comment_id = $comment_id;
        $vote->user_id = auth()->user()->id;
        if($update){
            $vote->update();
        }else{
            $vote->save();
        }
        return response()->json([
            'ups' => $comment->votes()->where('vote', true)->count(),
            'downs' => $comment->votes()->where('vote', false)->count()
        ]);
    }
    
}
