@extends('layouts.admin')


@section('content')

<h1>Media List</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Created date</th>
      <th scope="col">Updated date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   @if($photos)
   @foreach($photos as $photo)
   
    <tr>
      <th>{{$photo->id}}</th>
      <th><img height="50" src="{{$photo->file}}"></th>
      <th>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</th>
      <th>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</th>
      <th>
          
            {!! Form::close() !!}
                       {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                       <div class="form-group">
                       {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!} 
                       </div>
                {!! Form::close() !!}
      </th>
    </tr>
    
    @endforeach
    @endif
   
  </tbody>
</table>

@endsection