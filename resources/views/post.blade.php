@extends('layouts.blog-post')



@section('content')


  <!-- Title -->
          <h1 class="mt-4">{{$post->title}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">{{$post->user->name}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted {{$post->created_at->diffForHumans()}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{$post->photo->file}}" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead">{{$post->body}}</p>

          <hr>

          @if(Session::has('comment_message'))
             <div class="alert alert-success">

             {{session('comment_message')}}
               
             </div>

          @endif
          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}

                 <input type="hidden" name="post_id" value="{{$post->id}}">
                 <div class="form-group">
                     {!! Form::label('body','Body:') !!}
                     {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                 </div>
                  <div class="form-group">
                     {!! Form::submit('submit comment',['class'=>'btn btn-primary']) !!}
                 </div>
              {!! Form::close() !!}
            </div>
          </div>

@if(count($comments) > 0)

  @foreach($comments as $comment)

          <!-- Single Comment -->
          <div class="media mb-4">
            <img height="50" class="d-flex mr-3 rounded-circle" src="{{ $comment->photo }}" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$comment->author}}
              <small>{{$comment->created_at->diffForHumans()}}</small></h5>
              <p>{{$comment->body}}</p>

         
              <!-- replies Comment -->
                  @foreach($comment->replies as $reply)
                     @if($reply->is_active == 1)
                         <div class="media mt-4">
                          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                          <div class="media-body">
                          <h5 class="mt-0">{{$reply->author}}
                             <small>{{$reply->created_at->diffForHumans()}}</small></h5>
                          </h5>
                           <p>  {{$reply->body}} </p>
                          </div>
                           </div>
                     @endif
                  @endforeach 
           

                <!-- replies form -->
                  <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right"> Reply</button>
                         <div class="comment-reply">
                             {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}

                               <input type="hidden" name="comment_id" value="{{$comment->id}}">
                               <div class="form-group">
                                   {!! Form::label('body','Body:') !!}
                                   {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                               </div>
                                <div class="form-group">
                                   {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                               </div>
                            {!! Form::close() !!}
                        </div>
                 </div>


            </div>
          </div>
  @endforeach
@endif
          
          
@stop



@section('scripts')
<script type="text/javascript">
  
  $(".comment-reply-container .toggle-reply").click(function(){
  
   $(this).next().slideToggle("slow");

  });
</script>


@stop