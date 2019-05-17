@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="entry-title">Interact With Us</h1>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
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
                        <span class="comment-count">{{count($post->comments)}} Comments</span>
                        <span class="author">Host: <strong>{{$post->user->name}}</strong></span>
                    </div>
                    <div class="content">
                        <p>{!!Str::words($post->body, 50)!!}</p>
                    </div>
                    <div class="action">
                        <a href="/show/{{$post->id}}" class="join-thread"><i class="fas fa-comment-alt"></i>Join Thread</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>   
@endsection