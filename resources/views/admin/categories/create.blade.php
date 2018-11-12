@extends('layouts.admin')


@section('content')


<h2>Create Category</h2>


{!! Form::open(['action' => 'AdminCategoriesController@store','files'=>true]) !!}
 
 <div class="form-group">
       {!! Form::label('name', 'Name:') !!} 
       {!! Form::text('name',null,['class'=>'form-control']) !!} 
 </div> 
 

      
<div class="form-group">
       {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!} 
 </div>

@include('includes.form_errors')
  
  
  
  
{!! Form::close() !!}


@endsection