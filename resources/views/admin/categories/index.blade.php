@extends('layouts.admin')

@section('content')
 
 
 @if(Session::has('deleted_category'))
 <div class="alert alert-danger alert-dismissible">
 {{session('deleted_category')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif 
 
 
 @if(Session::has('created_category'))
 <div class="alert alert-success alert-dismissible">
 {{session('created_category')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif 
 
 @if(Session::has('updated_category'))
 <div class="alert alert-warning alert-dismissible">
 {{session('updated_category')}}
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 @endif
 
 
  <h3>Categories</h3>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Created date</th>
      <th scope="col">Updated date</th>
    </tr>
  </thead>
  <tbody>
   @if($categories)
   @foreach($categories as $categ)
   
    <tr>
      <th>{{$categ->id}}</th>
      <th><a href="{{route('admin.categories.edit',$categ->id)}}">{{$categ->name}}</a></th>
      <th>{{$categ->created_at ? $categ->created_at->diffForHumans() : 'no date'}}</th>
      <th>{{$categ->updated_at ? $categ->updated_at->diffForHumans() : 'no date'}}</th>
    </tr>
    
    @endforeach
    @endif
   
  </tbody>
</table>
@endsection('content')
