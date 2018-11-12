@extends('layouts.admin')


@section('content')


<h2>Create Post</h2>


{!! Form::open(['action' => 'AdminPostsController@store','files'=>true]) !!}
 
 <div class="form-group">
       {!! Form::label('title', 'Title:') !!} 
       {!! Form::text('title',null,['class'=>'form-control']) !!} 
 </div> 
 
   <div class="form-group">
       {!! Form::label('category_id', 'Category:') !!} 
       {!! Form::select('category_id',[''=>'choose category']+$categories,null,['class'=>'form-control']) !!} 
 </div>
 
 <div class="form-group">
       {!! Form::label('photo_id', 'Photo:') !!} 
       {!! Form::file('photo_id',null,['class'=>'form-control']) !!} 
 </div> 
 
 
 <div class="form-group">
       {!! Form::label('body', 'Description:') !!} 
       {!! Form::textarea('body',null,['class'=>'form-control','rows'=>4]) !!} 
 </div>


      
<div class="form-group">
       {!! Form::submit('create post',['class'=>'btn btn-primary']) !!} 
 </div>

@include('includes.form_errors')
  
  
  
  
{!! Form::close() !!}


@endsection