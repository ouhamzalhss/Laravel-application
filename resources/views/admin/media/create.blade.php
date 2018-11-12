@extends('layouts.admin')



@section('styles')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
 
@stop



@section('content')

<h2>Create Media</h2>

{!! Form::open(['action' => 'AdminMediasController@store','class'=>'dropzone']) !!}
  
{!! Form::close() !!}

@endsection




@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@stop