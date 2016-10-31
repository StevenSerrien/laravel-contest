@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new contest</div>
                <div class="panel-body">
                  {!! Form::open(['url' => '/dashboard']) !!}
                  <div class="form group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ["class" => "form-control"]) !!}
                  </div>
                  <div class="form group">
                    {!! Form::label('description', 'Description of the contest:') !!}
                    {!! Form::text('description', null, ["class" => "form-control"]) !!}
                  </div>
                  <h4>Add four questions and their answers</h4>

                    <div class="form group">
                      {!! Form::label('question', 'Question:') !!}
                      {!! Form::text('question1', null, ["class" => "form-control"]) !!}
                    </div>
                    <div class="form group">
                      {!! Form::label('answer', 'Answer:') !!}
                      {!! Form::text('answer1', null, ["class" => "form-control"]) !!}
                    </div>
                    <div class="form group">
                      {!! Form::label('question', 'Question:') !!}
                      {!! Form::text('question2', null, ["class" => "form-control"]) !!}
                    </div>
                    <div class="form group">
                      {!! Form::label('answer', 'Answer:') !!}
                      {!! Form::text('answer2', null, ["class" => "form-control"]) !!}
                    </div>

                  <div class="form-group">
                    {!! Form::submit('Add contest', ['class' => 'btn btn-primary form-control']) !!}
                  </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
