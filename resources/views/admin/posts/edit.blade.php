@extends('layouts.admin')


@section('content')


<h2>Edit Post</h2>

<div class="row">
    <div class="col-md-3">
        <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive thumbnail">
    </div>
    <div class="col-md-9">
        {!! Form::model($post,['method'=>'PATCH','action' => ['AdminPostsController@update',$post->id],'files'=>true]) !!}

         <div class="form-group">
               {!! Form::label('title', 'Title:') !!} 
               {!! Form::text('title',null,['class'=>'form-control']) !!} 
         </div> 

           <div class="form-group">
               {!! Form::label('category_id', 'Category:') !!} 
               {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!} 
         </div>

         <div class="form-group">
               {!! Form::label('photo_id', 'Photo:') !!} 
               {!! Form::file('photo_id',['class'=>'form-control']) !!} 
         </div> 


         <div class="form-group">
               {!! Form::label('body', 'Description:') !!} 
               {!! Form::textarea('body',null,['class'=>'form-control','rows'=>4]) !!} 
         </div>



        <div class="form-group">
               {!! Form::submit('Update post',['class'=>'btn btn-warning col-sm-6']) !!} 
         </div>

               {!! Form::close() !!}
                       {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
                       <div class="form-group">
                       {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!} 
                       </div>
                {!! Form::close() !!}
        </div>
    </div>   

@include('includes.form_errors')
  
  
  
  
{!! Form::close() !!}


@endsection