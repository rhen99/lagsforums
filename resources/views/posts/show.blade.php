@extends('layouts.app')
@section('content')
    <section class="container">
            <div class="post">
                 @guest
                        @else
                        @if (Auth::user()->id === $post->user_id)
                             <ul class="option">
                        <li><a href="#" class="option_toggle"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="options hide">
                                <li><a href="/{{$post->id}}/edit"><i class="fas fa-edit"></i> Edit</a></li>
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fas fa-trash-alt"></i> Delete</a></li>
                                <form action="/{{$post->id}}" style="display:none;" id="delete-form" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </ul>
                        </li>
                    </ul>    
                        @endif
                    @endguest
                <h3 class="title">{{$post->title}}</h3>
                <div class="meta">
                    <span class="time-posted">{{date('F j, Y g:ia', strtotime($post->updated_at))}}</span>
                    <span class="author">Host: <strong>{{$post->user->name}}</strong></span>
                </div>
                <div class="content">
                    <p>{!!$post->body!!}</p>
                </div>
            </div>
            <div class="discuss-section">
                <h3>Comments ({{count($post->comments)}})</h3>
                @if (count($post->comments) > 0)
                    @foreach ($post->comments as $comment)
                    <div class="comment" data-id="{{$comment->id}}">
                    <div class="avatar">
                        <img src="{{asset('storage/profile_pictures/'.$comment->profile_picture)}}" alt="">
                    </div>
                    <div class="content">
                        <h6 class="name">{{$comment->name}}</h6>
                        <div class="meta">
                            <span>{{date('F j, Y g:ia', strtotime($post->updated_at))}}</span>
                            <span class="up">{{count($comment->votes->where('vote', true))}}  Ups</span>
                            <span class="down">{{count($comment->votes->where('vote', false))}}  Downs</span>
                        </div>
                        <div class="comment-text">
                            {{$comment->body}}
                        </div>
                        <div class="action">
                            <a href="#" id="up" class="vote"><i class="fas fa-caret-up"></i> upvote</a>
                            <a href="#" id="down" class="vote"><i class="fas fa-caret-down"></i> downvote</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
           @guest
               <div class="guest-viewer">
                   <p>Please <a href="{{route('login')}}">login</a>, or <a href="{{route('register')}}">register</a> to comment.</p>
               </div>
               @else
               
               <div class="write-comment">
                <div class="avatar"><img src="{{asset('storage/profile_pictures/'.Auth::user()->profile_picture)}}" alt=""></div>
                <form action="/comment/{{$post->id}}" method="POST">
                    @csrf
                    <div class="comment-input">
                        <textarea name="comment" placeholder="Write Comment..." id="comment"></textarea>
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Post Comment" class="submit">
                    </div>
                </form>
            </div>
           @endguest
        </section>
        <script>
            const token = '{{Session::token()}}';
            const urlVote = '{{route("vote")}}';
        </script>
@endsection