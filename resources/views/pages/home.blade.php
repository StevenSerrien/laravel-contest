@extends ('layouts.app')

@section('content')
<div id="contest">
  <div class="row centered call-to-action">
    <div class="col-md-12 text-center headtitle">
      <h1>TEST YOUR KNOWLEDGE<br>IN OUR CONTESTS</h1>
      <a href="/contests">TAKE ME THERE</a>
    </div>
  </div>
  <div class="winnersContainer">
    <div class="container">
      <div class="row centered text-center headtitle">
        @if ($contestsWithWinners)
          <h1>Winners from previous contests</h1>
          @foreach ($contestsWithWinners as $contestWithWinner)
            <div class="col-md-3">
              <div class="card card-3">
                <h3 class='text-center'>{{ $contestWithWinner->name }}</h3>
                  <h4 class='text-center'>{{ $contestWithWinner->firstName }} {{ $contestWithWinner->lastName }}</h4>
                  <h5 class='text-center'>Ended on: {{ $contestWithWinner->end_date }}</h4>
              </div>


            </div>
          @endforeach
        @else
          <h1>There were no previous winners selected yet. Come back soon!</h1>
        @endif

      </div>
    </div><!--container -->
  </div>

  </div><!--/service -->
@stop
