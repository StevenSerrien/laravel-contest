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
                <button type="button" name="button">Delete</button>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
</div>

{{-- @foreach ($users as $user)
  <user>
    <h2>{{ $user->firstName }}</h2>
  </user>
@endforeach --}}
@stop
