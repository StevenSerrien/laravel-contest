@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <h1 class="text-center">Lijst van alle users</h1>
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
      <h1 class="text-center">Lijst van alle contests</h1>

      <div class='col-md-12'>
        <table class="table table-bordered">
          <tr>
            <th>
              Contest
            </th>
            <th>
              Description
            </th>
            <th>
              Question 1
            </th>
            <th>
              Answer 1
            </th>
            <th>
              Question 2
            </th>
            <th>
              Answer 2
            </th>
            <th>
             Start
            </th>
            <th>
              End
            </th>
            <th>
              Check competitors
            </th>
          </tr>
          @foreach ($contestsWithQuestions as $contest)
            <tr>
              <td>
                {{ $contest->name }}
              </td>
              <td>
                {{ $contest->description }}
              </td>
              @foreach ($contest->questions as $question)
                <td>
                  {{ $question->question }}
                </td>
                <td>
                  {{ $question->answer }}
                </td>
              @endforeach
              <td>
                {{ $contest->start_date }}
              </td>
              <td>
                {{ $contest->end_date }}
              </td>
              <td>
                <a href="{{ url('/dashboard/contests/'.$contest->id) }}">Check users</a>
              </td>
            </tr>
          @endforeach
        </table>
        <button><a href="{{ url('/dashboard/create')}}">Maak een nieuwe wedstrijd aan</a></button>
      </div>
    </div>
    </div>

</div>

{{-- @foreach ($users as $user)
  <user>
    <h2>{{ $user->firstName }}</h2>
  </user>
@endforeach --}}
@stop
