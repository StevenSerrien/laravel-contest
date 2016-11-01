@extends ('layouts.app')

@section('content')
<div>
  <div class="row centered">
    <div class="col-md-12 text-center headtitle">
      <h1>{{$contest->name}}</h1>
    </div>
  </div>
   <div class="container">
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">Compete in this contest! <br> Answer all questions correctly and you will be inserted into the contestantspool</div>
               <div class="panel-body">
                 {!! Form::open(['url' => '/contests']) !!}
                 @foreach ($contest->questions as $index => $question)
                   <div class="form group">
                     {!! Form::label('userAnswer'.($index + 1), $question->question) !!}
                     {!! Form::text('userAnswer'.($index + 1) , null, ["class" => "form-control"]) !!}
                   </div>
                 @endforeach
                 <div class="form-group">
                   {!! Form::submit('Submit my answers', ['class' => 'btn btn-primary form-control']) !!}
                 </div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
     </div>
   </div><
  </div>
@stop
