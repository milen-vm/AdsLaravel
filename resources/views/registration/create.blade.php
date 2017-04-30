@extends('layout.main')

@section('content')
    <div class="col-lg-6 col-lg-offset-2">
        <h1>Register</h1>

        @include('layout.errors', ['errors' => $errors])

        {!! Form::open(['url' => url('/register'), 'method' => 'post',]) !!}

        <div class="form-group">
            {{ Form::label('name', 'Name:', ['class' => 'control-label',]) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required',]) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'control-label',]) }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required',]) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:', ['class' => 'control-label',]) }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required',]) }}
        </div>

        <div class="form-group">
            {{ Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'control-label',]) }}
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required',]) }}
        </div>

        {!! Form::submit('Register', ['class' => 'btn btn-info',]) !!}
        {!! Form::close() !!}
    </div>
@endsection