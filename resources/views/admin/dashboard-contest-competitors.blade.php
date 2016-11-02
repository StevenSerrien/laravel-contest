@extends ('layouts.app')

@section('content')
<div id="contest">
  <div class="row centered">
    <div class="col-md-12 text-center headtitle">
      <h1>List of the competitors</h1>
    </div>
  </div>
   <div class="container">
     <div class="row">
       <div class='col-md-12'>
         <table class="table">
           @foreach ($users as $user)
             <tr>
               <td>
                 {{ $user->firstName }}
               </td>
               <td>
                 {{ $user->lastName }}
               </td>
               <td>
                 {{ $user->email }}
               </td>
               <td>
                 {{ $user->streetName }} {{$user->houseNumber}}
               </td>
               <td>
                 {{ $user->city }}, {{$user->country}}
               </td>
               <td>
                 <a href="/user/delete/{{$user->id}}">Delete</a>
               </td>
             </tr>
           @endforeach
         </table>
       </div>
     </div>
   </div><!--container -->
  </div><!--/service -->
@stop
