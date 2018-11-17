@extends('layouts.admin')


@section('content')

          @if(Session::has('deleted_comment'))
             <div class="alert alert-success">
             {{session('deleted_comment')}}
             </div>
          @endif

          @if(Session::has('updated_comment'))
             <div class="alert alert-success">
             {{session('updated_comment')}}
             </div>
          @endif


@if($comments->count() > 0 )
<h1>Comments List</h1>
	<table class="table">
		<th>ID</th>
		<th>Author</th>
		<th>Email</th>
		<th>Body</th>
		<th>Post</th>
	    <th>Actions</th>
	    <th>Actions</th>
		@foreach($comments as $comment)
           <tr>
             <td>{{$comment->id}}</td>
                          
              <td>{{$comment->author}}</td>

             <td>{{$comment->email}}</td>

             <td>{{$comment->body}}</td>

             <td><a href="{{route('home.post',$comment->post->id)}}">View post</a></td>

             <td>
             	
             	@if($comment->is_active == 1)

		             	{!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update',$comment->id]]) !!}

			                 
			                 <div class="form-group">
			                     <input type="hidden" name="is_active" value="0">
			                 </div>
			                  <div class="form-group">
			                     {!! Form::submit('Un-approve',['class'=>'btn btn-info']) !!}
			                 </div>
		                 {!! Form::close() !!}

                 @else


		                 {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update',$comment->id]]) !!}
		                      <div class="form-group">
			                     <input type="hidden" name="is_active" value="1">
			                  </div>
			                  <div class="form-group">
			                     {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
			                 </div>
		                 {!! Form::close() !!}

		         @endif

             </td>

             <td>
             	
             	 {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy',$comment->id]]) !!}
		                  <div class="form-group">
		                     {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
		                 </div>
		              {!! Form::close() !!}
             </td>

				

			</tr>
		@endforeach
	</table>


@else

 <h1 class="text-center">No Comments</h1>

 @endif


@endsection