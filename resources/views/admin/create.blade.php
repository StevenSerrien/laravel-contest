@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new contest</div>
                <div class="panel-body">
                  {!! Form::open() !!}
                  <div class="form group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ["class" => "form-control"]) !!}
                  </div>
                  <div class="form group">
                    {!! Form::label('description', 'Description of the contest:') !!}
                    {!! Form::text('description', null, ["class" => "form-control"]) !!}
                  </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
