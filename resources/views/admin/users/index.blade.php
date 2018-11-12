@extends('layouts.admin')

@section('content')
 
 
 @if(Session::has('deleted_user'))
 <div class="alert alert-danger alert-dismissible">
 {{session('deleted_user')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif 
 
 
 @if(Session::has('created_user'))
 <div class="alert alert-success alert-dismissible">
 {{session('created_user')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif 
 
 @if(Session::has('updated_user'))
 <div class="alert alert-warning alert-dismissible">
 {{session('updated_user')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif
 
 
  <h3>Users</h3>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
      <th scope="col">Create</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
   @if($users)
   @foreach($users as $user)
   
    <tr>
      <th>{{$user->id}}</th>
      <th><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></th>
      <th><img height="50px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" ></th>
      <th>{{$user->email}}</th>
      <th>{{$user->role->name}}</th>
      <th>{{$user->is_active  == 1 ? 'active' : 'innactive'}}</th>
      <th>{{$user->created_at->diffForHumans()}}</th>
      <th>{{$user->updated_at->diffForHumans()}}</th>
    </tr>
    
    @endforeach
    @endif
   
  </tbody>
</table>
@endsection('content')
