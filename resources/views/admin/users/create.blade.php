@extends('layouts.admin')

@section('content')


<h2>Create user</h2>


{!! Form::open(['action' => 'AdminUsersController@store','files'=>true]) !!}
 
 <div class="form-group">
       {!! Form::label('name', 'Name:') !!} 
       {!! Form::text('name',null,['class'=>'form-control']) !!} 
 </div> 
 <div class="form-group">
       {!! Form::label('email', 'Email:') !!} 
       {!! Form::email('email',null,['class'=>'form-control']) !!} 
 </div>
 <div class="form-group">
       {!! Form::label('role_id', 'Role:') !!} 
       {!! Form::select('role_id',[''=>'Choose role'] + $roles,null,['class'=>'form-control']) !!} 
 </div>  
 <div class="form-group">
       {!! Form::label('is_active', 'Status:') !!} 
       {!! Form::select('is_active',array(1=>'active',0=>'Not active'),1,['class'=>'form-control']) !!} 
 </div>  
 
 
 <div class="form-group">
       {!! Form::label('password', 'Password:') !!} 
       {!! Form::password('password',['class'=>'form-control']) !!} 
 </div>  
 <div class="form-group">
       {!! Form::label('photo_id', 'Photo:') !!} 
       {!! Form::file('photo_id',null,['class'=>'form-control']) !!} 
 </div> 
      
<div class="form-group">
       {!! Form::submit('create user',['class'=>'btn btn-primary']) !!} 
 </div>

  
 
  @include('includes.form_errors')
  
  
  
  
{!! Form::close() !!}


@endsection('content')