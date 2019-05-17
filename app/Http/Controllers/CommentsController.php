<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $post = Post::find($id);
        
        $comment = new Comment;
        $comment->body = $request->input('comment');
        $comment->post()->associate($post);
        $comment->name = auth()->user()->name;
        $comment->profile_picture = auth()->user()->profile_picture;
        $comment->save();

        return redirect('/show/'.$post->id)->with('success', 'Comment Posted');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
