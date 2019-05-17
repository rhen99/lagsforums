@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="entry-title">Create Discussion</h1>
        
        <div class="create-section">
            <form action="/{{$post->id}}" method="POST">
                @csrf
                @method('put')
                <div class="create-title form-div">
                    <label for="disc_title">Title</label>
                    <input type="text" name="title" id="disc_title" value="{{$post->title}}">
                    @error('title')
                        <span class="err">{{$message}}</span>
                    @enderror
                </div>
                <div class="create-body form-div">
                    <label>Post Body</label>
                    <textarea name="body" id="article-ckeditor">{{$post->body}}</textarea>
                    @error('body')
                        <span class="err">{{$message}}</span>
                    @enderror
                </div>
                <input type="submit" value="Update" id="publish" class="publish submit">
            </form>
        </div>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection