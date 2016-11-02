@extends ('layouts.app')

@section('content')
<div id="contest">
  <div class="row centered">
    <div class="col-md-12 text-center headtitle">
      <h1>All our contests</h1>
    </div>
  </div>
   <div class="container">
     <div class="row">
       @foreach($contestsWithQuestions as $contest)
         <a class='contestItemLink' href="{{ url('/contests/'.$contest->id) }}">
         <div class="col-md-3 text-center headtitle contestItemContainer">
           <div class="contestItem">
             <i class="fa fa-gamepad" aria-hidden="true"></i>
             <h4>{{$contest->name}}</h4>
             <p>
               {{$contest->description}}
             </p>
             <p>
               {{$contest->start_date}} until {{$contest->end_date}}
             </p>
           </div>
         </div>
         </a>
       @endforeach
     </div>
   </div><!--container -->
  </div><!--/service -->
@stop
