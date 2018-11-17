@extends('layouts.admin')


@section('content')


 @if(Session::has('deleted_post'))
 <div class="alert alert-danger alert-dismissible">
 {{session('deleted_post')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif 
 
 
 @if(Session::has('created_post'))
 <div class="alert alert-success alert-dismissible">
 {{session('created_post')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif 
 
 @if(Session::has('updated_post'))
 <div class="alert alert-warning alert-dismissible">
 {{session('updated_post')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif
 
 
 
<h2>Posts index</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Title</th>
      <th scope="col">Owner</th>
      <th scope="col">Category</th>
      <th scope="col">Body</th>
      <th scope="col">Post</th>
      <th scope="col">Comment</th>
      <th scope="col">Create</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
   @if($posts)
   @foreach($posts as $post)
   
    <tr>
      <th>{{$post->id}}</th>
      <th><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" ></th>
      <th><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></th>
      <th>{{$post->user->name}}</th>
      <th>{{$post->category ? $post->category->name : 'uncategorized'}}</th>
      <th>{{str_limit($post->body,30)}}</th>
      <th><a href="{{route('home.post',$post->id)}}">View Post</a></th>
      <th><a href="{{route('admin.comments.show',$post->id)}}">View comments</a></th>
      <th>{{$post->created_at->diffForHumans()}}</th>
      <th>{{$post->updated_at->diffForHumans()}}</th>
    </tr>
    
    @endforeach
    @endif
    
  </tbody>
</table>


@endsection