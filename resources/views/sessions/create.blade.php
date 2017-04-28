@extends('layout.main')

@section('content')
    <div class="col-lg-6 col-lg-offset-3">
        <h1>Log In</h1>

        @include('layout.errors', ['errors' => $errors])

        {!! Form::open(['url' => url('/login'), 'method' => 'post',]) !!}

        <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control-label',]) }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required',]) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:', ['class' => 'control-label',]) }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required',]) }}
        </div>

        {!! Form::submit('Log In', ['class' => 'btn btn-info',]) !!}
        {!! Form::close() !!}
    </div>
@endsection