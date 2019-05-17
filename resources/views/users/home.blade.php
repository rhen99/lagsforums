@extends('layouts.app')

@section('content')
    <section class="container">
            <div class="profile-header">
                <div class="profile-pic">
                    <img src="{{asset('storage/profile_pictures/'.$user->profile_picture)}}" alt="">
                </div>
                <div class="profile-info">
                    <ul class="option">
                        <li><a href="#" class="option_toggle"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="options hide">
                                <li><a href="{{$user->id}}/edit_user"><i class="fas fa-edit"></i> Edit</a></li>
                            </ul>
                    </ul>    
                    <h2 class="user-name">{{$user->name}}</h2>
                    <div class="meta">
                        <span> Total Upvotes: 0</span>
                        <span>Total Downvotes: 0</span>
                        <span>Hosted Discussions: {{$user->posts->count()}}</span>
                    </div>
                </div>
            </div>
            <h3 class="emtry-title">Your Posts</h3>
            <div class="discussion-lists">
               @if ($user->posts->count())
                   @foreach ($user->posts as $post)
                    <div class="disc-item">
                        @if (Auth::user()->id === $post->user_id)
                             <ul class="option">
                        <li><a href="#" class="option_toggle"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="options hide">
                                <li><a href="{{$post->id}}/edit"><i class="fas fa-edit"></i> Edit</a></li>
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fas fa-trash-alt"></i> Delete</a></li>
                                <form action="/{{$post->id}}" style="display:none;" id="delete-form" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </ul>
                        </li>
                    </ul>    
                        @endif
                    <h3>{{$post->title}}</h3>
                    <div class="meta">
                        <span> {{date('F j, Y g:ia', strtotime($post->updated_at))}}</span>
                        <span>Ups: 0</span>
                        <span>Downs: 0</span>
                    </div>
                    <div class="content">
                        {{$post->body}}
                    </div>
                    <div class="action">
                        <a href="show/{{$post->id}}">View Discussion <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
               @endforeach
               @endif
            </div>
        </section>
@endsection