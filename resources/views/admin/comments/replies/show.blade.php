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


@if($replies->count() > 0 )
<h1>Replies List</h1>
	<table class="table">
		<th>ID</th>
		<th>Author</th>
		<th>Email</th>
		<th>Body</th>
		<th>Comment</th>
	    <th>Actions</th>
	    <th>Actions</th>
		@foreach($replies as $reply)
           <tr>
             <td>{{$reply->id}}</td>
                          
              <td>{{$reply->author}}</td>

             <td>{{$reply->email}}</td>

             <td>{{$reply->body}}</td>

            <td><a href="{{route('home.post',$reply->comment->post->id)}}">View post</a></td>

             <td>
             	
             	@if($reply->is_active == 1)

		             	{!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update',$reply->id]]) !!}

			                 
			                 <div class="form-group">
			                     <input type="hidden" name="is_active" value="0">
			                 </div>
			                  <div class="form-group">
			                     {!! Form::submit('Un-approve',['class'=>'btn btn-info']) !!}
			                 </div>
		                 {!! Form::close() !!}

                 @else


		                 {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update',$reply->id]]) !!}
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
             	
             	 {!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy',$reply->id]]) !!}
		                  <div class="form-group">
		                     {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
		                 </div>
		              {!! Form::close() !!}
             </td>

				

			</tr>
		@endforeach
	</table>


@else

 <h1 class="text-center">No Replies</h1>

 @endif


@endsection