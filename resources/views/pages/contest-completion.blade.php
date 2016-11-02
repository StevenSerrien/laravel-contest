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
       <h1>You participated in this contest. Good luck. At the end a random contestant will be chosen from the pool.</h1>
     </div>
   </div><
  </div>
@stop
