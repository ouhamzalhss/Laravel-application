@extends('layouts.admin')

@section('content')


<h2>Edit user</h2>

<div class="row">
<div class="col-md-3">
    
    <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive img-round thumbnail">
    </div>

<div class="col-md-9">
{!! Form::model($user,['method'=>'PATCH','action' => ['AdminUsersController@update',$user->id],'files'=>true]) !!}
 
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
       {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!} 
 </div>  
 <div class="form-group">
       {!! Form::label('is_active', 'Status:') !!} 
       {!! Form::select('is_active',array(1=>'active',0=>'Not active'),null,['class'=>'form-control']) !!} 
 </div>  
 
 
 <div class="form-group">
       {!! Form::label('password', 'Password:') !!} 
       {!! Form::password('password',['class'=>'form-control']) !!} 
 </div>  
 <div class="form-group">
       {!! Form::label('photo_id', 'Photo:') !!} 
       {!! Form::file('photo_id',['class'=>'form-control']) !!} 
 </div> 
      
<div class="form-group">
       {!! Form::submit('Update user',['class'=>'btn btn-warning col-sm-6']) !!} 
 </div>


{!! Form::close() !!}
 
         {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
             <div class="form-group">
               {!! Form::submit('Delete user',['class'=>'btn btn-danger col-sm-6']) !!} 
             </div>
        {!! Form::close() !!}
</div>
  
</div>
  



  @include('includes.form_errors')



@endsection('content')