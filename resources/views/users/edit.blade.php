@extends('layouts.app')

@section('content')
<div class="container">
    
</div>
    <div class="container user-edit">
        <div class="edit-form">
            <h1 class="entry-title">Edit Info</h1>
            <img src="{{asset('storage/profile_pictures/'.$user->profile_picture)}}" id="preview" alt="">
            <form action="/update_user/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="profile_upload">
                    
                    <label for="profile">Choose an Image</label>
                    <input type="file" accept="image/*" class="profile" name="profile_picture" id="profile">
                </div>
                <div class="user-name">
                    <input type="text" name='name' placeholder="New Name" value="{{$user->name}}">
                </div>
                <div class="btn-update">
                    <button type="submit" class="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection